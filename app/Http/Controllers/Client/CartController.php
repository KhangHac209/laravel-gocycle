<?php

namespace App\Http\Controllers\Client;

use App\Events\OrderSuccessEvent;
use App\Http\Controllers\Controller;
use App\Mail\OrderEmailAdmin;
use App\Mail\OrderEmailCustomer;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPayment;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view("client.pages.cart", ['cart' => $cart]);
    }

    public function destroy()
    {
        session()->put('cart', []);
        return response()->json(['message' => 'Xóa giỏ hàng thành công']);
    }
    public function deleteItem(string $productId)
    {
        $cart = session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        } else {
            throw new Exception('Ko the xoa');
        }
        return response()->json(['message' => 'Xoa thanh cong']);
    }
    public function add(Request $request)
    {
        $productId = $request->productId;

        $product = Product::find($productId);

        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'name' => $product->name,
            'qty' => isset($cart[$productId]) ? ($cart[$productId]['qty'] + 1) : 1,
            'price' => $product->price,
        ];
        $totalProducts = count($cart);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalItem = $item['price'] * $item['qty'];
            $totalPrice += $totalItem;
        }

        //save in session
        session()->put('cart', $cart);

        return response()->json([
            'message' => 'Them gio hang thanh cong',
            'totalPrice' => $totalPrice,
            'totalProducts' => number_format($totalProducts),
        ]);
    }
    public function addProductItem(string $productId, int $qty)
    {
        $cart = session()->get('cart', []);
        if (array_key_exists($productId, $cart)) {
            if ($qty === 0) {
                unset($cart[$productId]);
            } else {
                $cart[$productId]['qty'] = $qty;
            }
            session()->put('cart', $cart);
        }
        return response()->json(['message' => 'Cap nhat so luong thanh cong']);
    }
    private function getTotalPrice(): float
    {
        $totalPrice = 0;
        $cart = session()->get('cart', []);

        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['qty'];
        }
        return $totalPrice;
    }
    public function checkout()
    {
        $cart = session()->get('cart', []);
        $user = Auth::user();
        return view('client.pages.checkout', ['user' => $user, 'cart' => $cart]);
    }

    public function placeOrder(Request $request)
    {
        try {
            DB::beginTransaction();
            $order = new Order();
            $order->user_id = Auth::user()->id;
            $order->address = $request->address;
            $order->note = $request->note;
            $order->status = Order::PENDING;
            $order->total = $this->getTotalPrice();
            $order->save();

            //Insert ORder Item
            $cart = session()->get('cart', []);
            foreach ($cart as $productId => $item) {
                $orderItem = new OrderItem();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $productId;
                $orderItem->qty = $item['qty'];
                $orderItem->price = $item['price'];
                $orderItem->name = $item['name'];
                $orderItem->image =  null;
                $orderItem->save();
            }

            //Update phone
            $user = Auth::user();
            $user->phone = $request->phone;
            $user->save();

            if (in_array($request->payment_method, ['VNBANK', 'INTCARD'])) {

                $vnp_TxnRef = $order->id; //Mã giao dịch thanh toán tham chiếu của merchant
                $vnp_Amount = $order->total * 23500; // Số tiền thanh toán
                $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
                $vnp_BankCode = $request->payment_method; //Mã phương thức thanh toán
                $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán


                date_default_timezone_set('Asia/Ho_Chi_Minh');
                $startTime = date("YmdHis");
                $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));



                $inputData = array(
                    "vnp_Version" => "2.1.0",
                    "vnp_TmnCode" => config('myconfig.vnpay.TmnCode'),
                    "vnp_Amount" => $vnp_Amount * 100,
                    "vnp_Command" => "pay",
                    "vnp_CreateDate" => date('YmdHis'),
                    "vnp_CurrCode" => "VND",
                    "vnp_IpAddr" => $vnp_IpAddr,
                    "vnp_Locale" => $vnp_Locale,
                    "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
                    "vnp_OrderType" => "other",
                    "vnp_ReturnUrl" => config('myconfig.vnpay.Returnurl'),
                    "vnp_TxnRef" => $vnp_TxnRef,
                    "vnp_ExpireDate" => $expire,
                    "vnp_BankCode" => $vnp_BankCode,
                );

                ksort($inputData);
                $query = "";
                $i = 0;
                $hashdata = "";
                foreach ($inputData as $key => $value) {
                    if ($i == 1) {
                        $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                    } else {
                        $hashdata .= urlencode($key) . "=" . urlencode($value);
                        $i = 1;
                    }
                    $query .= urlencode($key) . "=" . urlencode($value) . '&';
                }

                $vnp_Url = config('myconfig.vnpay.Url') . "?" . $query;
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, config('myconfig.vnpay.HashSecret')); //
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

                //header('Location: ' . $vnp_Url);
                DB::commit();
                return redirect()->to($vnp_Url);
            } else {
                $orderPayment = new OrderPayment();
                $orderPayment->total = $order->total;
                $orderPayment->payment_method = 'COD';
                $orderPayment->status = 'success';
                $orderPayment->reason = null;
                $orderPayment->order_id = $order->id;
                $orderPayment->save();

                // Clear cart
                session()->put('cart', []);

                // Public event
                event(new OrderSuccessEvent($order));
            }

            return redirect()->route('home.index')->with('success', 'Order Success');
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }




        // //send email to customer
        // Mail::to('nasun20p@gmail.com')->send(new OrderEmailCustomer($order));
        // Mail::to('nasun20p@gmail.com')->send(new OrderEmailAdmin($order));

        // //minus qty in system
        // foreach ($order->orderItems as $item) {
        //     $product = $item->product;
        //     $product->qty -= $item->qty;
        //     $product->save();
        // }


    }
    public function vnpayCallback(Request $request)
    {
        $order = Order::find($request->vnp_TxnRef);

        $orderPayment = new OrderPayment();
        // dd($orderPayment->total);
        $orderPayment->total = $order->total;
        $orderPayment->payment_method = 'vnpay';
        $orderPayment->status = $request->vnp_ResponseCode === '00' ? 'success' : 'fail';
        $orderPayment->reason = OrderPayment::RESPONSE_CODE_VNPAY[$request->vnp_ResponseCode];
        $orderPayment->order_id = $order->id;

        $message = '';
        if ($orderPayment->status === 'success') {
            event(new OrderSuccessEvent($order));
            session()->put('cart', []);

            $message = 'Order Success';
        } else {
            $message = 'Order Failed';
        }

        $orderPayment->save();
        return redirect()->route('home.index')->with('success', $message);
    }
}

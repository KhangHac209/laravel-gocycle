<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductStoreRequest;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $datas = DB::table('product')->join(
        //     'product_category',
        //     'product.product_category_id',
        //     '=',
        //     'product_category_id'
        // )
        //     ->select('product.*')
        //     ->selectRaw('product_category.name as product_category_name')
        //     ->paginate(config('myconfig.my_item_per_page'));

        $datas = Product::with('productCategory')->paginate(config('myconfig.my_item_per_page'));
        return view('admin.pages.product.index', ['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $productCategories = ProductCategory::all();
        return view("admin.pages.product.create", ["productCategories" => $productCategories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductStoreRequest $request)
    {
        //Eloquent - Mass assignment - Model
        // $product = Product::create([
        //     'name' => $request->name,
        //     'slug' => $request->slug,
        //     'price' => $request->price,
        //     'qty' => $request->qty,
        //     'description' => $request->description,
        //     'status' => $request->status,
        //     'product_category_id' => $request->product_category_id,
        // ]);

        // if($request->hasFile('image_url')){
        //     $file = $request->file('image_url');
        //     $originName = $file->getClientOriginalName();

        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . uniqid() . '.' . $extension;

        //     //move_uploaded_file()
        //     $file->move(public_path('images'), $fileName);
        // }

        // //Update column
        // $product->image_url = $fileName;
        // $product->save(); //update

        $product = new Product;
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->product_category_id = $request->product_category_id;

        // if ($request->hasFile('image_url')) {
        //     $file = $request->file('image_url');
        //     $originName = $file->getClientOriginalName();

        //     $fileName = pathinfo($originName, PATHINFO_FILENAME);
        //     $extension = $file->getClientOriginalExtension();
        //     $fileName = $fileName . '_' . uniqid() . '.' . $extension;

        //     //move_uploaded_file()
        //     $file->move(public_path('images'), $fileName);
        // }

        // $product->image_url = $fileName;

        $product->save(); // insert

        $message = $product ? 'Tao san pham thanh cong' : 'Tao san pham that bai';

        return redirect()->route('admin.product.index')->with('message', $message);
    }
    public function search(Request $request, $keySearch)
    {
        // Tìm kiếm sản phẩm dựa trên tên (ví dụ: name là cột trong bảng product)
        $products = Product::where('name', 'like', "%$keySearch%")->get();

        // Trả về view hiển thị kết quả tìm kiếm và giá trị keySearch
        return view('client.pages.searchProduct', ['products' => $products, 'keySearch' => $keySearch]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
    }
    // public function showProducts()
    // {
    //     $products = Product::all();

    //     //dd($products);
    //     return view('client.pages.cardproduct', ['products' => $products]);
    // }
    public function detail($id)
    {
        $product = Product::with('productCategory')->findOrFail($id);
        return view('client.pages.product_detail', ['product' => $product]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(Request $request, Product $product)
    // {
    //     // $id = $request->id;
    //     $result = $product->delete();
    //     // $delete = DB::table('product_category')->where('id', $id)->delete();

    //     //Eloquent - ORM
    //     // $delete = ProductCategory::find($id)->delete();

    //     $message = $result ? 'Xoa thanh cong' : 'Xoa that bai';
    //     return redirect()->route('admin.product.index')->with('message', $message);
    // }
    // public function restore(Request $request, int $id)
    // {
    //     $id = $request->id;

    //     //Eloquent
    //     $data = Product::withTrashed()->find($id)->restore();
    //     return redirect()->route('admin.product.index')->with('message', 'Khoi phuc thanh cong');
    // }
    public function detailProduct(Request $request, Product $product)
    {
        $productCategories = ProductCategory::all();
        return view('admin.pages.product.detail', ['data' => $product, 'productCategories' => $productCategories]);
    }
}

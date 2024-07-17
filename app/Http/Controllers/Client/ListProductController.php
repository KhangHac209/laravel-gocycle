<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;

class ListProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('brand') && $request->brand != 'All Products') {
            $query->whereHas('productCategory', function ($query) use ($request) {
                $query->where('name', $request->brand);
            });
        }

        // Lọc theo phạm vi giá nếu được yêu cầu
        if ($request->has('min_price') && $request->has('max_price')) {
            // Lấy tất cả sản phẩm trước khi lọc giá
            $products = $query->get();

            // Lọc các sản phẩm theo giá sau khi áp dụng discount
            $filteredProducts = $products->filter(function ($product) use ($request) {
                $discountedPrice = $product->price - ($product->price * ($product->discount / 100));
                return $discountedPrice >= $request->min_price && $discountedPrice <= $request->max_price;
            });

            // Chuyển collection đã lọc sang query builder
            $query = Product::whereIn('id', $filteredProducts->pluck('id'));
        }

        $itemPerPage = config('myconfig.my_item_per_page', 5);
        $products = $query->paginate($itemPerPage);
        $brands = ProductCategory::all();

        return view('client.pages.list_product', compact('products', 'brands'));
    }
}

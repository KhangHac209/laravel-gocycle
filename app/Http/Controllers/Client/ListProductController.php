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

        // Lọc theo thương hiệu nếu được yêu cầu
        if ($request->has('brand') && $request->brand != 'All Products') {
            $query->whereHas('productCategory', function ($query) use ($request) {
                $query->where('name', $request->brand);
            });
        }

        // Lọc theo phạm vi giá nếu được yêu cầu
        if ($request->has('min_price') && $request->has('max_price')) {
            $query->whereBetween('price', [$request->min_price, $request->max_price]);
        }

        $itemPerPage = config('myconfig.my_item_per_page', 5);
        $products = $query->paginate($itemPerPage);
        $brands = ProductCategory::all();



        return view('client.pages.list_product', compact('products', 'brands'));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Product;
use App\Models\Admin\ProductCategory;
use App\Models\Order;;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // $pendingCount = Order::where('status', Order::PENDING)->count();
        // $cancelCount = Order::where('status', Order::CANCEL)->count();
        // $successCount = Order::where('status', Order::SUCCESS)->count();

        $status = Order::select('status', Order::raw('count(*) as total'))->groupby('status')->get();

        $data = [
            ['Order Status', 'Number'],
        ];
        foreach ($status as  $item) {
            $data[] = [ucfirst($item->status), $item->total];
        }



        $categoryCount = DB::table('product')->select('product_category.name', DB::raw('count(*) as total'))
            ->join('product_category', 'product_category.id', '=', 'product.product_category_id')
            ->groupBy('product_category_id')->orderBy('total', 'desc')->get();


        $dataCategory = [
            ["Product Category Name", "Total"],
        ];
        foreach ($categoryCount as  $item) {
            $dataCategory[] = [$item->name, $item->total];
        }

        $productCount = Product::count();
        $productCategryCount = ProductCategory::count();
        $userCount = User::count();
        $orderCount = Order::count();
        return view('admin.pages.dashboard', [
            'data' => $data,
            'dataCategory' => $dataCategory,
            'productCount' => $productCount,
            'productCategryCount' => $productCategryCount,
            'userCount' => $userCount,
            'orderCount' => $orderCount
        ]);
    }
}

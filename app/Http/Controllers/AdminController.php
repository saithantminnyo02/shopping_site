<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Category;

class AdminController extends Controller
{

    function __construct()
    {
         $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index','products']]);
    }

    public function index()
    {
        $totalProducts = Product::all()->count();
        $totalUsers = User::all()->count();
        $totalCategories = Category::all()->count();
        return view('admin.dashboard', ['totalProducts' => $totalProducts, 'totalUsers' => $totalUsers, 'totalCategories' => $totalCategories]);
    }

    public function products()
    {
        // $products = Product::all()->paginate(9);
        $products = Product::latest()->paginate(20);
        return view('admin.productsTable', ['products' => $products]);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {

        $category = Category::count();
        $product = Product::count();
        $user = User::where('role', 'user')->count();

        return view('pages.admin.index', compact('category', 'product', 'user'));
    }
}

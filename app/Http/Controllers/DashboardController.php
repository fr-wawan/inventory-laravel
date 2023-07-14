<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function index()
  {
    $supplierCount = Supplier::all()->count();
    $productCount = Product::all()->count();
    $categoriesCount = Category::all()->count();
    return view('admin.dashboard.index', compact('supplierCount', 'productCount', 'categoriesCount'));
  }
}

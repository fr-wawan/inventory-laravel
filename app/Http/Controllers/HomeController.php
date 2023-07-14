<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index()
  {
    $products = Product::latest()->filter(request(['search', 'category']))->paginate(12)->withQueryString();

    $categories = Category::limit(8)->get();

    return view('home.index', compact('products', 'categories'));
  }

  public function show(Product $product)
  {
    return view('home.show', compact('product'));
  }
}

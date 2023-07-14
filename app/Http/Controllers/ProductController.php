<?php

namespace App\Http\Controllers;

use App\Imports\ProductImport;
use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $products = Product::latest()->filter(request(['search']))->paginate(10)->withQueryString();
    return view('admin.products.index', compact('products'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $suppliers = Supplier::all();
    $categories = Category::all();
    return view('admin.products.create', compact('suppliers', 'categories'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'image' => 'required|image|file|mimes:jpeg,jpg,png',
      'product_code' => 'required',
      'brand' => 'required',
      'unit' => 'required',
      'supplier_id' => 'required',
      'category_id' => 'required',
      'description' => 'required'
    ]);

    $validatedData['image'] = $request->file('image')->store('products', 'public');

    Product::create($validatedData);

    return redirect()->route('products.index')->with(['success' => 'Successfully Added Data!']);
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Product $product)
  {
    $suppliers = Supplier::all();
    $categories = Category::all();

    return view('admin.products.edit', compact('product', 'suppliers', 'categories'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Product $product)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'image' => 'image|file|mimes:jpeg,jpg,png',
      'product_code' => 'required',
      'brand' => 'required',
      'unit' => 'required',
      'supplier_id' => 'required',
      'category_id' => 'required',
      'description' => 'required'
    ]);

    if ($request->file('image')) {
      if ($product->image) {
        Storage::disk('public')->delete($product->image);
      }
      $validatedData['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($validatedData);

    return redirect()->route('products.index')->with(['success' => 'Successfully Update Data!']);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Product $product)
  {
    if ($product->image) {
      Storage::disk('public')->delete($product->image);
    }

    $product->delete($product->id);

    return redirect()->route('products.index')->with(['success' => 'Successfully Delete Data!']);
  }

  public function indexStock(Product $product)
  {
    return view('admin.products.stock', compact('product'));
  }

  public function updateStock(Request $request, Product $product)
  {
    $validatedData = $request->validate([
      'stock' => 'required|min:0',
    ]);

    $product->update($validatedData);

    return redirect()->route('products.index')->with(['success' => 'Successfully Update Data!']);
  }

  public function excelIndex()
  {
    return view('admin.products.excel');
  }

  public function importExcel(Request $request)
  {
    $request->validate([
      'excel' => 'required|mimes:csv,xls,xlsx'
    ]);

    Excel::import(new ProductImport, $request->file('excel')->store('excel'));

    return redirect()->route('products.index')->with(['success' => 'Successfully Upload Data!']);
  }
}

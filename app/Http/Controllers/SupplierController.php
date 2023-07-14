<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $suppliers = Supplier::latest()->filter(request(['search']))->paginate(10)->withQueryString();

    return view('admin.suppliers.index', compact('suppliers'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.suppliers.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
    ]);

    Supplier::create($validatedData);

    return redirect()->route('suppliers.index')->with(['success' => 'Successfully Added Data!']);
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
  public function edit(Supplier $supplier)
  {
    return view('admin.suppliers.edit', compact('supplier'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Supplier $supplier)
  {
    $validatedData = $request->validate([
      'name' => 'required',
    ]);

    $supplier->update($validatedData);

    return redirect()->route('suppliers.index')->with(['success' => 'Successfully Update Data!']);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Supplier $supplier)
  {
    $supplier->delete($supplier->id);

    return redirect()->route('suppliers.index')->with(['success' => 'Successfully Delete Data!']);
  }
}

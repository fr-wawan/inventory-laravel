<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $transactions = Transaction::latest()->paginate(10);
    return view('admin.transaction.index', compact('transactions'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function filter(Request $request)
  {
    $validatedData = $request->validate([
      'borrowing_date' => 'required',
      'deadline_date' => 'required',
      'status' => 'required',
    ]);

    $transactions = Transaction::where('status', $request->status)->whereDate('created_at', '>=', $request->borrowing_date)->whereDate('created_at', '<=', $request->deadline_date)->get();

    return view('admin.transaction.index', compact('transactions'));
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $product = Product::find($request->product_id);

    $validatedData = $request->validate([
      'full_name' => 'required',
      'product_id' => 'required',
      'role' => 'required',
      'quantity' => 'required|numeric',
      'borrowing_date' => 'required|date',
      'deadline_date' => 'required|date',
      'signature' => 'required',
      'nisn' => $request->role == 'siswa' ? 'required' : 'nullable',
    ]);

    if ($request->quantity > $product->stock) {
      return redirect()->back()->with([
        'error' => 'Stock tidak mencukupi'
      ]);
    }

    $folderPath = public_path('signature/');

    $image_parts = explode(";base64,", $request->signature);

    $image_type_aux = explode("image/", $image_parts[0]);

    $image_type = $image_type_aux[1];

    $image_base64 = base64_decode($image_parts[1]);

    $file = $folderPath . uniqid() . '.' . $image_type;

    $validatedData['signature'] = $file;

    file_put_contents($file, $image_base64);

    $product->update([
      'stock' => $product->stock - $request->quantity,
    ]);

    $transaction = Transaction::create(
      [
        'full_name' => $request->full_name,
        'product_id' => $request->product_id,
        'role' => $request->role,
        'nisn' => $request->nisn,
        'borrowing_date' => $request->borrowing_date,
        'deadline_date' => $request->deadline_date,
        'quantity' => $request->quantity,
        'signature' => $file
      ]
    );

    return redirect()->back()->with(['success' => 'Peminjaman Berhasil']);
  }

  /**
   * Display the specified resource.
   */
  public function show(Transaction $transaction)
  {
    return view('admin.transaction.show', compact('transaction'));
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Transaction $transaction)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Transaction $transaction)
  {
    $validatedData = $request->validate([
      'status' => 'required',
    ]);

    $transaction->update($validatedData);

    return redirect()->route('transactions.index')->with(['success' => 'Successfully Update Data!']);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Transaction $transaction)
  {
    //
  }
}

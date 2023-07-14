<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $categories = Category::latest()->filter(request(['search']))->paginate(10)->withQueryString();
    return view('admin.categories.index', compact('categories'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('admin.categories.create');
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required',
      'image' => 'required|image|file|max:2048',
    ]);

    $validatedData['image'] = $request->file('image')->store('categories', 'public');

    Category::create($validatedData);
    return redirect()->route('categories.index')->with(['success' => 'Successfully Added Data!']);
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
  public function edit(Category $category)
  {
    return view('admin.categories.edit', compact('category'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Category $category)
  {

    $validatedData = $request->validate([
      'name' => 'required',
      'image' => 'image|file|max:2048',
    ]);

    if ($request->file('image')) {
      if ($category->image) {
        Storage::disk('public')->delete($category->image);
      }
      $validatedData['image'] = $request->file('image')->store('categories', 'public');
    }

    $category->update($validatedData);
    return redirect()->route('categories.index')->with(['success' => 'Successfully Update Data!']);
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Category $category)
  {
    $category->delete($category->id);

    return redirect()->route('categories.index')->with(['success' => 'Successfully Delete Data!']);
  }
}

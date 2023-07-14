@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10">
  <h1 class="font-bold text-xl mb-6 border-b pb-3">EDIT PRODUCTS</h1>

  <form action="{{ route('products.update',$product->slug) }}" method="post" enctype="multipart/form-data">
    @method('put')
    @csrf

    <x-input name="name" label="Products Name" value="{{ $product->name }}" />

    <x-input name="image" type="file" label="Products Image" />
    <p class="text-gray-500 text-sm">*520px x 520px</p>
    <div class="flex gap-4">
      <x-input name="product_code" label="Products Code" value="{{ $product->product_code }}" />
      <x-input name="brand" label="Products Brand" value="{{ $product->brand }}" />
      @error('name')
      <p class="text-red-600">{{ $message }}</p>
      @enderror
    </div>

    <div class="flex gap-4">
      <div class="my-3 w-full">
        <label for="supplier_id">Supplier Name</label>
        <select name="supplier_id" id="supplier_id" class="block border border-gray-300 w-full p-2 rounded-md mt-2 ">
          @foreach ($suppliers as $supplier)
          <option value="{{ $supplier->id }}" {{ $product->supplier_id == $supplier->id ? ' selected' : '' }}>{{
            $supplier->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="my-3 w-full">
        <label for="category_id">Category Name</label>
        <select name="category_id" id="category_id" class="block border border-gray-300 w-full p-2 rounded-md mt-2 ">
          @foreach ($categories as $category)

          <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? ' selected' : '' }}>
            {{ $category->name }}
          </option>
          @endforeach
        </select>
      </div>

    </div>

    <x-input name="unit" label="Products Unit" value="{{ $product->unit }}" />

    <div class="my-3 w-full">
      <div class="mb-2">
        <label for="description">Products Description</label>
      </div>
      <input id="x" type="hidden" name="description" value="{{ $product->description }}">
      <trix-editor input="x"></trix-editor>
    </div>

    <div class="flex items-center gap-5">
      <button type="submit" class="bg-[#3B4252] p-2 px-5  rounded-md mt-3 text-white hover:bg-[#4C566A]">Submit</button>
    </div>
  </form>


</div>
@endsection
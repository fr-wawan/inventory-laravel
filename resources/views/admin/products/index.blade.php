@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10 ">

  @if (session()->has('success'))
  <x-alert>
    {{ session('success') }}
  </x-alert>
  @endif


  <h1 class="font-bold text-xl mb-8 border-b pb-3">LIST SUPPLIERS</h1>

  <form class="flex gap-3 items-center justify-between">
    <div>
      <a href="{{ route('products.create') }}"
        class="bg-[#3B4252] p-3 px-5 text-white rounded-md hover:bg-[#4C566A]">Create</a>

      <a href="{{ route('products.import.index') }}"
        class="bg-stone-700 p-3 px-5 text-white rounded-md hover:bg-stone-600">Import Excel</a>
    </div>

    <input type="text" name="search" id="search" class=" border border-gray-300 w-2/12  p-2 rounded-md "
      placeholder="Search...">
  </form>

  <x-table :headers="['image','Product Code','Name','Category','Supplier','Stock']">
    @foreach ($products as $product)
    <tr class="text-center border-b">
      <td class="whitespace px-6 py-4">
        {{ $loop->iteration }}
      </td>
      <td>
        <img src="/storage/{{ $product->image }}" alt="" width="60" class="mx-auto">
      </td>
      <td class="whitespace px-6 py-4">
        {{ $product->product_code }}
      </td>
      <td class="whitespace px-6 py-4">
        {{ $product->name }}
      </td>
      <td class="whitespace px-6 py-4">
        {{ $product->category->name }}
      </td>

      <td class="whitespace px-6 py-4">
        {{ $product->supplier->name }}
      </td>

      <td class="whitespace px-6 py-4">
        {{ $product->stock }}
      </td>


      <td class="whitespace px-6 py-4 flex justify-center gap-2 ">
        <a href="{{ route('stock.index',$product->slug) }}"
          class="bg-gray-700 text-white p-2 px-5 rounded-md hover:bg-gray-600 ">Stock</a>
        <a href="{{ route('products.edit',$product->slug) }}"
          class="bg-blue-700 text-white p-2 px-5 rounded-md hover:bg-blue-600 ">Edit</a>
        <form action="{{ route('products.destroy',$product->slug) }}" method="post"
          onsubmit="return confirm('Are You Sure?')">
          @method('delete')
          @csrf
          <button class="bg-red-600 hover:bg-red-500 text-white p-2 px-5 rounded-md">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </x-table>
  <div class="mt-5">
    {{ $products->links() }}
  </div>
</div>
@endsection
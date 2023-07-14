@extends('layouts.app')

@section('content')
<div class="mt-32 mb-5 border-b pb-5 mx-10 flex items-center justify-between">
  <h1 class="font-bold text-2xl ">List Category</h1>
  <a href="/categories" class="mt-1  text-gray-700">Show All</a>
</div>
<div class="flex flex-wrap justify-center">
  @foreach ($categories as $category)
  <a href="?category={{ $category->slug }}"
    class="flex flex-col xl:mb-10 md:mb-5 mb-2 bg-white p-5 rounded-lg shadow-md flex-grow-0 shrink-0 md:basis-[9rem] mx-auto basis-[6rem] md:mx-auto">
    <div>
      <img src="/storage/{{ $category->image }}" width="50" alt="" class="mx-auto">
      <p class="text-center mt-3">{{ $category->name }}</p>
    </div>
  </a>
  @endforeach
</div>

<form class="flex mb-5 items-center justify-between mx-10 border-b pb-3 ">
  <h1 class=" font-bold text-2xl ">List Product</h1>
  @if (request('category'))
  <input type="hidden" name="category" value="{{ request('category') }}">
  @endif

  @if (request('page'))
  <input type="hidden" name="page" value="{{ request('page') }}">
  @endif
  <input type="text" name="search" id="search" class=" border border-gray-300 w-2/12  p-2 rounded-md mt-2"
    placeholder="Search...">
</form>
<div class="flex flex-wrap">
  @foreach ($products as $product)
  @if($product->stock > 0)
  <x-card :product="$product" />
  @endif
  @endforeach
</div>
<div class="mb-10 flex justify-center">
  {{ $products->links() }}
</div>
@endsection
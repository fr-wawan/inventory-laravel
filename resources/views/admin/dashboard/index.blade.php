@extends('layouts.admin')

@section('content')
<div class="ml-60">
  <div class="grid grid-cols-7 gap-5">
    <a href="{{ route('categories.index') }}" class="bg-white rounded-lg shadow-md flex items-center p-3 pr-12 gap-3">

      <div class="p-3 flex items-center rounded-lg bg-blue-700">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-layout-grid-add" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
          <rect x="4" y="4" width="6" height="6" rx="1" />
          <rect x="14" y="4" width="6" height="6" rx="1" />
          <rect x="4" y="14" width="6" height="6" rx="1" />
          <path d="M14 17h6m-3 -3v6" />
        </svg>
      </div>


      <div>
        <p>Categories</p>
        <p class="text-sm text-gray-500">{{ $categoriesCount }}</p>
      </div>
    </a>
    <a href="{{ route('suppliers.index') }}" class="bg-white rounded-lg shadow-md flex items-center p-3 pr-12 gap-3">

      <div class="p-3 flex items-center rounded-lg bg-orange-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
          <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
          <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
          <path d="M3 9l4 0"></path>
        </svg>
      </div>


      <div>
        <p>Suppliers</p>
        <p class="text-sm text-gray-500">{{ $supplierCount }}</p>
      </div>



    </a>

    <a href="{{ route('products.index') }}" class="bg-white rounded-lg shadow-md flex items-center p-3 pr-12 gap-3">

      <div class="p-3 flex items-center rounded-lg bg-lime-600 text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
          <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
          <path d="M10 12l4 0"></path>
        </svg>
      </div>


      <div>
        <p>Products</p>
        <p class="text-sm text-gray-500">{{ $productCount }}</p>
      </div>



    </a>
  </div>
</div>
@endsection
@props(['product'])
<div
  class="flex flex-col xl:mb-10 md:mb-5 mb-2 bg-white p-5 rounded-lg shadow-md flex-grow-0 shrink-0 md:basis-[22rem] mx-auto basis-[17rem] md:mx-auto">
  <div class="mb-4">
    <img class="mx-auto rounded-lg border" alt="" src="/storage/{{ $product->image }}" />
  </div>

  <div class=" mt-auto">
    <div class="flex justify-between items-center ">
      <p class="font-bold text-xl">
        {{ $product->name }}
      </p>
      <p class="text-gray-500 ">Stock : {{ $product->stock }}</p>
    </div>
    <div class="flex justify-between items-center text-gray-500">
      <p class="mt-3">Satuan : {{ $product->unit }}</p>
      <p class="mt-3">Brand : {{ $product->brand }}</p>
    </div>
    <p>
      Category :
      <a href="?category={{ $product->category->slug }}" class="my-1 text-blue-600"> {{ $product->category->name }}</a>
      <a href="{{ route('home.show',$product->slug) }}">
    </p>
    <div
      class="text-center mt-5 bg-blue-600 hover:bg-blue-500 cursor-pointer transition-all duration-300 ease-in-out p-2.5 px-5 rounded text-white">
      Details
    </div>
    </a>
  </div>

</div>
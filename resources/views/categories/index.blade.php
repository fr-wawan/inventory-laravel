@extends('layouts.app')

@section('content')
<div class="mt-32 mb-5 border-b pb-5 mx-10 flex items-center justify-between">
  <h1 class="font-bold text-2xl ">List Category</h1>

</div>
<div class="flex flex-wrap justify-center">
  @foreach ($categories as $category)
  <a href="/?category={{ $category->slug }}"
    class="flex flex-col xl:mb-10 md:mb-5 mb-2 bg-white p-5 rounded-lg shadow-md flex-grow-0 shrink-0 md:basis-[9rem] mx-auto basis-[6rem] md:mx-auto">
    <div>
      <img src="/storage/{{ $category->image }}" width="50" alt="" class="mx-auto">
      <p class="text-center mt-3">{{ $category->name }}</p>
    </div>
  </a>
  @endforeach
</div>


@endsection
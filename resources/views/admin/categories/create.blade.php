@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10">
  <h1 class="font-bold text-xl mb-6 border-b pb-3">CREATE CATEGORY</h1>

  <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
    @csrf

    <x-input name="name" label="Category Name" />

    @error('name')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <x-input name="image" label="Category Image" type="file" />

    @error('image')
    <p class="text-red-600">{{ $message }}</p>
    @enderror

    <div class="flex items-center gap-5">
      <button type="submit" class="bg-[#3B4252] p-2 px-5  rounded-md mt-3 text-white hover:bg-[#4C566A]">Submit</button>
    </div>
  </form>


</div>
@endsection
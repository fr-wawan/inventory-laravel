@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10 ">

  @if (session()->has('success'))
  <x-alert>
    {{ session('success') }}
  </x-alert>
  @endif


  <h1 class="font-bold text-xl mb-8 border-b pb-3">LIST CATEGORY</h1>

  <form action="" class="flex gap-3 items-center justify-between">
    <a href="{{ route('categories.create') }}"
      class="bg-[#3B4252] p-3 px-5 text-white rounded-md hover:bg-[#4C566A]">Create</a>

    <input type="text" name="search" id="search" class=" border border-gray-300 w-2/12  p-2 rounded-md "
      placeholder="Search...">
  </form>
  <x-table :headers="['Image','Name','Slug']">
    @foreach ($categories as $category)
    <tr class="text-center border-b">
      <td class="whitespace px-6 py-4">
        {{ $loop->iteration }}
      </td>
      <td class="whitespace px-6 py-4 mx-auto">
        <img src="/storage/{{ $category->image }}" alt="" width="50" class="mx-auto">
      </td>
      <td class="whitespace px-6 py-4">
        {{ $category->name }}
      </td>
      <td class="whitespace px-6 py-4">
        {{ $category->slug }}
      </td>

      <td class="whitespace px-6 py-4 flex justify-center gap-2 mt-2">
        <a href="{{ route('categories.edit',$category->slug) }}"
          class="bg-blue-700 text-white p-2 px-5 rounded-md hover:bg-blue-600 ">Edit</a>
        <form action="{{ route('categories.destroy',$category->slug) }}" method="post"
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
    {{ $categories->links() }}
  </div>
</div>
@endsection
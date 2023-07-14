@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10 ">

  @if (session()->has('success'))
  <x-alert>
    {{ session('success') }}
  </x-alert>
  @endif


  <h1 class="font-bold text-xl mb-8 border-b pb-3">LIST SUPPLIERS</h1>

  <form action="" class="flex gap-3 items-center justify-between">
    <a href=" {{ route('suppliers.create') }}" class="bg-[#3B4252] p-3 px-5 text-white rounded-md hover:bg-[#4C566A]">
      Create</a>

    <input type="text" name="search" id="search" class=" border border-gray-300 w-2/12  p-2 rounded-md "
      placeholder="Search...">
  </form>


  <x-table :headers="['Name']">
    @foreach ($suppliers as $supplier)
    <tr class="text-center border-b">
      <td class="whitespace px-6 py-4">
        {{ $loop->iteration }}
      </td>
      <td class="whitespace px-6 py-4">
        {{ $supplier->name }}
      </td>

      <td class="whitespace px-6 py-4 flex justify-center gap-2 ">
        <a href="{{ route('suppliers.edit',$supplier->id) }}"
          class="bg-blue-700 text-white p-2 px-5 rounded-md hover:bg-blue-600 ">Edit</a>
        <form action="{{ route('suppliers.destroy',$supplier->id) }}" method="post"
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
    {{ $suppliers->links() }}
  </div>

</div>
@endsection
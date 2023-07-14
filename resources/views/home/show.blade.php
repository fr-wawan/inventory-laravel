@extends('layouts.app')

@section('content')
<div
  class="flex bg-white container mx-auto flex-col-reverse xl:flex-row items-start  mt-32 rounded-md shadow-md p-5 gap-10">
  <div class="w-full">
    <form action="{{ route('transaction.store') }}" class="" method="post">
      @csrf
      <h1 class="font-bold text-xl border-b pb-3 mt-3">Data Peminjam</h1>
      @if(session()->has('error'))
      <div class="bg-red-600 w-full p-5 rounded-md text-white mb-5">
        {{ session('error') }}
      </div>
      @endif
      @if(session()->has('success'))
      <x-alert>{{ session('success') }}</x-alert>
      @endif
      <input type="hidden" name="product_id" value="{{ $product->id }}">
      <x-input name="full_name" label="Nama Panjang Peminjam" :value="old('full_name')" />

      @error('full_name')
      <p class="text-red-600">{{ $message }}</p>
      @enderror

      <div class="my-3 w-full">
        <label for="category_id">Status Peminjam</label>
        <select name="role" onchange="checkRole(this)" id="category_id"
          class="block border border-gray-300 w-full p-2 rounded-md mt-2">
          <option value="siswa">Siswa</option>
          <option value="guru">Guru</option>
        </select>

      </div>

      <div id="siswaInput">
        <x-input name="nisn" label="NISN Siswa" :value="old('nisn')" />

        @error('nisn')
        <p class="text-red-600">{{ $message }}</p>
        @enderror
      </div>

      <div class="flex flex-col xl:flex-row gap-3">
        <x-input name="borrowing_date" label="Tanggal Peminjaman (Hari Ini)" type="date"
          :value="old('borrowing_date',date('Y-m-d'))" />

        @error('borrowing_date')
        <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="w-full">
          <x-input name="deadline_date" label="Tanggal Balik Peminjaman" type="date" :value="old('deadline_date')" />

          @error('deadline_date')
          <p class="text-red-600">{{ $message }}</p>
          @enderror
        </div>
      </div>
      <x-input name="quantity" label="Jumlah yang ingin dipinjam" type="number" :value="old('quantity')" />

      @error('quantity')
      <p class="text-red-600">{{ $message }}</p>
      @enderror

      <div class="w-full my-3">
        <label class="" for="">Tanda Tangan</label>
        <div id="sig" class="outline outline-1 outline-gray-300 rounded-md my-2"></div>

        @error('signature')
        <p class="text-red-600">{{ $message }}</p>
        @enderror

        <div class="mt-2">
          <button type="submit"
            class="bg-gray-700 hover:bg-gray-600 transition-all ease-in-out duration-300 p-2 px-5 rounded-md text-white">Pinjam</button>
          <button id="clear" class="bg-red-600 p-2 px-5 rounded-md text-white mt-2">Reset Tanda Tangan</button>
        </div>

        <textarea id="signature64" name="signature" style="display: none"></textarea>
      </div>

    </form>
  </div>
  <div class="w-full border p-5 rounded-md">
    @if($product->stock == 0)
    <div class="bg-red-600 w-full p-5 rounded-md text-white mb-5">
      Kehabisan Stock
    </div>
    @endif
    <div class="mb-4 flex flex-col xl:flex-row   gap-7">

      <img src="/storage/{{ $product->image }}" width="350" alt="" class="rounded-md border">

      <div class="mt-5">
        <p class="font-bold text-xl">
          {{ $product->name }}
        </p>
        <p class="text-gray-500 ">Stock : {{ $product->stock }}</p>
        <p class="mt-3">Satuan : {{ $product->unit }}</p>
        <p class="mt-3">Brand : {{ $product->brand }}</p>
        <p class="my-3 ">Category : {{ $product->category->name }}</p>

      </div>


    </div>
    <h3 class="font-bold text-xl border-b py-3">Description</h3>
    <p class="mt-5">{!! $product->description !!}</p>
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css"
  rel="stylesheet">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://keith-wood.name/js/jquery.signature.js"></script>

<script>
  let siswaInput = document.getElementById("siswaInput");
  function checkRole(params){
  params.value == 'guru' ? siswaInput.style.display = 'none' : siswaInput.style.display = 'block';
}

var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
  $('#clear').click(function(e) {
      e.preventDefault();
      sig.signature('clear');
      $("#signature64").val('');
  });
</script>

@endsection
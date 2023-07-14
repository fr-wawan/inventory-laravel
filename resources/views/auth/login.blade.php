@extends('layouts.app')

@section('content')
<div class="mt-52">

  <div class="w-4/12 mx-auto p-7 rounded-md shadow bg-white">
    @if (session()->has('error'))
    <p class="bg-red-600 text-center p-5 mb-3 rounded-md text-white">{{ session('error') }}</p>
    @endif
    <h1 class="text-center font-bold text-xl mb-5">LOGIN</h1>
    <form action="" method="post">
      @csrf
      <x-input name="email" type="email" label="Email" />
      @error('password')
      <p class="text-red-600">{{ $message }}</p>
      @enderror
      <x-input name="password" type="password" label="Password" />
      @error('password')
      <p class="text-red-600">{{ $message }}</p>
      @enderror
      <div class="mt-6">
        <button type="submit" class="bg-gray-700 w-full p-2 rounded-md text-white hover:bg-gray-600">LOGIN</button>
      </div>
    </form>

    <div class="mt-5 text-center">
      <a href="/register" class="text-center">Dont Have Any Account? <span class="text-blue-700">Click Here!</span></a>
    </div>
  </div>
</div>
@endsection
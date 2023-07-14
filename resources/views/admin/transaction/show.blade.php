@extends('layouts.admin')

@section('content')

<div class="mt-5 ">
  <div class="shadow-md rounded-lg xl:w-[1000px] mx-auto w-full mb-10 bg-white p-10 lg:w-10/12">
    <h1 class="text-xl border-b pb-3  font-semibold">User Details</h1>

    <div class="overflow-auto lg:overflow-hidden">
      <table class="border mt-5 w-full">

        <tr>
          <td class="w-52 border p-3">FULL NAME</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            {{ $transaction->full_name }}
          </td>
        </tr>
        <tr>
          <td class="w-52 border p-3">ROLE</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            {{ ucfirst($transaction->role) }}
          </td>
        </tr>
        <tr>
          <td class="w-52 border p-3 uppercase">Tanggal Peminjaman</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            {{ $transaction->borrowing_date }}
          </td>
        </tr>

        <tr>
          <td class="w-52 border p-3 uppercase">Deadline</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            {{ $transaction->deadline_date }}
          </td>
        </tr>
        <tr>
          <td class="w-52 border p-3">STATUS</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            @if($transaction->status == 'pending')
            <p class="">Belum Dikembalikan</p>
            @else
            <p class="">Dikembalikan</p>
            @endif
          </td>
        </tr>
        <tr>
          <td class="w-52 border p-3">SIGNATURE</td>
          <td class="md:w-10 w-52 p-3 border text-center">:</td>
          <td class="border px-6">
            <div class="flex items-center gap-5">
              <img src="/signature/{{ basename($transaction->signature) }}" alt="">
            </div>
          </td>
        </tr>

      </table>
      <h1 class="text-xl border-b pb-3 my-5  font-semibold">Update Order</h1>

      <form action="{{ route('transactions.update',$transaction->id) }}" method="post" class="">
        @method('put')
        @csrf
        <select name="status" id="status" class="border border-gray-300  p-2.5 rounded-md mt-2">
          <option value="pending">Belum Dikembalikan</option>
          <option value="success">Dikembalikan</option>
        </select>


        <button class="bg-indigo-600 ml-2 px-4 py-2 rounded shadow-sm text-white focus:outline-none">Update</button>
      </form>
    </div>
  </div>

</div>

<div>
  <div class=" shadow-md rounded-lg xl:w-[1000px] mx-auto w-full bg-white p-10 lg:w-10/12">
    <h1 class="text-xl border-b pb-3 font-semibold">Barang Yang Dipinjam</h1>


    <div class="border-b pb-5">
      <div class="flex flex-col md:flex-row justify-between items-center mt-5">
        <img src="/storage/{{ $transaction->product->image }}" class="rounded-lg w-20" alt="" />
        <h3 class="md:text-lg my-3 font-semibold">{{ $transaction->product->name }}</h3>

        <p class="">Quantity : {{ $transaction->quantity }}</p>
      </div>
    </div>
  </div>
</div>


@endsection
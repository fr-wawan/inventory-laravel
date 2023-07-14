@extends('layouts.admin')

@section('content')
<div class="ml-60 bg-white shadow rounded-md w-10/12 p-10 ">

  @if (session()->has('success'))
  <x-alert>
    {{ session('success') }}
  </x-alert>
  @endif


  <h1 class="font-bold text-xl mb-8 border-b pb-3">LIST TRANSACTION</h1>

  <form class="flex gap-5 items-center" action="{{ route('transactions.filter') }}">
    <div class="w-full">
      <x-input type="date" name="borrowing_date" label="Tanggal Awal" :value="old('borrowing_date')" />
    </div>
    <div class="w-full">
      <x-input type="date" name="deadline_date" label="Tanggal Akhir" :value="old('deadline_date')" />
    </div>

    <div class="my-3 w-full ">
      <label for="status">Status</label>
      <select name="status" id="status"
        class="block border border-gray-300 w-full  rounded-md mt-2 p-[0.72rem] pt-[0.73rem]">
        <option value="pending">Belum Dikembalikan</option>
        <option value="success">Dikembalikan</option>
      </select>
    </div>

    <div class="mt-7">
      <button type="submit"
        class="bg-gray-700 p-2.5 px-10 rounded-md text-white hover:bg-gray-600 transition-all duration-300 ease-in-out">Filter</button>
    </div>
  </form>

  <x-table :headers="['Name','Role','NISN','Tanggal Peminjaman','Deadline Peminjaman','Status']">
    @foreach ($transactions as $transaction)
    <tr class="text-center border-b">
      <td class="whitespace px-6 py-4">
        {{ $loop->iteration }}
      </td>
      <td class="whitespace px-6 py-4">
        {{ $transaction->full_name }}
      </td>
      <td class="whitespace px-6 py-4">

        {{ ucfirst($transaction->role) }}
      </td>
      <td class="whitespace px-6 py-4">{{ $transaction->nisn }}</td>
      <td class="whitespace px-6 py-4">{{ $transaction->borrowing_date }}</td>
      <td class="whitespace px-6 py-4">{{ $transaction->deadline_date }}</td>

      <td class="whitespace px-6 py-4">
        @if($transaction->status == 'pending')
        <p class="bg-red-600 text-white rounded-md p-2.5 px-2">Belum Dikembalikan</p>
        @else
        <p class="bg-green-600 text-white rounded-md p-2.5 px-2">Dikembalikan</p>
        @endif
      </td>



      <td class="whitespace px-6 py-4 ">
        <a href="{{ route('transactions.show',$transaction->id) }}"
          class="bg-blue-500 text-white p-2 px-5 rounded-md hover:bg-blue-400 ">View</a>

      </td>
    </tr>
    @endforeach
  </x-table>
  <div class="mt-5">
    {{ $transactions->links() }}
  </div>
</div>
@endsection
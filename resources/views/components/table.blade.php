@props(['headers'])
<div class="overflow-auto mt-10">
  <table class="min-w-full text-sm ">
    <thead class="border-b font-bold bg-zinc-200">
      <tr class="text-center">
        <th class="p-3">No</th>
        @foreach ($headers as $header)
        <th class="p-3">{{ $header }}</th>
        @endforeach
        <th class="p-3">Actions</th>
      </tr>
    </thead>
    <tbody class="text-center">
      {{ $slot }}
    </tbody>
  </table>
</div>
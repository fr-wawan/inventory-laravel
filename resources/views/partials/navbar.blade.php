<header class="bg-white fixed top-0 left-0 right-0 z-10 shadow p-7">
  <nav class="flex justify-between items-center px-10 text-gray-800">
    <a href="/" class="font-bold  text-xl text-gray-600">INVENTORY</a>
    <ul class="flex text-gray-500 items-center gap-5 ">
      <li><a href="/" class="{{ Request::is('/*') ? 'text-gray-700' : '' }}">Home</a></li>
      <li><a href="/categories" class="{{ Request::is('categories*') ? 'text-gray-700' : '' }}">Category</a></li>
    </ul>

    @auth
    <form action="{{ route('auth.logout') }}" method="post" class="relative top-0.5">

      @csrf
      <a href="/admin/dashboard" class="mr-2">Admin</a>
      <button type="submit" class="  ">Logout</button>
    </form>
    @endauth

  </nav>
</header>
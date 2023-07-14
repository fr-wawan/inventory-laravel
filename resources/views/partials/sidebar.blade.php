<aside class=" fixed top-16 left-0 shadow-md">
  <div class="bg-gray-800 p-6 pt-12 h-screen w-52 text-gray-400 ">
    <div class="mb-8">
      <p class="font-extrabold text-gray-600 text-xs">DASHBOARD</p>
      <a href="dashboard" class="flex gap-3 mt-4 {{ Request::is('admin/dashboard*') ? 'text-white' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-tabler" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M8 9l3 3l-3 3"></path>
          <path d="M13 15l3 0"></path>
          <path d="M4 4m0 4a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z"></path>
        </svg>
        Dashboard
      </a>
    </div>
    <div class="mb-8">
      <p class="font-extrabold text-gray-600 text-xs">MASTER DATA</p>
      <a href="{{ route('suppliers.index') }}"
        class="flex gap-3 my-5 {{ Request::is('admin/suppliers*') ? 'text-white' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-truck-delivery" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
          <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
          <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
          <path d="M3 9l4 0"></path>
        </svg>
        Suppliers
      </a>
      <a href="{{ route('categories.index') }}"
        class="flex gap-3 my-5 {{ Request::is('admin/categories*') ? 'text-white' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-category-2" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M14 4h6v6h-6z"></path>
          <path d="M4 14h6v6h-6z"></path>
          <path d="M17 17m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
          <path d="M7 7m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
        </svg>
        Categories
      </a>

      <a href="{{ route('products.index') }}"
        class="flex gap-3 mt-4 {{ Request::is('admin/products*') ? 'text-white' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-archive" width="24" height="24"
          viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M3 4m0 2a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2z"></path>
          <path d="M5 8v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-10"></path>
          <path d="M10 12l4 0"></path>
        </svg>
        Products
      </a>

    </div>

    <div class="mb-8">
      <p class="font-extrabold text-gray-600 text-xs">TRANSACTION</p>
      <a href="{{ route('transactions.index') }}"
        class="flex gap-3 my-5 {{ Request::is('admin/transactions*') ? 'text-white' : '' }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-text" width="24"
          height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
          stroke-linejoin="round">
          <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
          <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
          <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
          <path d="M9 12h6"></path>
          <path d="M9 16h6"></path>
        </svg>
        Transaction
      </a>

    </div>

  </div>
</aside>
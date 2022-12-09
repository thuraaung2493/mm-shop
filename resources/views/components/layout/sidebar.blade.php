<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shopping-cart"></i>
    </div>
    <div class="sidebar-brand-text mx-3">MM-Shop Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="index.html">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <x-layout.sidebar-item header="Users Management" title="Users" id="userCollapse"
    active="{{ inRoutes(['users.index']) }}">
    <a class="collapse-item" href="{{ route('users.index') }}">All Users</a>
  </x-layout.sidebar-item>

  <x-layout.sidebar-item header="Features" title="Categories & Items" id="categoryCollapse"
    active="{{ inRoutes(['categories.index', 'subcategories.index', 'items.index']) }}">
    <a class="collapse-item" href="{{ route('categories.index') }}">Categories</a>
    <a class="collapse-item" href="{{ route('subcategories.index') }}">Subcategories</a>
    <a class="collapse-item" href="{{ route('items.index') }}">Items</a>
  </x-layout.sidebar-item>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

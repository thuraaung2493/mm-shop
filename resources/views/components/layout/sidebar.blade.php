<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center"
    href="{{ route('home') }}">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-shopping-cart"></i>
    </div>
    <div class="sidebar-brand-text mx-3">MM-Shop Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('home') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <x-layout.sidebar-item header="Users Management" title="Users" id="userCollapse"
    active="{{ inRoutes(['users.index', 'roles.index', 'permissions.index']) }}">
    <a class="collapse-item {{ inRoutes(['users.index']) ? 'select-active' : '' }}"
      href="{{ route('users.index') }}">All Users</a>
    <a class="collapse-item {{ inRoutes(['roles.index']) ? 'select-active' : '' }}"
      href="{{ route('roles.index') }}">All Roles</a>
    <a class="collapse-item {{ inRoutes(['permissions.index']) ? 'select-active' : '' }}"
      href="{{ route('permissions.index') }}">All Permissions</a>
  </x-layout.sidebar-item>

  <x-layout.sidebar-item header="Features" title="Categories & Items" id="categoryCollapse"
    active="{{ inRoutes(['categories.index', 'subcategories.index', 'items.index']) }}">
    <a class="collapse-item {{ inRoutes(['categories.index']) ? 'select-active' : '' }}"
      href="{{ route('categories.index') }}">Categories</a>
    <a class="collapse-item {{ inRoutes(['subcategories.index']) ? 'select-active' : '' }}"
      href="{{ route('subcategories.index') }}">Subcategories</a>
    <a class="collapse-item {{ inRoutes(['items.index']) ? 'select-active' : '' }}"
      href="{{ route('items.index') }}">Items</a>
  </x-layout.sidebar-item>

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>

<!-- Heading -->
<div class="sidebar-heading">
  {{ $header }}
</div>

<!-- Nav Item - Pages Collapse Menu -->
<x-layout.nav-item :$title :$id active="{{ $attributes->has('active') && $active ? true : false }}">
  {{ $slot }}
</x-layout.nav-item>

<!-- Divider -->
<hr class="sidebar-divider">

<li class="nav-item {{ $active ? 'active' : '' }}">
  <a class="nav-link {{ $active ? '' : 'collapsed' }}" href="#" data-toggle="collapse"
    data-target="#{{ $id }}" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-users-cog"></i>
    <span>{{ $title }}</span>
  </a>
  <div id="{{ $id }}" class="collapse {{ $active ? 'show' : '' }}"
    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      @if ($attributes->has('header'))
        <h6 class="collapse-header">{{ $header }}:</h6>
      @endif
      {{ $slot }}
    </div>
  </div>
</li>

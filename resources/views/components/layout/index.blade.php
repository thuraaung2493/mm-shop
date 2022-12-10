<!DOCTYPE html>
<html lang="en">

<x-layout.head />

<body id="page-top">
  <div id="wrapper">
    <x-layout.sidebar />

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">

        <x-layout.topbar />

        <div class="container-fluid">
          <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>

          {{ $slot }}
        </div>

      </div>

      <x-layout.footer />
    </div>
  </div>

  <!-- Scroll to Top Button-->
  <x-layout.scroll-to-top />

  <x-models.confirm id="activateModal" title="Confirm Activate?">
    <p>Are you sure want to activate it?</p>

    <x-slot:action>
      <button type="button" class="btn btn-primary confirmBtn">Confirm</button>
    </x-slot:action>
  </x-models.confirm>

  <x-models.confirm id="deactivateModal" title="Confirm Deactivate?">
    <p>Are you sure want to deactivate it?</p>

    <x-slot:action>
      <button type="button" class="btn btn-danger confirmBtn">Confirm</button>
    </x-slot:action>
  </x-models.confirm>

  <x-models.confirm title="Confirm?">
    <p>Are you sure want to delete it?</p>

    <x-slot:action>
      <button type="button" class="btn btn-primary" id="confirm">Confirm</button>
    </x-slot:action>
  </x-models.confirm>

  <x-layout.scripts />
</body>

</html>

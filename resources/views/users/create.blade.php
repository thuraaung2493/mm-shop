<x-layout title="Users">
  <x-card title="User Create Form">
    <form method="POST" action="{{ route('users.store') }}">
      @csrf

      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">User Name</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name') }}" placeholder="Aung Aung">

          @error('name')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-right">Email Address</label>

        <div class="col-md-6">
          <input id="email" type="email"
            class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') }}" placeholder="someone@gmail.com">

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

        <div class="col-md-6">
          <input id="password" type="password"
            class="form-control @error('password') is-invalid @enderror" name="password"
            value="{{ old('password') }}" placeholder="">

          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password
          Confirm</label>

        <div class="col-md-6">
          <input id="password_confirmation" type="password"
            class="form-control @error('password_confirmation') is-invalid @enderror"
            name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="">

          @error('password_confirmation')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-3">
        <div class="col-md-4 col-form-label text-md-right"></div>

        <div class="col-md-6">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" name="is_activated" class="custom-control-input" id="activate">
            <label class="custom-control-label" for="activate">Activate</label>
          </div>
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Create
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>

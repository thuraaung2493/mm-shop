<x-layout title="Users">
  <x-card title="User Update Form">
    <form method="POST" action="{{ route('users.update', $user->id) }}">
      @csrf
      @method('PUT')

      <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-right">User Name</label>

        <div class="col-md-6">
          <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
            name="name" value="{{ old('name', $user->name) }}" placeholder="Aung Aung">

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
            value="{{ old('email', $user->email) }}" placeholder="someone@gmail.com">

          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Update Profile
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </x-card>

  <x-card title="Password Update Form">
    <form method="POST" action="{{ route('users.password.update', $user->id) }}">
      @csrf
      @method('PUT')

      <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-right">New Password
        </label>

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
        <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">New
          Password
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

      <div class="row mb-0">
        <div class="col-md-8 offset-md-4">
          <button type="submit" class="btn btn-primary">
            Update Password
          </button>
          <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
        </div>
      </div>
    </form>
  </x-card>
</x-layout>

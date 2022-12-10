<!DOCTYPE html>
<html lang="en">

<x-layout.head />

<body class="bg-gradient-secondary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group">
                      <input type="email" name="email" value="{{ old('email') }}"
                        class="form-control form-control-user  @error('email') is-invalid @enderror"
                        id="email" aria-describedby="emailHelp"
                        placeholder="Enter Email Address..." required autocomplete="email"
                        autofocus>
                      @error('email')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <input type="password" name="password"
                        class="form-control form-control-user @error('password') is-invalid @enderror"
                        id="password" placeholder="Password" required
                        autocomplete="current-password">
                      @error('password')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" name="remember" class="custom-control-input"
                          id="remember">
                        <label class="custom-control-label" for="remember">Remember
                          Me</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                      Login
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <x-layout.scripts />

</body>

</html>

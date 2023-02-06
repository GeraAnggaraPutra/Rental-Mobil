<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('auth/style.css') }}">
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100">
        <div class="container-fluid h-custom">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-9 col-lg-6 col-xl-5">
              <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                class="img-fluid" alt="Sample image">
            </div>
            <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
              <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                  <p class="lead fw-normal mb-0 me-3">Sign in with</p>

                  <a href="{{ url('auth/facebook') }}">
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-facebook-f"></i>
                  </button>
                  </a>

                  <a href="{{ url('auth/github') }}">
                  <button type="button" class="btn btn-primary btn-floating mx-1">
                    <i class="fab fa-github"></i>
                  </button>
                  </a>

                  <a href="{{ url('auth/google')}}">
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                      <i class="fab fa-google"></i>
                    </button>
                  </a>
                </div>

                <div class="divider d-flex align-items-center my-4">
                  <p class="text-center fw-bold mx-3 mb-0">Or</p>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <label class="form-label" for="form3Example3">Email address</label>
                  <input type="email" id="form3Example3" class="form-control form-control-lg @error('email') is-invalid @enderror"
                    placeholder="Enter a valid email address" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
                  @error('email')
                   <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                   </span>
                  @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-3">
                  <label class="form-label" for="form3Example4">Password</label>
                  <input type="password" id="form3Example4" class="form-control form-control-lg @error('password') is-invalid @enderror"
                    placeholder="Enter password" name="password" required autocomplete="current-password"/>
                  @error('password')
                  <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                  </span>
                  @enderror
                </div>

                <div class="d-flex justify-content-between align-items-center">
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                  <a href="{{ route('password.request') }}" class="text-center" style="text-decoration: none">{{ __('Forgot Your Password?') }}</a>
                </div>

                <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"
                    style="padding-left: 2.5rem; padding-right: 2.5rem;">{{ __('Login') }}</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="{{ route('register') }}"
                      class="link-danger" style="text-decoration: none">Register</a></p>
                </div>

              </form>
            </div>
          </div>
        </div>
      </section>
</body>
</html>

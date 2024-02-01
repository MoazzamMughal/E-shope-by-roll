<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <link rel="stylesheet" href="{{asset('../../assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('../../assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('../../assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('../../assets/images/favicon.png')}}" />
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-left mb-3">Register</h3>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                  <div class="form-group">
                    <label>Username</label>
             
                    <input id="name" type="text" class="form-control  p_input @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                  
                    <input id="email" type="email" class="form-control p_input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                   
                    <input id="password" type="password" class="form-control p_input @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>

                  <div class="form-group">
                    <label>Confirm Password</label>
                   
                    <input id="password-confirm" type="password" class="form-control p_input" name="password_confirmation" required autocomplete="new-password">
                  </div>
                  
                  <div class="text-center">
                    {{-- <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button> --}}
                    <button type="submit" class="btn btn-primary btn-block enter-btn">
                        {{ __('Register') }}
                    </button>

                  </div>
                
                  <p class="sign-up text-center">Already have an Account?<a href="/"> Sign Up</a></p>
                  <p class="terms">By creating an account you are accepting our<a href="#"> Terms & Conditions</a></p>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
    <script src="{{asset('../../assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('../../assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('../../assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('../../assets/js/misc.js')}}"></script>
    <script src="{{asset('../../assets/js/settings.js')}}"></script>
    <script src="{{asset('../../assets/js/todolist.js')}}"></script>

  </body>
</html>
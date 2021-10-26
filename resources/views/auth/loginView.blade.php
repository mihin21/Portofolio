@extends('layout.loginView')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Connexion</h3>
              @error('email')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Erreur!</strong> {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @enderror
              @error('passwordError')
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  <strong>Erreur!</strong> {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
              @enderror
              @if ($message = Session::get('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Félicitation!</strong> {{ $message }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                {{Session::forget('success')}}
              @endif
              <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                  <label>Email *</label>
                  <input type="email"  name='email'  class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Mot de passe *</label>
                  <input type="password" name="password" class="form-control p_input">
                </div>
                <div class="form-group d-flex align-items-center justify-content-between">
                  <a href="#" class="forgot-pass">Forgot password</a>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Se connecter</button>
                </div>
                {{-- <p class="sign-up"><a href="#"> Se connecter</a></p> --}}
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
@endsection

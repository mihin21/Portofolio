@extends('layout.base');
@section('contenu')

<div class="container-scroller">
  <!-- partial:partials/_sidebar.html -->
  @include('layout.sidebar')
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    @include('layout.header')
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="offset-2"></div>
          <div class="col-md-8 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-warning" role="alert">
                    {{$message}}
                </div>
                @endif
                <div class="d-flex flex-row justify-content-between">
                  <h4 class="card-title mb-1">Parametre contact</h4>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="preview-list">
                      <form action="{{ route('contact_settings.update',$contact->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="{{$contact->email}}" placeholder="Entrez l'email">
                                @error('email')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Number 1</label>
                            <input type="number" class="form-control" name="number1" value="{{$contact->number1}}" placeholder="Entrer premier numero ">
                                @error('number1')
                                <div class="alert alert-danger" role="alert">
                                    {{$message}}
                                </div>
                                @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Number 2</label>
                              <input type="number" class="form-control" name="number2" value="{{$contact->number2}}" placeholder="Entrer deuxieme numero ">
                              @error('number2')
                              <div class="alert alert-danger" role="alert">
                                  {{$message}}
                              </div>
                              @enderror
                            </div>
                          </div>
                    </div>
                    <div class="mx-2">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Valider</button>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-2"></div>
        </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      @include('layout.footer')
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->

</html>

@endsection

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
                  @if ($message = Session::get('success'))
              <div class="alert alert-warning" role="alert">
                  {{$message}}
              </div>
              @endif
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Parametre CV</h4>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <form action="{{ route('cv_settings.update',$cv->id) }}" method="post">
                            @method('PATCH')
                          @csrf
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="" class="form-label">CV</label>
                              <input type="file" class="form-control" name="cv" accept=".pdf,.docx,.doc" >
                              @error('cv')
                              <div class="alert alert-danger" role="alert">
                                {{$message}}
                              </div>
                              @enderror
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

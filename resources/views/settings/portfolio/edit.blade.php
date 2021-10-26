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
                <div class="d-flex flex-row justify-content-between">
                  <h4 class="card-title mb-1">Parametre Realisation</h4>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="preview-list">
                      <form action="{{ route('portfolio_settings.update',$portfolio->id) }}" method="post"enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Nom du projet</label>
                            <input type="text" class="form-control" name="project_name" value="{{$portfolio->project_name}}" placeholder="Entrez le nom du projet">
                            @error('project_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Photo du projet</label>
                            <input type="file" class="form-control" name="picture" value="{{$portfolio->picture}}" placeholder="selectionner une photo ">
                            @error('picture')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <img src="{{asset('assets/Picture'.'/'.$portfolio->picture)}}"  alt="" width="150px" height="150px">
                          </div>
                        </div>
                        <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Lien vers le projet</label>
                              <input type="text" class="form-control" name="link" value="{{$portfolio->link}}" placeholder="Entrez  le lien">
                              @error('link')
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

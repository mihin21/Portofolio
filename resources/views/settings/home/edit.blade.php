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
                  <h4 class="card-title mb-1">Modification Parametre Acceuil</h4>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="preview-list">
                      <form action="{{ route('home_settings.update',$data->id) }}" method="post" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Text salutation</label>
                            <input type="text" class="form-control" name="salutation" placeholder="Mot de bienvenue"  value="{{ $data->salutation }}">
                            @error('salutation')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Nom</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Entrez votre nom" value="{{ $data->first_name }}">
                            @error('first_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Prénom(s)</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Entrez votre prénom" value="{{ $data->last_name }}">
                            @error('last_name')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Fonction/Titre</label>
                            <input type="text" class="form-control" name="status" placeholder="Entrez votre status" value="{{ $data->status }}">
                            @error('status')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                          </div>
                        </div>
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Photo</label>
                            <input type="file" class="form-control" name="picture" placeholder="selectionner une photo " >
                            @error('picture')
                            <div class="alert alert-danger" role="alert">
                                {{$message}}
                            </div>
                            @enderror
                            <img src="{{ asset('assets/picture').'/'.$data->picture }}" alt="" width="150px" height="150px">
                          </div>
                        </div>
                    </div>
                    <div class="mx-2">
                    <button type="submit" class="btn btn-primary btn-block enter-btn">Valider la Modification </button>
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
      @include('layout.footer')
    </div>
  </div>
</div>

</html>

@endsection

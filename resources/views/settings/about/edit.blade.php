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
                  <h4 class="card-title mb-1"> Modification Parametre A propos</h4>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="preview-list">
                      <form action="{{ route('about_settings.update',$about->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class=" border-bottom">
                          <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Photo | Présentation</label>
                            <input type="file" class="form-control" name="picture_about" placeholder="selectionner une photo ">
                            @error('picture_about')
                                <div class="aler alert-danger">
                                    {{$message}}
                                </div>
                           @enderror
                            <img src="{{asset('assets/Picture').'/'.$about->picture_about}}" width="150px" height="150px" alt="">
                          </div>
                        </div>
                        <div class=" border-bottom">
                           <div class="my-3">
                            <label for="exampleFormControlInput1" class="form-label">Description | Présentation</label>
                            <textarea type="text" class="form-control"  cols="30" rows="10" name="description" placeholder="Entrez une description de vous">
                                {{$about->description }}
                            </textarea>
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
@include('layout.footer')
</div>
</div>
</div>
<!-- container-scroller -->
<!-- plugins:js -->

</html>

@endsection

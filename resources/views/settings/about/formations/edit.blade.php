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
                    <h4 class="card-title mb-1">Paramètres Formations</h4>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <form action="{{ route('formation_settings.update',$formation->id) }}" method="post">
                          @csrf
                          @method('PATCH')
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Diplômes</label>
                              <input type="text" class="form-control" name="diplome" value="{{ $formation->diplome }}" placeholder="Entrez le diplôme obtenu">
                            </div>
                          </div>
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Ecole</label>
                              <input type="text" class="form-control" name="school" value="{{ $formation->school }}" placeholder="Entrez l'ecole fréquenté">
                            </div>
                          </div>
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Date de Debut</label>
                              <input type="date" class="form-control" name="start_date" value="{{ $formation->start_date }}" placeholder="Entrez la date de debut de la formation">
                            </div>
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Date de fin</label>
                              <input type="date" class="form-control" name="end_date" value="{{ $formation->end_date }}" placeholder="Entrez la date de fin de la formation">
                            </div>
                          </div>
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Description</label>
                              <textarea type="text" cols="30" rows="10" class="form-control"  name="description" placeholder="Entrez une description">
                                {{ $formation->description }}
                                </textarea>
                            </div>
                          </div>
                          <div class=" border-bottom form-group form-check">
                            <div class="my-3">
                              <input type="checkbox" class="form-check-input" id="exempleCheck1" name="experience" >
                              <label class="form-check-label">Experience</label>
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


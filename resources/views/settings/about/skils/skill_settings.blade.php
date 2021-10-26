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
                    <h4 class="card-title mb-1">Parametre Skills</h4>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <form action="{{route('skill_settings.store')}}" method="post">
                          @csrf
                          <div class=" border-bottom">
                            <div class="my-3">
                              <label for="exampleFormControlInput1" class="form-label">Skills</label>
                              <input type="text" class="form-control" name="skills" placeholder="Entrez vos compétences">
                              @error('skills')
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

          <div class="row">
            <div class="offset-3"></div>
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">Skills</th>
                            <th scope="col">Editer</th>
                            <th scope="col">Supprimer</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($skills as $skill )
                          <tr>
                            <th scope="row">
                                {{$skill->skills}}
                            </th>
                            <td>
                           <a href="{{route('skill_settings.edit',$skill->id)}}">
                            <button type="button" class="btn btn-primary ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                  </svg>
                            </button>
                           </a>
                            </td>
                            <td>
                                <form action="{{route("skill_settings.destroy",$skill->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="btn btn-danger mt-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                              </svg>
                                        </button>
                                </form>
                            </td>
                            @empty
                            <div class="alert alert-warning" role="alert">
                                Aucune donnée disponible
                               </div>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                </div>
            <div class="offset-3"></div>
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

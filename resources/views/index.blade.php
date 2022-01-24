@extends('layout.base');
@section('contenu')

<div class="container-scroller">
   @include('layout.sidebar')
    <div class="container-fluid page-body-wrapper">
     @include('layout.header')
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card corona-gradient-card">
                <div class="card-body py-0 px-0 px-sm-3">
                  <div class="row align-items-center">
                    <div class="col-4 col-sm-3 col-xl-2">
                      <img src="{{asset('assets/images/dashboard/Group126@2x.png')}}" class="gradient-corona-img img-fluid" alt="">
                    </div>
                    <div class="col-5 col-sm-7 col-xl-8 p-0">
                      <h4 class="mb-1 mb-sm-0">Gerer simplement votre portofolio</h4>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  @foreach ($abouts as $about )
                   <img src="{{ asset('/assets/Picture'.'/'.$about->picture) }}" width="100%" height="300px" alt="">
                  @endforeach

                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Projets</h4>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list">
                        <div class="preview-item border-bottom">
                          <div class="preview-thumbnail">
                            <div class="preview-icon bg-primary">
                              <i class="mdi mdi-file-document"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Admin dashboard design</h6>
                              <p class="text-muted mb-0">Broadcast web app mockup</p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">15 minutes ago</p>
                              <p class="text-muted mb-0">30 tasks, 5 issues </p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xl-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title">Messages</h4>
                    <p class="text-muted mb-1 small">View all</p>
                  </div>
                  <div class="preview-list">
                    <div class="preview-item border-bottom">
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          @foreach ($messages as $message )
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject"><span class="text-uppercase mr-5">{{ $message->nom }}</span>  email:{{ $message->email }}  </h6>
                            <p class="text-muted text-small">{{date('d-m-Y',strtotime($message->created_at))}}</p>
                          </div>
                          <p class="text-muted">{{$message->message}}</p>
                          @endforeach
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       @include('layout.footer')
      </div>
    </div>
  </div>
</html>
@endsection

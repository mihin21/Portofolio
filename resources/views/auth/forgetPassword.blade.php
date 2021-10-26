@extends('layout.login')
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="row w-100 m-0">
        <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
          <div class="card col-lg-4 mx-auto">
            <div class="card-body px-5 py-5">
              <h3 class="card-title text-left mb-3">Modification de mot de passe</h3>
              <form>
                <div class="form-group">
                  <label>Email *</label>
                  <input type="text" class="form-control p_input">
                </div>
                <div class="form-group">
                  <label>Mot de passe *</label>
                  <input type="text" class="form-control p_input">
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block enter-btn">Valider</button>
                </div>
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

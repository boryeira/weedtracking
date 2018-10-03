@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <p></p>
      <growlog-days></growlog-days>
          {{-- @foreach ($growlogDays as $day)
            <div class="col-md-12">
            <div class="card mb-4">
              <div class="rel">
                  <img class="card-img-top" src="{{url('/img/plant.png')}}" alt="image">
                  <div class="fab fab-bottom card-overlay-fab">
                      <button class="btn btn-primary btn-icon-only btn-circle btn-air" data-toggle="button"><i class="la la-share-alt fab-icon"></i><i class="la la-close fab-icon-active"></i></button>
                      <ul class="fab-menu">
                          <li>
                              <a class="btn btn-soc-facebook btn-icon-only btn-circle btn-air" href="javascript:;"><i class="fa fa-facebook"></i></a>
                          </li>
                          <li>
                              <a class="btn btn-soc-twitter btn-icon-only btn-circle btn-air" href="javascript:;"><i class="fa fa-twitter"></i></a>
                          </li>
                          <li>
                              <a class="btn btn-soc-dribbble btn-icon-only btn-circle btn-air" href="javascript:;"><i class="fa fa-dribbble"></i></a>
                          </li>
                      </ul>
                  </div>
                  <div class="card-img-overlay">
                      <span class="badge badge-primary">VEGETATIVO</span>
                  </div>
              </div>
              <div class="card-body">
                  <h4 class="card-title mb-2">
                      <a class="text-primary">REMO CHEMO</a>
                  </h4>
                  <div class="text-muted mb-3">dia 34 </div>
                  <p class="text-light">Minim dolor in amet nulla laboris enim dolore consequat proident fugiat culpa eiusmod proident sed excepteur excepteur magna irure ex officia ea sunt in incididunt minim nulla dolor dolor labore exercitation ex nostrud.</p>
                  <div class="d-flex align-items-center justify-content-between">
                      <div class="text-primary">
                        <img class="img-circle mr-2" src="./assets/img/users/u10.jpg" alt="image" width="30">
                        Stella Obrien
                      </div>
                        <div>
                            <span class="text-muted mr-4"><i class="fa fa-heart-o mr-2"></i>124</span>
                            <span class="text-muted"><i class="fa fa-comment-o mr-2"></i>56</span>
                        </div>
                  </div>

              </div>
            </div>
            </div>
          @endforeach --}}

    </div>
</div>
@endsection

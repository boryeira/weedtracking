@extends('layouts.app')


@section('content')


    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="ibox">
            <div class="ibox-body">
                <days-list v-bind:growlog="{{$growlog->id}}" ></days-list>
            </div>
          </div>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" id="add-media-modal" >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          {{Form::open(['route' => ['days.store',$growlog->id], 'method' => 'POST','files' => true])}}
          <div class="modal-header">
            <h5 class="modal-title">Agregar Seguimiento</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group">
              <add-media url="{{route('days.store',$growlog->id)}}"></add-media>
            </div>

          </div>

          <div class="modal-footer">
            <button type="submit" class="btn btn-primary"  >Save changes</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
          {{Form::close()}}
        </div>
      </div>
    </div>


@endsection

@section('page-header')
  @include('growlogs.header',['growlog' => $growlog])
@endsection

@section('fab')
  <div class="fab fab-top">
    <button class="btn btn-lg btn-primary btn-icon-only btn-circle btn-air" data-toggle="button">
      <i class="fab-icon la la-plus"></i>
      <i class="fab-icon-active la la-close"></i>
    </button>

    <ul class="fab-menu">
      <li><button class="btn btn-pink btn-icon-only" data-toggle="modal" data-target="#add-media-modal" ><i class="fab-icon la la-camera"></i></button></li>
    </ul>
  </div>
@endsection

@section('script')


@endsection

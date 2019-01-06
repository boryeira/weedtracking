@extends('layouts.app')


@section('content')

    <div class="row justify-content-center">
        <div class="col-md-4">
          {{-- header --}}
          @include('growlogs.header',['growlog' => $growlog])



        </div>
        <div class="col-md-8">

          <div class="ibox">
            <div class="ibox-body">
              <h3>{{$day->date}}</h3>
            </div>

          </div>

        </div>
    </div>


@endsection


@section('fab')

@endsection

@section('script')


@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                  {{-- <table class=" table table-bordered table-hove display">
                    <thead>
                      <th>nombre</th>
                    </thead>
                    <tbody>
                      @foreach (App\Models\Growlogs\Growlog::all() as $growlog)
                      <tr>
                          <td>
                            <a href="{{url('/growlogs/'.$growlog->id)}}">{{$growlog->name}}</a>
                          </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table> --}}
                  <indexito></indexito>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

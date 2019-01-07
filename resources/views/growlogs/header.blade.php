{{-- <div class="card text-center has-cup card-air centered mb-4">

    <div class="card-cup bg-{{$growlog->actualStage()->class ?? 'secondary' }}">
    </div>
    <div class="card-body">

        <div class="card-avatar mb-4" >
          <a  href="{{url('growlogs/'.$growlog->id)}}">
            <img class="img-circle" src="{{url('img/plant.png')}}" alt="image">
          </a>
        </div>
        <h4 class="card-title mb-1">{{$growlog->name}}</h4>
        <div class="text-{{$growlog->actualStage()->class ?? 'secondary'}} ">{{$growlog->actualStage()->name}}</div>
        <p class="mt-4 mb-5">{{$growlog->description}}</p>
    </div>
</div> --}}


<div class="page-header">
    <div class="ibox flex-1">
        <div class="ibox-body">
            <div class="flexbox">
                <div class="flexbox-b">

                    <div class="ml-5 mr-5">
                      <a href="{{route('growlogs.show',['growlog'=> $growlog->id])}}">
                        <img class="img-circle" src="{{url('img/plant.png')}}" alt="image" width="110">
                      </a>
                    </div>
                    <div>
                        <h4 >{{$growlog->name}}</h4>
                        <div class=" mb-3">
                            <div class="mr-3 text-{{$growlog->actualStage()->class}}">{{$growlog->actualStage()->name}}</div>
                        </div>
                    </div>
                </div>
                <div class="d-inline-flex">
                  <button class="btn btn-outline-info btn-icon-only btn-circle btn-lg"><i class="la la-pencil"></i></button>
                </div>
            </div>
        </div>
        {{-- <ul class="nav nav-tabs tabs-line m-0 pl-5 pr-3">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab">Overview</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab">Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab">Activity</a>
            </li>
        </ul> --}}
    </div>
</div>

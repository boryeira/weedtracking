<div class="card text-center has-cup card-air centered mb-4">
    <div class="card-cup bg-warning">
    </div>
    <div class="card-body">

        <div class="card-avatar mb-4" >
          <a  href="{{url('growlogs/'.$growlog->id)}}">
            <img class="img-circle" src="{{url('img/plant.png')}}" alt="image">
          </a>
        </div>
        <h4 class="card-title text-warning mb-1">{{$growlog->name}}</h4>
        <div class="text-muted">flora</div>
        <p class="mt-4 mb-5">{{$growlog->description}}</p>
    </div>
</div>

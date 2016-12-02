<!-- USERS ONLINE SECTION -->
<h3>MIEMBROS DEL EQUIPO</h3>

@foreach($members as $member)

    <!-- First Member -->
    <div class="desc">
      <div class="thumb">
        <img class="img-circle" src="{{asset('img/'.$member->profile->image)}}" width="35px" height="35px" align="">
      </div>
      <div class="details">
        <p><a href="javascript:void(0)">{{$member->name}} {{$member->last_name}}</a><br/>
           <muted>{{$member->type}}</muted>
        </p>
      </div>
    </div>

@endforeach
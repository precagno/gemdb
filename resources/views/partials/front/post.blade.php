<!-- Blog Post -->
<a href="{{route('home.post',$post->title_no_spaces)}}" class="page-header text-left">
    
    <h3>{{$post->title}}</h3>
    
</a>

<p>
    Escrito por <span class="glyphicon glyphicon-user" aria-hidden="true"></span><span class="text-danger">{{$post->user["username"]}}</span> / categoria <a href="{{route("home.postsByCategory",$post->category->name)}}" class="text-danger">{{ucfirst($post->category->name)}} </a>/ @if($post->active_comments_count == 1) {{$post->active_comments_count}} comentario @else {{$post->active_comments_count}} comentarios @endif
</p>

<p class="text-justify">
    
    <span class="glyphicon glyphicon-time"></span> Fecha y hora de creaci&oacute;n <b>{{$post->created_at->format('d/m/Y')}}  {{$post->created_at->format('h:i:s')}}hs</b>
    
</p>

<!--<img class="img-responsive" src="http://placehold.it/900x300" alt="">-->
<img class="img-responsive img-principal-post" src="{{asset('img/posts/'.$post->image)}}" alt="" />

<br/>
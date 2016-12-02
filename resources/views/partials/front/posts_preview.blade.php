@foreach($posts as $post)
    
    @include('partials.front.post')

    <p class="text-justify">{{$post->preview}}</p>
    
    <a class="btn btn-primary btn-block text-justify btn-read-more" href="{{route('home.post',$post->title_no_spaces)}}">Leer m&aacute;s <span class="glyphicon glyphicon-chevron-right"></span></a>

    <hr/>
@endforeach
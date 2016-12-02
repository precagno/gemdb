<!-- Posted Comments -->

<!-- Comment -->
<div id="comments_container">
    
    @foreach($post->comments as $comment)
    
        @if($comment->active == 1)
        
            <div class="media" class="comment">
                <a class="pull-left" href="#">
                    <img class="media-object" src="{{asset('img/avatar_guest.png')}}" alt="">
                </a>
                <div class="media-body" >
                    <h4 class="media-heading">
                        <span class="text-success">{{$comment->user->username}}</span>
                        <small>{{$comment->created_at->format('d/m/Y')}} {{$comment->created_at->format('h:i:s')}}hs</small>
                    </h4>
                    {{$comment->content}}
                </div>
            </div>
            <hr/>
        
        @endif
        
    @endforeach
    
</div>
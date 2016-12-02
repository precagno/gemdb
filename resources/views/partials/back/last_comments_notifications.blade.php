<!--COMPLETED ACTIONS DONUTS CHART-->
<h3>ÙLTIMOS COMENTARIOS</h3>

@foreach($last_comments as $comment)
    <div class="desc">

      <div class="thumb">
        <span class="badge bg-theme"><i class="fa fa-clock-o"></i></span>
      </div>

      <div class="details">
        <p><muted>{{$comment->created_at->format('d/m/Y')}}</muted><br/>
        <a href="#">{{$comment->user->username}}</a> dej&oacute; un comentario en el post <a>{{$comment->post->title}} </a>@if($comment->active==0)&nbsp;(comentario inactivo) @endif<br/>
        </p>
      </div>

    </div>
@endforeach
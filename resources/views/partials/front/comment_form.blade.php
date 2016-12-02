<!-- Blog Comments -->

<!-- Comments Form -->
<div class="well">
    <h4>Deje un comentario:</h4>
    {!! Form::model(Request::all(),['role'=>'form','route'=>'comentarios.store','id'=>'comment_form']); !!}    
    
        <div class="form-group">
            
            {!! Form::textarea('content',null,['class'=>'form-control input_to_clean','rows'=>'3']); !!}
            
        </div>
    
        {!! Form::hidden('post_id',$post->id_post,['id'=>'post_id']) !!}
        
        {!! Form::hidden('user_id',1) !!}
        
        <div class="form-group">

            <input type='button' value='comentar' id='comment_form_button' class='btn btn-primary' />
            
        </div>
      
    {!! Form::close(); !!}
</div>
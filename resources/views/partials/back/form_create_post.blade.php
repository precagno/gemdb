<!-- Blog Comments -->

<!-- Comments Form -->
<br/>

<div class="">
    
    {!! Form::model(Request::all(),['role'=>'form','route'=>'admin.post.store','id'=>'create_post_form']); !!}    
        
        <div class="form-group">
            {!! Form::label('title','*Titulo del post:') !!}
            {!! Form::text('title',null,['id'=>'post_title','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese titulo del post']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('image','Imagen:') !!}
            {!! Form::text('image',null,['id'=>'post_image','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese la imagen del post']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('preview','*Adelanto del post:') !!}
            {!! Form::text('preview',null,['id'=>'post_preview','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese adelanto del post']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('content','*Contenido:') !!}
            {!! Form::textarea('content',null,['id'=>'post_content','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese contenido del post']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('category_id','*Categoria:') !!}<br />
            
            <select name="category_id" class="form-control input_to_clean">
                
                <option value="">Seleccione una categoria</option>
                @foreach($categories as $category)
                
                    <option value="{{$category->id_category}}">{{$category->name}}</option>
                
                @endforeach
                
            </select>
        </div>
    
        <div class="form-group">
            {!! Form::hidden('user_id',1) !!}<!-- El user_id va a ser dinamico -->
        </div>
        
        <div class="form-group">
            {!! Form::button('Enviar',['id'=>'create_post_button','class'=>'btn btn-primary btn-block']) !!}
        </div>
      
    {!! Form::close(); !!}
    
</div>
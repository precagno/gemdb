<!-- Blog Comments -->

<!-- Comments Form -->
<div class="">
    
    {!! Form::model(Request::all(),['role'=>'form','route'=>'contacto.store','id'=>'contact_form']); !!}    
        
        <div class="form-group">
            {!! Form::label('name','Nombre:') !!}
            {!! Form::text('name',null,['id'=>'contact_name','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su nombre']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('last_name','Apellido:') !!}
            {!! Form::text('last_name',null,['id'=>'contact_last_name','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su apellido']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('email','E-mail:') !!}
            {!! Form::text('email',null,['id'=>'contact_email','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su correo electrònico']) !!}
        </div>
    
        <div class="form-group">
            {!! Form::label('subject','Asunto:') !!}
            {!! Form::text('subject',null,['id'=>'contact_subject','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese asunto de la consulta']) !!}
        </div>
        
        <div class="form-group">
            {!! Form::label('content','Consulta:') !!}
            {!! Form::textarea('content',null,['id'=>'contact_content','class'=>'form-control input_to_clean','rows'=>'3','placeholder'=>'Ingrese su consulta']); !!}
        </div>
        
        <div class="form-group">
            {!! Form::submit('Enviar',['id'=>'contact_form_button','class'=>'btn btn-primary btn-block']) !!}
        </div>
      
    {!! Form::close(); !!}
</div>

@section('extra_js_scripts')
    
    {!! Html::script('js/ajaxCall.js') !!}

    {!! Html::script('js/validation.js') !!}
    
    {!! Html::script('js/contact_modules.js') !!}

    {!! Html::script('js/contact.js') !!}

@endsection
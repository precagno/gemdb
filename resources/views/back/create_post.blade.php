@extends('back.app_back')

@section('content')

    <section id="main-content">
          <section class="wrapper">

              <div class='row'>
                  
                  <div class='col-md-12'>
                  
                      <div class='text-center'>
                          
                          <h1><u>Crear un post</u></h1>
                          
                      </div>
                      
                      @include('partials.back.form_create_post')
                      
                  </div>
                  
              </div>
              
          </section>
      </section>

@endsection


@section('extra_js_scripts')

    {!! Html::script('js/ajaxCall.js') !!}
    
    {!! Html::script('js/validation.js') !!}

    {!! Html::script('js/back/ckeditor/ckeditor.js') !!}
   
    {!! Html::script('js/back/create_post.js') !!}
    
    {!! Html::script('js/back/create_post_modules.js') !!}

@endsection
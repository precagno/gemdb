@extends('front.app_front')

@section('title')

    Buscar

@endsection

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">

            <div id="form-buscar">
                
                <div class='page-header'>
            
                    <h1 class="text-center">Ingrese un termino de busqueda</h1>

                </div>
                
                <br/>
                
                @include('partials.validation_errors')
                
                <form class="form-inline">
                    
                {!! Form::model(Request::only(['search']),['route'=>'home.search','method'=>'GET']); !!}    
                    
                    <div class="form-group">
                        
                      {!! Form::text('search',null,['class'=>'form-control','id'=>'search','placeholder'=>'T&eacute;rmino de b&uacute;squeda']); !!}
                      
                    </div>

                    <button type="submit" class="btn btn-info">Buscar</button>
                    
                {!! Form::close(); !!}
                
            </div><br/>
            
        </div>
        
        <!-- /.form buscar posts -->
        
        @if(!is_null(Request::get('search')) && !$errors->any())
        
            <!-- Posts encontrados -->
            <div class="col-md-12">

                <h2 class="text-muted">Se encontraron {{$posts->total()}} posts relacionados con el t&eacute;rmino "{{Request::get('search')}}"</h2>

                <div id='posts_encontrados'>

                    @foreach($posts as $post)

                        <div class='post-encontrado'>

                            <a href="{{route('home.post',$post->title_no_spaces)}}" target="_blank" class="text-info"><h4>{{$post->title}}</h5></a>

                            <h5>Escrito por <span class="glyphicon glyphicon-user" aria-hidden="true"></span><b>{{$post->user["username"]}}</b></h5>
                            
                            <h5 class="text-justify">{{$post->preview}}</h5>

                            <hr/>

                        </div>

                    @endforeach

                </div>
                
                {!! $posts->appends(Request::only(['search']))->render(); !!}

            </div>
            <!-- /.posts encontrados -->
        
        @endif

    </div>
    <!-- /.row -->

@endsection
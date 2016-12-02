@extends('front.app_front')

@section('title')

    P&aacute;gina de contacto
    
@endsection

@section('content')

    <div class='page-header'>
            
        <h1 class="text-center">Contacto</h1>
            
    </div>

    <br/>

    <div class="row">
        
        <div class="alert alert-info text-center">
                
            <h3>Ingrese su consulta , serà respondida a la brevedad</h3>
        
        </div>
        
        <!-- Blog Entries Column -->
        <div class="col-md-4">
            
            <img src='{{asset('img/icono-mail.png')}}' class='img-responsive' />
            
        </div>

        <div class='col-md-8'>
            
           @include('partials.front.contact_form')
            
        </div>

    </div>
    <!-- /.row -->

@endsection
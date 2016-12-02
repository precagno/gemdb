@extends('front.app_front')

@section('title')

    {{$title}}
    
@endsection

@section('content')

    <div class='page-header'>
            
        <h1 class="text-center">{{$title}}</h1>
            
    </div>

    <div class="row">
        
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            
            @include('partials.success_message')
            
            @include('partials.front.posts_preview')

            <div class="paginador">{!! $posts->render() !!}</div>
            
        </div>

        <div class='col-md-4'>
            
            @include('partials.front.posts_most_viewed')
            
            @include('partials.front.categories')
            
        </div>

    </div>
    <!-- /.row -->

@endsection
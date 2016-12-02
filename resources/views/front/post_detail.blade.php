@extends('front.app_front')

@section('title')

    {{$post->title}}
    
@endsection

@section('content')

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">
            
            @include('partials.front.post')
            
            <p class="text-justify">{{$post->content}}</p>
            
            @include('partials.front.no_comments')
            
            @include('partials.front.comment_form')
           
            @include('partials.front.comments')
            
        </div>
        
        <div class='col-md-4'>
            
            @include('partials.front.posts_related')
            
        </div>
        
    </div>
    <!-- /.row -->

@endsection

@section('extra_js_scripts')

    {!! Html::script('js/validation.js') !!}
    
    {!! Html::script('js/ajaxCall.js') !!}
    
    {!! Html::script('js/front/comments_modules.js') !!}

    {!! Html::script('js/front/comments.js') !!}

@endsection
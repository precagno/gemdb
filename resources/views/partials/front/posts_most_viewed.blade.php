<!-- Blog Sidebar Widgets Column -->
<!-- Posts most viewed -->
<div class='row'>
    
    <div class='col-md-12'>
    
        <div class="widget" id="posts_most_wiewed">
            <h4 class="widget-title">Posts m&aacute;s leidos</h4>
            <ul class="list-unstyled">
                @foreach($posts_most_viewed as $pmv)
                <li><a href="{{route("home.post",$pmv->title_no_spaces)}}" class="text-justify">{{$pmv->title}}</a></li>
                @endforeach  
            </ul>
        </div>
        
    </div>    
    
    
    
</div>    
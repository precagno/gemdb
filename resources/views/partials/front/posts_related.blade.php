<!-- Blog Sidebar Widgets Column -->
<!-- Related posts -->
<div class='row'>

    <div class='col-md-12'>
        
        <div class="widget" id="related_posts">
            <h4 class="widget-title">Posts relacionados</h4>
            <ul class="list-unstyled">
                @foreach($related_posts as $rp)
                    <li><a href="{{route("home.post",$rp->title_no_spaces)}}" class="text-justify">{{$rp->title}}</a></li>
                @endforeach    
            </ul>
        </div>
        
    </div>

</div>
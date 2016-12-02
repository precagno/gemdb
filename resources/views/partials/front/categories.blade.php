<!-- Blog Sidebar Widgets Column -->
<div class="row">

    <div class='col-md-12'>
        
        <!-- Category posts -->
        <div class="widget" id="categories">
            <h4 class="widget-title">Categorias</h4>
            <ul class="list-unstyled">
                @foreach($categories as $category)
                <li><a href="{{route("home.postsByCategory",$category->name)}}" class="text-justify">{{$category->name}}</a></li>
                @endforeach    
            </ul>
        </div>

    </div>
    
</div>
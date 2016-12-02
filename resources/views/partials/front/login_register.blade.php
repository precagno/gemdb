<!-- Blog Sidebar Widgets Column -->
<!-- Posts most viewed -->
<div class='row'>
    
    <div class='col-md-12'>
    
        <div class="widget" id="login_register">
            
            @if(Auth::check())
            
            <div>
                <h2>Bienvenido {{Auth::user()->name}}</h2>
            </div>
           
            @else
            
                <h4 class="widget-title">Login</h4>
            
                <div>
                    <a href='auth/login'>Inicie sesion</a> o <a href='auth/register'>registrese</a>
                </div>
                
            @endif
            
        </div>
        
    </div>    
    
</div>    
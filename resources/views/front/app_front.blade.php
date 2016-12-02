<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config("options.web.name")}} - @yield('title')</title>

    <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}

    <!-- sweetAlert CSS -->
    {!! Html::style('css/sweetalert.css') !!}
    
    <!-- blog home CSS -->
    {!! Html::style('css/front/blog_home.css') !!}
    
    <!-- override CSS -->
    {!! Html::style('css/front/override_front.css') !!}
    
    @yield('extra_css_pages')
    
    <!-- Link fuente google fonts -->
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" id="header" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('home.index')}}">{{config("options.web.name")}}</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('home.search')}}">Buscar</a>
                    </li>
                    
                    <li>
                        <a href="{{route('contacto.create')}}">Contacto</a>
                    </li>
                  
                    @if(\Auth::check())

                        <li>
                            <a>{{\Auth::user()->name.' '.\Auth::user()->last_name}}</a>
                        </li>

                        <li>
                            <a href='{{route('logout')}}'>Salir</a>
                        </li>

                    @else

                        <li>
                            <a href="{{route('login')}}">Login</a>
                        </li>

                    @endif
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        
        <!-- Contenido principal de la pàgina -->
        
        @yield('content')

    </div>
    <!-- /.container -->

    <div id="footer">
        
        <div class="container">
            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <div class='text-center'>Copyright &copy; Your Website 2015</div>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </footer>
            
        </div>
        
    </div>
    
    <!-- jQuery -->
    {!! Html::script('js/jquery.js') !!}

    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/bootstrap.min.js') !!}
    
    <!-- Bootstrap Core JavaScript -->
    {!! Html::script('js/sweetalert.min.js') !!}
    
    @yield('extra_js_scripts')
    
</body>

</html>
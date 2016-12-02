<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="http://getbootstrap.com/favicon.ico">

    <title>@yield('title')</title>

   <!-- Bootstrap Core CSS -->
    {!! Html::style('css/bootstrap.min.css') !!}

    <!-- Form CSS -->
    {!! Html::style('css/signin.css') !!}
    
    @yield('extra_css_pages')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

      <div class="container">
          
          @yield('content')
          
      </div>  
      
    {!! Html::script('js/jquery.js') !!}
    
    {!! Html::script('js/bootstrap.min.js') !!}
    
    {!! Html::script('js/ajaxCall.js') !!}
    
    @yield('extra_js_scripts')

    </body>

</html>
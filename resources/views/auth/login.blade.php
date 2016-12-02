@extends('front.app_front')

@section('title')

    P&aacute;gina de logueo

@endsection
    
@section('extra_css_pages')

    {!! Html::style('css/front/signin.css') !!}

@endsection

@section('content')
    
<div class="container">
    	<div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-6">
                                    <a href="javascript:void(0)" class="active" id="login_form_link">Login</a>
                            </div>
                            <div class="col-xs-6">
                                    <a href="javascript:void(0)" class="" id="register_form_link">Registrarse</a>
                            </div>
                        </div>
                        <hr>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                
                                {!! Form::model(Request::all(),['role'=>'form','id'=>'login_form','style'=>'display: block;']) !!}
                                          
                                    <div class="form-group">
                                        {!! Form::text('email',null,['id'=>'email','class'=>'form-control','tabindex'=>'1','placeholder'=>'Ingrese su email']) !!}
                                    </div>
                                
                                    <div class="form-group">
                                        {!! Form::password('password',['id'=>'password','class'=>'form-control','tabindex'=>'2','placeholder'=>'Ingrese su password']) !!}
                                    </div>
                                
                                    <div class="form-group text-center">
                                        <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                                        <label for="remember"> Remember Me</label>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                {!! Form::submit('Loguear',['id'=>'login_button','class'=>'form-control btn btn-login','tabindex'=>'4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="text-center">
                                                    <a href="http://phpoll.com/recover" tabindex="5" class="forgot-password">Forgot Password?</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                {!! Form::close() !!}
                                        
                                <!-------------------------------------------------------------------->
                                
                                {!! Form::model(Request::all(),['route'=>'register','role'=>'form','id'=>'register_form','style'=>'display: none;']) !!}
                                          
                                    <div class="form-group">
                                        {!! Form::text('name',null,['id'=>'name','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su nombre']) !!}
                                    </div>
                                
                                    <div class="form-group">
                                        {!! Form::text('last_name',null,['id'=>'last_name','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su apellido']) !!}
                                    </div>
                                
                                    <div class="form-group">
                                        {!! Form::text('username',null,['id'=>'username','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su nombre de usuario']) !!}
                                    </div>
                                
                                    <div class="form-group">
                                        {!! Form::text('email',null,['id'=>'email','class'=>'form-control input_to_clean','tabindex'=>'1','placeholder'=>'Ingrese su email']) !!}
                                    </div>
                                
                                    <div class="form-group">
                                        {!! Form::password('password',['id'=>'password','class'=>'form-control input_to_clean','tabindex'=>'2','placeholder'=>'Ingrese su password']) !!}
                                    </div>
                   
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-sm-6 col-sm-offset-3">
                                                {!! Form::button('Registrar',['id'=>'register_button','class'=>'form-control btn btn-register','tabindex'=>'4']) !!}
                                            </div>
                                        </div>
                                    </div>
                                    
                                {!! Form::close() !!}
                                
                                @include('partials.validation_errors')
                                
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
		</div>
	</div>

@endsection

@section('extra_js_scripts')
    
    {!! Html::script('js/ajaxCall.js') !!}

    {!! Html::script('js/validation.js') !!}
    
    {!! Html::script('js/front/login_register_modules.js') !!}

    {!! Html::script('js/front/login_register.js') !!}

@endsection
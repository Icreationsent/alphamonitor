@extends('layouts.app')
@section('styles')
        <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
        <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
        <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
        <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/front_main.css">
        <meta name="robots" content="noindex, follow">
 <script nonce="b6ebd0c2-d52c-4459-9456-173dca47fd07">(function(w,d){!function(eK,eL,eM,eN){eK.zarazData=eK.zarazData||{};eK.zarazData.executed=[];eK.zaraz={deferred:[],listeners:[]};eK.zaraz.q=[];eK.zaraz._f=function(eO){return function(){var eP=Array.prototype.slice.call(arguments);eK.zaraz.q.push({m:eO,a:eP})}};for(const eQ of["track","set","debug"])eK.zaraz[eQ]=eK.zaraz._f(eQ);eK.zaraz.init=()=>{var eR=eL.getElementsByTagName(eN)[0],eS=eL.createElement(eN),eT=eL.getElementsByTagName("title")[0];eT&&(eK.zarazData.t=eL.getElementsByTagName("title")[0].text);eK.zarazData.x=Math.random();eK.zarazData.w=eK.screen.width;eK.zarazData.h=eK.screen.height;eK.zarazData.j=eK.innerHeight;eK.zarazData.e=eK.innerWidth;eK.zarazData.l=eK.location.href;eK.zarazData.r=eL.referrer;eK.zarazData.k=eK.screen.colorDepth;eK.zarazData.n=eL.characterSet;eK.zarazData.o=(new Date).getTimezoneOffset();if(eK.dataLayer)for(const eX of Object.entries(Object.entries(dataLayer).reduce(((eY,eZ)=>({...eY[1],...eZ[1]})))))zaraz.set(eX[0],eX[1],{scope:"page"});eK.zarazData.q=[];for(;eK.zaraz.q.length;){const e_=eK.zaraz.q.shift();eK.zarazData.q.push(e_)}eS.defer=!0;for(const fa of[localStorage,sessionStorage])Object.keys(fa||{}).filter((fc=>fc.startsWith("_zaraz_"))).forEach((fb=>{try{eK.zarazData["z_"+fb.slice(7)]=JSON.parse(fa.getItem(fb))}catch{eK.zarazData["z_"+fb.slice(7)]=fa.getItem(fb)}}));eS.referrerPolicy="origin";eS.src="https://colorlib.com/cdn-cgi/zaraz/s.js?z="+btoa(encodeURIComponent(JSON.stringify(eK.zarazData)));eR.parentNode.insertBefore(eS,eR)};["complete","interactive"].includes(eL.readyState)?zaraz.init():eK.addEventListener("DOMContentLoaded",zaraz.init)}(w,d,0,"script");})(window,document);</script>
    @endsection
    @section('content')
    {{--<div class="row justify-content-center">--}}
{{--    <div class="col-md-6">--}}
{{--        <div class="card mx-4">--}}
{{--            <div class="card-body p-4">--}}
{{--                <h1>{{ trans('panel.site_title') }}</h1>--}}

{{--                <p class="text-muted">{{ trans('global.login') }}</p>--}}

                @if(session('message'))
                    <div class="alert alert-info" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

{{--                <form method="POST" action="{{ route('login') }}">--}}
{{--                    @csrf--}}

{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text">--}}
{{--                                <i class="fa fa-user"></i>--}}
{{--                            </span>--}}
{{--                        </div>--}}

{{--                        <input id="email" name="email" type="text" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">--}}

{{--                        @if($errors->has('email'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('email') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="input-group mb-3">--}}
{{--                        <div class="input-group-prepend">--}}
{{--                            <span class="input-group-text"><i class="fa fa-lock"></i></span>--}}
{{--                        </div>--}}

{{--                        <input id="password" name="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">--}}

{{--                        @if($errors->has('password'))--}}
{{--                            <div class="invalid-feedback">--}}
{{--                                {{ $errors->first('password') }}--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    </div>--}}

{{--                    <div class="input-group mb-4">--}}
{{--                        <div class="form-check checkbox">--}}
{{--                            <input class="form-check-input" name="remember" type="checkbox" id="remember" style="vertical-align: middle;" />--}}
{{--                            <label class="form-check-label" for="remember" style="vertical-align: middle;">--}}
{{--                                {{ trans('global.remember_me') }}--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-6">--}}
{{--                            <button type="submit" class="btn btn-primary px-4">--}}
{{--                                {{ trans('global.login') }}--}}
{{--                            </button>--}}
{{--                        </div>--}}
{{--                        <div class="col-6 text-right">--}}
{{--                            @if(Route::has('password.request'))--}}
{{--                                <a class="btn btn-link px-0" href="{{ route('password.request') }}">--}}
{{--                                    {{ trans('global.forgot_password') }}--}}
{{--                                </a><br>--}}
{{--                            @endif--}}
{{--                            <a class="btn btn-link px-0" href="{{ route('register') }}">--}}
{{--                                {{ trans('global.register') }}--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<div class="limiter">
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="wrap-login100 p-t-30 p-b-50">
<span class="login100-form-title p-b-41">
Apha-Monitor Login
</span>
            <form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="wrap-input100 validate-input" data-validate="Enter username">
                    @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                     @endif
                    <input name="email" type="text" class="input100 {{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
                    <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                </div>
                <div class="wrap-input100 validate-input" data-validate="Enter password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
{{--                    <input class="input100" type="password" name="pass" placeholder="Password">--}}
                    <input id="password" name="password" type="password" class="input100{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">

                    <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                </div>
                <div class="container-login100-form-btn m-t-32">
                    <button class="btn-lg btn-pill btn-success" type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<div id="dropDownSelect1">

</div>
@endsection


<body>

@section('script')
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>

    <script src="vendor/animsition/js/animsition.min.js"></script>

    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="vendor/select2/select2.min.js"></script>

    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>

    <script src="vendor/countdowntime/countdowntime.js"></script>

    <script src="js/main.js"></script>
@endsection
<!--

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-23581568-13');
	</script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"77bfbfd83ccdb88e","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
-->


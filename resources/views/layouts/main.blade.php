<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title> @yield('title') </title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="icon" href="{{asset('imges/img site/favicon.ico')}}">
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset('site/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('site/css/bootstrap-rtl.min.css')}}">
<link rel="stylesheet" href="{{asset('site/css/animate.css')}}">
<link rel="stylesheet" href="{{asset('site/css/font-awesome.min.css')}}">
<link rel="stylesheet" href="{{asset('site/css/style.css')}}">
<link rel="stylesheet" href="{{asset('site/css/media.css')}}">


<script src="{{asset('site/js/html5shiv.min.js')}}"></script>
<script src="{{asset('site/js/respond.min.js')}}"></script>
</head>
<body style="font-family: 'Cairo', sans-serif;">

<div class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-5 col-sm-4 col-xs-3">
     <a href="/"> <img style="margin-top: 32px" class="img-responsive" src="{{asset('imges/img site/logo.jpg')}}"> </a>
      </div>
      <div class="col-lg-offset-2 col-lg-6 col-md-offset-2 col-md-6 col-sm-8 col-xs-9">
        <ul class="auth">
          @if(isset(auth()->user()->id))

          <div class="navbar-form navbar-left">
          <li><a class="user-personal" href="{{route('createartical')}}">اكتب موضوعك</a></li>
    
          <li><a href="{{route('myprofile')}}" class="user-personal">ملفي</a></li>

<li class="dropdown"  style="list-style: none;margin-top: 31px">
  <img style="border-radius: 100%" class="img-responsive nav-right-imgprofile" src="{{asset('imges/img user/' .auth()->user()->photo)}}">
<a href="#" class="dropdown-toggle name-profile" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{auth()->user()->name}}<span class="caret"></span></a>
<ul class="dropdown-menu my-profile">
  <li> 
    <a href="{{ route('logout') }}"
    onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                  <i class="fa fa-power-off" style="color:red"></i>
     تسجيل الخروج
 </a>

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
 </form>

</li>
</ul>
</li>
          </div>
<div style="clear: both"></div>
   
          @else

          <style>
          .auth{
            margin-top: 26px
          }
          </style>

          <div class="navbar-form navbar-left pull-left">
            <li><a class="sign" href="{{route('register')}}"><i class="fa fa-user-plus"></i> انشاء حساب</a></li>
              <li><a class="sign" href="{{route('login')}}"><i class="fa fa-sign-in"></i> دخول</a></li>
              </div>
              <div style="clear: both"></div>

          @endif
        </ul>
      </div>
<div class="col-md-offset-5 col-md-7 col-sm-offset-4 col-sm-8 col-xs-12">
  <div class="mediaheader">
  <form action="{{route('searchartical')}}" method="GET">
        @csrf
        @method('GET')
        <div class="form-group" style="position: relative">
        <input type="text" name="search" class="form-control search-h" placeholder="ابحث هنا...">
        <i class="fa fa-search search"></i>
        <button type="submit" class="btn btn-default bottom-search">بحث</button>
      </div>
    </div>
      </form>

    </div>

    </div>
  </div>
</div>


<div style="clear:both"></div>
    <nav class="navbar navbar-default">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          
            <ul class="nav navbar-nav navbar-right">

              <li @if(Route::current()->getName() =='home') class="link-nav active" @else class="link-nav" @endif><a href="/">الصفحة الرئيسية</a></li>
            <li @if(Route::current()->getName() =='newartical') class="link-nav active" @else class="link-nav" @endif><a href="{{route('newartical')}}">احدث المواضيع</a></li>
              <li @if(Route::current()->getName() =='bigviews') class="link-nav active" @else class="link-nav" @endif><a href="{{route('bigviews')}}">اكثر المواضيع مشاهدة</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    
@yield('content')





<div class="footer" style="
background: #b565a7;
padding: 20px;
bottom: -313px;margin-top:35px">

  <div class="container">
    <div class="top"><i class="fa fa-angle-double-up fa-3x"></i></div>


    <div class="row">
      <div class="col-sm-5 col-xs-12">
        <a href=""><i class="fa fa-facebook-square fa-4x"></i></a>
        <h3 style="color:white">جميع الحقوق محفوظة © حياتكِ.كوم 2020</h3>
      </div>
      <div class="col-sm-7 col-xs-12">

        <div class="pull-left" style="margin-top: 14px">
        <div class="col-sm-6 col-xs-12">
          <a href="{{route('aboutus')}}" class="quick-link">عن حياتك</a>
        </div>
        <div class="col-sm-6 col-xs-12">
        <a href="{{route('siasa')}}" class="quick-link">سياسة الخصوصية</a>
        </div>
        <div class="col-sm-6 col-xs-12">
        <a href="{{route('contactus')}}" class="quick-link">اتصل بنا</a>
        </div>
        <div class="col-sm-6 col-xs-12">
        <a href="{{route('acceptuse')}}" class="quick-link">اتفاقية الاستخدام</a>
        </div>
        </div>

      </div>
    </div>
  </div>
</div>


<script src="{{asset('site/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('site/js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>

<script>
  $(function(){
  $(window).on("scroll",function(){
	var sc=$(window).scrollTop();
	console.log(sc);
    if(sc>=726){
		$(".top").fadeIn();
	}
		else{
			$(".top").fadeOut();
		}
	});
  $(".top").click(function(){
		$("html,body").animate({
			scrollTop:"0"
		},1000);
  });
  
  });
  </script>


<!-- ck editor -->
<script src="https://cdn.ckeditor.com/4.13.1/standard-all/ckeditor.js"></script>
<script>
  CKEDITOR.replace('question', {
    language: 'ar'
  });
  CKEDITOR.replace('content', {
    language: 'ar'
  });
</script>



</body>
</html>
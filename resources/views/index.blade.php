@extends('layouts.main')
@section('content')

<div class="container" style="margin-top: 65px;margin-bottom:20px">


  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-generic" data-slide-to="1"></li>
      <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      <li data-target="#carousel-example-generic" data-slide-to="3"></li>
      <li data-target="#carousel-example-generic" data-slide-to="4"></li>
    </ol>
  
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      @foreach ($artical as $articals)

      <div @if($artical[0]['id']==$articals->id) class="item active" @else class="item"  @endif >
        <img src="{{asset("imges/img artical/$articals->photo")}}" alt="...">
        
          <div class="test-slide">
        <h1 class="title-s">{{$articals->title}}</h1>
        <div class="content">

          <div class="row">
            <div class="col-sm-10 col-xs-12">
              
            <?php  $content=strip_tags($articals->content,'<br>') ?>
            
           <p class="para"> {{Str::limit($content,400)}} </p>

          </div>  

            <div class="col-sm-2 col-xs-12">
              <a href="{{route('showarticalsection',['id'=>$articals->id,'title'=>$articals->title])}}" class="btn btn-default" style="background: none;
              color: white;
              padding: 9px 22px;"> المزيد <i class="fa fa-angle-left"></i></a>
            </div> 
        </div>

        </div>
      </div>


      </div>
      @endforeach
    </div>
  
    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>













<!-- ads -->
  <div class="ads">
      <div class="container">
          
      </div>
    </div>

<!-- end ads -->


<div class="container">
<div class="all-category">

  <div class="title-tsnef">
<strong class="tsnef">تصنيفات حياتك</strong>
  </div>

<div class="row">

  @foreach ($cat as $cats)

  <div class="col-md-4 col-sm-6 col-xs-12">
    
    <div class="panel panel-default">
      <div class="panel-heading cat">
      <h2>{{$cats->title}}</h2>
      </div>
      <div class="panel-body body-section">
        @foreach ($section as $sections)
        @if($sections->cat_id==$cats->id)
      <h3><a class="section-cat" href="{{route('articalsection',['id'=>$sections->id,'name'=>$sections->title])}}"> {{$sections->title}} </a></h3>
        @endif
        @endforeach

      </div>
    </div>

  </div>
  @endforeach

</div>

</div>
</div>




</div>
@endsection
@extends('layouts.main')
@section('title')
{{$artical->title}}
@endsection


@section('content') 
<div class="ads">
    <div class="container">
        
    </div>
</div>


<div class="show">
<div class="container">

    <div class="links" style="margin-bottom: 20px;
    background: #ddd;
    padding: 2px 6px;">
    <a href="/" style="font-size: 19px;font-weight: bold;">الرئيسية</a> / <a style="font-size: 19px;font-weight: bold;" href="{{route('articalsection',['id'=>$artical->section_id,'name'=>$artical->sections->title])}}">{{$artical->sections->title}}</a>/ <span style="font-size: 19px;font-weight: bold;">{{$artical->title}}</span>
    </div>
    <div class="row">
        <div class="col-md-8 col-xs-12">
<div class="show-artical" style="border: 1px solid #e4e4e4;
padding: 5px 15px;overflow:auto;overflow-wrap: break-word;">
    <div class="title">
<h1 style="font-weight: bold">{{$artical->title}}</h1>
    <p style="color: #797979;">بواسطة : {{$artical->user->name}} - الساعة : {{$artical->updated_at->format('h:i A')}} , بتاريخ:{{date('M/d/Y',strtotime($artical->updated_at))}}</p>
    </div>
    <div class="img-artical">
    <img class="img-responsive" style="width: 100%;" src="{{asset("imges/img artical/$artical->photo")}}">
    </div>


    <div class="col-sm-4 col-xs-12">
    <div class="sla-artical">
        <h2>ذات صلة <i class="fa fa-link"></i></h2>
        <hr>
        @if($sla->count()>0)
        @foreach ($sla as $arts)
    <a href="{{route('showarticalsection',['id'=>$arts->id,'title'=>$arts->title])}}" style="color: #2080c7;
        text-decoration: none;
        outline: none;
        line-height: inherit;font-size: 18px;">{{$arts->title}}</a>
        <hr>
        @endforeach
        @else
        <a style="color: #2080c7;
            text-decoration: none;
            outline: none;
            line-height: inherit;font-size: 18px;">لا يوجد روابط ذات صلة</a>
        @endif
    </div>
    </div>
    <div class="col-sm-8 col-xs-12">

    @if(!empty($artical->questions))
    <div class="question-artical" style="background: #f7f7f7;padding: 7px 14px;border: 1px solid #d0d0d0;margin-top: 30px;margin-bottom: 43px;">
      <h2 style="margin-bottom: 15px">محتويات</h2>
      <div class="question-m" style="color: #2080c7;">

        <?php  $ques=strip_tags($artical->questions,'<p>&nbsp;</p>') ?>
        
      <h4>{!!$ques!!}</h4>

    </div>
    </div>
    @endif
   
</div>
<div class="content" style="font-family: 'Tajawal', sans-serif;">
    <?php  $cont=strip_tags($artical->content,'<br>') ?>

   <article style="    font-size: 21px;
   font-weight: bold;
   color: #353535;
   line-height: 41px;" class="lead"> {!! $cont !!}</article>
</div>
<div class="col-lg-10 col-md-9 col-xs-8" style="margin-top:32px">
<div class="social">

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e3cdb91fd4d7db3"></script>

</div>
</div>
<div class="col-lg-2 col-md-3 col-xs-4" style="margin-top:32px">
<div class="view">
<h4><i class="fa fa-eye"></i> {{$artical->count_views}} مشاهدة </h4>
</div>
</div>


</div>

</div>

<!-- ads -->
<div class="col-md-4 col-xs-12">
    <div class="ads">

    </div>
    <div class="important" style="overflow-wrap: break-word">
        <h2>أهم التصنيفات</h2>
        <hr>
        @foreach ($important as $imp)
    <a href="{{route('articalsection',['id'=>$imp->id,'title'=>$imp->title])}}" style="font-size: 19px;font-weight: bold">{{$imp->title}}</a>
    <br>
    <br>
        @endforeach
    </div>
</div>

</div>




<!-- مواضيع ذات صلة 6 -->

@if($lateastsla->count()>0)
<div class="articals" style="margin-top: 30px">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-0 col-xs-offset-2 col-xs-8">

            <h3 style="font-weight: bold;margin-bottom: 30px">مواضيع ذات صلة بـ :{{$artical->sections->title}}</h3>
            <div class="panel-body">
                @foreach ($lateastsla as $articals)
                    <div class="col-md-4 col-sm-6 col-xs-12" style="margin-bottom: 20px">
                    <a href="{{route('showarticalsection',['id'=>$articals->id,'title'=>$articals->title])}}">
                        <div class="artical" style="
                        height: 267px;border: 1px solid #d4d4d4;box-shadow: 0 0px 4px 0px #171717;">
                        <img class="img-responsive" style="width: 207px;height:207px;margin:auto" src="{{asset("imges/img artical/$articals->photo")}}">
                        <p style="overflow-wrap: break-word;
                        color: #0679bd;
                        font-size: 18px;padding: 0 11px;">{{Str::limit($articals->title,30)}}</p>
                        </div>
                        </a>
                    </div>
                @endforeach
            </div>
            </div>

        </div>

</div>
@endif




</div>
</div>
@endsection

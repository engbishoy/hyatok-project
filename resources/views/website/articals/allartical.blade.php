@extends('layouts.main')
@section('title')احدث المواضيع@endsection


@section('content') 

<div class="ads">
    <div class="container">

    </div>
</div>

@if($allartical->count()>0)
<div class="articals">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading"><h2 style="font-weight: bold">احدث المواضيع</h2></div>
            <div class="panel-body">
                @foreach ($allartical as $articals)
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
            {{$allartical->links()}}

        </div>
            </div>

            <!-- ads -->
            <div class="col-sm-4 col-xs-12">
                <div class="ads">
                </div>

                <!-- اهم تصنيفات-->
                <div class="important" style="overflow-wrap: break-word">
                    <h2>اهم التصنيفات</h2>
                    <hr>
                    @foreach ($important_tsnef as $imp)
                    <a href="{{route('articalsection',['id'=>$imp->id,'name'=>$imp->title])}}" style="font-size: 19px;font-weight: bold">{{$imp->title}}</a>                        
                    <br>
                    <br>
                    @endforeach
                </div>

            </div>

        </div>

    </div>
</div>

@else
<h2 style="font-weight: bold;color: red;text-align: center;padding: 206px;">لا يوجد اى مقالات  حتى الان</h2>
@endif
@endsection

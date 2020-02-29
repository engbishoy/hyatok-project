
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقالات
        <small>تفاصيل المقال</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">تفاصيل المقال</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('layouts.message')
      <div class="show-artical" style="border: 1px solid #e4e4e4;
      padding: 8px 15px;margin-top: 20px">
          <div class="title">
      <h1>{{$artical->title}}</h1>
          <p style="color: #797979;">بواسطة : {{$artical->user->name}} - الساعة : {{$artical->updated_at->format('h:i A')}} , بتاريخ:{{date('M/d/Y',strtotime($artical->updated_at))}}</p>
          </div>
          <div class="img-artical">
          <img class="img-responsive" src="{{asset("imges/img artical/$artical->photo")}}">
          </div>

          @if(!empty($artical->questions))
          <div class="row">
              <div class="col-md-6 col-xs-12">
          <div class="question-artical" style="background: #f7f7f7;padding: 14px;border: 1px solid #d0d0d0;margin-top: 20px">
            <h2 style="margin-bottom: 15px">محتويات</h2>
            {!!$artical->questions!!}
          </div>
              </div>
          </div>
          @endif

          <div class="content">
              {!! $artical->content !!}
          </div>
      </div>
    </section>
</div>

@endsection
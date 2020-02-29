
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقالات
        <small>تعديل مقال</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">تعديل المقال</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('layouts.message')
        
        <form action="{{route('updateartical',['id'=>$artical->id])}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('PUT')
            <div class="form-group">
                <label>عنوان المقال </label>
            <input type="text" name='title' value="{{$artical->title}}" class="form-control">
              </div>

              <div class="form-group">
                <label>محتويات الموضوع</label>
                <textarea rows="30" id="question" name="question" class="form-control">{!!$artical->questions!!}</textarea>
              </div>
              <div class="form-group">
                <label>الموضوع </label>
                <textarea rows="30" id="content" name="content" class="form-control">{!!$artical->content!!}</textarea>
              </div>

              <div class="form-group" style="position: relative">
                <label> صورة الموضوع</label>
                <br><br>
                     <img src='{{asset('imges/img site/33.png')}}'>
                     <input class="add-img" type="file" name="photo" style="position: absolute;
                     cursor: pointer;
                     top: 44px;
                     width: 252px;
                     height: 201px;
                     opacity: 0;">
                      </div>

                      <div class="form-group" style="position: relative">
                        <label> اختر القسم </label>
                        <select name="section" class="form-control" required>
                            @foreach ($section as $sections)
                        <option @if($sections->id==$artical->section_id) selected @endif value="{{$sections->id}}">{{$sections->title}}</option>    
                            @endforeach
                        </select>
                              </div>
                  <br>
                <input type="submit" value="تعديل المقال" class="btn btn-primary pull-right">
              </form>

    </section>
</div>
@endsection
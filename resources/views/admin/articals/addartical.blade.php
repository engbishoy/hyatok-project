
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقالات
        <small>اضافة مقال</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">اضافة المقال</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        @include('layouts.message')
        
        <form action="{{route('storeartical')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            @method('POST')
            <div class="form-group">
                <label>عنوان المقال </label>
                <input type="text" name='title' class="form-control">
              </div>

              <div class="form-group">
                <label>محتويات الموضوع</label>
                <textarea rows="30" id="question" name="question" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>الموضوع </label>
                <textarea rows="30" id="content" name="content" class="form-control"></textarea>
              </div>

              <div class="form-group" style="position: relative">
                <label> صورة الموضوع</label>
                <br><br>
                     <img src='{{asset('imges/img site/33.png')}}'>
                     <input class="add-img-admin" type="file" name="photo" required>
                      </div>

                      <div class="form-group" style="position: relative">
                        <label> اختر القسم </label>
                        <select name="section" class="form-control" required>
                            @foreach ($section as $sections)
                        <option value="{{$sections->id}}">{{$sections->title}}</option>    
                            @endforeach
                        </select>
                              </div>
                  <br>
                <input type="submit" value="نشر المقال" class="btn btn-primary pull-right">
              </form>

    </section>
</div>
@endsection
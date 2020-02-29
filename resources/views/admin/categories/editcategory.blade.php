@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الاقسام
        <small>تعديل قسم</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">تعديل قسم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   @include('layouts.message')
<form action="{{route('updatecat',['id'=>$cat->id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
        <div class="form-group">
          <label>اسم القسم</label>
        <input type="text" name='title' value="{{$cat->title}}" class="form-control">
        </div>
         
          <br>
        <input type="submit" value="حفظ" class="btn btn-primary pull-right">
      </form>

    </section>
</div>
@endsection
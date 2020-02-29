
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الاقسام
        <small>اضافة قسم</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">اضافة قسم</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   @include('layouts.message')
<form action="{{route('storecategory')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('POST')
        <div class="form-group">
          <label>اسم القسم</label>
          <input type="text" name='title' class="form-control">
        </div>
         
          <br>
        <input type="submit" value="حفظ" class="btn btn-primary pull-right">
      </form>

    </section>
</div>
@endsection
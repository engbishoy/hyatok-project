
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الاقسام
        <small> اضافة قسم فرعي</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active"> اضافة قسم فرعي</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   @include('layouts.message')
<form action="{{route('storesection')}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('POST')
        <div class="form-group">
          <label> اسم القسم الفرعى</label>
          <input type="text" name='title' class="form-control" required>
        </div>
          <div class="form-group" style="position: relative">
    <label> اختر القسم </label>
    <select name="cat" class="form-control" required>
        @foreach ($cat as $cats)
    <option value="{{$cats->id}}">{{$cats->title}}</option>    
        @endforeach
    </select>
          </div>
          <br>
        <input type="submit" value="حفظ" class="btn btn-primary pull-right">
      </form>

    </section>
</div>
@endsection
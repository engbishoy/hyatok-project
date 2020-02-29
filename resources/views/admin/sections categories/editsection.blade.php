@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الاقسام
        <small>تعديل قسم فرعي</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">تعديل قسم فرعي</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
   @include('layouts.message')
<form action="{{route('updatesection',['id'=>$section->id])}}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    @method('PUT')
        <div class="form-group">
          <label>اسم القسم الفرعي</label>
        <input type="text" name='title' value="{{$section->title}}" class="form-control">
        </div>
        <div class="form-group" style="position: relative">
            <label> اختر القسم </label>
            <select name="cat" class="form-control" required>
                @foreach ($cat as $cats)
            <option @if($cats->id==$section->cat_id) selected @endif value="{{$cats->id}}">{{$cats->title}}</option>    
                @endforeach
            </select>
        </div>

          <br>
        <input type="submit" value="حفظ" class="btn btn-primary pull-right">
      </form>

    </section>
</div>
@endsection
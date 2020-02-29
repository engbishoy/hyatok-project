
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المقالات
        <small>جميع الاقسام</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">جميع المقالات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('layouts.message')

      <div style="margin-bottom: 30px">
      <div class="row">
        <div class="form-group">

        <div class="col-md-4 col-sm-6 col-xs-8">

          <form action="{{route('searchartical')}}" method="GET">
          <input type="text" class="form-control" name="search_title" placeholder="ابحث عن المقال"> 
          <button type="submit" class="btn btn-primary" style="position: absolute;
          top: 0;
          left: -67px;
          padding: 6px 20px;"><i class="fa fa-search"></i> بحث</button>
          </form>

        </div>

      </div>

    </div>
  </div>



      @if($artical->count()>0)
        <div class="table-res">
        <table class="table">
           <thead style="background: #222d32;
           color: white;">
               <tr>
               <th scope="col" style="text-align:center"><h3>الصورة</h3></th>
               <th scope="col" style="text-align:center"><h3>عنوان المقال</h3></th>
               <th scope="col" style="text-align:center"><h3>انشأه</h3></th>
               <th scope="col" style="text-align:center"><h3>موعد انشاءه</h3></th>
               <th scope="col" style="text-align:center"><h3>التحكم</h3></th>
               </tr>
           </thead>
      @foreach ($artical as $articals)

<tbody>
<tr>
<td><img class="img-responsive" style="width: 86px;margin: auto;" src="{{asset('/imges/img artical/'.$articals->photo)}}"></td>
<td><h4> {{Str::limit($articals->title,100)}}</h4></td>
<td><h4> {{$articals->user->name}} </h4></td>
<td><h4> {{$articals->created_at->format('Y-m-d | A H:i ')}} </h4></td>
<td>

<span class='btn btn-primary' style='font-size:16px'><a style="color:white;text-decoration:none;" href='{{route('showartical',['id'=>$articals->id])}}'><i class='fa fa-info'></i> التفاصيل</a></span>

@if($articals->approve==1)
<span class='btn btn-info' style='font-size:16px'><a style="color:white;text-decoration:none;" href=''><i class='fa fa-check'></i>تمت الموافقة </a></span>

@else

<form style="display:inline-block" action='{{route('approveartical',['id'=>$articals->id])}}' method="POST">
  @csrf
  @method('PUT')
<button type='submit' class='btn btn-info' style="font-size:16px"><i class="fa fa-thumbs-up"></i> اوافق</button>
</form>

@endif

<span class='btn btn-success' style='font-size:16px'><a style="color:white;text-decoration:none;" href='{{route('editartical',['id'=>$articals->id])}}'><i class='fa fa-edit'></i> تعديل</a></span>
<span> 
<form style="display:inline-block" action='{{route('deleteartical',['id'=>$articals->id])}}' method="POST">
@csrf
@method('DELETE')
<button type='submit' class='btn btn-danger' style="font-size:16px"><i class="fa fa-trash"></i> حذف</button>
</form>
</span>
</td>
</tr>
</tbody>
      @endforeach
      </table>
        </div>
        @else
        <h2 style="text-align: center;font-weight: bold;color: red">لا يوجد مقالات فى وضع الانتظار</h2>
      @endif

    </section>
</div>
@endsection
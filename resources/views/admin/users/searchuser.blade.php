
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        المستخدمين
        <small>جميع المستخدمين</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">جميع المستخدمين</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('layouts.message')

      <div style="margin-bottom: 30px">
      <div class="row">
        <div class="form-group">

        <div class="col-md-4 col-sm-6 col-xs-8">

          <form action="{{route('searchuser')}}" method="GET">
          <input type="text" class="form-control" name="name" placeholder="ابحث عن مستخدم"> 
          <button type="submit" class="btn btn-primary" style="position: absolute;
          top: 0;
          left: -67px;
          padding: 6px 20px;"><i class="fa fa-search"></i> بحث</button>
          </form>

        </div>

      </div>

    </div>
  </div>



      @if($user->count()>0)
        <div class="table-res">
        <table class="table">
           <thead style="background: #222d32;
           color: white;">
               <tr>
               <th scope="col" style="text-align:center"><h3>الصورة</h3></th>
               <th scope="col" style="text-align:center"><h3>اسم المستخدم</h3></th>
               <th scope="col" style="text-align:center"><h3>البريد الالكتروني</h3></th>
               <th scope="col" style="text-align:center"><h3>رقم الهاتف</h3></th>
               <th scope="col" style="text-align:center"><h3>الصلاحية</h3></th>
               <th scope="col" style="text-align:center"><h3>التحكم</h3></th>
               </tr>
           </thead>
      @foreach ($user as $users)

<tbody>
<tr>
<td><img class="img-responsive" style="width: 86px;margin: auto;" src="{{asset('/imges/img user/'.$users->photo)}}"></td>
<td><h4> {{$users->name}}</h4></td>
<td><h4> {{$users->email}} </h4></td>
<td><h4> {{$users->phone}} </h4></td>
<td><h4> @if($users->admin==1) ادمن @else مستخدم عادى @endif</h4></td>
<td>

    @if($users->admin==1)
<span class='btn btn-info' style='font-size:16px'><a style="color:white;text-decoration:none;" href='{{route('makenormaluser',['id'=>$users->id])}}'><i class='fa fa-check'></i>تعيينه مستخدم عادى</a></span>
    @else 
<span class='btn btn-info' style='font-size:16px'><a style="color:white;text-decoration:none;" href='{{route('makeadmin',['id'=>$users->id])}}'><i class='fa fa-check'></i>تعيينه ادمن</a></span>
    @endif


<span> 
<form style="display:inline-block" action='{{route('deleteuser',['id'=>$users->id])}}' method="POST">
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
        <h2 style="text-align: center;font-weight: bold;color: red">لا يوجد اى مستخدم بهذا الاسم</h2>
      @endif

    </section>
</div>
@endsection
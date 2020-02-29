
@extends('admin.layouts.main')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        الاقسام
        <small>جميع الاقسام الفرعية</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admins"><i class="fa fa-dashboard"></i> لوحة تحكم</a></li>
        <li class="active">جميع الاقسام الفرعية</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      @include('layouts.message')

      @if($section->count()>0)
        <div class="table-res">
        <table class="table">
           <thead style="background: #222d32;
           color: white;">
               <tr>
                 <th scope="col" style="text-align:center"><h3> اسم القسم الفرعي</h3></th>
               <th scope="col" style="text-align:center"><h3>اسم القسم الاصلى</h3></th>
               <th scope="col" style="text-align:center"><h3>التحكم</h3></th>
               </tr>
           </thead>
      @foreach ($section as $sections)

<tbody>
<tr>

<td><h4> {{Str::limit($sections->title,100)}}</h4></td>

<td><h4> {{Str::limit($sections->categories->title,100)}}</h4></td>
<td>

<span class='btn btn-success' style='font-size:16px'><a style="color:white;text-decoration:none;" href='{{route('editsection',['id'=>$sections->id])}}'><i class='fa fa-edit'></i> تعديل</a></span>
<span> 
<form style="display:inline-block" action='{{route('deletesection',['id'=>$sections->id])}}' method="POST">
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
        <h2 style="text-align: center;font-weight: bold;color: red">لا يوجد اى اقسام فرعية حتى الان</h2>
      @endif

    </section>
</div>
@endsection
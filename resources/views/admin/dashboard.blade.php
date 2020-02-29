
@extends('admin.layouts.main')

@section('content')
    
<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
       <h1 style="font-weight: bold">الاحصائيات</h1>
        </section>
<br>
        <!-- Main content -->
        <section class="content">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-aqua">
                <div class="inner">
                  <a style="color: white" href="{{route('alluser')}}">
                  <h3>{{$users->count()}}</h3>
                  <p>المستخدمين</p>
                </div>
                <div class="icon">
                  <i class="fa fa-users"></i>
                </div>
                <a href="#" class="small-box-footer"> عدد المستخدمين <i class="fa fa-arrow-circle-left"></i></a>
              </a>
              </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-yellow">
                <div class="inner">
                  <a style="color: white" href="{{route('allsection')}}">
                <h3>{{$section->count()}}</h3>
                  <p>الاقسام الفرعية</p>
                </div>
                <div class="icon">
                  <i class="fa fa-pie-chart"></i>
                </div>
                <a href="#" class="small-box-footer">عدد الاقسام الفرعية<i class="fa fa-arrow-circle-left"></i></a>
              </a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-green">
                <div class="inner">
                  <a style="color: white" href="{{route('allartical')}}">

                <h3>{{$artical->count()}}</h3>
                  <p>المقالات</p>
                </div>
                <div class="icon">
                  <i class="fa fa-book"></i>
                </div>
                <a href="#" class="small-box-footer">عدد المقالات<i class="fa fa-arrow-circle-left"></i></a>
              </a>
              </div>
            </div><!-- ./col -->

            <div class="col-lg-3 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red">
                <div class="inner">
                <a style="color: white" href="{{route('peddingartical')}}">
                <h3>{{$pedding->count()}}</h3>
                  <p>مقالات بانتظار الموافقة</p>
                </div>
                <div class="icon">
                  <i class="fa fa-thumbs-up"></i>
                </div>
                <a href="#" class="small-box-footer">عدد المقالات<i class="fa fa-arrow-circle-left"></i></a>
              </a>
              </div>
            </div><!-- ./col -->
          </div><!-- /.row -->

          

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      @endsection

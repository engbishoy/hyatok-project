@extends('layouts.main')
@section('title') اتصل بنا @endsection
@section('content') 

<div class="contact" style="padding: 24px 0">
    <div class="container">
        @include('layouts.message')

        <h2 style="font-weight: bold;margin-bottom: 20px">استخدم الاستمارة التالية لتُكاتبنا.</h2>
    <form action="{{route('contact')}}" class="form-horizontal" style="border: 1px solid #d2d2d2;padding: 40px;" method="POST">            
            @csrf
            @method('POST')
            <div class="row">
            
            <div class="form-group form-group-lg">
                <label class="control-label col-md-2 col-xs-3" style="margin-top:-5px"><span style="font-size: 24px;color: #444444;">الاسم</span></label>
                <div class="col-md-10 col-xs-9">
                <input type="text" class="form-control" name="name" required>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label class="control-label col-md-2 col-xs-3" style="margin-top:-5px"><span style="font-size: 24px;color: #444444;">بريدك الالكترونى</span></label>
                <div class="col-md-10 col-xs-9">
                <input type="email" class="form-control" name="email" required>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label class="control-label col-md-2 col-xs-3" style="margin-top:-5px"><span style="font-size: 24px;color: #444444;">الموضوع</span></label>
                <div class="col-md-10 col-xs-9">
                <input type="text" class="form-control" name="title" required>
                </div>
            </div>

            <div class="form-group form-group-lg">
                <label class="control-label col-md-2 col-xs-3" style="margin-top:-5px"><span style="font-size: 24px;color: #444444;">الرسالة</span></label>
                <div class="col-md-10 col-xs-9">
                <textarea class="form-control" style="height: 240px" name="message" required></textarea>
                </div>
            </div>

                <div class="col-md-offset-2 col-xs-offset-3">
                    <button type="submit" style="background: #b565a7;
                    padding: 8px 24px;
                    font-size: 30px;
                    border: none;" class="btn btn-primary">ارسل</button>
                </div>
           </div>

        </form>

    </div>
</div>

@endsection
@extends('layouts.main')

@section('content') 

<div style="padding: 61px 0;">
<div class="container">
    <h2 style="font-weight: bold;margin-bottom: 30px;margin-top: 20px">تسجيل الدخول</h2>

    <div class="row">
    <div class="col-md-offset-0 col-md-6 col-xs-offset-1 col-xs-10" style="border: 1px solid #b9b9b9;
    padding: 24px;">

<form method="POST" action="{{ route('login') }}" enctype="multipart/form-data">
    @csrf

            <div class="form-group">
                <label class="control-label"> عنوان البريد الالكترونى</label>
                <input id="email" type="email" name="email" class="form-control  @error('email') is-invalid @enderror" required>
                @error('email')
                <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="control-label">كلمة السر</label>
                <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror" required>
           
                @error('password')
                <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            <div class="input-group-lg">
            <input type="submit" value="دخول" class="form-control" style="padding: 6px 43px;
            background: #b565a7;
            font-size: 26px;
            margin-top: 30px;
            color: white;">
            </div>
        </form>
    
  </div>


  <div class="col-md-offset-0 col-md-6 col-xs-offset-1 col-xs-10">
    <h3>لماذا تسجّل دخولك في حياتكَ؟
        <br>
        تسجيل الدخول في موسوعة حياتكَ سيتيح لك كتابة مقالات جديدة، في العديد من المواضيع المقترحة وفي كافة المجالات، كما وسيتيح لك إثراء المقالات الموجودة على الموقع، والتعديل عليها.</h3>
    </div>
    

</div>

</div>
</div>
</div>


@endsection



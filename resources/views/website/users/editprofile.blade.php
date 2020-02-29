@extends('layouts.main')

@section('content') 


<div class="container">

    <div class="row">
    <div class="col-md-3 col-xs-offset-1 col-xs-10" style="">
        <h1 style="font-weight: bold">{{$user->name}}</h1>
        <hr>
    <p style="color: #888888;font-weight: bold;">{{$user->email}}</p>
    <p style="color: #888888;">{{$user->updated_at->format('D,d-M-Y | H:i A')}}</p>

  </div>


  <div class="col-md-6 col-xs-offset-1 col-xs-10">
    @include('layouts.message')

    <form method="POST" class="edit-personal" action="{{ route('updateprofile') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
    
                <div class="input-group-lg">
                    <label class="control-label"><h2>تغيير اسمك : </h2></label>
                <input type="text" value="{{$user->name}}" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" required>
                
                    @error('name')
                    <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
    
                <div class="input-group-lg">
                    <label class="control-label"><h2> تغيير كلمة السر :</h2></label>
                    <input type="password" name="password" class="form-control  @error('password') is-invalid @enderror">
               
                    @error('password')
                    <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
    
                <div class="input-group-lg">
                    <label class="control-label"><h2> تغيير رقم الهاتف :</h2></label>
                <input type="number" value="{{$user->phone}}" class="form-control" name="phone" required >
                </div>
                @error('phone')
                <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <div class="input-group-lg">
                    <label class="control-label"><h2> تغيير الصورة الشخصية: </h2></label>
                    <input type="file" class="form-control" name="photo">
                </div>
                @error('photo')
                <span style="color: #d01717;font-weight: bold;" class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    
    
                <div class="input-group-lg">
                <input type="submit" value="تعديل" class="form-control btn btn-success" style="padding: 6px 43px;
                font-size: 26px;
                margin-top: 30px;
                color: white;">
                </div>
            </form>

  </div>
    

</div>

</div>
</div>


@endsection

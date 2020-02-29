@extends('layouts.main')

@section('content') 

<div class="create-artical">
<div class="container">
    @include('layouts.message')
<div class="title-create">
    <h1 style="font-weight: bold;margin-bottom: 30px;margin-top: 20px">أنشاء مقال</h1>
</div>

    <div style="border: 1px solid #b9b9b9;
    padding: 24px;">

<form method="POST" action="{{route('saveartical')}}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="input-group-lg">
        <label><h2>قم باختيار إحدى المواضيع التالية</h2></label>
    <select name="section" class="form-control">
        @foreach ($section as $sections)
    <option value="{{$sections->id}}">{{$sections->title}}</option>
        @endforeach
    </select>
    </div>
    <div class="input-group-lg">
        <label><h2>عنوان المقال</h2></label>
        <input type="text" class="form-control" name="title">
    </div>
    <div class="input-group-lg">
        <label><h2>محتويات الموضوع</h2></label>
        <textarea rows="30" id="question" name="question" class="form-control"></textarea>
      </div>
      <div class="input-group-lg">
        <label><h2>الموضوع</h2> </label>
        <textarea rows="30" id="content" name="content" class="form-control"></textarea>
      </div>

      <div class="input-group-lg" style="position: relative">
        <label> <h2>صورة الموضوع</h2></label>
             <img src='{{asset('imges/img site/33.png')}}'>
             <input class="add-img" type="file" name="photo" required>
              </div>
              <div class="input-group-lg">
            <input type="submit" value="نشر المقال" class="form-control" style="padding: 6px 43px;
            background: #b565a7;
            font-size: 26px;
            margin-top: 60px;
            color: white;">
              </div>

</form>
    
  </div>

    


</div>
</div>


@endsection

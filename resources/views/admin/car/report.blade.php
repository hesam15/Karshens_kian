@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
    <div class="card" style="width:50%;margin:0 auto;">
        <div class="card-body">
            <div class="card-title border-bottom">
                <h5>فرم ثبت خودرو</h3>
            </div>
            @if(Session("success"))
                <div class="alert alert-success" style="color:white;">
                    با موفقیت ثبت شد.
                </div>
            @endif
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <form action="{{route('store.report')}}" class="mt-4" method="POST">
                @csrf
                <label for="name">نام و نام خانوادگی:</label>
                <input type="text" name="customer_id" id="name" class="form-control" value="{{$user->id}}">
                <label for="name">نام و نام خانوادگی:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$user->name}}">
                <input type="text" value="{{$user->car_id}}" name="car_id">
                <label for="carModel" class="mt-2">درب موتور:</label>
                <select name="engine_door" id="">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>
                <label for="carModel" class="mt-2">درب ضندوق:</label>
                <select name="box_door" id="">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>
                <label for="carModel" class="mt-2">گلگیر جلو سمت راست:</label>
                <select name="fender_right_front" id=">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>
                <label for="carModel" class="mt-2">گلگیر جلو سمت چپ:</label>
                <select name="fender_left_front" id="">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>
                <label for="carModel" class="mt-2">گلگیر عقب سمت راست:</label>
                <select name="fender_right_rear" id="">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>
                <label for="carModel" class="mt-2">گلگیر عقب سمت چپ:</label>
                <select name="fender_left_rear" id="">
                    <option value="0">سالم</option>
                    <option value="1">ناسالم</option>
                </select>

                <button type="submit" class="btn btn-primary mt-4">ثبت نوبت</button>
            </form>
        </div>
    </div>
@endsection
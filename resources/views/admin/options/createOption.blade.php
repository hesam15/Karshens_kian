@extends('layouts.app')
@section('title' , 'داشبورد')
@section('content')
<div class="card" style="width:75%;margin:0 auto;">
    <div class="card-header">
        <h5>ثبت خدمت</h5>
    </div>
    <div class="card-body">
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
        <form action="{{route("store.option")}}" method="post">
            @csrf
            <div class="form-group">
                <label for="name">نام خدمت اصلی(برای مثال خدمات کارشناسی بدنه)</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="نام خدمت">

                <div id="options_container">
                    <div class="option-field row">
                        <div class="col">
                            <label for="sub_option" class="mt-4">خدمات(برای مثال درب موتور)</label>
                            <input type="text" name="sub_options[]" class="form-control" placeholder="نام آپشن">
                        </div>
                        <div class="col">
                            <label for="sub_option" class="mt-4">مقادیر</label>
                            <input type="text" name="sub_values[]" class="form-control" placeholder="مقادیر رو با ، جدا کنید">
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex">
                    <button type="button" id="option_add" class="btn btn-info text-white">اضافه کردن آپشن</button>
                    <button type="button" id="option_remove" class="btn btn-danger me-3 text-white">حذف کردن آپشن</button>
                </div>
                
                <button type="submit" class="btn btn-primary mt-4">ثبت</button>
            </div>
        </form>
    </div>
</div>
@endsection
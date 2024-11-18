@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
    <div class="card" style="width:50%;margin:0 auto;">
        <div class="card-header">
            <h5>فرم ثبت خودرو</h3>
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

            <form action="{{route('storeCustomer.form')}}" class="mt-4" method="POST">
                @csrf
                <label for="name">نام و نام خانوادگی:</label>
                <input type="text" name="name" id="name" class="form-control">
                <label for="carModel" class="mt-2">اسم خودرو:</label>
                <input type="text" name="car" id="carModel" class="form-control">
                <label for="number" class="mt-2">شماره تماس:</label>
                <input type="text" name="mobile" id="mobile" class="form-control">
                <label for="date" class="mt-2">تاریخ:</label>
                <input type="text" id="date-picker" readonly name="date" class="form-control"/>                
                
                <button type="submit" class="btn btn-primary mt-4">ثبت نوبت</button>
            </form>
        </div>
    </div>
@endsection
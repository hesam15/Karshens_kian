@extends('layouts.app')

@section('title' , 'داشبورد')

@section('content')
    <div class="card" style="width:50%;margin:0 auto;">
        <div class="card-body">
            <div class="card-title border-bottom">
                <h5 style="font-weight: 600;">لیست مشتریان</h5>
            </div>
            <table class="table mt-4">
                <tr>
                    <th>نام</th>
                    <th>شماره تماس</th>
                    <th>ثبت گزارش</th>
                </tr>
                @foreach($customers->all() as $customer)
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->number}}</td>
                        <td><a class="btn btn-info" href="{{route("report.form" , ['carId' => $customer->car_id])}}">ثبت گزارش</a></td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
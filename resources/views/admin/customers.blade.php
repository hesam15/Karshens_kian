@extends('layouts.app')
@section('title' , 'داشبورد')
@section('content')
    <div class="card" style="width:75%;margin:0 auto;">
        <div class="card-header">
            <h5>لیست مشتریان</h5>
        </div>
        <div class="card-body">
            <table class="table mt-4">
                <tr>
                    <th>نام</th>
                    <th>خودرو</th>
                    <th>شماره تماس</th>
                    <th>تاریخ کارشناسی</th>
                    <th>ساعت</th>
                    <th>ثبت گزارش</th>
                </tr>
                @foreach($customers as $customer)
                <?php
                    $carReport = $cars->find($customer->car_id);
                    $date = $persianDate($customer->date);
                    $time = $date[1];
                    $date = $date[0];
                ?>
                    <tr>
                        <td>{{$customer->name}}</td>
                        <td>{{$customer->car}}</td>
                        <td><a href="tel:{{$customer->number}}">{{$customer->number}}</a></td>
                        <td>{{$date}}</td>
                        <td>{{$time}}</td>
                        @if($carReport->report)
                            <td><a class="btn btn-info" href="{{route("show.customer.report" , ['carId' => $customer->car_id])}}">مشاهده گزارش</a></td>
                        @else
                            <td><a class="btn btn-info" href="{{route("report.form" , ['carId' => $customer->car_id])}}">ثبت گزارش</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
            <!-- Pagination Links -->
            <div class="mt-4">
                <nav aria-label="Page navigation">
                    <ul class="justify-content-center">
                        {{ $customers->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
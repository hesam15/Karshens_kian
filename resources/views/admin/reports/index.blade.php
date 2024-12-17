@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">لیست مشتریان</h5>
        </div>

        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">نام</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">خودرو</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">شماره تماس</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">تاریخ کارشناسی</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">ساعت</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">ثبت گزارش</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($customers as $customer)
                        <?php
                            $carReport = $cars->find($customer->car_id);
                            $date = $persianDate($customer->date);
                            $time = $date[1];
                            $date = $date[0];
                        ?>
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{$customer->name}}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{$customer->car}}</td>
                            <td class="px-4 py-4 text-sm">
                                <a href="tel:{{$customer->number}}" class="text-blue-600 hover:text-blue-800">
                                    {{$customer->number}}
                                </a>
                            </td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{$date}}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{$time}}</td>
                            <td class="px-4 py-4">
                                @if($carReport->report)
                                    <a href="{{route('show.customer.report', ['carId' => $customer->car_id])}}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                        مشاهده گزارش
                                    </a>
                                @else
                                    <a href="{{route('report.form', ['carId' => $customer->car_id])}}" 
                                       class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                        ثبت گزارش
                                    </a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-8">
                                <div class="text-center">
                                    <span class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg">
                                        <i class="material-icons-round text-lg ml-2">info</i>
                                        هیچ مشتریی یافت نشد
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination Links -->
            <div class="mt-6">
                {{ $customers->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </div>
</div>
@endsection

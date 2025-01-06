@extends('layouts.app')

@section('title', 'جزئیات مشتری')

@section('content') 
<div class="max-w-7xl mx-auto py-6 px-4">  
    @include('layouts.label')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Customer Info Card -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">اطلاعات مشتری</h2>
                <div class="flex gap-2">
                    <a href="{{ route('bookings.create', $customer->id) }}"
                        class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 rounded hover:bg-green-200 transition-colors duration-200">
                        <i class="material-icons-round text-sm">event</i>
                        <span class="text-xs mr-0.5">رزرو وقت</span>
                    </a>
                    <button onclick="openModal('editCustomerModal')"
                        class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                        <i class="material-icons-round text-sm">edit</i>
                        <span class="text-xs mr-0.5">ویرایش</span>
                    </button>
                    <button onclick="openModal('deleteCustomerModal')"
                        class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200">
                        <i class="material-icons-round text-sm">delete</i>
                        <span class="text-xs mr-0.5">حذف</span>
                    </button>
                </div>
            </div>
        
            <!-- Customer Info Content -->
            <div class="space-y-3">
                <div class="flex justify-between">
                    <span class="text-gray-600">نام و نام خانوادگی:</span>
                    <span class="font-medium">{{ $customer->fullname }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">شماره تماس:</span>
                    <span class="font-medium">{{ $customer->phone }}</span>
                </div>
                <div class="flex justify-between">
                    <span class="text-gray-600">تاریخ ثبت نام:</span>
                    <span class="font-medium">{{ $registrationTime }}</span>
                </div>
            </div>
        </div>        

        <!-- Cars List -->
        <div class="md:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">خودروها</h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">نوع خودرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">پلاک</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">رنگ</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($customer->cars as $car)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-900">{{ $car->name }}</td>
                                <td class="px-4 py-3 text-sm text-gray-900">
                                @php
                                    $license_plate = explode('-', $car->license_plate);
                                @endphp
                                    <div class="border-2 border-black rounded-lg p-2 inline-block bg-white">
                                        <div class="flex items-center gap-1">
                                            <div class="text-center">
                                                <div class="text-[10px] border-b border-black">ایران</div>
                                                <div>{{$license_plate[3]}}</div>
                                            </div>
                                            <div class="h-8 w-px bg-black"></div>
                                            <div>{{$license_plate[2]}}</div>
                                            <div class="h-8 w-px bg-black"></div>
                                            <div class="flex items-middle">{{$license_plate[1]}}</div>
                                            <div class="h-8 w-px bg-black"></div>
                                            <div>{{$license_plate[0]}}</div>
                                        </div>
                                    </div>
                                </td>                              
                                <td class="px-4 py-3 text-gray-900">{{ $car->color }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <button onclick="openModal('editCarModal{{ $car->id }}')"
                                                class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">edit</i>
                                            <span class="text-xs mr-0.5">ویرایش</span>
                                        </button>
                                        <button onclick="openModal('deleteCarModal{{ $car->id }}')"
                                                class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">delete</i>
                                            <span class="text-xs mr-0.5">حذف</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bookings List -->
        <div class="md:col-span-3 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">رزروی ها</h2>
            </div>
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/6">تاریخ</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/6">ساعت</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/6">نوع خودرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/6">وضعیت</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-2/6">عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($customer->bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 text-gray-900">{{ $booking->date }}</td>
                                <td class="px-4 py-3 text-gray-900">{{ $booking->time_slot }}</td>
                                <td class="px-4 py-3 text-gray-900">{{ $booking->car->name }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $booking->status === 'completed' ? 'تکمیل شده' : 'در انتظار' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex gap-2">
                                        <a href="{{ route('reports.create', ['id' => $booking->id]) }}"
                                           class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">assignment</i>
                                            <span class="text-xs mr-0.5">ثبت گزارش</span>
                                        </a>
                                        <a href="{{ route('reports.show', ['id' => $booking->id]) }}"
                                           class="inline-flex items-center px-2 py-1 bg-green-100 text-green-800 rounded hover:bg-green-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">visibility</i>
                                            <span class="text-xs mr-0.5">مشاهده گزارش</span>
                                        </a>
                                        <button onclick="openModal('cancelBookingModal{{ $booking->id }}')"
                                                class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">cancel</i>
                                            <span class="text-xs mr-0.5">کنسل کردن</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modals -->
@include('admin.customers.modals.edit-customer-modal')
@include('admin.customers.modals.delete-customer-modal')
@foreach($customer->cars as $car)
    @include('admin.customers.modals.edit-car-modal')
    @include('admin.customers.modals.delete-car-modal')
@endforeach
@foreach($customer->bookings as $booking)
    @include('admin.customers.modals.cancel-booking-modal')
@endforeach

@endsection
@extends('layouts.app')

@section('title', 'رزروها')

@section('content')
<div class="max-w-7xl mx-auto py-4 md:py-6">
    <x-errors-success-label />

    <!-- Bookings List -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <div class="flex items-center gap-3">
                <h4 class="text-xl font-bold text-gray-800">رزروهای {{ $customer->fullname }}</h4>
            </div>
            <!-- Search Form -->
            <div class="w-64">
                <form action="" method="GET" class="relative">
                    <input type="text" name="search" placeholder="جستجو..."
                           class="w-full pl-10 pr-3 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <button type="submit" class="absolute left-0 top-0 h-full px-3 text-gray-500 hover:text-blue-600">
                        <i class="material-icons-round text-lg">search</i>
                    </button>
                </form>
            </div>
        </div>

        @if($bookings->isEmpty())
            <div class="px-6 py-12 flex flex-col items-center justify-center">
                <i class="material-icons-round text-gray-400 text-6xl mb-4">event_busy</i>
                <h2 class="text-xl font-bold text-gray-800 mb-4">هیچ رزروی ثبت نشده است.</h2>
                <a href="{{ route('bookings.create', $customer->fullname) }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                    <i class="material-icons-round text-xl ml-2">add</i>
                    افزودن رزرو جدید
                </a>
            </div>
        @else
            <div class="p-6">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">شماره رزرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">خودرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">تاریخ رزرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">ساعت رزرو</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">وضعیت</th>
                                <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">عملیات</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach($bookings as $booking)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-2 text-base text-gray-900">{{ $booking->id }}</td>
                                <td class="px-4 py-2 text-base text-gray-900">{{ $booking->car->name }}</td>
                                <td class="px-4 py-2 text-base text-gray-900">{{ $booking->date }}</td>
                                <td class="px-4 py-2 text-base text-gray-900">{{ $booking->time_slot }}</td>
                                <td class="px-4 py-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status === 'completed' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                        {{ $booking->status === 'completed' ? 'تکمیل شده' : 'در انتظار' }}
                                    </span>
                                </td>
                                <td class="px-4 py-2">
                                    <div class="flex items-center gap-1">
                                        <button onclick="openModal('editModal-{{$booking->id}}')" 
                                                class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">edit</i>
                                            <span class="text-xs mr-0.5">ویرایش</span>
                                        </button>
                                        <button class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200 delete-btn" 
                                                data-route="{{ route('bookings.destroy', $booking->id) }}">
                                            <i class="material-icons-round text-sm">delete</i>
                                            <span class="text-xs mr-0.5">حذف</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Edit Booking Modal -->
                            <x-edit-modal :id="'editModal-'.$booking->id" title="ویرایش رزرو" :action="route('bookings.update', $booking->id)" method='POST'>
                                @csrf
                                <div class="grid grid-cols-12 gap-4 md:gap-6 items-end mb-6">
                                    <div class="col-span-4">
                                        <label for="car_id" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">خودرو</label>
                                        <select name="car_id" id="car_id" class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            @foreach ($customer->cars as $car)
                                                <option value="{{ $car->id }}" {{$booking->car->id == $car->id ? "selected" : ""}}>
                                                    {{ $car->name }} - ایران {{ $car->license_plate[3] }} | {{ $car->license_plate[2] }} {{ $car->license_plate[1] }} {{ $car->license_plate[0] }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-span-4">
                                        <label for="datepicker" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">تاریخ مراجعه</label>
                                        <input type="text" id="datepicker" name="date" value="{{ $booking->date }}"
                                               class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                                    </div>

                                    <div class="col-span-4">
                                        <label for="status" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">وضعیت</label>
                                        <select name="status" id="status" class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            <option value="active" {{ $booking->status === 'active' ? 'selected' : '' }}>در انتظار</option>
                                            <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>انجام شده</option>
                                            <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>کنسل</option>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="time_slot" id="time_slot" value="{{ $booking->time_slot }}">
                                <div id="time-slots-container" class="hidden mb-6">
                                    <!-- Time slots will be rendered here -->
                                </div>
                            </x-edit-modal>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>

<x-delete-modal type="booking" />
@endsection
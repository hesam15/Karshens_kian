@extends('layouts.app')

@section('title', 'فرم ثبت خودرو')

@section('content')
<div class="min-h-screen p-4 md:p-6">
    <div class="max-w-md md:max-w-7xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-4 py-3 md:px-6 md:py-4 border-b border-gray-200 bg-gray-100">
                <h5 class="text-base md:text-xl font-semibold text-gray-800">فرم ثبت خودرو</h5>
            </div>

            <div class="p-4 md:p-6">

                @include('layouts.label')

                <form action="{{route("booking.store", $customer->id)}}" method="POST" class="space-y-4">
                    @csrf
                    
                    <div class="grid md:grid-cols-2 gap-4 md:gap-6">
                        <!-- نام و نام خانوادگی -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                نام و نام خانوادگی
                            </label>
                            <div class="text-base text-gray-900">
                                {{ $customer->fullname }}
                            </div>
                        </div>                        

                        <!-- شماره تماس -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                شماره تلفن
                            </label>
                            <div class="text-base text-gray-900">
                                {{ $customer->phone }}
                            </div>
                        </div>  

                        <!-- نوع خودرو -->
                        <div>
                            <label for="car" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">نوع خودرو</label>
                            <input type="text" 
                            name="car_type" 
                            id="car_type" 
                            placeholder="نوع خودرو را وارد کنید"
                            class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required>                     
                        </div>

                        <!-- تاریخ -->
                        <div>
                            <label for="datepicker" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">تاریخ مراجعه</label>
                            <input type="text" id="datepicker" name="date"
                                   class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500 cursor-pointer">
                        </div>
                    </div>

                    <!-- ساعت مراجعه -->
                    <div id="time-slots-container" class="hidden">
                        <label for="time_slot" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">ساعت مراجعه</label>
                        <div class="grid grid-cols-6 gap-2">
                            <!-- Time slot buttons will be dynamically added here -->
                        </div>
                        <input type="hidden" name="time_slot" id="time_slot" required>
                    </div>                                      

                    <!-- دکمه ثبت -->
                    <div class="pt-2">
                        <button type="submit"
                                class="w-full md:w-auto md:px-6 py-3 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                            ثبت اطلاعات
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
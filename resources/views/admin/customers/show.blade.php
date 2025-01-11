@extends('layouts.app')

@section('title', 'جزئیات مشتری')

@section('content') 
<div class="max-w-7xl mx-auto py-6 px-4">  
    <x-errors-success-label />

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Customer Info Card -->
        <div class="bg-white rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800">اطلاعات مشتری</h2>
                <div class="flex gap-2">
                    <button type="button" onclick="openModal('editModal-{{$customer->id}}')"
                        class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                        <i class="material-icons-round text-sm">edit</i>
                        <span class="text-xs mr-0.5">ویرایش</span>
                    </button>
                    <button class="delete-btn inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200" data-route="{{route("customers.destroy", $customer->id)}}" data-type="customer">
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

            <!-- Edit Customer Modal -->
            <x-edit-modal :id="'editModal-'.$customer->id" title="ویرایش اطلاعات مشتری" :action="route('customers.update', $customer->id)" method='POST'>
                @csrf
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-6">
                        <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1">نام و نام خانوادگی</label>
                        <input type="text" id="fullname" name="fullname" value="{{ $customer->fullname }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                    <div class="col-span-6">
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">شماره تماس</label>
                        <input type="tel" id="phone" name="phone" value="{{ $customer->phone }}"
                            class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>
            </x-edit-modal>
        </div>        

        <!-- Cars List -->
        <div class="md:col-span-2 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">خودروها</h2>
                <a href="{{ route('cars.create', $customer->fullname) }}" class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition duration-200">
                    <span class="material-icons-round text-base ml-1">add</span>
                    افزودن خودرو
                </a>
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
                                        <div class="border-2 border-black rounded-lg p-2 inline-block bg-white">
                                            <div class="flex items-center gap-1">
                                                <div class="text-center">
                                                    <div class="text-[10px] border-b border-black">ایران</div>
                                                    <div>{{$car->license_plate[3]}}</div>
                                                </div>
                                                <div class="h-8 w-px bg-black"></div>
                                                <div>{{$car->license_plate[2]}}</div>
                                                <div class="h-8 w-px bg-black"></div>
                                                <div class="flex items-middle">{{$car->license_plate[1]}}</div>
                                                <div class="h-8 w-px bg-black"></div>
                                                <div>{{$car->license_plate[0]}}</div>
                                            </div>
                                        </div>
                                    </td>                              
                                    <td class="px-4 py-3 text-gray-900">{{ $car->color }}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex gap-2">
                                            <button type="button" onclick="openModal('editModal-{{$car->id}}')"
                                                class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                                <i class="material-icons-round text-sm">edit</i>
                                                <span class="text-xs mr-0.5">ویرایش</span>
                                            </button>
                                            <button class="delete-btn inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200" data-route="{{route("cars.destroy", $car->id)}}" data-type="car">
                                                <i class="material-icons-round text-sm">delete</i>
                                                <span class="text-xs mr-0.5">حذف</span>
                                            </button>  
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Car Modal -->
                                <x-edit-modal :id="'editModal-'.$car->id" title="ویرایش خودرو" :action="route('cars.update', $car->id)" method='POST'>
                                    @csrf
                                    <div class="grid grid-cols-12 gap-4">
                                        <div class="col-span-4">
                                            <label for="name{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">نوع خودرو</label>
                                            <input type="text" id="name{{ $car->id }}" name="name" value="{{ $car->name }}"
                                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                        <div class="col-span-4">
                                            <label for="plate{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">پلاک</label>
                                            <div class="flex items-center gap-1 ltr">
                                                <input type="text" maxlength="2" placeholder="ایران" name="plate_iran" value="{{ $car->license_plate[3] }}"
                                                    class="w-16 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <input type="text" maxlength="3" placeholder="سه رقم" name="plate_three" value="{{ $car->license_plate[2] }}"
                                                    class="w-20 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <input type="text" maxlength="1" placeholder="حرف" name="plate_letter" value="{{ $car->license_plate[1] }}"
                                                    class="w-12 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                                <input type="text" maxlength="2" placeholder="دو رقم" name="plate_two" value="{{ $car->license_plate[0] }}"
                                                    class="w-16 px-3 py-2 text-sm text-center border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                            </div>                            
                                        </div>                        
                                        <div class="col-span-4">
                                            <label for="color{{ $car->id }}" class="block text-sm font-medium text-gray-700 mb-1">رنگ</label>
                                            <input type="text" id="color{{ $car->id }}" name="color" value="{{ $car->color }}"
                                                class="w-full px-3 py-2 text-sm border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        </div>
                                    </div>
                                </x-edit-modal>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Bookings List -->
        <div class="md:col-span-3 bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h2 class="text-xl font-bold text-gray-800">رزروی ها</h2>
                <a href="{{ route('bookings.create', $customer->fullname) }}"
                    class="inline-flex items-center px-3 py-1.5 bg-blue-600 text-white text-sm rounded-lg hover:bg-blue-700 transition duration-200">
                     <span class="material-icons-round text-base ml-1">calendar_today</span>
                     رزرو وقت
                 </a>                 
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
                                            <button onclick="openModal('editModal-{{$booking->id}}')" 
                                                class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                                <i class="material-icons-round text-sm">edit</i>
                                                <span class="text-xs mr-0.5">ویرایش</span>
                                            </button>
                                            <button class="delete-btn inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200" data-route="{{route("bookings.destroy", $booking->id)}}" data-type="booking">
                                                <i class="material-icons-round text-sm">cancel</i>
                                                <span class="text-xs mr-0.5">کنسل کردن</span>
                                            </button>  
                                        </div>
                                    </td>
                                </tr>

                                <!-- Edit Bookings Modal -->
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
        </div>
    </div>
</div>

<x-delete-modal />
@endsection
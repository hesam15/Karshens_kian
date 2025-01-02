@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-7xl mx-auto py-4 md:py-6">
    @include('layouts.label')
    @include('layouts.confirmDeleteModal')
    
    <!-- Customer Modal -->
    <div id="customerModal" class="fixed inset-0 z-50 hidden bg-gray-900 bg-opacity-50" onclick="closeModal('customerModal')">
        <div class="fixed inset-0 flex items-center justify-center">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden max-w-4xl w-full mx-4 transform -translate-y-16" onclick="event.stopPropagation()">
                <div class="flex justify-between items-center px-4 py-3 md:px-6 md:py-4 border-b border-gray-200 bg-gray-100">
                    <h5 class="text-base md:text-xl font-semibold text-gray-800">فرم ثبت مشتری</h5>
                    <button onclick="closeModal('customerModal')" class="text-gray-500 hover:text-gray-700">
                        <span class="material-icons-round">close</span>
                    </button>
                </div>
    
                <div class="p-4 md:p-6">
                    @include('layouts.label')
                    <form action="{{route('customers.store')}}" method="POST">
                        @csrf
                        <div class="grid grid-cols-12 gap-4 md:gap-6 items-end">
                            <div class="col-span-5">
                                <label for="fullname" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">نام و نام خانوادگی</label>
                                <input type="text" name="fullname" id="fullname" class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                            <div class="col-span-5">
                                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1 md:mb-2">شماره تماس</label>
                                <input type="tel" name="phone" id="phone" class="w-full px-3 md:px-4 py-2.5 md:py-2 text-sm border border-gray-300 rounded-lg md:rounded-md focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                            </div>
                            <button type="submit" class="col-span-2 px-4 py-2.5 md:py-2 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                ثبت اطلاعات
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>    

    <!-- Customers List -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h4 class="text-xl font-bold text-gray-800">لیست مشتریان</h4>
            <a href="#" onclick="openModal('customerModal'); return false;" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن مشتری جدید
            </a>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">نام مشتری</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">شماره تلفن</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">نوبت ها</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($customers as $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-base text-gray-900 w-1/4">{{ $customer->fullname }}</td>
                            <td class="px-4 py-2 text-base text-gray-900 w-1/4">{{ $customer->phone }}</td>
                            <td class="px-4 py-2 text-base text-gray-900 w-1/4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('customers.create', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                        <i class="material-icons-round text-sm">list_alt</i>
                                        <span class="text-xs mr-0.5">تمام نوبت ها</span>
                                    </a>
                                    <a href="{{ route('booking.create', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                        <i class="material-icons-round text-sm">event_available</i>
                                        <span class="text-xs mr-0.5">نوبت جدید</span>
                                    </a>
                                </div>
                            </td>
                            <td class="px-4 py-2 w-1/4">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                        <i class="material-icons-round text-sm">edit</i>
                                        <span class="text-xs mr-0.5">ویرایش</span>
                                    </a>
                                    <button class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200 delete-btn" data-route="{{ route('customers.destroy', $customer->id) }}">
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
</div>

@endsection
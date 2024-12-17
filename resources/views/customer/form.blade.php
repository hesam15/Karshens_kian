@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">فرم ثبت خودرو</h5>
        </div>

        <div class="p-6">
            @if(Session("success"))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    با موفقیت ثبت شد.
                </div>
            @endif

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{$error}}
                    </div>
                @endforeach
            @endif

            <form action="{{route('storeCustomer.form')}}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">نام و نام خانوادگی:</label>
                    <input type="text" name="name" id="name"
                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>

                <div>
                    <label for="carModel" class="block text-sm font-medium text-gray-700 mb-2">اسم خودرو:</label>
                    <input type="text" name="car" id="carModel"
                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>

                <div>
                    <label for="mobile" class="block text-sm font-medium text-gray-700 mb-2">شماره تماس:</label>
                    <input type="text" name="mobile" id="mobile"
                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>

                <div>
                    <label for="date-picker" class="block text-sm font-medium text-gray-700 mb-2">تاریخ:</label>
                    <input type="text" id="date-picker" name="date" readonly
                           class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                </div>

                <button type="submit"
                        class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 text-base font-medium">
                    ثبت نوبت
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
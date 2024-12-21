@extends('layouts.app')

@section('title', 'فرم ثبت خودرو')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">فرم ثبت خودرو</h5>
        </div>

        <div class="p-6">
            <form action="" method="POST">
                @csrf
                <input type="text" id="datepicker" name="date" value="{{$time}}">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">رزرو</button>
            </form>
        </div>
    </div>
</div>
@endsection
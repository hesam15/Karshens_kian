@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-6xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">لیست آپشن ها</h5>
        </div>

        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="w-2/5 px-4 py-3 text-right text-sm font-medium text-gray-500">نام آپشن</th>
                        <th class="w-2/5 px-4 py-3 text-right text-sm font-medium text-gray-500">آپشن ها</th>
                        <th class="w-1/5 px-4 py-3 text-right text-sm font-medium text-gray-500">عملیات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @if($options->isEmpty())
                        <tr>
                            <td colspan="3" class="px-4 py-8">
                                <div class="text-center">
                                    <span class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg">
                                        <i class="material-icons-round text-lg ml-2">info</i>
                                        خدمتی وجود ندارد
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @else
                        @foreach($options as $option)
                        @php
                            $values = json_decode($option->values);
                        @endphp
                        <tr>
                            <td class="px-4 py-4">
                                <h5 class="text-base font-medium text-gray-900">{{$option->name}}</h5>
                            </td>
                            <td class="px-4 py-4">
                                <button type="button" 
                                        class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#option{{$option->id}}">
                                    مشاهده آپشن ها
                                </button>
                            </td>
                            <td class="px-4 py-4">
                                <a href="{{route('edit.option', ['id'=>$option->id])}}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                    ادیت آپشن
                                </a>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div class="modal fade" id="option{{$option->id}}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="bg-white rounded-lg shadow-xl">
                                    <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                                        <h5 class="text-lg font-semibold text-gray-800">{{$option->name}}</h5>
                                        <button type="button" class="text-gray-400 hover:text-gray-500" data-bs-dismiss="modal">
                                            <span class="material-icons-round">close</span>
                                        </button>
                                    </div>
                                    <div class="p-6">
                                        <table class="w-full">
                                            <thead>
                                                <tr class="border-b border-gray-200">
                                                    <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">نام آپشن</th>
                                                    <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">مقادیر آپشن</th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @foreach($values as $key => $value)
                                                <tr>
                                                    <td class="px-4 py-3 text-sm text-gray-900">{{$key}}</td>
                                                    <td class="px-4 py-3 text-sm text-gray-900">
                                                        @foreach($value as $val)
                                                            {{ $val }}@if(!$loop->last),@endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
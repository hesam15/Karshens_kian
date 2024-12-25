@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-4 md:py-6">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">مدیریت خدمات</h5>
            <a href="{{ route('create.option') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن خدمت جدید
            </a>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-right text-sm font-medium text-gray-700">نام خدمت</th>
                            <th class="px-4 py-3 text-right text-sm font-medium text-gray-700">آپشن‌ها</th>
                            <th class="px-4 py-3 text-right text-sm font-medium text-gray-700">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($options as $option)
                        <tr>
                            <td class="px-4 py-4">
                                <h5 class="text-base font-medium text-gray-900">{{ $option->name }}</h5>
                            </td>
                            <td class="px-4 py-4">
                                <button onclick="openModal('modal{{ $option->id }}')"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                    <i class="material-icons-round text-sm">visibility</i>
                                    <span class="text-xs mr-1.5">مشاهده آپشن ها</span>
                                </button>
                            
                            </td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('edit.option', $option->id) }}"
                                        class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                        <i class="material-icons-round text-sm">edit</i>
                                        <span class="text-xs mr-0.5">ویرایش</span>
                                    </a>
                                    {{-- <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="p-2 bg-red-100 text-red-800 rounded-lg hover:bg-red-200 transition-colors duration-200">
                                            <span class="material-icons-round">delete</span>
                                        </button>
                                    </form> --}}
                                </div>
                            </td>
                        </tr>

                        <!-- Modal -->
                        <div id="modal{{ $option->id }}" class="fixed inset-0 z-50 hidden">
                            <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
                            <div class="fixed inset-0 z-50 flex items-center justify-center p-4">
                                <div class="bg-white rounded-lg shadow-xl max-w-md w-full">
                                    <div class="flex items-center justify-between p-4 border-b">
                                        <h3 class="text-lg font-medium text-gray-900">
                                            آپشن‌های {{ $option->name }}
                                        </h3>
                                        <button onclick="closeModal('modal{{ $option->id }}')" class="text-gray-400 hover:text-gray-500">
                                            <span class="material-icons-round">close</span>
                                        </button>
                                    </div>
                                    <div class="p-4">
                                        <ul class="space-y-3">
                                            @foreach($suboptions as $suboption)
                                            @foreach(json_decode($suboption) as $key => $values)
                                                <li class="flex items-center justify-between py-2 px-3 bg-gray-50 rounded-lg">
                                                    <span class="text-gray-800">{{$key}}</span>
                                                    <span class="text-gray-600">
                                                        @foreach($values as $index => $value)
                                                            {{ $value }}{{ !$loop->last ? '، ' : '' }}
                                                        @endforeach
                                                    </span>
                                                </li>
                                            @endforeach
                                        @endforeach                                        
                                        </ul>
                                    </div>
                                    <div class="flex justify-end p-4 border-t">
                                        <button onclick="closeModal('modal{{ $option->id }}')" 
                                                class="px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                            بستن
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

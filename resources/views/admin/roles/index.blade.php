@extends('layouts.app')

@section('content')
@include('layouts.label')

<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">لیست نقش‌ها</h5>
            <a href="{{ route('roles.create') }}" 
               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                افزودن نقش جدید
            </a>
        </div>

        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">#</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">نام انگلیسی</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">نام فارسی</th>
                        <th class="px-4 py-3 text-right text-sm font-medium text-gray-500">دسترسی ها</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($roles as $role)
                        <tr>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $role->name }}</td>
                            <td class="px-4 py-4 text-sm text-gray-900">{{ $role->persian_name }}</td>
                            <td class="px-4 py-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('roles.edit', $role->id) }}" 
                                       class="inline-flex items-center px-3 py-1.5 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                        ویرایش
                                    </a>
                                    <button class="inline-flex items-center px-3 py-1.5 bg-rose-100 text-rose-800 rounded-lg hover:bg-rose-200 transition-colors duration-200">
                                        حذف
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-8">
                                <div class="text-center">
                                    <span class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg">
                                        <i class="material-icons-round text-lg ml-2">info</i>
                                        هیچ نقشی یافت نشد
                                    </span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
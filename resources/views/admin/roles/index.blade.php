@extends('layouts.app')

@section('content')
@include('layouts.label')

<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-100">
            <h5 class="text-xl font-semibold text-gray-800">لیست نقش‌ها</h5>
            <a href="{{ route('roles.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن نقش جدید
            </a>
        </div>

        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="px-6 py-2 text-right text-sm font-medium text-gray-500 w-1/12">#</th>
                        <th class="px-6 py-2 text-right text-sm font-medium text-gray-500 w-3/12">نام انگلیسی</th>
                        <th class="px-6 py-2 text-right text-sm font-medium text-gray-500 w-3/12">نام فارسی</th>
                        <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-2/12">عملیات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($roles as $role)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-2 text-sm text-gray-900">{{ $loop->iteration }}</td>
                        <td class="px-6 py-2 text-base text-gray-900">{{ $role->name }}</td>
                        <td class="px-6 py-2 text-base text-gray-900">{{ $role->persian_name }}</td>
                        <td class="px-4 py-2">
                            <div class="flex items-center gap-1">
                                <a href="{{ route('roles.edit', $role->id) }}"
                                    class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                    <i class="material-icons-round text-sm">edit</i>
                                    <span class="text-xs mr-0.5">ویرایش</span>
                                </a>
                                <button class="inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200 delete-btn" data-route = "{{ route('roles.destroy', $role->id) }}">
                                    <i class="material-icons-round text-sm">delete</i>
                                    <span class="text-xs mr-0.5">حذف</span>
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

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید حذف نقش</h5>
                <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-500">
                    <span class="material-icons-round text-base">close</span>
                </button>
            </div>

            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از حذف این نقش اطمینان دارید؟</p>
            </div>

            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button type="button" id="cancelBtn" class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-200">
                    انصراف
                </button>
                <form method="POST" id="deleteForm">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm transition duration-200">
                        حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
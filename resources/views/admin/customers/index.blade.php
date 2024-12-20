@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-7xl mx-auto">
    @include('layouts.label')
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h4 class="text-xl font-bold text-gray-800">لیست مشتریان</h4>
            <a href="{{ route('customers.create') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن مشتری جدید
            </a>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-2 text-right text-sm font-medium text-gray-500 w-2/5">نام مشتری</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-2/5">ایمیل</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/5">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($customers as $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-2 text-base text-gray-900">{{ $customer->name }}</td>
                            <td class="px-4 py-2 text-base text-gray-900">{{ $customer->email }}</td>
                            <td class="px-4 py-2">
                                <div class="flex items-center gap-1">
                                    <a href="{{ route('customers.edit', $customer->id) }}" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                        <i class="material-icons-round text-sm">edit</i>
                                        <span class="text-xs mr-0.5">ویرایش</span>
                                    </a>
                                    <button type="button" class="delete-btn inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200" data-route="{{ route("customers.destroy", $customer->id) }}">
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

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید حذف مشتری</h5>
                <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-500">
                    <span class="material-icons-round text-base">close</span>
                </button>
            </div>

            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از حذف این مشتری اطمینان دارید؟</p>
            </div>

            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button type="button" id="cancelBtn"
                    class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-200">
                    انصراف
                </button>
                <form method="POST" id="deleteForm" action="">
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
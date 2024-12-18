@extends('layouts.app')

@section('title', 'ویرایش کاربر')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
            <h4 class="text-xl font-bold text-gray-800">ویرایش کاربر {{ $user->name }}</h4>
            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-800 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                بازگشت
            </a>
        </div>

        <!-- Form -->
        <div class="p-6">
            <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                @csrf
                <!-- Name Input -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نام کاربر</label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Role Select -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">نقش کاربر</label>
                    <select name="role" class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                {{ $role->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('role')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between pt-4">
                    <button type="submit" class="flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                        <span class="material-icons-round text-xl ml-2">save</span>
                        ذخیره تغییرات
                    </button>

                    <button type="button" class="delete-btn flex items-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200" data-user-id="{{ $user->id }}">
                        <span class="material-icons-round text-xl ml-2">delete</span>
                        حذف کاربر
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 hidden">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-lg shadow-xl w-96">
            <div class="px-4 py-3 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-base font-bold text-gray-800">تایید حذف کاربر</h5>
                <button type="button" id="closeModal" class="text-gray-400 hover:text-gray-500">
                    <span class="material-icons-round text-base">close</span>
                </button>
            </div>

            <div class="px-4 py-3">
                <p class="text-sm text-gray-600">آیا از حذف این کاربر اطمینان دارید؟</p>
            </div>

            <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 flex justify-end gap-2">
                <button type="button" id="cancelBtn" class="px-3 py-1.5 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-md text-sm transition duration-200">
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
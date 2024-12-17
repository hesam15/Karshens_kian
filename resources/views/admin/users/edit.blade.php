@extends('layouts.app')

@section('title', 'ویرایش کاربر')

@section('content')
<div class="min-h-screen bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <!-- Header -->
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-100">
                <h4 class="text-xl font-bold text-gray-800">ویرایش کاربر {{ $user->name }}</h4>
            </div>

            <!-- Form -->
            <div class="p-6">
                <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Name Input -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نام کاربر</label>
                        <input type="text" name="name" value="{{ $user->name }}"
                               class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>

                    <!-- Role Select -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">نقش کاربر</label>
                        <select name="role" class="w-full h-10 px-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex justify-between pt-4">
                        <button type="submit" class="flex items-center px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition duration-200">
                            <span class="material-icons-round text-xl ml-2">save</span>
                            ذخیره تغییرات
                        </button>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"
                                class="flex items-center px-6 py-2.5 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200">
                            <span class="material-icons-round text-xl ml-2">delete</span>
                            حذف کاربر
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="bg-white rounded-xl shadow-xl">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                <h5 class="text-lg font-bold text-gray-800">تایید حذف کاربر</h5>
                <button type="button" class="text-gray-400 hover:text-gray-500" data-bs-dismiss="modal">
                    <span class="material-icons-round">close</span>
                </button>
            </div>

            <div class="px-6 py-4">
                <p class="text-gray-600">آیا از حذف این کاربر اطمینان دارید؟</p>
            </div>

            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="flex justify-end gap-3">
                    @csrf
                    @method('DELETE')
                    <button type="button" data-bs-dismiss="modal"
                            class="px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-lg transition duration-200">
                        انصراف
                    </button>
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition duration-200">
                        حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-7xl mx-auto py-4 md:py-6">
    @include('layouts.label')
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h4 class="text-xl font-bold text-gray-800">لیست کاربران</h4>
            <a href="{{ route('users.create') }}" class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن کاربر جدید
            </a>
        </div>

        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-2 text-right text-sm font-medium text-gray-500 w-1/4">نام کاربر</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">نقش</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">شماره تلفن</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500 w-1/4">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                            <!-- ادیت شماره تلفن -->            
                            <x-edit-modal :id="'editModal-phone-'.$user->id" title="تغییر شماره تلفن" :action="route('users.update.phone', $user->id)" method='POST'>
                                @csrf
                                <div>
                                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">شماره تلفن</label>
                                    <div class="relative">
                                        <input type="phone" id="phone-{{$user->id}}" name="phone" value="{{ old('phone') }}"
                                        placeholder="شماره تلفن خود را وارد کنید"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 placeholder-gray-400">
                                        <button type="button"
                                            class="verify-phone-btn absolute left-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200 text-sm" 
                                            data-phone-id="{{$user->id}}">
                                            ارسال کد تایید
                                        </button>                                    
                                    </div>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>
                            </x-edit-modal>

                            <!-- ادیت اطلاعات کاربر -->
                            <x-edit-modal :id="'editModal-'.$user->id" title="ویرایش کاربر" :action="route('users.update', $user->id)" method='POST'>
                                @csrf
                                <div class="grid grid-cols-2 gap-4 mt-4">
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">نام کاربر</label>
                                        <input type="text" name="name" value="{{ old('name', $user->name) }}" class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                                        @error('name')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                
                                    <div>
                                        <label class="block text-sm font-medium text-gray-700 mb-2">ایمیل</label>
                                        <input type="email" name="email" value="{{ old('email', $user->email) }}" class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                                        @error('email')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">نقش کاربر</label>
                                    <select name="role" class="w-full px-4 py-2.5 rounded-lg border-2 border-gray-200 focus:border-blue-500 focus:ring-blue-500 transition-colors duration-200">
                                        @foreach($roles as $role)
                                            <option value="{{ $role->id }}" {{ $user->role->id == $role->id ? 'selected' : '' }}>
                                                {{ $role->persian_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('role')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>               
                            </x-edit-modal>

                            <tr class="hover:bg-gray-50">
                                <td class="py-2 text-base text-gray-900">{{ $user->name }}</td>
                                <td class="px-4 py-2">
                                    <span class="inline-flex items-center px-2 py-1 rounded-lg text-sm font-medium bg-blue-100 text-blue-800">
                                        {{ $user->role->persian_name }}
                                    </span>
                                </td>
                                <td class="py-2 text-base text-gray-900">
                                    <div class="flex items-center justify-start gap-2">
                                        <span>{{$user->phone}}</span>
                                        <button onclick="openModal('editModal-phone-{{$user->id}}')" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">edit</i>
                                        </button>
                                    </div>
                                </td>
                                <td class="py-2">
                                    <div class="flex items-center gap-1">
                                        <button onclick="openModal('editModal-{{$user->id}}')" class="inline-flex items-center px-2 py-1 bg-blue-100 text-blue-800 rounded hover:bg-blue-200 transition-colors duration-200">
                                            <i class="material-icons-round text-sm">edit</i>
                                            <span class="text-xs mr-0.5">ویرایش</span>
                                        </button>
                                        <button type="button" class="delete-btn inline-flex items-center px-2 py-1 bg-rose-100 text-rose-800 rounded hover:bg-rose-200 transition-colors duration-200" data-route="{{ route("users.destroy", $user->id) }}">
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

<x-delete-modal />
@endsection
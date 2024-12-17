@extends('layouts.app')

@section('title', 'داشبورد')

@section('content')
<div class="max-w-7xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden ">
        <div class="flex justify-between items-center px-6 py-4 border-b border-gray-200 bg-gray-100">
            <h4 class="text-xl font-bold text-gray-800">لیست کاربران</h4>
            <a href="{{ route('users.create') }}" 
               class="flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition duration-200">
                <span class="material-icons-round text-xl ml-2">add</span>
                افزودن کاربر جدید
            </a>
        </div>
    
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">نام کاربر</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">نقش</th>
                            <th class="px-4 py-2 text-right text-sm font-medium text-gray-500">عملیات</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $user->name }}</td>
                            <td class="px-4 py-2">
                                @foreach($user->roles as $role)
                                <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-sm font-medium bg-blue-100 text-blue-800">
                                    {{ $role->name }}
                                </span>
                                @endforeach
                            </td>                        
                            <td class="px-4 py-2">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('users.edit', $user->id) }}" 
                                        class="inline-flex items-center gap-1 px-2 py-2 bg-blue-100 text-blue-800 rounded-lg hover:bg-blue-200 transition-colors duration-200">
                                         <i class="material-icons-round text-lg">edit</i>
                                         <span>ویرایش</span>
                                     </a>
                                     
                                    
                                    {{-- <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center gap-1 px-2.5 py-2.5 bg-rose-100 text-rose-800 rounded-lg hover:bg-rose-200 transition-colors duration-200">
                                        <i class="material-icons-round text-lg">delete</i>
                                        <span>حذف</span>
                                    </button>
                                    </form> --}}
                                    
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
@endsection
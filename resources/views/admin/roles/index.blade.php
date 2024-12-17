@extends('layouts.app')

@section('content')
@include('layouts.label')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">لیست نقش‌ها</h5>
                    <a href="{{ route('roles.create') }}" class="btn btn-primary">افزودن نقش جدید</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>نام انگلیسی</th>
                                <th>نام فارسی</th>
                                <th>دسترسی ها</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($roles as $role)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $role->name }}</td>
                                <td>{{ $role->persian_name }}</td>
                                <td>
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm btn-info">ویرایش</a>
                                    <button class="btn btn-sm btn-danger">حذف</button>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center">هیچ نقشی یافت نشد</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

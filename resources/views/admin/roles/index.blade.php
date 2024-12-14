@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">افزودن نقش جدید</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('roles.store') }}" method="POST" class="row">
                        @csrf
                        <div class="col-md-5">
                            <input type="text" name="name" class="form-control" placeholder="نام انگلیسی" required>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="persian_name" class="form-control" placeholder="نام فارسی" required>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">ذخیره</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">لیست نقش‌ها</h5>
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
</div>
@endsection

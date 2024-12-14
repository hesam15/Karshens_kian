@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ویرایش نقش</h5>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">بازگشت</a>
                </div>

                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label class="form-label">نام انگلیسی</label>
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
                                    value="{{ old('name', $role->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col-md-6">
                                <label class="form-label">نام فارسی</label>
                                <input type="text" name="persian_name" class="form-control @error('persian_name') is-invalid @enderror" 
                                    value="{{ old('persian_name', $role->persian_name) }}" required>
                                @error('persian_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <label class="form-label mb-0">دسترسی‌ها</label>
                                    <a href="{{ route('permissions.create') }}" class="btn btn-sm btn-primary">ایجاد دسترسی جدید</a>
                                </div>
                                
                                @if($permissions->count() > 0)
                                    <div class="row">
                                        @foreach($permissions as $permission)
                                        <div class="col-md-3 mb-2">
                                            <div class="form-check">
                                                <input type="checkbox" 
                                                       name="permissions[]" 
                                                       value="{{ $permission->id }}" 
                                                       class="form-check-input"
                                                       id="perm_{{ $permission->id }}"
                                                       {{ in_array($permission->id, old('permissions', $role->permissions->pluck('id')->toArray())) ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perm_{{ $permission->id }}">
                                                    {{ $permission->persian_name }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="text-center py-3">
                                        <p class="text-muted mb-0">هیچ دسترسی در سیستم تعریف نشده است</p>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">بروزرسانی</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
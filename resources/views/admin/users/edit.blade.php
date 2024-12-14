@extends('layouts.app')

@section('title', 'ویرایش کاربر')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>ویرایش کاربر {{ $user->name }}</h4>
                </div>
                <div class="card-body">
                    @extends('layouts.label')

                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label class="form-label">نام کاربر</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">نقش کاربر</label>
                            <select name="role" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" 
                                        {{ $user->roles->contains($role->id) ? 'selected' : '' }}>
                                        {{ $role->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="material-icons">save</i>
                                ذخیره تغییرات
                            </button>

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <i class="material-icons">delete</i>
                                حذف کاربر
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

{{-- <!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">تایید حذف کاربر</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                آیا از حذف این کاربر اطمینان دارید؟
            </div>
            <div class="modal-footer">
                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">انصراف</button>
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}
@endsection

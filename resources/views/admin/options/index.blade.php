@extends('layouts.app')
@section('title' , 'داشبورد')
@section('content')
    <div class="card" style="width:75%;margin:0 auto;">
        <div class="card-header">
            <h5>لیست آپشن ها</h5>
        </div>
        <div class="card-body">
            <table class="table mt-4" style="width: 100%;">
                <tr>
                    <th style="width: 40%">نام آپشن</th>
                    <th style="width: 40%">آپشن ها</th>
                    <th style="width: 20%">عملیات</th>
                </tr>                
                @foreach($options as $option)
                    @php
                        $values = json_decode($option->values);
                    @endphp
                    {{-- سطر جدول --}}
                    <tr>
                        <td class="align-middle py-4" style="width: 40%; vertical-align: middle;"><h5 class="mb-0">{{$option->name}}</h5></td>
                        <td class="align-middle" style="width: 40%">
                            <button type="button" class="btn btn-primary mb-0" data-bs-toggle="modal" data-bs-target="#option{{$option->id}}">
                                مشاهده آپشن ها
                            </button>
                        </td>
                        <td class="align-middle" style="width: 20%">
                            <a class="btn btn-info mb-0" href="{{route("edit.option", ['id'=>$option->id])}}">ادیت آپشن</a>
                        </td>
                    </tr>                                                                                                 
            
                    {{-- مودال مربوطه بلافاصله بعد از سطر --}}
                    <tr>
                        <td colspan="2" style="padding: 0;">
                            <div class="modal fade" id="option{{$option->id}}" tabindex="-1" aria-labelledby="optionLabel{{$option->id}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header d-flex bg-body-tertiary">
                                            <h5 class="modal-title" id="optionLabel{{$option->id}}">{{$option->name}}</h5>
                                            <button type="button" class="btn-close ms-0" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>                                                                                                                                                       
                                        <div class="modal-body">
                                            <table class="table">
                                                <tr>
                                                    <th>نام آپشن</th>
                                                    <th>مقادیر آپشن</th>
                                                </tr>
                                                @foreach($values as $key => $value)
                                                    <tr>
                                                        <td>{{$key}}</td>
                                                        <td>
                                                            @foreach($value as $val)
                                                                {{ $val }}@if(!$loop->last),@endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
            

            {{-- <!-- Pagination Links -->
            <div class="mt-4">
                <nav aria-label="Page navigation">
                    <ul class="justify-content-center">
                        {{ $options->links('vendor.pagination.bootstrap-4') }}
                    </ul>
                </nav>
            </div> --}}
        </div>
    </div>
@endsection
@if(Session("success"))
<div class="alert alert-success" style="color:white;">
    با موفقیت ثبت شد.
</div>
@endif
@if($errors->any())
@foreach($errors->all() as $error)
    <div class="alert alert-danger">
        {{$error}}
    </div>
@endforeach
@endif
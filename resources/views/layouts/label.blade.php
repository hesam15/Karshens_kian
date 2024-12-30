@if(Session("success"))
    <div class="p-4 mb-4 bg-green-500 text-white rounded-lg shadow">
        {{ Session("success") }}
    </div>
@endif

@if(Session("error"))
        <div class="p-4 mb-4 bg-red-500 text-white rounded-lg shadow">
            {{ Session("error") }}
        </div>
@endif
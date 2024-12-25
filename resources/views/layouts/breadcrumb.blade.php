@unless ($breadcrumbs->isEmpty())
<div class="flex items-center text-sm ps-4 py-2">
        @foreach ($breadcrumbs as $breadcrumb)

            @if (!is_null($breadcrumb->url) && !$loop->last)
                <a class="text-gray-500" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a>
                <i class="material-icons-round text-gray-400 text-base mx-2">chevron_left</i>
            @else
                <span class="text-gray-500">{{ $breadcrumb->title }}</span>
            @endif

        @endforeach
</div>
@endunless

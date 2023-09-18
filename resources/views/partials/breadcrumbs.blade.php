@if (isset($crumb))
    <div class="breadcrumbs">
        <div class="container_12">
            <div class="grid_12">
                <a href="{{route("index")}}">Home</a><span></span>
                @foreach ($crumb as $key => $item)
                    <a href="#">{{ $item }}</a>
                    @if ($key === count($crumb))
                        <span></span><span class="current">{{ $item }}</span>
                    @endif
                @endforeach

            </div><!-- .grid_12 -->
        </div><!-- .container_12 -->
    </div><!-- .breadcrumbs -->
@endif

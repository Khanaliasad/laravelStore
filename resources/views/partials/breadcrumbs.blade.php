@if (isset($crumb))
    <div class="breadcrumbs">
        <div class="container_12">
            <div class="grid_12">
                <a href="{{ route('index') }}">Home</a><span></span>
                @foreach ($crumb as $index => $item)
                    @if ($index === count($crumb) - 1)
                        <span class="current">{{ $item }}</span>
                    @else
                        <a href="#">{{ $item }}</a><span></span>
                    @endif
                @endforeach

            </div><!-- .grid_12 -->
        </div><!-- .container_12 -->
    </div><!-- .breadcrumbs -->
@endif

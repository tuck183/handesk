<li>
    <a href="{{ $url }}" class=" waves-effect">
        <i class="bx bxs-eraser"></i>
        <span>{{ $title }}</span>
        @if( isset($count) )
        @include('components.sidebarLabel', compact("count"))
        @endif
    </a>
</li>
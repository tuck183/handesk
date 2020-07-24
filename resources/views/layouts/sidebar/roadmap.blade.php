@if(auth()->user()->admin)
<li class="menu-title">{{ __('idea.roadmap') }}</li>

@include('components.sidebarItem', ["url" => route('ideas.index').'?pending=true', "title" =>
trans_choice('idea.pendingIdea', 2) ])
@include('components.sidebarItem', ["url" => route('ideas.index').'?ongoing=true', "title" => trans_choice('idea.idea',
2) ])
@include('components.sidebarItem', ["url" => route('roadmap.index'), "title" => trans_choice('idea.roadmap', 1) ])
<li>
    @endif
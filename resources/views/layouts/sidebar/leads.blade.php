<li class="menu-title">{{ trans_choice('lead.lead', 2) }}</li>


<li>
    @php ( $repository = new App\Repositories\LeadsRepository )
    @include('components.sidebarItem', ["url" => route('leads.index'). "?all=true", "title" => trans_choice('lead.lead',
    2), "count" => $repository->all() ->count()] )
    @include('components.sidebarItem', ["url" => route('leads.index'). "?mine=true", "title" =>
    trans_choice('lead.mine', 2), "count" => $repository->assignedToMe() ->count()] )
    @include('components.sidebarItem', ["url" => route('tasks.index'), "title" => __('lead.todayTasks'), "count" =>
    auth()->user()->todayTasks() ->count()] )
    @include('components.sidebarItem', ["url" => route('leads.index'). "?completed=true", "title" =>
    trans_choice('lead.completed', 2) ])
    @include('components.sidebarItem', ["url" => route('leads.index'). "?failed=true", "title" =>
    trans_choice('lead.failed', 2) ])
</li>
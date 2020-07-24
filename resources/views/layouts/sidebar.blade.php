<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="#" class="waves-effect">
                        <i class="bx bx-home-circle"></i><span class="badge badge-pill badge-info float-right">03</span>
                        <span>Dashboards</span>
                    </a>
                </li>

                {{-- <li class="menu-title">Apps</li> --}}

                @include('layouts.sidebar.tickets')
                @if (config('handesk.leads'))
                @include('layouts.sidebar.leads')
                @endif
                @if (config('handesk.roadmap'))
                @include('layouts.sidebar.roadmap')
                @endif


                @if (auth()->user()->can_see_reports)
                <li class="menu-title">{{ trans_choice('report.report', 2) }}</li>
                <li>
                    @include('components.sidebarItem', ["url" => route('reports.index'), "title" =>
                    trans_choice('report.report', 2)
                    ])
                    @include('components.sidebarItem', ["url" => route('reports.analytics'), "title" =>
                    trans_choice('report.analytics', 1) ])
                </li>
                @endif

                <li class="menu-title">{{ trans_choice('admin.admin',2) }}</li>

                <li>
                    @include('components.sidebarItem', ["url" => route('teams.index'), "title" =>
                    trans_choice('team.team', 2) ])
                    @if(auth()->user()->admin)
                    @include('components.sidebarItem', ["url" => route('users.index'), "title" =>
                    trans_choice('ticket.user', 2) ])
                    @include('components.sidebarItem', ["url" => route('settings.edit', 1), "title" =>
                    trans_choice('setting.setting', 2) ])
                    @include('components.sidebarItem', ["url" => route('ticketTypes.index', 1), "title" =>
                    trans_choice('ticket.ticketType', 2) ])
                    @endif
                </li>


            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
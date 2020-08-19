@extends('layouts.app')
@section('content')
<div class="description comment">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">

                <p class="mb-0 font-size-14">Ticket ID - #{{ $ticket->id }}</p>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('tickets.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tickets</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card overflow-hidden">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="card-title mb-4">Ticket Information</h4>
                        <div class="mb2">
                            @include('components.ticket.rating')
                        </div>
                        <div class="row mb-2">
                            @include('components.ticket.actions')
                        </div>
                        @include('components.ticket.header')
                    </div>

                    <div class="col-sm-12">
                        <div class="pt-2">
                            <p class="mb-2 font-size-14 capitalize">Title: {{ $ticket->title }}</p>
                            <p class="text-muted mb-4">
                                Details: <br>

                                Hi I'm Cynthia Price,has been the industry's standard dummy text To
                                an
                                English person, it will seem like simplified English, as a skeptical Cambridge.</p>

                            <div class="mt-4">
                                <a href="#" class="btn btn-primary waves-effect waves-light btn-sm">View Profile <i
                                        class="mdi mdi-arrow-right ml-1"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Assign</h4>
                @if( $ticket->canBeEdited() )
                @include('components.assignActions', ["endpoint" => "tickets", "object" => $ticket])
                @endif

            </div>
        </div>
        <!-- end card -->

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-5">Actions Taken</h4>
                <div class="">
                    <ul class="verti-timeline list-unstyled">
                        <li class="event-list">
                            <div class="event-timeline-dot">
                                <i class="bx bx bx-check "></i>
                            </div>
                            <div class="media">
                                <div class="media-body">
                                    <div>
                                        <p class="text-muted mb-0">Michelle Cartwright • Status updated: open • </p>
                                        <span class="text-primary">12th October</span>
                                    </div>
                                </div>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>
        </div>
        <!-- end card -->
    </div>

    <div class="col-xl-8">

        <div class="row mb-4">
            <div class="col-lg-12 ">
                <div class="col-lg-12 bg-white">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Resolution Timeline</h4>
                        <div class="hori-timeline">
                            <div class="owl-carousel owl-theme  navs-carousel events" id="timeline-carousel">
                                <div class="item event-list">
                                    <div>
                                        <div class="event-date">
                                            <p class="mb-2">Received</p>
                                        </div>
                                        <div class="event-down-icon active">
                                            <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="item event-list">
                                    <div>
                                        <div class="event-date">
                                            <p class="mb-2">Assessment</p>
                                        </div>
                                        <div class="event-down-icon active">
                                            <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="item event-list active">
                                    <div>
                                        <div class="event-date">
                                            <p class="mb-2">Investigated</p>
                                        </div>
                                        <div class="event-down-icon">
                                            <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="item event-list">
                                    <div>
                                        <div class="event-date">
                                            <p class="mb-2">Decision</p>
                                        </div>
                                        <div class="event-down-icon">
                                            <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="item event-list">
                                    <div>
                                        <div class="event-date">
                                            <p class="mb-2">Closed</p>
                                        </div>
                                        <div class="event-down-icon">
                                            <i class="bx bx-down-arrow-circle h1 text-primary down-arrow-icon"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- end --}}


        <div class="card">
            <div class="card-body">

                @if( $ticket->canBeEdited() )
                <div class="comment new-comment">
                    {{ Form::open(["url" => route("comments.store", $ticket) , "files" => true, "id" => "comment-form"]) }}
                    <textarea id="comment-text-area"
                        name="body">@if(auth()->user()->settings->tickets_signature)&#13;&#13;{{ auth()->user()->settings->tickets_signature }}@endif</textarea>
                    @include('components.uploadAttachment', ["attachable" => $ticket, "type" => "tickets"])
                    {{ Form::hidden('new_status', $ticket->status, ["id" => "new_status"]) }}
                    @if($ticket->isEscalated() )
                    <button class="mt1 btn btn-primary waves-effect waves-light btn-sm"> @icon(comment)
                        {{ __('ticket.note') }} </button>
                    @else
                    <div class="mb1">
                        {{ __('ticket.note') }}: {{ Form::checkbox('private') }}
                    </div>
                    <button class="mt1 btn btn-primary waves-effect waves-light btn-sm"> @icon(comment)
                        {{ __('ticket.commentAs') }}
                        {{ $ticket->statusName() }}</button>
                    <span class="dropdown button caret-down"> @icon(caret-down) </span>
                    <ul class="dropdown-container">
                        <li><a class="pointer" onClick="setStatusAndSubmit( {{ App\Ticket::STATUS_OPEN    }} )">
                                <div style="width:10px; height:10px" class="circle inline ticket-status-open mr1"></div>
                                {{ __('ticket.commentAs') }} <b>{{ __("ticket.open") }} </b>
                            </a></li>
                        <li><a class="pointer" onClick="setStatusAndSubmit( {{ App\Ticket::STATUS_PENDING }} )">
                                <div style="width:10px; height:10px" class="circle inline ticket-status-pending mr1">
                                </div>
                                {{ __('ticket.commentAs') }} <b>{{ __("ticket.pending") }}</b>
                            </a></li>
                        <li><a class="pointer" onClick="setStatusAndSubmit( {{ App\Ticket::STATUS_SOLVED  }} )">
                                <div style="width:10px; height:10px" class="circle inline ticket-status-solved mr1">
                                </div>
                                {{ __('ticket.commentAs') }} <b>{{ __("ticket.solved") }} </b>
                            </a></li>
                    </ul>
                    @endif
                    {{ Form::close() }}
                </div>
                @endif

                @include('components.ticketComments', ["comments" =>
                $ticket->commentsAndNotesAndEvents()->sortBy('created_at')->reverse() ])

            </div>
        </div>
    </div>
</div>
<!-- end row -->
@endsection

@section('scripts')
@include('components.js.taggableInput', ["el" => "tags", "endpoint" => "tickets", "object" => $ticket])
<!-- timeline init js -->
<!-- owl.carousel js -->
<script src="{{ asset('assets/libs/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/timeline.init.js') }}"></script>

<script>
    function setStatusAndSubmit(new_status){
            $("#new_status").val(new_status);
            $("#comment-form").submit();
        }
        $("#comment-text-area").mention({
            delimiter: '@',
            emptyQuery: true,
            typeaheadOpts: {
                items: 10 // Max number of items you want to show
            },
            users: {!! json_encode(App\Services\Mentions::arrayFor(auth()->user())) !!}
        });

</script>
@endsection
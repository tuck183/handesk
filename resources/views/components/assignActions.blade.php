<div class="">
    {{ Form::open(["url" => route("{$endpoint}.assign", $object)]) }}
    <table class="no-padding">
        <tr>
            <td class="small"> {{ trans_choice('ticket.tag',2) }}:</td>
            <td colspan="2"><input id="tags" name="tags" value="{{$object->tagsString()}}"></td>
        </tr>
        @can("assignToTeam", $object)
        @include('components.assignTeamField', ["team" => $object->team])
        @endcan
        <tr class="capitalize">
            @can("assignToTeam", $object)
            <td>{{ __('ticket.assigned') }}:</td>
            <td>{{ Form::select('user_id', App\Team::membersByTeam(), $object->user_id, ['class' => 'w100']) }}</td>
            @else
            @if ($object->team)
            <td>{{ __('ticket.assigned') }}:</td>
            <td>{{ Form::select('user_id', createSelectArray( $object->team->members, true), $object->user_id, ['class' => 'w100']) }}
            </td>
            @endif
            @endcan
        </tr>
        <tr>
            <td class="text-left" colspan="2">
                <button class="btn btn-primary waves-effect waves-light btn-sm"> {{ __('ticket.assign') }}</button>
            </td>
        </tr>
    </table>
    {{ Form::close() }}
</div>
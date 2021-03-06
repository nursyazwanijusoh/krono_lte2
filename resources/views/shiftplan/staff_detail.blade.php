@extends('adminlte::page')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@stop

@section('title', 'Shift Plan Details')

@section('content')
{{ Breadcrumbs::render('shift.staff', $sps) }}
@if($sps->status == 'Planning')
<div class="panel panel-default">
  <div class="panel-heading">{{ __('shift.add_shift_to_staff')}}</div>
  <div class="panel-body">
    @if (session()->has('alert'))
    <div class="alert alert-{{ session()->get('a_type') }} alert-dismissible">
      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <strong>{{ session()->get('alert') }}</strong>
    </div>
    @endif
    @if($filled != true)
    <form action="{{ route('shift.staff.push', [], false) }}" method="post">
      @csrf
      <input type="hidden" name="sps_id" value="{{ $sps->id }}" />
      <input type="hidden" name="sp_id" value="{{ $sps->ShiftPlan->id }}" />
      <div class="form-group has-feedback {{ $errors->has('sdate') ? 'has-error' : '' }}">
        <label for="sdate">Start Date</label>
        <input type="date" id="sdate" name="sdate" value="{{ old('sdate', $sdate) }}" min="{{ $mindate }}" max="{{ $maxdate }}" {{ $dlock }} />
        @if ($errors->has('sdate'))
            <span class="help-block">
                <strong>{{ $errors->first('sdate') }}</strong>
            </span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('spattern_id') ? 'has-error' : '' }}">
        <label for="spattern">{{ __('shift.f_shift_pattern') }}</label>
        <select class="form-control" id="spattern" name="spattern_id" required>
          @foreach($patterns as $pt)
          <option value="{{ $pt->id }}">{{ $pt->code }} : {{ $pt->description }} ({{ $pt->days_count }} days / {{ $pt->total_hours }} hours)</option>
          @endforeach
        </select>
        @if ($errors->has('spattern_id'))
            <span class="help-block">
                <strong>{{ $errors->first('spattern_id') }}</strong>
            </span>
        @endif
      </div>

      <div class="form-group text-center">
        <button type="submit" class="btn btn-primary">{{ __('shift.f_sp_append') }}</button>
      </div>
    </form>
    @endif
  </div>
</div>
@endif

<div class="panel panel-default">
  <div class="panel-heading">Assigned Schedule</div>
  <div class="panel-body">
    <div class="table-responsive">
      <table id="tPunchHIstory" class="table table-hover table-bordered">
       <thead>
         <tr>
           <th>Sequence</th>
           <th>Pattern Code</th>
           <th>Pattern Desc</th>
           <th>Total Days</th>
           <th>From</th>
           <th>Total Hours</th>
           <th>Until</th>
           <th>Action</th>
         </tr>
       </thead>
       <tbody>
         @foreach($sps->Templates as $ap)
         <tr>
           <td>{{ $ap->day_seq }}</td>
           <td>{{ $ap->Pattern->code }}</td>
           <td>{{ $ap->Pattern->description }}</td>
           <td>{{ $ap->Pattern->days_count }}</td>
           <td>{{ $ap->start_date }}</td>
           <td>{{ $ap->Pattern->total_hours }}</td>
           <td>{{ $ap->end_date }}</td>
           <td>
             @if($sps->status == 'Planning')
             @if($ap->day_seq == $sps->Templates->count())
             <form method="post" action="{{ route('shift.staff.pop', [], false) }}" onsubmit='return confirm("Confirm delete?")'>
               @csrf
               <button type="submit" class="btn btn-xs btn-danger" title="Delete"><i class="fas fa-trash-alt"></i></button>
               <input type="hidden" name="id" value="{{ $ap->id }}" />
               <input type="hidden" name="sps_id" value="{{ $sps->id }}" />
             </form>
             @endif
             @endif
           </td>
         </tr>
         @endforeach
       </tbody>
     </table>
    </div>
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">{{$sps->plan_month->format('M-Y')}}'s calendar for {{ $sps->User->name }}</div>
  <div class="panel-body">
    {!! $cal->calendar() !!}
  </div>
</div>

@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $cal->script() !!}

<script type="text/javascript">
$(document).ready(function() {
  $('#spattern').select2();
});

</script>

@stop

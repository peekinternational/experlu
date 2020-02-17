@if( \Session::has('success'))
<div class="alert alert-success">
  {{ \Session::get('success')}}
</div>
@endif
@if( \Session::has('red-alert'))
<div class="alert alert-danger">
  {{ \Session::get('red-alert')}}
</div>
@endif

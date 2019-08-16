@extends('layouts.app')

	@section('content')
	<div class="container">
	<div class="row">
  <private-message-sidebar></private-message-sidebar>
  <div class="col-9">
    <div class="tab-content" id="nav-tabContent">
      {{-- <div class="tab-pane fade" id="list-inbox" role="tabpanel" aria-labelledby="list-inbox-list">
      	<privatemessageinbox :user="{{$user}}"></privatemessageinbox>
      </div> --}}
      {{-- <div class="tab-pane fade" id="list-enviados" role="tabpanel" aria-labelledby="list-enviados-list">
			<privatemessagesent :user="{{$user}}"></privatemessagesent>
      </div> --}}
      <div class="tab-pane fade show active" id="list-nuevo" role="tabpanel" aria-labelledby="list-nuevo-list">
      	<privatemessagecompose></privatemessagecompose>
      </div>
    </div>
  </div>
</div>
</div>
	@endsection
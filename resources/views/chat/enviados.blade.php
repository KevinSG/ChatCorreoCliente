@extends('layouts.app')

	@section('content')
		<privatemessagesent :user="{{$user}}"></privatemessagesent>
	@endsection
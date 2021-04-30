@extends('layouts.app')

@section('content')
	<div class="container">
		<employee-detail employee-id="{{ request()->route("employee") }}"/>
	</div>
@endsection

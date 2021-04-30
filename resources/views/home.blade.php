@extends('layouts.app')

@section('content')
	<div class="container">
		<create-employee-form target-url="{{ route("api.employees.store") }}"></create-employee-form>
	</div>
@endsection

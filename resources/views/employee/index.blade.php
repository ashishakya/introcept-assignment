@extends('layouts.app')

@section('content')
	<div class="container">
		<employee-list target-url="{{ route("api.employees.index") }}"/>
	</div>
@endsection

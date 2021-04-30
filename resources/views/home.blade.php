@extends('layouts.app')

@section('content')
	<div class="container">
		<create-employee-form></create-employee-form>
		{{--                    @if (session('status'))--}}
		{{--                        <div class="alert alert-success" role="alert">--}}
		{{--                            {{ session('status') }}--}}
		{{--                        </div>--}}
		{{--                    @endif--}}
	</div>
@endsection

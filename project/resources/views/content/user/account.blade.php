@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<section class="page-alignment">
		ACCOUNT BITCHES
		{{ $user['name'] }}
		{{ $user['email'] }}
		{{ $user['role'] }}
	</section>
@endsection
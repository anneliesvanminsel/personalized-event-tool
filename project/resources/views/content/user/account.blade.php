@extends('layouts.masterlayout')
@section('title')
	evento - account
@endsection
@section('content')
	<section class="">
		ACCOUNT BITCHES
		{{ $user['name'] }}
		{{ $user['email'] }}
	</section>
@endsection
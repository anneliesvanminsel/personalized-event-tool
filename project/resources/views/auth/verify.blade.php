@extends('layouts.authlayout')
@section('title')
	verifiereun
@endsection

@section('content')
	<div class="header__container">
		<header class="header">
			<a class="logo has-lines" href="{{ route('index') }}">
				evento
			</a>
		</header>
	</div>
	
	<div class="auth">
		<div class="auth__image">
			<img src="{{ asset('images/toast.jpg') }}" alt="" loading="lazy">
		</div>
		
		<div class="panel">
			<h3 class="panel__title">
				Verify
			</h3>

			<div class="panel__body">
				@if (session('resent'))
					<div class="alert alert-success" role="alert">
						{{ __('A fresh verification link has been sent to your email address.') }}
					</div>
				@endif

				{{ __('Before proceeding, please check your email for a verification link.') }}
				{{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
			</div>
		</div>
	</div>
@endsection

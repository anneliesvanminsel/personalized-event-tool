@extends('layouts.authlayout')
@section('title')
	verifiereun
@endsection

@section('content')
	<div class="page page--auth">
		<div class="page__image">
			<img src="https://images.pexels.com/photos/2283996/pexels-photo-2283996.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" alt="">
		</div>

		<a class="logo logo--link" href="{{ route('index') }}">
			eventify
		</a>

		<div class="panel">

			<div class="panel__title">
				Verify
			</div>

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

@extends('layouts.masterlayout')
@section('title')
	evento
@endsection
@section('content')
	<div class="page-alignment">
		<h1 class="spacing-top-s">
			Ga op avontuur
		</h1>
		<form action="{{ route('mobile.postsearch') }}" method="post" id="form-search">
			@csrf
			<div class="">
				<div class="form__group">
					<select class="select" id="type" name="type" onchange="this.form.submit()">
						<option value="not given">-- selecteer type --</option>
						<option value="conference">conferentie</option>
						<option value="workshop">workshop</option>
						<option value="reunion">reunie</option>
						<option value="party">feest</option>
						<option value="gala">gala</option>
						<option value="festival">festival</option>
						<option value="semenar">semenarie</option>
						<option value="auction">veiling</option>
						<option value="market">beurs</option>
					</select>
					
					@error('type')
					<span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
					@enderror
				</div>
			</div>
		</form>
		<div class="v-grid spacing-top-s">
			@if($searchedevents->count() > 0)
				@foreach($searchedevents as $event)
					<a class="v-grid__item item" href="{{route('event.detail', ['event_id' => $event->id])}}">
						<div class="item__date bkg-red">
							{{  date('d M', strtotime( $event['starttime'])) }}
						</div>
						
						@if(File::exists(public_path() . "/images/" . $event['logo']))
							<div class="item__image ctn--image">
								<img src="{{ asset('images/' . $event['logo'] ) }}" alt="{{ $event['title'] }}" loading="lazy">
							</div>
						@else
							<div class="item__image ctn--image">
								<img src="https://placekitten.com/600/600" alt="{{ $event['title'] }}" loading="lazy">
							</div>
						@endif
						
						<div class="item__title">
							{{ $event->title }}
						</div>
					</a>
				@endforeach
			@else
				<p class="accent">
					Er zijn geen evenementen gevonden.
				</p>
			@endif
		</div>
		<div>
			{{ $searchedevents->links() }}
		</div>
	</div>
@endsection
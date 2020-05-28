<section class="photowall">
	<ul class="photolist">
		@php
			if($event->ig_username) {
				try {
					$response = file_get_contents('https://instagram.com/'.$event->ig_username.'/?__a=1');
				} catch (Exception $e){
					$response = file_get_contents('https://instagram.com/evento_platform/?__a=1');
				}
			} else {
				$response = file_get_contents('https://instagram.com/evento_platform/?__a=1');
			}
			
			$data = json_decode($response);
		@endphp
		
		@if($response)
			@if($data->graphql->user->edge_owner_to_timeline_media->count == 0)
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/4058375/pexels-photo-4058375.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/954623/pexels-photo-954623.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/708392/pexels-photo-708392.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/3960076/pexels-photo-3960076.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/942419/pexels-photo-942419.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/1916816/pexels-photo-1916816.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/976863/pexels-photo-976863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
				<li class="photolist__item">
					<img
						src="https://images.pexels.com/photos/598626/pexels-photo-598626.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
						alt=""
						loading="lazy"
					>
				</li>
			@else
				@foreach($data->graphql->user->edge_owner_to_timeline_media->edges as $node)
					<li class="photolist__item">
						<img
							src="{{ $node->node->display_url }}"
							alt="{{ $node->node->accessibility_caption }}"
							loading="lazy"
						>
					</li>
				@endforeach
			@endif
		@else
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/4058375/pexels-photo-4058375.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/954623/pexels-photo-954623.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/708392/pexels-photo-708392.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/3960076/pexels-photo-3960076.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/942419/pexels-photo-942419.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/1916816/pexels-photo-1916816.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/976863/pexels-photo-976863.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
			<li class="photolist__item">
				<img
					src="https://images.pexels.com/photos/598626/pexels-photo-598626.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260"
					alt=""
					loading="lazy"
				>
			</li>
		@endif
	</ul>
</section>
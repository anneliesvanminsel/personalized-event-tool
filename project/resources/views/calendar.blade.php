<!doctype html>
<html lang="nl">
<head>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
	
	
	<style>
		/* ... */
	</style>
</head>
<body>

@php
	$events = [];
@endphp
@foreach($event->sessions()->paginate(5) as $session)
	@if($session->schedules()->exists())
		@foreach($session->schedules()->orderBy('starttime', 'asc')->get() as $sched)
			@php
				$events[] = \Calendar::event(
					$sched->title, //event title
					true, //full day event?
					new \DateTime($session->date), //start time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg)
					new \DateTime($session->date), //end time, must be a DateTime object or valid DateTime format (http://bit.ly/1z7QWbg),
					$sched->id
				);
			@endphp
		@endforeach
	@endif
@endforeach

@php
	$calendar = \Calendar::addEvents($events) //add an array with addEvents
			->setOptions([ //set fullcalendar options
				'firstDay' => 0,
				'local' => 'fr',
			]);
@endphp

{!! $calendar->calendar() !!}
{!! $calendar->script() !!}
</body>
</html>
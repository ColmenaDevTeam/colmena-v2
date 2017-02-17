@extends('layouts.main_layout')
@section('content')
	<h2>Ya entrompaste al peo</h2>
	{{--
	@if($topToday != [])
		@include('home.timeline')
	@endif
	@include('home.notifications')
--}}
@endsection
@section('customjs')
	<!-- timelinr -->
	<script src="/js/jquery.min.js"></script>
	<script src="/js/jquery.timelinr-0.9.6.js"></script>
	<script>
		$(function(){
			$().timelinr({
				autoPlay:           'true',
				autoPlayDirection:  'forward',
				datesDiv: 			'#dates',
				autoPlayPause: 		3000,//3 segundos
			})
		});
	</script>
	<!-- end timelinr -->
@endsection

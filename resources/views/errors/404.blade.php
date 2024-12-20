@extends('layouts.base')

@section('title', __('Страница не найдена'))
@section('circles')
    <div class="circle-1">
        <img src="{{ '../assets/images/circle-1.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-7">
        <img src="{{ '../assets/images/circle-3.png' }}" alt="" loading="lazy">
    </div>
    <div class="circle-3">
        <img src="{{ '../assets/images/circle-4.png' }}" alt="" loading="lazy">
    </div>
   
@endsection
@section('content')
	<div class="error-page-content">
		<div class="m-auto">
			<p class="big-error-text">404</p>
			<p class="p1 text-center"> {{ __('translate.error_warn') }} </p>

		</div>
	</div>

@endsection

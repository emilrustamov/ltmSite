@extends('layouts.base')

@section('title', 'Разработка мобильных приложений от IT-консалтинговой компании LTM Studio в Туркменистане')
@section('content')
<div class="regular17 m45">Услуги диджитал агентства в Ашхабаде</div>
<h1 class="title">Мобильные приложения</h1>
<p class="regular17 m45">Приветствуем вас в нашей IT-фирме в Туркменистане! Если вы ищете команду, которая
    поможет вам создать не только стильный и функциональный веб-сайт, но и запустить процветающий интернет-магазин, то
    вы обратились по адресу.</p>
<p class="regular17 m45">Независимо от того, нужен вам простой сайт-визитка или сложный интернет-магазин, мы предлагаем
    полный спектр услуг - от дизайна до разработки и поддержки. </p>
<p class="bold40 m60">Доверьтесь нам, и давайте вместе создадим уникальное и успешное онлайн-пространство для вашего
    бизнеса</p>
<div class="absolute-asterisk d-flex justify-content-end">
    <p>*</p>
    <p>*</p>
</div>
<div class="cont-w-auto-scroll-text">
    <div id="scroll-container">
        <div id="scroll-text">Stunning design. Creative solutions. Incredible products.</div>
    </div>
    <div class="phone-container">
        <img src="{{ asset('/assets/images/tel1.png') }}" alt="Phone 1" class="phone phone-left" loading="lazy">
        <img src="{{ asset('/assets/images/tel2.png') }}" alt="Phone 2" class="phone phone-right" loading="lazy">
    </div>
</div>
@include('components.timeline')
@endsection
{{-- @section('out-container') --}}
{{-- @endsection --}}
{{-- @section('second-content') --}}
{{-- @endsection --}}
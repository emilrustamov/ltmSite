@extends('layouts.base')

@section('title',  __('translate.titlePortfolio'))
@section('ogTitle', __('translate.titlePortfolio'))
@section('metaDesc', __('translate.metaDescPortfolio'))
@section('metaKey', __('translate.metaKeyPortfolio'))

@section('content')
    <section class="container">
        <div>
            <h1>{{ __('translate.portfolioTitle') }}</h1>
            <p>{{ __('translate.portfolioSub') }}</p>
        </div>

        <div class="grid_portfolio section" data-lang="{{ $lang }}">
            @foreach($portfolio as $portf)
            <a href="/{{ $lang }}/portfolio/{{ $portf->slug }}" class="grid-item relative project-link" data-id="{{ $portf->id }}">
                    <div class="columnPort relative content">
                        @if ($portf->getFirstMediaUrl('portfolio-images', 'webp'))
                            <img data-src="{{ $portf->getFirstMediaUrl('portfolio-images', 'webp') }}" alt="{{ $portf->translation($lang)?->title ?? 'Image' }}" loading="lazy" class="lazyload">
                        @else
                            <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ $portf->translation($lang)?->title ?? 'Placeholder image' }}" loading="lazy">
                        @endif
                        <div class="content">
                            <div>
                                <div class="line"></div>
                                <h2>
                                    {!! $portf->translation($lang)?->title ?? 'No title' !!}
                                    <!-- Метка по умолчанию для непросмотренного проекта -->
                                    <span class="not-viewed-label" style="display: inline-block; font-size: 0.7rem; color: white; background: #e31e24; margin-left: 0.5rem; border-radius: 0.25rem; padding: 2px 6px;">Не просмотрено</span>
                                    <!-- Метка для просмотренного проекта, скрыта по умолчанию -->
                                    <span class="viewed-label" style="display: none; font-size: 0.7rem; color: white; background: #28a745; margin-left: 0.5rem; border-radius: 0.25rem; padding: 2px 6px;">Просмотрено</span>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="arrow d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:30px;"></i>
                    </div>
                </a>
            @endforeach
        </div>
        
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // Получаем список просмотренных проектов из localStorage
                const viewedProjects = JSON.parse(localStorage.getItem("viewedProjects") || "[]");
        
                // Для каждого проекта на странице проверяем, был ли он просмотрен
                document.querySelectorAll(".project-link").forEach(link => {
                    const projectId = parseInt(link.getAttribute("data-id"), 10);
                    const notViewedLabel = link.querySelector(".not-viewed-label");
                    const viewedLabel = link.querySelector(".viewed-label");
                    if (viewedProjects.includes(projectId)) {
                        // Если просмотрен, скрываем метку "Не просмотрено" и показываем "Просмотрено"
                        if (notViewedLabel) {
                            notViewedLabel.style.display = "none";
                        }
                        if (viewedLabel) {
                            viewedLabel.style.display = "inline-block";
                        }
                    } else {
                        // Если не просмотрен — убеждаемся, что "Не просмотрено" отображается
                        if (notViewedLabel) {
                            notViewedLabel.style.display = "inline-block";
                        }
                        if (viewedLabel) {
                            viewedLabel.style.display = "none";
                        }
                    }
                });
            });
        </script>
@endsection

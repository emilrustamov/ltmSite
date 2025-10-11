@extends('layouts.base')

@section('title')
    {{ ($portfolio->translation($lang)?->who ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}
@endsection

@section('ogTitle')
    {{ ($portfolio->translation($lang)?->who ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}
@endsection

@section('metaDesc')
    {{ Str::limit(($portfolio->translation($lang)?->who ?? 'Проект') . ' от LTM: ' . strip_tags($portfolio->translation($lang)?->target ?? ''), 150, '...') }}
@endsection

@section('metaKey')
    {{ ($portfolio->translation($lang)?->who ?? 'проект') . ', ' . __('translate.metaKeyProjectDetails') }}
@endsection


@section('content')
    <section class="container">
        @if ($portfolio->getFirstMediaUrl('portfolio-images', 'webp'))
            <img src="{{ $portfolio->getFirstMediaUrl('portfolio-images', 'webp') }}" alt="{{ $portfolio->translation($lang)?->who ?? 'Проект' }}" loading="lazy" class="w-full">
        @else
            <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ __('translate.defaultImageAlt') }}" loading="lazy" class="w-full">
        @endif

        <div class="project-details">
            <div class="mt-10">
                <h1 class="mb-15">{{ __('translate.projectDetails') }} {{ $portfolio->translation($lang)?->who ?? '' }}</h1>
                <div class="flex flex-col md:flex-row justify-between gap-8 text-2xl">
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.who') }}</h4>
                        <h3 class="text-[#e4abab]">
                            {{ $portfolio->translation($lang)?->who ?? '' }}
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.what') }}</h4>
                        <h3 class="text-[#e4abab]">
                            @foreach ($categories as $category)
                                <div>{{ $category->translation($lang)?->name ?? '' }}</div>
                            @endforeach
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.when') }}</h4>
                        <h3 class="text-[#e4abab]">
                            @if($portfolio->when)
                                {{ \Carbon\Carbon::parse($portfolio->when)->format('Y') }}
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>{{ __('translate.target') }}</h2>
            <p>{!! $portfolio->translation($lang)?->target ?? '' !!}</p>
        </div>

        <div class="section">
            <h2>{{ __('translate.result') }}</h2>
            <p>{!! $portfolio->translation($lang)?->result ?? '' !!}</p>
            @if (!empty($portfolio->url_button))
                <a href="{{ $portfolio->url_button }}">
                    <button class="custom-button">
                        {{ __('translate.goToSite') }}
                    </button>
                </a>
            @endif
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // numeric id нужен только для localStorage
            const projectId = {{ $portfolio->id }};
            let viewedProjects = JSON.parse(localStorage.getItem("viewedProjects") || "[]");
            if (!viewedProjects.includes(projectId)) {
                viewedProjects.push(projectId);
                localStorage.setItem("viewedProjects", JSON.stringify(viewedProjects));
            }
        });
    </script>
@endsection

@extends('layouts.base')

@section('title')
    {{ ($portfolio->translation($lang)?->who ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}
@endsection

@section('ogTitle')
    {{ ($portfolio->translation($lang)?->who ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}
@endsection

@section('metaDesc')
    @php
        $projectName = $portfolio->translation($lang)?->who ?? 'Проект';
        $description = Str::limit($projectName . ' от LTM в Туркменистане: ' . strip_tags($portfolio->translation($lang)?->target ?? ''), 150, '...');
        if ($lang === 'ru') {
            $description = Str::limit($projectName . ' от LTM в Ашхабаде, Туркменистан: ' . strip_tags($portfolio->translation($lang)?->target ?? ''), 150, '...');
        }
    @endphp
    {{ $description }}
@endsection

@section('metaKey')
    @php
        $projectName = $portfolio->translation($lang)?->who ?? 'проект';
        $keywords = $projectName . ', ' . __('translate.metaKeyProjectDetails');
        if ($lang === 'ru') {
            $keywords .= ', разработка в Ашхабаде, IT-компания в Туркменистане, разработка мобильного приложения в Ашхабаде, купить битрикс в туркменистане';
        }
    @endphp
    {{ $keywords }}
@endsection

@php
    // Динамическое изображение для Open Graph
    $portfolioImage = $portfolio->getFirstMediaUrl('portfolio-images', 'webp');
    if (!$portfolioImage && $portfolio->photo) {
        $portfolioImage = asset('storage/' . $portfolio->photo);
    }
    $ogImage = $portfolioImage ?: config('app.url') . '/assets/images/ltm.png';
@endphp

@section('ogImage', $ogImage)
@section('ogType', 'article')

{{-- Дополнительные структурированные данные для проекта --}}
@push('structured-data')
<script type="application/ld+json">
{
    "@context": "https://schema.org",
    "@type": "CreativeWork",
    "name": "{{ addslashes($portfolio->translation($lang)?->who ?? 'Проект') }}",
    "description": "{{ addslashes(Str::limit(strip_tags($portfolio->translation($lang)?->target ?? ''), 200)) }}",
    "image": {
        "@type": "ImageObject",
        "url": "{{ $ogImage }}",
        "width": 1200,
        "height": 630
    },
    "url": "{{ url($lang . '/portfolio/' . $portfolio->slug) }}",
    "datePublished": "{{ $portfolio->created_at->toIso8601String() }}",
    "dateModified": "{{ $portfolio->updated_at->toIso8601String() }}",
    "author": {
        "@type": "Organization",
        "name": "Lebizli Tehnologiya Merkezi (LTM)",
        "url": "{{ config('app.url') }}",
        "address": {
            "@type": "PostalAddress",
            "streetAddress": "2127 ул. (Г. Кулиева), здание \"Gökje\" 26A",
            "addressLocality": "Ашхабад",
            "addressCountry": "TM"
        }
    },
    "publisher": {
        "@type": "Organization",
        "name": "Lebizli Tehnologiya Merkezi (LTM)",
        "logo": {
            "@type": "ImageObject",
            "url": "{{ config('app.url') }}/assets/images/ltm.png",
            "width": 512,
            "height": 512
        }
    },
    "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "{{ url($lang . '/portfolio/' . $portfolio->slug) }}"
    },
    "keywords": "{{ addslashes(($portfolio->translation($lang)?->who ?? 'проект') . ', разработка в Ашхабаде, IT-компания в Туркменистане') }}",
    "inLanguage": "{{ $lang }}",
    @if($portfolio->when)
    "temporalCoverage": "{{ \Carbon\Carbon::parse($portfolio->when)->format('Y') }}",
    @endif
    @if($portfolio->url_button)
    "relatedLink": "{{ $portfolio->url_button }}",
    @endif
    "about": {
        "@type": "Thing",
        "name": "{{ addslashes($portfolio->translation($lang)?->target ?? '') }}"
    }
}
</script>
@endpush


@section('content')
    <section class="container">
        <!-- Хлебные крошки -->
        <nav class="breadcrumbs" aria-label="Breadcrumb">
            <ol class="breadcrumbs-list">
                <li class="breadcrumbs-item">
                    <a href="/{{ $lang }}" class="breadcrumbs-link">{{ __('translate.mainPage') ?? 'Главная' }}</a>
                </li>
                <li class="breadcrumbs-separator" aria-hidden="true">/</li>
                <li class="breadcrumbs-item">
                    <a href="{{ route('lang.portfolio.index', ['lang' => $lang]) }}" class="breadcrumbs-link">{{ __('translate.portfolio') }}</a>
                </li>
                <li class="breadcrumbs-separator" aria-hidden="true">/</li>
                <li class="breadcrumbs-item breadcrumbs-item-active" aria-current="page">
                    <span class="breadcrumbs-current">{{ $portfolio->translation($lang)?->who ?? 'Проект' }}</span>
                </li>
            </ol>
        </nav>

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

            document.dispatchEvent(new Event('portfolio-viewed-updated'));
        });
    </script>

    <style>
        /* Хлебные крошки */
        .breadcrumbs {
            margin-bottom: 30px;
            padding-top: 20px;
        }

        .breadcrumbs-list {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 8px;
        }

        .breadcrumbs-item {
            display: inline-flex;
            align-items: center;
        }

        .breadcrumbs-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            font-size: 15px;
            transition: color 0.3s ease;
            padding: 4px 0;
        }

        .breadcrumbs-link:hover {
            color: #e31e24;
        }

        .breadcrumbs-separator {
            color: rgba(255, 255, 255, 0.4);
            font-size: 15px;
            padding: 0 4px;
        }

        .breadcrumbs-item-active .breadcrumbs-current {
            color: rgba(255, 255, 255, 0.9);
            font-size: 15px;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .breadcrumbs {
                margin-bottom: 20px;
                padding-top: 15px;
            }

            .breadcrumbs-link,
            .breadcrumbs-current,
            .breadcrumbs-separator {
                font-size: 14px;
            }

            .breadcrumbs-list {
                gap: 6px;
            }
        }
    </style>
@endsection

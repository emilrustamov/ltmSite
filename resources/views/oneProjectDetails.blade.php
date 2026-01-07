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

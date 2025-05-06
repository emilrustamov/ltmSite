@extends('layouts.base')

@section('title')
   {{ ($portfolio->who[$lang] ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}

@endsection

@section('ogTitle')
   {{ ($portfolio->who[$lang] ?? 'Проект') . ' ' . __('translate.titleProjectDetails') }}

@endsection

@section('metaDesc')
    {{ Str::limit(($portfolio->who[$lang] ?? 'Проект') . ' от LTM: ' . strip_tags($portfolio->target[$lang] ?? ''), 150, '...') }}
@endsection

@section('metaKey')
    {{ ($portfolio->who[$lang] ?? 'проект') . ', ' . __('translate.metaKeyProjectDetails') }}
@endsection


@section('content')
    <section class="container">
        @if ($portfolio->getFirstMediaUrl('portfolio-images', 'webp'))
            <img src="{{ $portfolio->getFirstMediaUrl('portfolio-images', 'webp') }}" alt="Image" loading="lazy"
                class="w-full">
        @else
            <img src="{{ asset('assets/images/proformat.png') }}" alt="Image" loading="lazy" class="w-full">
        @endif

        <div class="project-details">
            <div class="mt-10">
                <h1 class="mb-15">{{ __('translate.projectDetails') }}</h1>
                <div class="flex flex-col md:flex-row justify-between gap-8 text-2xl">
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.who') }}</h4>
                        <h3 class="text-[#e4abab]">
                            {{ $portfolio->who[$lang] ?? '' }}
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.what') }}</h4>
                        <h3 class="text-[#e4abab]">
                            @foreach ($categories as $categoryGroup)
                                @foreach ($categoryGroup as $category)
                                    <div>{{ $category['category_' . $lang] }}</div>
                                @endforeach
                            @endforeach
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.when') }}</h4>
                        <h3 class="text-[#e4abab]">
                            {{ \Carbon\Carbon::parse($portfolio->when)->format('Y') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>{{ __('translate.target') }}</h2>
            <p>{!! $portfolio->target[$lang] ?? '' !!}</p>
        </div>

        <div class="section">
            <h2>{{ __('translate.result') }}</h2>
            <p>{!! $portfolio->result[$lang] ?? '' !!}</p>
            @if (!empty($portfolio->urlButton))
                <a href="{{ $portfolio->urlButton }}">
                    <button class="custom-button">
                        {{ __('translate.goToSite') }}
                    </button>
                </a>
            @endif
        </div>
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const projectId = {{ $id }};
            let viewedProjects = JSON.parse(localStorage.getItem("viewedProjects") || "[]");
            if (!viewedProjects.includes(projectId)) {
                viewedProjects.push(projectId);
                localStorage.setItem("viewedProjects", JSON.stringify(viewedProjects));
            }
        });
    </script>
@endsection

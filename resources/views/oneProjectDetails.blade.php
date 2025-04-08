@extends('layouts.base')

@section('title', 'Project Details')

@section('content')
    <section class="container">
        @if ($portfolio['photo'] != '')
            <img src="{{ asset('storage/' . $portfolio['photo']) }}" alt="Image" loading="lazy" class="w-full">
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
                            {{ $portfolio['who'][$lang] ?? '' }}
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
                            {{ \Carbon\Carbon::parse($portfolio['when'])->format('F Y') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="section">
            <h2>Цель</h2>
            <p>{{ $portfolio['target'][$lang] ?? '' }}</p>
        </div>

        <div class="section">
            <h2>Результат</h2>
            @if (!empty($portfolio['urlButton']))
                <button class="custom-button">
                    <a href="{{ $portfolio['urlButton'] }}">
                        {{ __('translate.goToSite') }}
                    </a>
                </button>
            @endif
            <p>
                {{ $portfolio['result'][$lang] ?? '' }}
            </p>
        </div>
    </section>

@endsection

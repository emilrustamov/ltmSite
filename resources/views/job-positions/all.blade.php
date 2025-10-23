@extends('layouts.base')

@section('title', __('translate.allJobsTitle'))
@section('ogTitle', __('translate.allJobsTitle'))
@section('metaDesc', __('translate.allJobsMetaDesc'))
@section('metaKey', __('translate.allJobsMetaKey'))

@section('content')
    <section class="container">
        <div>
            <h1>{{ __('translate.allJobsTitle') }}</h1>
            <p>{{ __('translate.allJobsSubtitle') }}</p>
        </div>

        <div class="grid_portfolio section" data-lang="{{ $lang }}">
            @foreach($jobPositions as $job)
            <a href="/{{ $lang }}/jobs/{{ $job->id }}" class="grid-item relative job-link">
                    <div class="columnPort relative content">
                        @if ($job->image)
                            <img data-src="{{ asset($job->image) }}" alt="{{ $job->name_ru }}" loading="lazy" class="lazyload">
                        @else
                            <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ $job->name_ru }}" loading="lazy">
                        @endif
                        <div class="content">
                            <div>
                                <div class="line"></div>
                                <h2>
                                    {{ $job->{'name_' . $lang} ?? $job->name_ru }}
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

        <!-- Пагинация -->
        <div class="pagination-wrapper">
            {{ $jobPositions->links() }}
        </div>
        
@endsection

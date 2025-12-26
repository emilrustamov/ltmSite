@extends('layouts.base')

@section('title', __('translate.allJobsTitle'))
@section('content')

    <section class="container jobs-page">
        <div class="jobs-header">
            <h1>{{ __('translate.allJobsTitle') }}</h1>
            <p>{{ __('translate.allJobsSubtitle') }}</p>
        </div>

        <div class="jobs-table">
            @foreach($jobPositions as $job)
                <a href="/{{ $lang }}/jobs/{{ $job->id }}" class="job-row">

                    <!-- Название -->
                    <div class="job-title">
                        {{ $job->{'name_' . $lang} ?? $job->name_ru }}
                    </div>

                    <div class="job-meta-wrap">
                        <span class="job-meta">{{ $job->{'employment_type_' . $lang} }}</span>
                        <span class="job-meta">{{ $job->{'work_format_' . $lang} }}</span>
                        <span class="job-salary">{{ $job->{'salary_' . $lang} }}</span>
                    </div>

                    <!-- Стрелка -->
                    <div class="job-arrow">
                        <i class="fa-solid fa-arrow-right job-button--icon" aria-hidden="true"></i>
                    </div>

                </a>
            @endforeach
        </div>

        <div class="pagination-wrapper">
            {{ $jobPositions->links() }}
        </div>
    </section>
@endsection
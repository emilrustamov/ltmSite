@extends('layouts.base')

@section('title')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }} - {{ __('translate.jobDetails') }}
@endsection

@section('ogTitle')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }} - {{ __('translate.jobDetails') }}
@endsection

@section('metaDesc')
    {{ Str::limit($jobPosition->{'description_' . $lang} ?? $jobPosition->description_ru ?? '', 150, '...') }}
@endsection

@section('metaKey')
    {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}, {{ __('translate.jobs') }}, {{ __('translate.career') }}
@endsection

@section('content')
    <section class="container">
        <div class="section">
            <h1>{{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}</h1>
            
            @if($jobPosition->{'employment_type_' . $lang} ?? $jobPosition->employment_type_ru)
            <p><strong>{{ __('translate.employment_type') }}:</strong> {{ $jobPosition->{'employment_type_' . $lang} ?? $jobPosition->employment_type_ru }}</p>
            @endif
            
            @if($jobPosition->{'work_format_' . $lang} ?? $jobPosition->work_format_ru)
            <p><strong>{{ __('translate.work_format') }}:</strong> {{ $jobPosition->{'work_format_' . $lang} ?? $jobPosition->work_format_ru }}</p>
            @endif
            
            @if($jobPosition->{'salary_' . $lang} ?? $jobPosition->salary_ru)
            <p><strong>{{ __('translate.salary') }}:</strong> {{ $jobPosition->{'salary_' . $lang} ?? $jobPosition->salary_ru }}</p>
            @endif
        </div>

        @if($jobPosition->{'description_' . $lang} ?? $jobPosition->description_ru)
        <div class="section">
            <h2 class="heading-line">{{ __('translate.description') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'description_' . $lang} ?? $jobPosition->description_ru)) !!}</p>
        </div>
        @endif

        @if($jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru)
        <div class="section">
            <h2 class="heading-line">{{ __('translate.responsibilities') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru)) !!}</p>
        </div>
        @endif

        @if($jobPosition->technicalSkills->count() > 0)
        <div class="section">
            <h2 class="heading-line">{{ __('translate.skills') }}</h2>
            <p>
                {{ $jobPosition->technicalSkills->pluck('name_' . $lang)->filter()->implode(', ') ?: $jobPosition->technicalSkills->pluck('name_ru')->implode(', ') }}
            </p>
        </div>
        @endif

        @if($jobPosition->{'benefits_' . $lang} ?? $jobPosition->benefits_ru)
        <div class="section">
            <h2 class="heading-line">{{ __('translate.benefits') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'benefits_' . $lang} ?? $jobPosition->benefits_ru)) !!}</p>
        </div>
        @endif

        @if($jobPosition->status)
        <div class="section">
            <a href="{{ route('applications.create', ['position' => $jobPosition->id]) }}" class="custom-button">
                {{ __('translate.applyNow') }}
            </a>
        </div>
        @endif
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const headings = document.querySelectorAll('.heading-line');
            
            const observerOptions = {
                root: null,
                rootMargin: '0px',
                threshold: 0.3
            };
            
            const observer = new IntersectionObserver(function(entries) {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            headings.forEach(heading => {
                observer.observe(heading);
            });
        });
    </script>
@endsection

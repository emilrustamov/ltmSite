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
        @if ($jobPosition->image)
            <img src="{{ asset($jobPosition->image) }}" alt="{{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}" loading="lazy" class="w-full">
        @else
            <img src="{{ asset('assets/images/proformat.png') }}" alt="{{ __('translate.defaultJobImage') }}" loading="lazy" class="w-full">
        @endif

        <div class="project-details">
            <div class="mt-10">
                <h1 class="mb-15">{{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}</h1>
                <div class="flex flex-col md:flex-row justify-between gap-8 text-2xl">
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.position') }}</h4>
                        <h3 class="text-[#e4abab]">
                            {{ $jobPosition->{'name_' . $lang} ?? $jobPosition->name_ru }}
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.status') }}</h4>
                        <h3 class="text-[#e4abab]">
                            @if($jobPosition->status)
                                <span class="text-green-400">{{ __('translate.open') }}</span>
                            @else
                                <span class="text-gray-400">{{ __('translate.closed') }}</span>
                            @endif
                        </h3>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-white font-semibold mb-2">{{ __('translate.skills') }}</h4>
                        <h3 class="text-[#e4abab]">
                            @if($jobPosition->technicalSkills->count() > 0)
                                {{ $jobPosition->technicalSkills->pluck('name_' . $lang)->filter()->implode(', ') ?: $jobPosition->technicalSkills->pluck('name_ru')->implode(', ') }}
                            @else
                                {{ __('translate.noSkills') }}
                            @endif
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        @if($jobPosition->{'description_' . $lang} ?? $jobPosition->description_ru)
        <div class="section">
            <h2>{{ __('translate.description') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'description_' . $lang} ?? $jobPosition->description_ru)) !!}</p>
        </div>
        @endif

        @if($jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru)
        <div class="section">
            <h2>{{ __('translate.responsibilities') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'responsibilities_' . $lang} ?? $jobPosition->responsibilities_ru)) !!}</p>
        </div>
        @endif


        @if($jobPosition->{'benefits_' . $lang} ?? $jobPosition->benefits_ru)
        <div class="section">
            <h2>{{ __('translate.benefits') }}</h2>
            <p>{!! nl2br(e($jobPosition->{'benefits_' . $lang} ?? $jobPosition->benefits_ru)) !!}</p>
        </div>
        @endif

        @if($jobPosition->status)
        <div class="section">
            <a href="/applications/create?position={{ $jobPosition->id }}">
                <button class="custom-button">
                    {{ __('translate.applyNow') }}
                </button>
            </a>
        </div>
        @endif
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Добавляем вакансию в список просмотренных
            const viewedJobs = JSON.parse(localStorage.getItem("viewedJobs") || "[]");
            const jobId = {{ $jobPosition->id }};
            
            if (!viewedJobs.includes(jobId)) {
                viewedJobs.push(jobId);
                localStorage.setItem("viewedJobs", JSON.stringify(viewedJobs));
            }
        });
    </script>
@endsection

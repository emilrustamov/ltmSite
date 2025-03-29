@extends('layouts.base')

@section('title', 'Project Details')

@section('content')
    <div class="">
        <style>
            .responsive-photo {
                width: 100%;
                height: auto;
            }
            @media (min-width: 768px) {
                .responsive-photo {
                    width: 1110px !important;
                    height: 740px !important;
                }
            }
        </style>

        @if ($portfolio['photo'] != '')
            <img src="{{ asset('storage/' . $portfolio['photo']) }}" alt="Image" class="responsive-photo" loading="lazy">
        @else
            <img src="{{ asset('assets/images/proformat.png') }}" alt="Image" class="responsive-photo" loading="lazy">
        @endif
    </div>

    <div class="project-details">
        <div class="project-details-col1">
            <p>{{ __('translate.projectDetails') }}</p>
            <div class="header-flex">
                <div class="item-q">
                    <p>{{ __('translate.who') }}</p>
                    <div class="project-details-row-title">
                        {{ json_decode($portfolio['who'], true)[$lang] ?? '' }}
                    </div>
                </div>
                <div class="item-q">
                    <p>{{ __('translate.what') }}</p>
                    <div class="project-details-row-title">
                        @foreach($categories as $categoryGroup)
                            @foreach($categoryGroup as $category)
                                <div>
                                    {{ $category['category_' . $lang] }}
                                </div>
                            @endforeach
                        @endforeach
                    </div>
                </div>
                <div class="item-q">
                    <p>{{ __('translate.when') }}</p>
                    <div class="project-details-row-title">
                        {{ $portfolio['when'] }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="result regular20">{{ json_decode($portfolio['target'], true)[$lang] ?? '' }}</div>

    @if(isset($portfolio['urlButton']))
        <a href="{{ $portfolio['urlButton'] }}" class="no-line">
            <button class="button-site custom-button">
                {{ __('translate.goToSite') }}
            </button>
        </a>
    @endif

    <div class="result regular20" id="">
        {{ json_decode($portfolio['res'], true)[$lang] ?? '' }}
    </div>

    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/slick.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            var backButton = '<span class="slick-prev">&#129120</span>';
            var nextButton = '<span class="slick-next">&#129122</span>'
            $('.slider_portf').slick({
                infinite: true,
                slidesToShow: 3,
                slidesToScroll: 1,
                prevArrow: backButton,
                nextArrow: nextButton
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var currentTextId = "target";

            document.getElementById("tar").addEventListener("click", function() {
                showOrReplaceText("target");
            });

            document.getElementById("res").addEventListener("click", function() {
                showOrReplaceText("result");
            });

            function showOrReplaceText(textId) {
                var currentTextDiv = document.getElementById(currentTextId);
                if (currentTextDiv) {
                    currentTextDiv.style.display = 'none';
                }

                var newTextDiv = document.getElementById(textId);
                if (newTextDiv) {
                    newTextDiv.style.display = 'block';
                }

                currentTextId = textId;
            }
        });
    </script>
@endsection
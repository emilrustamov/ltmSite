@extends('layouts.base')

@section('title',  __('translate.titlePortfolio'))
@section('ogTitle', __('translate.titlePortfolio'))
@section('metaDesc', __('translate.metaDescPortfolio'))
@section('metaKey', __('translate.metaKeyPortfolio'))

@section('content')
    <section class="container">
        <div>
            <h1>{{ __('translate.portfolioTitle') }}</h1>
            <p>{{ __('translate.portfolioSub') }}</p>
        </div>

        <div class="portfolio-page"
             data-portfolio-root
             data-lang="{{ $lang }}"
             data-filter-url="{{ route('lang.portfolio.filter', ['lang' => $lang]) }}"
             data-selected='@json($selectedCategories)'>

            <div class="portfolio-filters">
                <button type="button"
                        class="portfolio-filter__tag {{ empty($selectedCategories) ? 'is-active' : '' }}"
                        data-category-id="all"
                        aria-pressed="{{ empty($selectedCategories) ? 'true' : 'false' }}">
                    {{ __('translate.portfolioFilterAll') }}
                </button>
                @foreach($categories as $category)
                    @php
                        $isSelected = in_array($category->id, $selectedCategories, true);
                        $label = $category->translation($lang)?->name ?? $category->slug;
                    @endphp
                    <button type="button"
                            class="portfolio-filter__tag {{ $isSelected ? 'is-active' : '' }}"
                            data-category-id="{{ $category->id }}"
                            aria-pressed="{{ $isSelected ? 'true' : 'false' }}">
                        {{ $label }}
                    </button>
                @endforeach
            </div>

            <div id="portfolio-grid">
                @include('portfolio.partials.grid', ['portfolios' => $portfolios, 'lang' => $lang])
            </div>

            <div id="portfolio-pagination">
                @include('portfolio.partials.pagination', ['portfolios' => $portfolios])
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const root = document.querySelector("[data-portfolio-root]");
            if (!root) {
                return;
            }

            const filterUrl = root.dataset.filterUrl;
            const gridContainer = document.getElementById("portfolio-grid");
            const paginationContainer = document.getElementById("portfolio-pagination");
            const filterButtons = root.querySelectorAll("[data-category-id]");

            let selectedCategories;
            try {
                selectedCategories = JSON.parse(root.dataset.selected || "[]");
            } catch (error) {
                selectedCategories = [];
            }

            if (!Array.isArray(selectedCategories)) {
                selectedCategories = [];
            }

            selectedCategories = selectedCategories
                .map(id => parseInt(id, 10))
                .filter(Number.isFinite);

            const getViewedProjects = () => JSON.parse(localStorage.getItem("viewedProjects") || "[]");

            const applyViewedState = (container) => {
                const viewedProjects = getViewedProjects();
                container.querySelectorAll(".project-link").forEach(link => {
                    const projectId = parseInt(link.getAttribute("data-id"), 10);
                    const notViewedLabel = link.querySelector(".not-viewed-label");
                    const viewedLabel = link.querySelector(".viewed-label");

                    if (viewedProjects.includes(projectId)) {
                        if (notViewedLabel) {
                            notViewedLabel.style.display = "none";
                        }
                        if (viewedLabel) {
                            viewedLabel.style.display = "inline-block";
                        }
                    } else {
                        if (notViewedLabel) {
                            notViewedLabel.style.display = "inline-block";
                        }
                        if (viewedLabel) {
                            viewedLabel.style.display = "none";
                        }
                    }
                });
            };

            const updateButtonStates = () => {
                filterButtons.forEach(button => {
                    const categoryId = button.dataset.categoryId;
                    const numericId = parseInt(categoryId, 10);
                    const isActive = categoryId === "all"
                        ? selectedCategories.length === 0
                        : selectedCategories.includes(numericId);

                    button.classList.toggle("is-active", isActive);
                    button.setAttribute("aria-pressed", isActive ? "true" : "false");
                });
            };

            const buildRequestUrl = (url, resetPage = false) => {
                const requestUrl = new URL(url, window.location.origin);
                const currentPage = requestUrl.searchParams.get("page");

                requestUrl.searchParams.delete("categories[]");
                requestUrl.searchParams.delete("categories");

                if (resetPage) {
                    requestUrl.searchParams.delete("page");
                } else if (currentPage) {
                    requestUrl.searchParams.set("page", currentPage);
                } else {
                    requestUrl.searchParams.delete("page");
                }

                requestUrl.searchParams.delete("ajax");

                selectedCategories.forEach(id => {
                    requestUrl.searchParams.append("categories[]", id);
                });

                requestUrl.searchParams.set("ajax", "1");

                return requestUrl.toString();
            };

            const updateHistory = (page) => {
                const historyUrl = new URL(window.location.href);

                historyUrl.searchParams.delete("categories[]");
                historyUrl.searchParams.delete("categories");

                if (selectedCategories.length > 0) {
                    selectedCategories.forEach(id => historyUrl.searchParams.append("categories[]", id));
                }

                if (page && page > 1) {
                    historyUrl.searchParams.set("page", page);
                } else {
                    historyUrl.searchParams.delete("page");
                }

                window.history.replaceState({}, "", historyUrl);
            };

            const attachPaginationHandlers = () => {
                paginationContainer.querySelectorAll("a").forEach(link => {
                    link.addEventListener("click", event => {
                        event.preventDefault();
                        fetchPortfolios(link.href, { resetPage: false });
                    });
                });
            };

            const fetchPortfolios = (url = null, { resetPage = false } = {}) => {
                const requestUrl = buildRequestUrl(url || filterUrl, resetPage);

                fetch(requestUrl, {
                    headers: {
                        "X-Requested-With": "XMLHttpRequest",
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        gridContainer.innerHTML = data.grid;
                        paginationContainer.innerHTML = data.pagination;

                        applyViewedState(gridContainer);
                        attachPaginationHandlers();
                        updateHistory(data.meta.page);
                    })
                    .catch(() => {
                        gridContainer.innerHTML = `<div class="portfolio-empty"><p>{{ __('translate.portfolioFilterError') }}</p></div>`;
                        paginationContainer.innerHTML = "";
                    });
            };

            filterButtons.forEach(button => {
                button.addEventListener("click", () => {
                    const categoryId = button.dataset.categoryId;

                    if (categoryId === "all") {
                        selectedCategories = [];
                    } else {
                        const numericId = parseInt(categoryId, 10);
                        if (selectedCategories.includes(numericId)) {
                            selectedCategories = selectedCategories.filter(id => id !== numericId);
                        } else {
                            selectedCategories.push(numericId);
                        }
                    }

                    updateButtonStates();
                    fetchPortfolios(filterUrl, { resetPage: true });
                });
            });

            applyViewedState(gridContainer);
            updateButtonStates();
            attachPaginationHandlers();
        });
    </script>

    <style>
        .portfolio-page {
            display: flex;
            flex-direction: column;
            gap: 24px;
            position: relative;
        }

        .portfolio-filters {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .portfolio-filter__tag {
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 999px;
            background: transparent;
            color: #ffffff;
            font-weight: 500;
            letter-spacing: 0.02em;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .portfolio-filter__tag:hover,
        .portfolio-filter__tag.is-active {
            background: #e31e24;
            border-color: #e31e24;
            box-shadow: 0 10px 25px rgba(227, 30, 36, 0.35);
        }

        .portfolio-filter__tag.is-active {
            color: #ffffff;
        }

        .portfolio-empty {
            width: 100%;
            padding: 80px 20px;
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            border: 1px dashed rgba(255, 255, 255, 0.1);
            border-radius: 16px;
            font-size: 1.1rem;
            letter-spacing: 0.03em;
        }

        .portfolio-pagination {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 60px auto 20px;
            gap: 20px;
        }

        .portfolio-pagination__nav {
            width: 100%;
            display: flex;
            justify-content: center;
        }

        .portfolio-pagination__list {
            list-style: none;
            display: flex;
            gap: 10px;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
        }

        .portfolio-pagination__item {
            display: inline-flex;
        }

        .portfolio-pagination__link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 42px;
            height: 42px;
            padding: 0 14px;
            border-radius: 30px;
            background: rgba(227, 30, 36, 0.15);
            color: #ffffff;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.25s ease;
            border: 1px solid rgba(227, 30, 36, 0.4);
        }

        .portfolio-pagination__link:hover {
            background: #e31e24;
            border-color: #e31e24;
            color: #ffffff;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(227, 30, 36, 0.35);
        }

        .portfolio-pagination__item.active .portfolio-pagination__link {
            background: #e31e24;
            border-color: #e31e24;
            box-shadow: 0 10px 25px rgba(227, 30, 36, 0.45);
        }

        .portfolio-pagination__item.disabled .portfolio-pagination__link {
            background: rgba(255, 255, 255, 0.08);
            border-color: transparent;
            color: rgba(255, 255, 255, 0.3);
            cursor: not-allowed;
            transform: none;
            box-shadow: none;
        }

        .portfolio-pagination__item.disabled .portfolio-pagination__link:hover {
            transform: none;
            box-shadow: none;
        }

        .portfolio-pagination__link--arrow {
            min-width: 48px;
            background: rgba(255, 255, 255, 0.08);
            border-color: rgba(255, 255, 255, 0.12);
        }

        .portfolio-pagination__link--arrow:hover {
            background: #ffffff;
            color: #1f1f1f;
            border-color: #ffffff;
        }

        .portfolio-pagination__item.dots .portfolio-pagination__link {
            pointer-events: none;
            background: transparent;
            border: none;
            color: #c7c7c7;
            font-size: 1.2rem;
        }

        @media (max-width: 768px) {
            .portfolio-page {
                gap: 20px;
            }

            .portfolio-filters {
                gap: 10px;
            }

            .portfolio-filter__tag {
                padding: 8px 16px;
                font-size: 0.9rem;
            }

            .portfolio-pagination {
                margin-top: 40px;
                gap: 16px;
            }

            .portfolio-pagination__link {
                min-width: 38px;
                height: 38px;
                font-size: 0.85rem;
                padding: 0 12px;
            }

            .portfolio-pagination__link--arrow {
                min-width: 42px;
            }
        }
    </style>
@endsection


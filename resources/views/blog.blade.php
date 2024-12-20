@extends('layouts.base')

@section('title', 'Blog')

@section('content')
    <div class="container">
        <div class="blogPage">
            <div class="blogIntro">
                <div class="leftHeaderTop">
                    <p>{{__('translate.mainPage')}}</p>
                    <p>{{__('translate.services')}}</p>
                </div>
                <div class="column left">
                    <div class="title left">{{ __('translate.blog') }}</div>
                    <div class="subt">
                        <div class="p1">
                            {{ __('translate.blogSub') }}
                            <span style="color:#1478E8; font-weight: 600;">{{ __('translate.blogSubCustom') }}</span>
                            {{ __('translate.blogSubCont') }}
                        </div>
                    </div>
                </div>
                <div class="blog_cats_wrapper blog">
                    <div class="blog_cats blog">
                        <ul class="row_p">
                    <li class="element ">
                        <p>All</p>
                            {{-- <p>{{ __('translate.menuAll') }}</p> --}}
                        </li >
                       <li  class="element">
                            {{-- <p>{{ __('translate.blogDiff') }}</p> --}}
                        <p>Different</p>
                        </li >
                        <li  class="element">
                            <p>News</p>
                            {{-- <p>{{ __('translate.blogNews') }}</p> --}}
                        </li> 
                        <li class="element">
                            <p>Useful</p>
                            {{-- <p>{{ __('translate.blogUseful') }}</p> --}}
                        </li>
                        <li class="element">
                            <p>Digital</p>
                            {{-- <p>{{ __('translate.blogDigit') }}</p> --}}
                        </li>
                       </ul>
                    </div>
                </div>
                <!-- {{-- <div class="row_p">
                    <div class="element">{{ __('translate.menuAll') }}</div>
                    <div class="element">History</div>
                    <div class="element">StandWithUkraine</div>
                    <div class="element">{{ __('translate.blogDiff') }}</div>
                    <div class="element">{{ __('translate.blogNews') }}</div>
                    <div class="element">{{ __('translate.blogUseful') }}</div>
                    <div class="element">{{ __('translate.blogDigit') }}</div>
                </div> --}} -->

<div class="grid_blog">
    @foreach ($blog as $i)
        @php
            $additionalClass = ($i['id'] % 2 == 0 && $i['id'] != 2) ? 'add-margin-blog' : '';
        @endphp

        <a href="/{{ $lang }}/blog/{{ $i['id'] }}" class="grid-item {{$additionalClass}} no-line">
            <div class="block">
                <div class="row_blog">
                    <h2 class="subtBlog">{{ $i['what'] }}</h2>
                    <h1 class="titleBlog">{!! $i['title_'.$lang] !!}</h1>
                    <div class="body-text">{!! $i['desc_'.$lang] !!}</div>
                </div>
                <div class="arrow d-flex align-items-center justify-content-center">
                    <i class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i>
                </div>
            </div>
        </a>
    @endforeach
</div>

                <!-- {{-- <div class="grid_blog">
                    <div class="grid-item item1">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item2">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Статьи про диджитал</h2>
                                <h1 class="titleBlog">Retention маркетинг</h1>
                                <p class="body-text">Возможно уже где-то слышали, а может еще нет — но
                                    будет интересно. И так, retention marketing — так
                                    называют сейчас современный и максимально
                                    эффективный подход в продвижении бизнеса.
                                    Retention marketing…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item3">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item4">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item5">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item6">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item7">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item8">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div>
                            <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div>
                    <div class="grid-item item9">
                        <div class="block">
                            <div class="row_blog">
                                <h2 class="subtBlog">Полезности</h2>
                                <h1 class="titleBlog">Торговая марка: Как
                                    зарегистрировать в Украине в
                                    2023 году и сколько это стоит.</h1>
                                <p class="body-text">Если вы задумали заказать нейминг и
                                    зарегистрировать сразу как торговую марку вашу
                                    компанию, бренд, продукт или стартап, тогда
                                    информация ниже будет полезна. Да и вообще, если
                                    вы прицениваетесь, и хотите…</p>
                            </div> --}}
                            {{-- <div class="arrow d-flex align-items-center justify-content-center"><i
                                    class="fa-solid fa-arrow-right-long" style="color:white; font-size:40px;"></i></div>
                        </div>
                    </div> --}} -->
                    <!-- <div class="grid-item item10">
                                <div class="block">
                                    <div class="row_blog">
                                      <h2 class="subtBlog">Полезности</h2>
                                      <h1 class="titleBlog">Торговая марка: Как
                                        зарегистрировать в Украине в
                                        2023 году и сколько это стоит.</h1>
                                      <p class="body-text">Если вы задумали заказать нейминг и
                                        зарегистрировать сразу как торговую марку вашу
                                        компанию, бренд, продукт или стартап, тогда
                                        информация ниже будет полезна. Да и вообще, если
                                        вы прицениваетесь, и хотите…</p>
                                    </div>
                                  </div>
                                </div> -->

               
        <div class="reload" id="loadMoreButton">
            <div class="reload-icon">
                <img src="{{ '../assets/images/reload.png' }}">
            </div>
            <span class="reloadText">{{ __('translate.more') }}</span>
        </div>
    </div>
    <script>
    // Ensure the DOM is fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        cleanAndTruncateText('.body-text', 400); // Adjust 400 to your desired max length
    });
</script>

@endsection

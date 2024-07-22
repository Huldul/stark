@if(session('success'))<div class="alert--fixed box-size alert--active">
    <div class="alert--content alert--width alert--block box-size">
    <div class="alert-text box-size">


    <div class="alert--title box-size" >{{ session('success') }}</div>

    </div>
    <div class="alert--x alert--close box-size">
    <svg class="box-size" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 284.559 284.559" xml:space="preserve">
    <path id="XMLID_90_" d="M4.394,237.739l42.427,42.427c2.812,2.813,6.629,4.394,10.606,4.394c3.978,0,7.794-1.581,10.606-4.394
    l74.246-74.246l74.246,74.246c2.813,2.813,6.629,4.394,10.606,4.394c3.978,0,7.794-1.581,10.607-4.394l42.427-42.427
    c5.858-5.858,5.858-15.355,0-21.213L205.92,142.28l74.245-74.247c2.814-2.813,4.394-6.628,4.394-10.606
    c0-3.979-1.58-7.794-4.394-10.607L237.739,4.393c-5.857-5.858-15.356-5.858-21.213,0.001L142.28,78.639L68.033,4.394
    c-5.857-5.858-15.356-5.858-21.213,0L4.394,46.82C1.58,49.633,0,53.448,0,57.426c0,3.978,1.58,7.793,4.394,10.606l74.245,74.247
    L4.394,216.526C-1.465,222.384-1.465,231.881,4.394,237.739z"/>
    </svg>
    </div>
    </div>
    <div class="alert--bg alert--close box-size"></div>
    </div>
@endif

<header class="header way way-header">
    <div class="container">
        <div class="header__container">
            <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="header__logo">
                <img src="{{asset("img/logo.png")}}" alt="Stark">
            </a>
            <div class="header__lang">
                <a href="javascript:;" class="header__lang-active">
                    <img src="{{asset("img/lang-icon.png")}}" alt="" class="icon-svg">
                    @switch(app()->getLocale())
                        @case('ru')
                            Рус
                            @break
                        @case('kz')
                            Каз
                            @break
                         @case('en')
                            Eng
                            @break
                        @default
                            Рус
                    @endswitch
                </a>
                <div class="header__lang-other">
                    <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'ru'])) }}">Рус</a>
                    <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'kz'])) }}">Каз</a>
                    <a href="{{ route(Route::currentRouteName(), array_merge(Route::current()->parameters(), ['locale' => 'en'])) }}">Анг</a>
                </div>

            </div>
            <div class="header__menu">
                <nav class="header__nav">
                    <ul class="header__nav-list">
                        <li class="header__nav-item">
                            <a href="{{ route('tasks', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('services')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('about_company')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('career', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('career')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('contacts')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('prices', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('prices')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('team', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('team')</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('stocks', ['locale' => app()->getLocale()]) }}" class="header__nav-link">@trans('promotions')</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__info">
                    <div class="header__phones">
                        <a href="tel:{{setting('.number')}}">{{setting('.number')}}</a>
                        <a href="tel:{{setting('.number2')}}">{{setting('.number2')}}</a>
                    </div>
                    <div class="header__socials">
                        <a href="{{setting('.wa')}}" target="_blank">
                            <img src="{{asset("img/wp-icon.png")}}" alt="">
                        </a>
                        <a href="{{setting('.instagram')}}" target="_blank">
                            <img src="{{asset("img/insta-icon.png")}}" alt="">
                        </a>
                    </div>
                    <a href="mailto:{{setting('.email')}}" class="header__mail" target="_blank">{{setting('.email')}}</a>
                </div>
            </div>
            <div class="burger" id="menu-icon">
                <div class="burger__dot burger__dot--line burger__dot--left-top"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--right-top"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--left-bottom"></div>
                <div class="burger__dot burger__dot--aside"></div>
                <div class="burger__dot burger__dot--line burger__dot--right-bottom"></div>
            </div>
        </div>
    </div>
</header>
<div class="header-space"></div>

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
                            <a href="{{ route('tasks', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Услуги</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="header__nav-link">О Компании</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('career', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Карьера</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Контакты</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('prices', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Цены</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('team', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Команда</a>
                        </li>
                        <li class="header__nav-item">
                            <a href="{{ route('stocks', ['locale' => app()->getLocale()]) }}" class="header__nav-link">Акции</a>
                        </li>
                    </ul>
                </nav>
                <div class="header__info">
                    <div class="header__phones">
                        <a href="tel:{{setting('.number')}}">{{setting('.number')}}</a>
                        <a href="tel:{{setting('.number2')}}">{{setting('.number2')}}</a>
                    </div>
                    <div class="header__socials">
                        <a href="setting('.wa')" target="_blank">
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
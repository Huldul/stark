@extends('layout')

@section('content')
    <main>
        <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs__container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__list-item">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="breadcrumbs__list-link">Главная</a>
                </li>
                <li class="breadcrumbs__list-item">
                    <a href="#" class="breadcrumbs__list-link active">О компании</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        <section class="contacts">
            <div class="container">
                <div class="contacts__container sample__container">
                    <h1 class="contacts__title title-inner">Контакты</h1>
                    <div class="contacts__header">
                        <div class="contacts__col">
                            <div class="contacts__col-title">адрес</div>
                            <ul class="contacts__col-list">
                                <li>
                                    <span>{{setting('.adress')}}</span>
                                </li>
                            </ul>
                        </div>
                        <div class="contacts__col">
                            <div class="contacts__col-title">email</div>
                            <ul class="contacts__col-list">
                                <li>
                                    <a href="mailto:{{setting('.email')}}">{{setting('.email')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contacts__col">
                            <div class="contacts__col-title">телефон</div>
                            <ul class="contacts__col-list">
                                <li>
                                    <a href="tel:{{setting('.number')}}">{{setting('.number')}}</a>
                                </li>
                                <li>
                                    <a href="tel:{{setting('.number2')}}">{{setting('.number2')}}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="contacts__col">
                            <a href="javascript:;" class="contacts__link js-btn-modal-feedback">заказать услугу</a>
                        </div>
                    </div>
                    <div class="contacts__map">
                        <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A416282db2612b5af084c0188b0f14f7df3bcb72b2d7d36adb4dca15642a405ca&amp;source=constructor" width="100%" height="100%" frameborder="0"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- loader form -->
    @endsection
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
        <section class="price">
            <div class="container">
                <div class="price__container">
                    <h1 class="price__title title-inner">Цены</h1>
                    <div class="price__block">
                        @foreach ($categs as $categ)
                        <div class="tarif__block">
                            <div class="section__header">
                                <div class="tarif__tag">
                                    {{$categ->tite}}
                                    <img src="{{asset("storage/".$categ->image)}}" alt="">
                                </div>
                                <div class="section__header-col">
                                    <p class="section__header-text">{{$categ->main}}</p>
                                </div>
                            </div>
                            <div class="tarif__items">
                                @foreach ($categ->tarifs as $tarif)
                                @php
                                $images = json_decode($tarif->images, true);
                                $firstImageUrl = $images[0] ?? null; // Используйте null coalescing operator для избежания ошибок, если массив пуст

                                $tarTran = $tarif->translate(app()->getLocale());
                                
                                
                                @endphp
                                <a href="{{ url(app()->getLocale() .'/price-inner/'. $tarif->slug . '/') }}" class="tarif__item">
                                    <div class="tarif__item-img">
                                        <img src="{{asset("storage/".$firstImageUrl)}}" alt="">
                                        <div class="tarif__item-tag">{{$tarTran->type}}</div>
                                    </div>
                                    <div class="tarif__item-text">
                                        <p>{{$tarTran->subtitle}}</p>
                                    </div>
                                    <div class="tarif__item-price">
                                        <span>{{$tarTran->price1}}</span>
                                        <span>{{$tarTran->price1}} ₸</span>
                                    </div>
                                </a>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                        

            
                    </div>
                </div>
            </div>
        </section>
        <section class="calc">
            <div class="container">
                <div class="calc__container content">
                    <div class="section__header">
                        <div class="section__desc">рассчитайте стоимость услуг исходя из своих запросов</div>
                        <div class="section__header-col">
                            <h2 class="section__title calc__title title">Калькулятор стоимости услуг</h2>
                        </div>
                        <a href="javascript:;" class="calc__link-feedback js-btn-modal-feedback">заказать услугу</a>
                    </div>
                    <form action="" onSubmit="submitForm()">
                        <div class="calc__wrap">
                            <div class="calc__wrap-steps">
                                <div class="calc__step active">
                                    <div class="calc__step-current">
                                        <span>1 шаг из 6</span>
                                    </div>
                                    <div class="calc__step-1">
                                        <div class="calc__step-1-fields">
                                            <input type="text" placeholder="марка*" class="js-required-field js-brand">
                                            <input type="text" placeholder="модель*" class="js-required-field js-model">
                                            <input type="text" placeholder="год выпуска*" class="js-required-field js-year">
                                            <input type="text" placeholder="комплектация" class="js-equipment">
                                        </div>
                                        <div class="calc__step-1-radios">
                                            <label for="type-car-1" class="calc__step-1-radio">
                                                <input type="radio" name="type-car" id="type-car-1" value="car-1">
                                                <div>
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="11" cy="11" r="5" fill="#DC2128"/>
                                                        <circle cx="11" cy="11" r="10" stroke="#DC2128" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                                <span>кроссовер</span>
                                            </label>
                                            <label for="type-car-2" class="calc__step-1-radio">
                                                <input type="radio" name="type-car" id="type-car-2" value="car-2">
                                                <div>
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="11" cy="11" r="5" fill="#DC2128"/>
                                                        <circle cx="11" cy="11" r="10" stroke="#DC2128" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                                <span>седан</span>
                                            </label>
                                            <label for="type-car-3" class="calc__step-1-radio">
                                                <input type="radio" name="type-car" id="type-car-3" value="car-3">
                                                <div>
                                                    <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle cx="11" cy="11" r="5" fill="#DC2128"/>
                                                        <circle cx="11" cy="11" r="10" stroke="#DC2128" stroke-width="2"/>
                                                    </svg>
                                                </div>
                                                <span>внедорожник</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="calc__step">
                                    <div class="calc__step-current">
                                        <span>2 шаг из 6</span>
                                        <span>Выберите вариант:</span>
                                    </div>
                                    <div class="calc__step-2">
                                        <input type="radio" name="type-solution" id="type-solution-1" value="solution-1">
                                        <label for="type-solution-1" class="calc__step-box">
                                            <div class="calc__step-icon">
                                                <img src="img/step-icon-1.png" alt="">
                                            </div>
                                            <div class="calc__step-name">Пакетное решение</div>
                                            <div class="calc__step-text">
                                                мы подготовили для вас готовые комплексы услуг. подойдет тем, кто не хочет тратить время и разбираться
                                            </div>
                                        </label>
                                        <input type="radio" name="type-solution" id="type-solution-2" value="solution-2">
                                        <label for="type-solution-2" class="calc__step-box">
                                            <div class="calc__step-icon">
                                                <img src="img/step-icon-2.png" alt="">
                                            </div>
                                            <div class="calc__step-name">Бронь отдельных элементов</div>
                                            <div class="calc__step-text">
                                                вы можете выборочно пройтись по списку и выбрать желаемое. подойдет тем, кто точно знает какие у него запросы
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="calc__step">
                                    <div class="calc__step-3">
                                        <div class="calc__step-packages" id="package-solution">
                                            <div class="calc__step-current">
                                                <span>3 шаг из 6</span>
                                                <span>Выберите пакет услуг:</span>
                                            </div>
                                            <div class="calc__step-2">
                                                <input type="radio" name="type-package" id="type-package-1" data-price="10000" value="package-1">
                                                <label for="type-package-1" class="calc__step-box">
                                                    <div class="calc__step-icon">
                                                        <img src="img/luxe-package.png" alt="">
                                                    </div>
                                                    <div class="calc__step-name">Пакет люкс</div>
                                                    <div class="calc__step-text">
                                                        Покрытие пленкой выгодно отличается от различных защитных полировок, это не просто тонкий слой химии
                                                    </div>
                                                </label>
                                                <input type="radio" name="type-package" id="type-package-2" data-price="15000" value="package-2">
                                                <label for="type-package-2" class="calc__step-box">
                                                    <div class="calc__step-icon">
                                                        <img src="img/full-package.png" alt="">
                                                    </div>
                                                    <div class="calc__step-name">Полный пакет</div>
                                                    <div class="calc__step-text">
                                                        Покрытие пленкой выгодно отличается от различных защитных полировок, это не просто тонкий слой химии
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="calc__step-individual" id="individual-elements">
                                            <div class="calc__step-current">
                                                <span>3 шаг из 6</span>
                                                <span>Выберите все нужные элементы:</span>
                                            </div>
                                            <div class="calc__step-individual__items">
                                                <label for="individual-1" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-1" data-price="1500" value="individual-1">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>передний бампер</span>
                                                </label>
                                                <label for="individual-2" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-2" data-price="1250" value="individual-2">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>крыша полностью</span>
                                                </label>
                                                <label for="individual-3" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-3" data-price="1300" value="individual-3">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>крылья передние</span>
                                                </label>
                                                <label for="individual-4" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-4" data-price="1800" value="individual-4">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>крыша полоса 20 см</span>
                                                </label>
                                                <label for="individual-5" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-5" data-price="1650" value="individual-5">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>крылья задние</span>
                                                </label>
                                                <label for="individual-6" class="calc__step-checkbox">
                                                    <input type="checkbox" id="individual-6" data-price="1245" value="individual-6">
                                                    <div>
                                                        <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </div>
                                                    <span>окантовка вокруг стекол</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="calc__step">
                                    <div class="calc__step-current">
                                        <span>4 шаг из 6</span>
                                        <span>Выберите один бренд плёнки:</span>
                                    </div>
                                    <div class="calc__step-4">
                                        <div class="calc__step-brands">
                                            <label for="brand-1" class="calc__step-checkbox">
                                                <input type="radio" id="brand-1" name="type-brand" value="brand-1">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>Hexis Bodyfence Мат</span>
                                            </label>
                                            <label for="brand-2" class="calc__step-checkbox">
                                                <input type="radio" id="brand-2" name="type-brand" value="brand-2">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>TPU MAX</span>
                                            </label>
                                            <label for="brand-3" class="calc__step-checkbox">
                                                <input type="radio" id="brand-3" name="type-brand" value="brand-3">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>Hexis Bodyfence глянец</span>
                                            </label>
                                            <label for="brand-4" class="calc__step-checkbox">
                                                <input type="radio" id="brand-4" name="type-brand" value="brand-4">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>G 190</span>
                                            </label>
                                            <label for="brand-5" class="calc__step-checkbox">
                                                <input type="radio" id="brand-5" name="type-brand" value="brand-5">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>Membrane Xside</span>
                                            </label>
                                            <label for="brand-6" class="calc__step-checkbox">
                                                <input type="radio" id="brand-6" name="type-brand" value="brand-6">
                                                <div>
                                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </svg>
                                                </div>
                                                <span>Lux pro</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="calc__step">
                                    <div class="calc__step-current">
                                        <span>5 шаг из 6</span>
                                        <span>Выберите дополнительные услуги (опционально):</span>
                                    </div>
                                    <div class="calc__step-additionally">
                                        <label for="additionally-1" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-1" data-price="1500" value="additionally-1">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>москитные сетки</span>
                                        </label>
                                        <label for="additionally-2" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-2" data-price="1200" value="additionally-2">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>крылья передние</span>
                                        </label>
                                        <label for="additionally-3" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-3" data-price="1300" value="additionally-3">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>крылья задние</span>
                                        </label>
                                        <label for="additionally-4" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-4" data-price="1400" value="additionally-4">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>двери</span>
                                        </label>
                                        <label for="additionally-5" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-5" data-price="1600" value="additionally-5">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>зеркала</span>
                                        </label>
                                        <label for="additionally-6" class="calc__step-checkbox">
                                            <input type="checkbox" id="additionally-6" data-price="1800" value="additionally-6">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>решетка</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="calc__step">
                                    <div class="calc__step-current">
                                        <span>6 шаг из 6</span>
                                        <span>Оставьте свои контактыне данные, чтобы получить pdf расчет:</span>
                                    </div>
                                    <div class="calc__step-6">
                                        <div class="calc__step-1-fields">
                                            <input type="text" placeholder="имя" class="js-name">
                                            <input type="tel" placeholder="номер телефона (c whatsapp)" class="js-phone">
                                        </div>
                                        <label for="feedback-calc" class="calc__step-checkbox">
                                            <input type="checkbox" id="feedback-calc" class="js-feedback">
                                            <div>
                                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M1 6L5.33333 11L14 1" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                                </svg>
                                            </div>
                                            <span>хочу, чтобы со мной связались</span>
                                        </label>
                                        <div class="calc__step-politics">
                                            Нажимая на кнопку “Отправить” вы соглашаетесь с <a href="#" target="_blank">Политикой обработки персональных данных</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="calc__buttons">
                                    <button type="button" class="calc__buttons-item prev">назад</button>
                                    <button type="button" class="calc__buttons-item next">следующий шаг</button>
                                    <button type="submit" class="calc__buttons-item submit">получить pdf расчет</button>
                                    <div class="calc__total-summa"><span>0</span> ₸</div> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <!-- loader form -->
    @endsection
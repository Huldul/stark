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
        <section class="career">
            <div class="container">
                <div class="career__container sample__container">
                    <h1 class="career__title title-inner">Карьера</h1>
                    <div class="career__main-accordeons">
                        @foreach ($vacs as $vac)
                        <div class="career__main-accordeon">
                            <a href="javascript:;" class="career__main-title js-accordeons__item-title">
                                {{$vac->title}}
                                <svg width="30" height="31" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M25 16.6111H16.1111V25.5H13.8889V16.6111H5V14.3889H13.8889V5.5H16.1111V14.3889H25V16.6111Z" fill="#DC2128"/>
                                    <path d="M25 16.1109H16.1111H13.8889H5V13.8887H13.8889L16.1111 13.8889L25 13.8887V16.1109Z" fill="#DC2128"/>                                        
                                </svg>                                                                        
                            </a>
                            <div class="career__main-body js-accordeons__item-body">
                                <p>{{$vac->main}}</p>
                                <a href="javascript:;" class="js-response-btn" data-id="1">откликнуться</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <div class="modal modal-career">
    <div class="modal__block">
        <div class="modal__block-title js-career-title">Отклик на вакансию "<span></span>"</div>
        <div class="modal__block-text">Оставьте свои контактные данные и наш менеджер свяжется с вами для уточнения деталей.</div>
        <a href="javascript:;" class="modal__block-close">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 5L23.75 23.75" stroke="#A7A7A7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M23.75 5L5 23.75" stroke="#A7A7A7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>                
        </a>
        <form action="">
            <div class="modal__block-form">
                <input type="text" class="modal__block-field" placeholder="ваше имя*">
                <input type="tel" class="modal__block-field" placeholder="телефон*">
                <select class="modal__block-select js-career-select">
                    <option selected hidden disabled></option>
                    
                    @foreach ($vacs as $key => $vac)
                    <option value="{{$key}}">{{$vac->title}}</option>
                    @endforeach
                    
                </select>
                <label for="file" class="modal__block-file">
                    <input type="file" id="file">
                    <svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.7084 3.55518C15.323 3.24964 16.0454 3.15873 16.7604 3.35032C18.3163 3.76723 19.2397 5.36655 18.8228 6.92249L16.4503 15.7768C16.0334 17.3328 14.434 18.2561 12.8781 17.8392C11.3222 17.4223 10.3988 15.823 10.8157 14.267L11.7647 10.7253C11.8719 10.3252 11.6345 9.91395 11.2344 9.80674C10.8343 9.69954 10.423 9.93698 10.3158 10.3371L9.36682 13.8788C8.7355 16.2349 10.1337 18.6568 12.4899 19.2881C14.846 19.9194 17.2678 18.5212 17.8992 16.165L20.2717 7.31072C20.903 4.95458 19.5048 2.53275 17.1486 1.90143C16.0672 1.61165 14.9701 1.74999 14.0407 2.21198C13.4708 2.49527 12.9628 2.9007 12.5583 3.40504C12.2991 3.72815 12.3509 4.20019 12.6741 4.45936C12.9972 4.71853 13.4692 4.6667 13.7284 4.34358C13.9949 4.01125 14.3307 3.74292 14.7084 3.55518Z" fill="#DC2128"/>
                        <path d="M8.22299 9.7763C8.6399 8.22036 10.2392 7.29699 11.7952 7.71391C13.3511 8.13082 14.2745 9.73013 13.8576 11.2861L12.9086 14.8278C12.8013 15.2279 13.0388 15.6392 13.4389 15.7464C13.839 15.8536 14.2502 15.6161 14.3574 15.216L15.3064 11.6743C15.9378 9.31816 14.5395 6.89634 12.1834 6.26502C9.82725 5.63369 7.40542 7.03193 6.7741 9.38807L4.40159 18.2424C3.77026 20.5985 5.1685 23.0204 7.52465 23.6517C8.6061 23.9415 9.70319 23.8031 10.6326 23.3411C11.2024 23.0578 11.7105 22.6524 12.115 22.1481C12.3742 21.825 12.3223 21.3529 11.9992 21.0937C11.6761 20.8346 11.2041 20.8864 10.9449 21.2095C10.6783 21.5419 10.3425 21.8102 9.96485 21.9979C9.35022 22.3035 8.62787 22.3944 7.91287 22.2028C6.35693 21.7859 5.43357 20.1866 5.85048 18.6306L8.22299 9.7763Z" fill="#DC2128"/>
                    </svg>                            
                    <span>выбрать файл резюме</span>
                </label>
                <div class="modal__block-bot">
                    <button class="modal__block-submit">отправить</button>
                    <p class="modal__block-politic">Нажимая кнопку “Отправить” вы даёте согласие на обработку  персональных данных</p>
                </div>
            </div>
        </form>
    </div>
</div>
    </main>
    <!-- loader form -->
    @endsection
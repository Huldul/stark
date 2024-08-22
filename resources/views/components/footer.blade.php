<div class="modal modal-feedback">
    <div class="modal__block">
        <div class="modal__block-title js-career-title">@trans('contact_us')</div>
        <div class="modal__block-text">@trans('leave_your_contact_info')</div>
        <a href="javascript:;" class="modal__block-close">
            <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M5 5L23.75 23.75" stroke="#A7A7A7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M23.75 5L5 23.75" stroke="#A7A7A7" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
        <form action="{{route('sendApplication')}}" method="POST" onSubmit="submitForm()">  @csrf
            <div class="modal__block-form">
                <input type="text" class="modal__block-field" name="name" placeholder="@trans('your_name')">
                <input type="tel" class="modal__block-field" name="number" placeholder="@trans('phone')">
                <textarea class="modal__block-field textarea" name="text" placeholder="@trans('your_message')"></textarea>
                <div class="modal__block-bot">
                    <button type="submit"class="modal__block-submit">@trans('send')</button>
                    <p class="modal__block-politic">@trans('consent_to_processing')</p>
                </div>
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <div class="container">
        <div class="footer__container">
            <div class="footer__top">
                <div class="footer__col">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="footer__logo">
                        <img src="{{asset("img/logo-2.png")}}" alt="STARK">
                    </a>
                    <span>{{setting('.licence')}}</span>
                </div>
                <nav class="footer__nav">
                    <ul class="footer__list">
                        <li class="footer__list-item">
                            <a href="{{ route('tasks', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('services')</a>
                        </li>
                        <li class="footer__list-item">
                            <a href="{{ route('prices', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('prices')</a>
                        </li>
                        <li class="footer__list-item">
                            <a href="{{ route('about', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('about_company')</a>
                        </li>
                        <li class="footer__list-item">
                            <a href="{{ route('team', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('team')</a>
                        </li>
                    </ul>
                    <ul class="footer__list">
                        <li class="footer__list-item">
                            <a href="{{ route('career', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('career')</a>
                        </li>
                        <li class="footer__list-item">
                            <a href="{{ route('stocks', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('promotions')</a>
                        </li>
                        <li class="footer__list-item">
                            <a href="{{ route('contact', ['locale' => app()->getLocale()]) }}" class="footer__list-link">@trans('contacts')</a>
                        </li>
                        <li class="footer__list-socials">
                            <a href="{{setting('.instagram')}}" class="footer__list-social">
                                <img src="{{asset("img/insta-icon.png")}}" alt="">
                            </a>
                            <a href="{{setting('.tg')}}" class="footer__list-social">
                                <img src="{{asset("img/tg-icon.png")}}" alt="">
                            </a>
                            <a href="{{setting('.wa')}}" class="footer__list-social">
                                <img src="{{asset("img/wp-icon.png")}}" alt="">
                            </a>
                        </li>
                    </ul>
                </nav>
                <ul class="footer__info">
                    <li class="footer__info-item">
                        <a href="tel:{{setting('.number')}}" class="ink">{{setting('.number')}}</a>
                    </li>
                    <li class="footer__info-item">
                        <a href="tel:{{setting('.number2')}}" class="ink">{{setting('.number2')}}</a>
                    </li>
                    <li class="footer__info-item">
                        <a href="mailto:{{setting('.email')}}" class="footer__info-link">{{setting('.email')}}</a>
                    </li>
                    <li class="footer__info-item">
                        <a href="javascript:;" class="footer__info-link red js-feedback js-btn-modal-feedback">@trans('get_in_touch')</a>
                    </li>
                </ul>
                <a href="javascript:;" class="footer__link js-btn-modal-feedback">@trans('order_service')</a>
            </div>
            <div class="footer__bot">
                <span class="footer__bot-stark">©2024 - STARK</span>
                <!-- <a href="#" class="footer__bot-politics">@trans('privacy_policy')</a> -->
                <a href="https://astanacreative.kz" target="_blank" class="footer__bot-develop">
                    @trans('site_developed_by') <span>Astana Creative</span>
                </a>
            </div>
        </div>
    </div>
</footer>

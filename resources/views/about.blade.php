@extends('layout')

@section('content')
    <main>
        <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs__container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__list-item">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="breadcrumbs__list-link">@trans('homepage')</a>
                </li>
                <li class="breadcrumbs__list-item">
                    <a href="#" class="breadcrumbs__list-link active">@trans('about_company')</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        <section class="about">
            <div class="container">
                <div class="about__container sample__container">
                    <h1 class="about__title title-inner">@trans('about_company')</h1>
                    <div class="about__mission">
                        <div class="about__mission-left">
                            <h2> {!!$page->mission!!}</h2>
                        </div>
                        <div class="about__mission-right">
                            {!!$page->head_main!!}
                            <div class="about__mission-stark">
                                <div class="col">
                                    <svg width="65" height="81" viewBox="0 0 65 81" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M34.7924 46.7824L24.9435 44.9625C12.4182 42.3932 1.71286 35.97 1.71286 22.4813C1.71286 6.85143 18.4132 0 32.6513 0C48.7094 0 62.3052 9.42071 63.1616 24.3012H48.3882C47.2106 15.2016 39.2887 12.2041 32.009 12.2041C24.8364 12.2041 17.0215 14.8804 17.0215 21.8389C17.0215 27.2987 21.5178 30.2962 27.8339 31.4738L38.004 33.2937C50.6363 35.6488 64.5533 40.4663 64.5533 56.6313C64.5533 72.5823 48.7094 80.3972 33.0796 80.3972C14.024 80.3972 1.3917 70.1201 0 53.4197H14.7734C16.4863 64.8745 24.4082 68.1931 33.6148 68.1931C40.4663 68.1931 49.1376 65.6238 49.1376 57.3807C49.1376 50.8504 43.0355 48.1741 34.7924 46.7824Z" fill="#DC2128"/>
                                    </svg>
                                    <span>{{$page->l1}}</span>
                                </div>
                                <div class="col">
                                    <svg width="64" height="78" viewBox="0 0 64 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M23.8729 78.0054V12.8098H0V0.391602H63.1616V12.8098H39.1816V78.0054H23.8729Z" fill="#DC2128"/>
                                    </svg>
                                    <span>{{$page->l2}}</span>
                                </div>
                                <div class="col">
                                    <svg width="74" height="78" viewBox="0 0 74 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 78.0054L28.9045 0.391602H44.3202L73.3317 78.0054H56.7384L51.2787 62.2686H21.0896L15.6298 78.0054H0ZM36.1841 19.126L25.4788 49.7433H46.8895L36.1841 19.126Z" fill="#DC2128"/>
                                    </svg>
                                    <span>{{$page->l3}}</span>
                                </div>
                                <div class="col">
                                    <svg width="65" height="78" viewBox="0 0 65 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M46.9965 78.0054L31.5808 47.6022H15.3087V78.0054H0V0.391602H25.4788C51.0646 0.391602 60.8064 7.67125 60.8064 23.9434C60.8064 32.9359 56.5243 40.2155 46.7824 44.3906L64.018 78.0054H46.9965ZM27.1916 12.3816H15.3087V35.7193H27.941C39.931 35.7193 45.0696 31.7583 45.0696 24.0504C45.0696 15.0579 37.5758 12.3816 27.1916 12.3816Z" fill="#DC2128"/>
                                    </svg>
                                    <span>{{$page->l4}}</span>
                                </div>
                                <div class="col">
                                    <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M15.3087 0.391602V35.9334L46.9965 0.391602H64.8745L36.2912 31.6512L67.0155 78.0054H48.9235L26.014 42.9989L15.3087 54.6678V78.0054H0V0.391602H15.3087Z" fill="#DC2128"/>
                                    </svg>
                                    <span>{{$page->l5}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="about__image">
                        <img src="{{asset("storage/".$page->image)}}" alt="">
                    </div>
                    <div class="about__stats">
                        <ul class="about__stats-items">
                            <li class="exp__item">
                                <div class="exp__item-count">{{$page->years}} лет</div>
                                <div class="exp__item-text">заботимся об автомобилях</div>
                            </li>
                            <li class="exp__item">
                                <div class="exp__item-count">{{$page->rewievs}}</div>
                                <div class="exp__item-text">отзывов в 2гис</div>
                            </li>
                            <li class="exp__item">
                                <div class="exp__item-count red">{{$page->cars}}</div>
                                <div class="exp__item-text">машин мы починили</div>
                            </li>
                            <li class="exp__item">
                                <div class="exp__item-count">{{$page->backs}}%</div>
                                <div class="exp__item-text">клиентов возвращаются к нам снова</div>
                            </li>
                            <li class="exp__item">
                                <div class="exp__item-count red">{{$page->max}}%</div>
                                <div class="exp__item-text">клиентов поставили нам максимальную оценку</div>
                            </li>
                            <li class="exp__item">
                                <div class="exp__item-count">{{$page->first}}</div>
                                <div class="exp__item-text">год открытия и первой починенной машины</div>
                            </li>
                        </ul>
                        <div class="about__stats-right">
                            <ul>
                                <li>
                                    <h3>S - {{$page->l1}}:</h3>
                                    <p>{{$page->s}}</p>
                                </li>
                                <li>
                                    <h3>T - {{$page->l2}}:</h3>
                                    <p>{{$page->t}}</p>
                                </li>
                                <li>
                                    <h3>A - {{$page->l3}}:</h3>
                                    <p>{{$page->a}}</p>
                                </li>
                                <li>
                                    <h3>R - {{$page->l4}}:</h3>
                                    <p>{{$page->r}}</p>
                                </li>
                                <li>
                                    <h3>K - {{$page->l5}}:</h3>
                                    <p>{{$page->k}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="about__sertificates">
                        <div class="about__sertificates-header">
                            <h2 class="about__sertificates-title">Сертификаты</h2>
                            <div class="about__sertificates-arrows">
                                <a href="javascript:;" class="about__sertificates-arrow prev">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>
                                </a>
                                <a href="javascript:;" class="about__sertificates-arrow next">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="70" height="70" rx="35" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M29 23L41 35L29 47" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="about__sertificates-slider swiper">
                            <div class="swiper-wrapper">
                                @foreach ($sers as $ser)
                                <div class="about__sertificates-item swiper-slide" data-fancybox="sertificates" data-src="{{asset("storage/".$ser->image)}}">
                                    <img src="{{asset("storage/".$ser->image)}}" alt="">
                                </div>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @endsection

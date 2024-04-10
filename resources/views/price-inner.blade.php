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
                    <a href="#" class="breadcrumbs__list-link active">{{$tarif->title}}</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        <section class="inner">
            <div class="container">
                <div class="inner__container sample__container">
                    <h1 class="inner__title title-inner">{{$tarif->title}}</h1>
                    <div class="inner__block stock__inner">
                        <div class="inner__block-text">
                            {!!$tarif->main!!}
                        </div>
                        <div class="inner__block-info">
                            <div class="inner__block-price">от {{$tarif->price1}} ₸</div>
                            <a href="javascript:;" class="inner__block-link js-btn-modal-feedback">заказать услугу</a>
                        </div>
                    </div>
                    <div class="inner__slider swiper">
                        <a href="javascript:;" class="inner__slider-arrow prev">
                            <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="white"/>
                                <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                            </svg>                                
                        </a>
                        <div class="swiper-wrapper">
                            @if($tarif->images)
                            @php
                                $images = json_decode($tarif->images, true);
                            @endphp
                        
                            @foreach ($images as $image)
                                <div class="swiper-slide inner__slider-item" data-fancybox data-src="{{ asset("storage/" . $image) }}">
                                    <img src="{{ asset("storage/" . $image) }}" alt="">
                                </div>
                            @endforeach
                        @endif
                            
                        </div>
                        <a href="javascript:;" class="inner__slider-arrow next">
                            <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <rect width="70" height="70" rx="35" fill="white"/>
                                <path d="M29 23L41 35L29 47" stroke="#DC2128" stroke-width="2.5"/>
                            </svg>                                
                        </a>
                    </div>
                    <div class="inner__recomend">
                        <h2 class="inner__recomend-title">Вас может заинтересовать:</h2>
                        <div class="service__items">
                            @foreach ($tasks as $item)
                            @php
                                $images = json_decode($item->images, true);
                                $firstImageUrl = $images[0] ?? null; // Используйте null coalescing operator для избежания ошибок, если массив пуст
                                @endphp
                            <a href="{{ url(app()->getLocale() .'/task-inner/'. $item->slug . '/') }}" class="task__slider-item">
                                <div class="task__slider-img">
                                    <img src="{{asset("storage/".$firstImageUrl)}}" alt="">
                                </div>
                                <div class="task__slider-title">{{$item->title}}</div>
                                <div class="task__slider-text">
                                    {{$item->subtitle}}
                                    <div class="task__slider-circle">
                                        <svg width="64" height="65" viewBox="0 0 64 65" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect x="1" y="1.5" width="62" height="62" rx="31" stroke="white" stroke-opacity="0.2" stroke-width="2"/>
                                            <path d="M27 22.5L37 32.5L27 42.5" stroke="white" stroke-opacity="0.4" stroke-width="2"/>
                                        </svg>                                            
                                    </div>
                                </div>
                            </a>
                            @endforeach
                           
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- loader form -->
    @endsection
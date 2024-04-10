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
                    <a href="#" class="breadcrumbs__list-link active">{{$stock->title}}</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        <section class="inner">
            <div class="container">
                <div class="inner__container sample__container">
                    <h1 class="inner__title title-inner">{{$stock->title}}</h1>
                    <div class="inner__block stock__inner">
                        <div class="inner__block-text">
                            {!!$stock->main!!}
                        </div>
                        <div class="inner__block-info">
                            <a href="javascript:;" class="inner__block-link js-btn-modal-feedback">заказать услугу</a>
                            <div class="inner__block-shares">
                                <span>Поделиться в социальных сетях</span>
                                <div class="inner__block-share">
                                    <a href="#" target="_blank">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_20_1113)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#4682C3"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M26.559 10.9017C26.721 10.3927 26.559 10.0232 25.8415 10.0232H23.459C23.237 10.0109 23.0168 10.0691 22.8299 10.1895C22.643 10.31 22.499 10.4864 22.4185 10.6937C21.6734 12.4506 20.6842 14.0937 19.48 15.5742C18.925 16.1292 18.671 16.3147 18.37 16.3147C18.208 16.3147 18 16.1292 18 15.6202V10.8787C18 10.2772 17.8145 9.9997 17.306 9.9997H13.653C13.5769 9.99601 13.5009 10.0075 13.4293 10.0335C13.3577 10.0595 13.2919 10.0995 13.236 10.1512C13.18 10.2028 13.1348 10.2651 13.1032 10.3344C13.0715 10.4037 13.0539 10.4786 13.0515 10.5547C13.0515 11.1332 13.9075 11.2717 14 12.8912V16.4067C14 17.1702 13.861 17.3092 13.5605 17.3092C12.7505 17.3092 10.459 14.3252 9.279 10.9247C9.0475 10.2537 8.817 9.9997 8.215 9.9997H5.8095C5.1155 9.9997 5 10.3232 5 10.6702C5 12.1982 9.319 22.9762 16.2885 22.9762C17.8145 22.9762 18 22.6297 18 22.0512V19.9002C18 19.2057 18.139 19.0902 18.6245 19.0902C19.865 19.0902 22.11 21.8612 22.69 22.4417C22.8239 22.6107 22.9932 22.7482 23.186 22.8447C23.3789 22.9411 23.5905 22.994 23.806 22.9997H26.1885C26.8825 22.9997 27.124 22.5782 26.9395 21.9077C26.5105 20.5277 23.526 17.6887 23.367 17.4712C23.0195 17.0082 23.112 16.8237 23.367 16.4067C23.3435 16.4067 26.258 12.2897 26.559 10.9017Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_20_1113">
                                            <rect width="32" height="32" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                            
                                    </a>
                                    <a href="#" target="_blank">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_20_1118)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#00D264"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.8366 23.5465C10.9697 23.5087 11.1092 23.4988 11.2463 23.5176C11.3834 23.5363 11.5151 23.5833 11.6331 23.6555C13.6211 24.8399 15.9734 25.2572 18.2475 24.8288C20.5216 24.4004 22.5609 23.1558 23.9817 21.3293C25.4025 19.5027 26.107 17.2199 25.9626 14.9103C25.8183 12.6007 24.835 10.4234 23.1978 8.78795C21.5606 7.15249 19.3823 6.17157 17.0725 6.02967C14.7628 5.88778 12.4808 6.59468 10.6557 8.01744C8.83061 9.44019 7.58825 11.4808 7.16228 13.7553C6.7363 16.0299 7.15605 18.3817 8.3426 20.3685C8.41454 20.4862 8.46129 20.6175 8.47988 20.7542C8.49847 20.8908 8.4885 21.0299 8.4506 21.1625C8.1721 22.148 7.5001 24.5 7.5001 24.5L10.8366 23.5465ZM6.6096 21.367C5.18001 18.9572 4.67932 16.1084 5.20155 13.3555C5.72378 10.6026 7.233 8.13512 9.44581 6.41628C11.6586 4.69744 14.4228 3.84552 17.2193 4.02051C20.0158 4.1955 22.6522 5.38535 24.6335 7.36663C26.6147 9.34791 27.8046 11.9843 27.9796 14.7808C28.1546 17.5773 27.3027 20.3415 25.5838 22.5543C23.865 24.7671 21.3974 26.2763 18.6446 26.7985C15.8917 27.3208 13.0429 26.8201 10.6331 25.3905C10.6331 25.3905 7.4446 26.3015 5.8656 26.753C5.77981 26.7774 5.68906 26.7785 5.60272 26.7561C5.51638 26.7337 5.4376 26.6886 5.37453 26.6256C5.31146 26.5625 5.26639 26.4837 5.24398 26.3974C5.22158 26.311 5.22265 26.2203 5.2471 26.1345L6.6096 21.367Z" fill="white"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.9907 12.3928C11.1462 14.6317 12.1017 16.74 13.6828 18.3328C15.2639 19.9256 17.365 20.8967 19.6027 21.0688H19.6037C19.961 21.0964 20.32 21.0464 20.6561 20.9221C20.9922 20.7978 21.2974 20.6022 21.5507 20.3488L21.8997 19.9998C22.0645 19.8349 22.1571 19.6114 22.1572 19.3783V18.6373C22.1572 18.5444 22.1313 18.4533 22.0825 18.3743C22.0337 18.2952 21.9638 18.2314 21.8807 18.1898L19.6512 17.0753C19.5573 17.0282 19.451 17.012 19.3474 17.0287C19.2437 17.0455 19.148 17.0945 19.0737 17.1688L18.1037 18.1388C18.0455 18.197 17.9739 18.2399 17.8951 18.2638C17.8164 18.2877 17.7329 18.2918 17.6522 18.2758L17.6477 18.2748C16.6797 18.0812 15.7907 17.6054 15.0926 16.9074C14.3946 16.2093 13.9188 15.3203 13.7252 14.3523L13.7242 14.3478C13.7082 14.2671 13.7123 14.1836 13.7362 14.1049C13.7601 14.0261 13.803 13.9545 13.8612 13.8963L14.8312 12.9263C14.9055 12.852 14.9545 12.7563 14.9712 12.6526C14.988 12.549 14.9718 12.4427 14.9247 12.3488L13.8102 10.1193C13.7686 10.0362 13.7048 9.96633 13.6257 9.91749C13.5467 9.86866 13.4556 9.84279 13.3627 9.84277H12.7327C12.5831 9.84281 12.4352 9.87425 12.2985 9.93506C12.1618 9.99587 12.0394 10.0847 11.9392 10.1958L11.6072 10.5648C11.3889 10.807 11.2216 11.0908 11.1152 11.3991C11.0089 11.7074 10.9657 12.0339 10.9882 12.3593L10.9907 12.3928Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_20_1118">
                                            <rect width="32" height="32" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                            
                                    </a>
                                    <a href="#" target="_blank">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_20_1125)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32Z" fill="#199BDF"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5398 8.51587C22.7856 8.41439 23.054 8.38007 23.3174 8.41644C23.5808 8.4528 23.8298 8.55854 24.0389 8.72283C24.248 8.88711 24.4097 9.10403 24.5074 9.35136C24.6051 9.59869 24.6352 9.86754 24.5948 10.1304L22.3768 24.5499C22.3376 24.8049 22.2332 25.0456 22.0738 25.2485C21.9143 25.4515 21.7052 25.6099 21.4667 25.7084C21.2281 25.8068 20.9682 25.8421 20.712 25.8108C20.4558 25.7794 20.2121 25.6825 20.0043 25.5294L13.4633 20.7099C13.3455 20.623 13.2482 20.5113 13.1783 20.3827C13.1083 20.2541 13.0675 20.1117 13.0586 19.9656C13.0498 19.8195 13.0731 19.6732 13.1269 19.5371C13.1808 19.401 13.2639 19.2784 13.3703 19.1779L19.4738 13.4134C19.5193 13.3705 19.547 13.3121 19.5516 13.2498C19.5562 13.1875 19.5372 13.1257 19.4985 13.0767C19.4598 13.0276 19.4041 12.9948 19.3425 12.9848C19.2808 12.9747 19.2176 12.9881 19.1653 13.0224L11.0963 18.2849C10.7505 18.5104 10.3618 18.6621 9.95454 18.7305C9.54734 18.7989 9.13039 18.7825 8.72982 18.6824L4.94382 17.7359C4.73959 17.6849 4.55666 17.5707 4.42108 17.4097C4.2855 17.2487 4.20419 17.049 4.18874 16.8391C4.17328 16.6291 4.22446 16.4197 4.33499 16.2406C4.44552 16.0614 4.60976 15.9217 4.80432 15.8414L22.5398 8.51587Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_20_1125">
                                            <rect width="32" height="32" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                            
                                    </a>
                                    <a href="#" target="_blank">
                                        <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_20_1130)">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 32H8C5.87827 32 3.84344 31.1571 2.34315 29.6569C0.842855 28.1566 0 26.1217 0 24V8C0 5.87827 0.842855 3.84344 2.34315 2.34315C3.84344 0.842855 5.87827 0 8 0L24 0C26.1217 0 28.1566 0.842855 29.6569 2.34315C31.1571 3.84344 32 5.87827 32 8V24C32 26.1217 31.1571 28.1566 29.6569 29.6569C28.1566 31.1571 26.1217 32 24 32H21C21 31.337 20.7366 30.7011 20.2678 30.2322C19.7989 29.7634 19.163 29.5 18.5 29.5C17.837 29.5 17.2011 29.7634 16.7322 30.2322C16.2634 30.7011 16 31.337 16 32Z" fill="#3764B9"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M26 9C26 9.26522 25.8946 9.51957 25.7071 9.70711C25.5196 9.89464 25.2652 10 25 10H22C21.7348 10 21.4804 10.1054 21.2929 10.2929C21.1054 10.4804 21 10.7348 21 11V15H24.78C24.9279 15 25.074 15.0329 25.2077 15.0961C25.3414 15.1594 25.4594 15.2516 25.5532 15.366C25.647 15.4804 25.7143 15.6142 25.7501 15.7577C25.7859 15.9012 25.7895 16.0509 25.7605 16.196L25.1605 19.196C25.1152 19.4227 24.9927 19.6267 24.814 19.7733C24.6352 19.9199 24.4112 20 24.18 20H21V32H16V20H13C12.7348 20 12.4804 19.8946 12.2929 19.7071C12.1054 19.5196 12 19.2652 12 19V16C12 15.7348 12.1054 15.4804 12.2929 15.2929C12.4804 15.1054 12.7348 15 13 15H16V11C16 9.4087 16.6321 7.88258 17.7574 6.75736C18.8826 5.63214 20.4087 5 22 5H25C25.2652 5 25.5196 5.10536 25.7071 5.29289C25.8946 5.48043 26 5.73478 26 6V9Z" fill="white"/>
                                            </g>
                                            <defs>
                                            <clipPath id="clip0_20_1130">
                                            <rect width="32" height="32" fill="white"/>
                                            </clipPath>
                                            </defs>
                                        </svg>                                            
                                    </a>
                                </div>
                            </div>
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
                            @if($stock->images)
                            @php
                                $images = json_decode($stock->images, true);
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
                            <a href="{{ url(app()->getLocale() .'/stock-inner/'. $item->slug . '/') }}" class="task__slider-item">
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
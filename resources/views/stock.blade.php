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
        <section class="stocks">
            <div class="container">
                <div class="stocks__container sample__container">
                    <h1 class="stocks__title title-inner">Акции</h1>
                    <div class="stocks__items">
                        @foreach ($stocks as $stock)
                        @php
                        $images = json_decode($stock->images, true);
                        $firstImageUrl = $images[0] ?? null;
                        @endphp
                        <a href="{{ url(app()->getLocale() .'/stock-inner/'. $stock->slug . '/') }}" class="stock__item">
                            <img src="{{asset("storage/".$firstImageUrl)}}" alt="">
                            <div class="stock__item-title">{{$stock->title}}</div>
                        </a>
                        @endforeach
                    </div>
                    <ul class="pagination">
                        {{-- Предыдущая страница --}}
                        @if ($stocks->onFirstPage())
                            <li class="arrow disabled">
                                <a href="javascript:void(0);">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>  
                                </a>
                            </li>
                        @else
                            <li class="arrow">
                                <a href="{{ $stocks->previousPageUrl() }}">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>  
                                </a>
                            </li>
                        @endif
                    
                        {{-- Номер текущей страницы и общее количество страниц --}}
                        <li>
                            <span>{{ $stocks->currentPage() }} / {{ $stocks->lastPage() }}</span>
                        </li>
                    
                        {{-- Следующая страница --}}
                        @if ($stocks->hasMorePages())
                            <li class="arrow">
                                <a href="{{ $stocks->nextPageUrl() }}">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="70" height="70" rx="35" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M29 23L41 35L29 47" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>    
                                </a>
                            </li>
                        @else
                            <li class="arrow disabled">
                                <a href="javascript:void(0);">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect width="70" height="70" rx="35" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M29 23L41 35L29 47" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>    
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </section>
    </main>
    <!-- loader form -->
    @endsection
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
        <section class="service">
            <div class="container">
                <div class="service__container sample__container">
                    <h1 class="service__title title-inner">Услуги</h1>
                    <div class="service__items">
                        @foreach ($tasks as $task)
                        <a href="{{ url(app()->getLocale() .'/task-inner/'. $task->slug . '/') }}" class="task__slider-item">
                            <div class="task__slider-img">
                                
                                @php
                                $images = json_decode($task->images, true);
                                $firstImageUrl = $images[0] ?? null; // Используйте null coalescing operator для избежания ошибок, если массив пуст
                                @endphp
                                <img src="{{asset("storage/". $firstImageUrl)}}" alt="">
                            </div>
                            <div class="task__slider-title">{{$task->title}}</div>
                            <div class="task__slider-text">
                                <p>{{$task->subtitle}}</p>
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
                    <ul class="pagination">
                        {{-- Предыдущая страница --}}
                        @if ($tasks->onFirstPage())
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
                                <a href="{{ $tasks->previousPageUrl() }}">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>  
                                </a>
                            </li>
                        @endif
                    
                        {{-- Номер текущей страницы и общее количество страниц --}}
                        <li>
                            <span>{{ $tasks->currentPage() }} / {{ $tasks->lastPage() }}</span>
                        </li>
                    
                        {{-- Следующая страница --}}
                        @if ($tasks->hasMorePages())
                            <li class="arrow">
                                <a href="{{ $tasks->nextPageUrl() }}">
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
@extends('layout')

@section('content')
    <main>
        <div class="wrapper-breadcrumbs">
            <section class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs__container">
            <ul class="breadcrumbs__list">
                <li class="breadcrumbs__list-item">
                    <a href="{{ route('home', ['locale' => app()->getLocale()]) }}" class="breadcrumbs__list-link">@trans('homepage')</a>
                </li>
                <li class="breadcrumbs__list-item">
                    <a href="#" class="breadcrumbs__list-link active">@trans('team')</a>
                </li>
            </ul>
        </div>
    </div>
</section>
        </div>
        <section class="team">
            <div class="container">
                <div class="team__container sample__container">
                    <h1 class="team__title title-inner">@trans('meet_the_team')</h1>
                    <p class="team__desc">
                        @trans('we_value_clients')
                    </p>
                    <div class="team__image">
                        <img src="{{asset("storage/".setting('.team_image'))}}" alt="">
                    </div>

                    <div class="team__items">
                        @foreach ($workers as $worker)

                        <div class="team__item">
                            <div class="team__item-img">
                                <img src="{{asset("storage/".$worker->image)}}" alt="">
                            </div>
                            <ul class="team__item-pos">
                                <li>{{$worker->job}}</li>
                                <li>@trans('experience'): {{$worker->exp}} лет</li>
                            </ul>
                            <div class="team__item-name">{{$worker->title}}</div>
                            <div class="team__item-text">
                                <p>{{$worker->main}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if ($workers->lastPage() > 1)
                    <ul class="pagination">
                        {{-- Предыдущая страница --}}
                        @if ($workers->onFirstPage())
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
                                <a href="{{ $workers->previousPageUrl() }}">
                                    <svg width="70" height="70" viewBox="0 0 70 70" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect x="70" y="70" width="70" height="70" rx="35" transform="rotate(-180 70 70)" fill="#DC2128" fill-opacity="0.2"/>
                                        <path d="M41 47L29 35L41 23" stroke="#DC2128" stroke-width="2.5"/>
                                    </svg>
                                </a>
                            </li>
                        @endif

                        {{-- Номер текущей страницы и общее количество страниц --}}
                        <li>
                            <span>{{ $workers->currentPage() }} / {{ $workers->lastPage() }}</span>
                        </li>

                        {{-- Следующая страница --}}
                        @if ($workers->hasMorePages())
                            <li class="arrow">
                                <a href="{{ $workers->nextPageUrl() }}">
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
                    @endif
                </div>
            </div>
        </section>
    </main>
    <!-- loader form -->
    @endsection

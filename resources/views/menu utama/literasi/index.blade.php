@extends('layouts.layoutmain')
@section('container')
    <div class="flex justify-center items-center pt-28">
        <h1 class="text-4xl font-black text-[#FE8D27]">{{ $title }}</h1>
    </div>
    <div class="flex justify-center items-center pb-28 pt-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @if ($literacies->count())
                @foreach ($literacies as $literacy)
                    @if ($literacy->subbab == 'Digital Mindset')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #C2A0C1;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($literacy->subbab == 'Literasi Digital')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #F6908B;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($literacy->subbab == 'Kecakapan Digital')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #E8CCDB;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($literacy->subbab == 'Lanskap Digital')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #F6A9A1;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($literacy->subbab == 'Mesin Pencari Informasi')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #8DBCA8;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($literacy->subbab == 'Cakap Bermedia Digital')
                        <a href="{{ route('showLiterasi', $literacy->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #54C4C5;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $literacy->subbab }}</p>
                                </div>
                                @if ($literacy->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @elseif ($literacy->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $literacy->title }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection

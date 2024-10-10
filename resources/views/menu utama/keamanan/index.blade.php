@extends('layouts.layoutmain')
@section('container')
    <div class="flex justify-center items-center pt-28">
        <h1 class="text-4xl font-black text-[#FE8D27]">{{ $title }}</h1>
    </div>
    <div class="flex justify-center items-center pb-28 pt-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @if ($securities->count())
                @foreach ($securities as $security)
                    @if ($security->subbab == 'Amankan Diri Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #C2A0C1;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($security->subbab == 'Proteksi Perangkat Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #F6908B;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($security->subbab == 'Identitas Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #E8CCDB;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($security->subbab == 'Data Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #F6A9A1;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($security->subbab == 'Penipuan Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #8DBCA8;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    @endif
                    @if ($security->subbab == 'Rekam Jejak Digital')
                        <a href="{{ route('showKeamanan', $security->id) }}">
                            <div class="card shadow-md" style="width: 15rem; background-color: #54C4C5;">
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-lg text-center">{{ $security->subbab }}</p>
                                </div>
                                @if ($security->category == 'Materi')
                                    <img src="/assets/13.png" class="card-img-top pr-3 pl-3" alt="...">
                                @elseif ($security->category == 'Latihan')
                                    <img src="/assets/14.png" class="card-img-top pr-3 pl-3" alt="...">
                                @else
                                    <img src="/assets/15.png" class="card-img-top pr-3 pl-3" alt="...">
                                @endif
                                <div class="card-body">
                                    <p class="card-text text-white font-bold text-base text-center">{{ $security->title }}
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

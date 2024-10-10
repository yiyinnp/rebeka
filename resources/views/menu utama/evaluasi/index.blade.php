@extends('layouts.layoutmain')
@section('container')
    <div class="flex justify-center items-center pt-28">
        <h1 class="text-4xl font-black text-[#FE8D27]">{{ $title }}</h1>
    </div>
    <div class="flex justify-center items-center pb-28 pt-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @if ($evaluations->count())
                @foreach ($evaluations as $evaluation)
                    <a href="{{ route('showKeamanan', $evaluation->id) }}">
                        <div class="card shadow-md" style="width: 15rem; background-color: #C2A0C1;">
                            <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                            <div class="card-body">
                                <p class="card-text text-white font-bold text-xl text-center">{{ $evaluation->title }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endif
        </div>
    </div>
@endsection

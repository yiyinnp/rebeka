@extends('layouts.layoutadmin')
@section('container')
    <div class="main-content lg:ml-[250px] transition-all duration-300 ease-in-out">
        <div class="flex justify-center items-center pt-28">
            <h1 class="text-4xl font-black text-[#FE8D27]">{{ $title }}</h1>
        </div>
        <div class="flex justify-center items-center pt-10">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="card" style="width: 18rem; background-color: #F6A9A1;">
                    <img src="/assets/13.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                    <div class="card-body">
                        <p class="card-text text-white font-bold text-xl text-center">Materi</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem; background-color: #8DBCA8;">
                    <img src="/assets/14.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                    <div class="card-body">
                        <p class="card-text text-white font-bold text-xl text-center">Latihan</p>
                    </div>
                </div>
                <div class="card" style="width: 18rem; background-color: #54C4C5;">
                    <img src="/assets/15.png" class="card-img-top pt-3 pr-3 pl-3" alt="...">
                    <div class="card-body">
                        <p class="card-text text-white font-bold text-xl text-center">Kuis</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

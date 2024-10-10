@extends('layouts.layoutadmin')
@section('container')
    <div class="main-content lg:ml-[250px] transition-all duration-300 ease-in-out">
        <div class="flex justify-center items-center pt-28">
            <h1 class="text-4xl font-black text-[#FE8D27]">{{ $game->title }}</h1>
        </div>
        <div class="px-10 pt-3 pb-10">
            <div class="w-full">
                <h3 class="py-1"><b>Penjelasan Singkat:</b> {{ strip_tags($game->konten) }}</h3>
                <h3 class="py-1"><b>Nama File:</b> {{ ($fileName) }}</h3>
                <div class="flex justify-center space-x-4 mt-6">
                    <a href="{{ route('editLiteracy', $game->id) }}">
                        <button class="bg-amber-400 hover:bg-amber-500 hover:border-amber-500 text-white py-2 px-4 rounded-md">
                            <i class="bi bi-pencil"></i> Edit
                        </button>
                    </a>
                    <a href="{{ route('downloadFile', $game->id) }}">
                        <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                            <i class="bi bi-download"></i> Download File
                        </button>
                    </a>
                    <a href="{{ route('indexLiteracy') }}">
                        <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

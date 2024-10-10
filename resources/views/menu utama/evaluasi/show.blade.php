@extends('layouts.layoutmain')
@section('container')
    <div class="flex justify-center items-center pt-28">
        <h1 class="text-4xl font-black text-[#FE8D27]">{{ $security->title }}</h1>
    </div>
    <div class="flex justify-center items-center pt-10">
        <div class="w-8/12">
            <h3 class="py-1"><b>Penjelasan Singkat:</b> {{ strip_tags($security->konten) }}</h3>
            <h3 class="py-1"><b>Preview File PDF:</b></h3>
            <!-- Pratinjau PDF -->
            <div class="py-1 flex justify-center">
                <iframe src="{{ asset('storage/' . $security->file_path) }}" width="80%" height="600px"></iframe>
            </div>

            <div class="flex justify-center space-x-4 my-6">
                <!-- Tombol Download PDF -->
                <a href="{{ asset('storage/' . $security->file_path) }}" download>
                    <button class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600">
                        <i class="bi bi-download"></i> Download PDF
                    </button>
                </a>
                <a href="{{ route('indexKeamanan') }}">
                    <button class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </button>
                </a>
            </div>
        </div>
    </div>
@endsection

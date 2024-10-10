@extends('layouts.layoutadmin')
@section('container')
    <div class="main-content lg:ml-[250px] transition-all duration-300 ease-in-out">
        <div class="flex justify-center items-center py-28">
            <div class="flex justify-center items-center w-10/12">
                <div class="w-full p-6 shadow-md bg-green-100 rounded-md">
                    <h1 class="text-3xl block text-center font-semibold">{{ $title }}</h1>
                    <form action="{{ route('updateEvaluation', $evaluation->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mt-3">
                            <label for="title" class="block text-xs mb-1">Nama File</label>
                            <input type="text" id="title" name="title"
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800 
                            @error('title') border-red-500 @enderror required" 
                                value="{{ old('title', $evaluation->title) }}" placeholder="Nama File" />
                            @error('title')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="konten" class="block text-xs mb-1">Deskripsi Singkat</label>
                            <input id="konten" type="hidden" name="konten" value="{{ old('konten', $evaluation->konten) }}">
                            <trix-editor input="konten" class="bg-white"></trix-editor>
                            @error('konten')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="file" class="block text-xs mb-1">Upload File</label>
                            <input type="file" id="file" name="file"
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800
                            @error('file') border-red-500 @enderror">
                            @error('file')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-xs text-red-500">*File yang diperbolehkan: .pdf (maksimal 10MB)</p>
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="border-2 border-[#638ECB] bg-[#638ECB] text-white py-1 w-full rounded-md hover:scale-105 font-semibold">
                                <i class="bi bi-floppy2"></i> Simpan</button>
                        </div>
                    </form>
                    <div class="mt-2">
                        <a href="{{ route('indexEvaluation') }}"><button type="submit"
                            class="border-2 border-gray-400 bg-gray-400 text-white py-1 w-full rounded-md hover:scale-105 font-semibold">
                            <i class="bi bi-x-lg"></i> Kembali</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

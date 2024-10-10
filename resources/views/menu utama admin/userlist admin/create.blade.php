@extends('layouts.layoutadmin')
@section('container')
    <div class="main-content lg:ml-[250px] transition-all duration-300 ease-in-out">
        <div class="flex justify-center items-center py-28">
            <div class="flex justify-center items-center w-10/12">
                <div class="w-full p-6 shadow-md bg-green-100 rounded-md">
                    <h1 class="text-3xl block text-center font-semibold">{{ $title }}</h1>
                    <form action="{{ route('storeUser') }}" method="POST">
                        @csrf
                        <div class="mt-3">
                            <label for="name" class="block text-xs mb-1">Nama Pengguna</label>
                            <input name="name" type="text" autocomplete="name" required
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800
                                @error('name') border-red-500 @enderror"
                                value="{{ old('name') }}" placeholder="Nama Pengguna" />
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="email" class="block text-xs mb-1">Alamat email</label>
                            <input name="email" type="email" autocomplete="email" required
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800
                                @error('email') border-red-500 @enderror"
                                value="{{ old('email') }}" placeholder="Alamat email" />
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="password" class="block text-xs mb-1">Password</label>
                            <input type="password" id="password" name="password" required
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800 
                            @error('password') border-red-500 @enderror"
                                value="{{ old('password') }}" placeholder="Password" />
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-2">
                            <label for="password_confirmation" class="block text-xs mb-1">Konfigurasi Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800
                                @error('password') border-red-500 @enderror"
                                value="{{ old('password') }}" placeholder="Konfirmasi Password" />
                            <label for="showPassword" class="ml-2 text-xs cursor-pointer"><input type="checkbox"
                                    class="text-xs" id="showPassword" /> Tampilkan Password</label>
                            @error('password')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-3">
                            <label for="level" class="block text-xs mb-1">Level Pengguna</label>
                            <select id="level" name="level"
                                class="bg-white focus:bg-opacity-60 w-full text-base px-4 py-3.5 rounded-md outline-gray-800">
                                <option value="Guru">Guru</option>
                                <option value="Siswa">Siswa</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="border-2 border-[#638ECB] bg-[#638ECB] text-white py-1 w-full rounded-md hover:scale-105 font-semibold">
                                <i class="bi bi-floppy2"></i> Simpan</button>
                        </div>
                    </form>
                    <div class="mt-2">
                        <a href="{{ route('indexUser') }}"><button type="submit"
                                class="border-2 border-gray-400 bg-gray-400 text-white py-1 w-full rounded-md hover:scale-105 font-semibold">
                                <i class="bi bi-x-lg"></i> Kembali</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');
            const password_confirmationInput = document.getElementById('password_confirmation');

            showPasswordCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    passwordInput.type = 'text';
                    password_confirmationInput.type = 'text';
                } else {
                    passwordInput.type = 'password';
                    password_confirmationInput.type = 'password';
                }
            });
        });
    </script>
@endsection

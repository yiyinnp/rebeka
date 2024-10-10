@extends('layouts.layoutlogin')
@section('container')
    <div class="flex justify-center items-center h-screen">
        <div class="w-80 lg:w-2/5 p-6 shadow-md bg-[#FFA658] rounded-md">
            <h1 class="text-2xl lg:text-5xl block text-center text-white font-bold py-2">{{ $title }}</h1>
            <form action="/lupa-password" method="POST">
                @csrf
                <div class="mt-3">
                    {{-- <label for="email" class="block text-sm">Email</label> --}}
                    <input type="email" id="email" name="email"
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                    @error('email') border-red-500 @enderror required"
                        value="{{ old('email') }}" placeholder="Alamat Email" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    {{-- <label for="password" class="block text-sm">Password</label> --}}
                    <input type="password" id="password" name="password"
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                    @error('password') border-red-500 @enderror required"
                        value="{{ old('password') }}" placeholder="Password Baru" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    {{-- <label for="password_confirmation" class="block text-sm">Konfirmasi Password</label> --}}
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                        @error('password') border-red-500 @enderror required"
                        value="{{ old('password') }}" placeholder="Konfirmasi Password Baru" />
                    <label for="showPassword" class="ml-2 text-xs cursor-pointer"><input type="checkbox" class="text-xs"
                            id="showPassword" /> Tampilkan Password</label>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="border-2 border-[#C05D04] bg-[#FE8D27] text-white py-1 w-full rounded-md hover:scale-105 duration-300 font-semibold"><i
                            class="bi bi-floppy"></i> Simpan</button>
                </div>
            </form>
            <div class="mt-1">
                <a href="/">
                    <button type="submit"
                        class="border-2 border-rose-500 bg-rose-400 text-white py-1 w-full rounded-md hover:scale-105 duration-300 font-semibold"><i
                            class="bi bi-x-lg"></i> Batal</button>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const closeButtonChangeError = document.querySelector('[aria-label="CloseChangeError"]');
            const alertBoxChangeError = closeButtonChangeError ? closeButtonChangeError.closest('.bg-red-100') :
                null;

            if (closeButtonChangeError) {
                closeButtonChangeError.addEventListener('click', function() {
                    alertBoxChangeError.remove();
                });
            }

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

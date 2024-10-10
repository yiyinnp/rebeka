@extends('layouts.layoutmain')
@section('container')
    <div class="lg:px-24 px-10 pt-32">
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 w-full rounded-lg relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="CloseSuccessUpdate">
                    <svg class="h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a.5.5 0 0 1-.706 0L10 10.707l-3.646 3.646a.5.5 0 0 1-.707-.707L9.293 10 5.646 6.354a.5.5 0 1 1 .707-.707L10 9.293l3.646-3.646a.5.5 0 0 1 .707.707L10.707 10l3.647 3.646a.5.5 0 0 1 0 .707z" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="flex flex-1 items-center justify-center pt-2">
            <div class="lg:w-8/12 w-full h-4/6 p-6 shadow-md bg-[#d9d9d9] rounded-md lg:mr-5 mr-0 mb-5 lg:mb-0">
                <div class="pt-1">
                    <h3 class="lg:text-4xl text-3xl font-extrabold text-center">{{ $title }}</h3>
                </div>
                <form action="{{ route('profil.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mt-3">
                        <label for="name" class="block text-sm">Nama Pengguna</label>
                        <input type="text" id="name" name="name"
                            class="border w-full text-base px-2 py-1 
                    focus:outline-none rounded-sm focus:ring-1 focus:border-blue-400 bg-white
                    @error('name') border-red-500 @enderror required"
                            value="{{ old('name', $user->name) }}" />
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="email" class="block text-sm">Email</label>
                        <input type="email" id="email" name="email"
                            class="border w-full text-base px-2 py-1 
                    focus:outline-none rounded-sm focus:ring-1 focus:border-blue-400 bg-white
                    @error('email') border-red-500 @enderror required"
                            value="{{ old('email', $user->email) }}" />
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label for="password" class="block text-sm">Password</label>
                        <input type="password" id="password" name="password"
                            class="border w-full text-base px-2 py-1 
                    focus:outline-none rounded-sm focus:ring-1 focus:border-blue-400 bg-white
                    @error('password') border-red-500 @enderror"
                            value="{{ old('password') }}" placeholder="Abaikan/Kosongi, jika tidak ada perubahan"
                            autocomplete="current-password" />
                        <label for="showPassword" class="ml-2 text-xs cursor-pointer"><input type="checkbox" class="text-xs"
                                id="showPassword" /> Tampilkan Password</label>
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mt-4">
                        <button type="submit"
                            class="border-2 border-[#C05D04] bg-[#FE8D27] text-white py-1 w-full rounded-md hover:scale-105 font-semibold"><i
                                class="bi bi-floppy"></i>&nbsp;&nbsp;Simpan</button>
                    </div>
                </form>
                <form id="logoutForm" action="/logout" method="post">
                    @csrf
                    <button
                        class="border-2 border-rose-500 bg-rose-400 text-white py-1 w-full rounded-md hover:scale-105 font-semibold mt-1"><i
                            class="bi bi-box-arrow-right"></i>&nbsp;&nbsp;Keluar</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtonCloseSuccessUpdate = document.querySelector('[aria-label="CloseSuccessUpdate"]');
            if (closeButtonCloseSuccessUpdate) {
                closeButtonCloseSuccessUpdate.addEventListener('click', function() {
                    const alertBoxCloseSuccessUpdate = closeButtonCloseSuccessUpdate.closest(
                        '.bg-green-100');
                    if (alertBoxCloseSuccessUpdate) {
                        alertBoxCloseSuccessUpdate.remove();
                    }
                });
            }

            const showPasswordCheckbox = document.getElementById('showPassword');
            const passwordInput = document.getElementById('password');
            const password_confirmationInput = document.getElementById('password_confirmation');

            if (showPasswordCheckbox) {
                showPasswordCheckbox.addEventListener('change', function() {
                    passwordInput.type = this.checked ? 'text' : 'password';
                    if (password_confirmationInput) {
                        password_confirmationInput.type = this.checked ? 'text' : 'password';
                    }
                });
            }
        });
    </script>
@endsection

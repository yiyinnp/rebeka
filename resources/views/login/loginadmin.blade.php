@extends('layouts.layoutlogin')
@section('container')
    <div class="flex justify-center items-center pt-32">
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 w-96 rounded-lg relative"
                role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="CloseSuccessRegis">
                    <svg class="h-6 w-6 text-green-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a.5.5 0 0 1-.706 0L10 10.707l-3.646 3.646a.5.5 0 0 1-.707-.707L9.293 10 5.646 6.354a.5.5 0 1 1 .707-.707L10 9.293l3.646-3.646a.5.5 0 0 1 .707.707L10.707 10l3.647 3.646a.5.5 0 0 1 0 .707z" />
                    </svg>
                </button>
            </div>
        @endif

        @if (session()->has('loginError'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 w-96 rounded-lg relative" role="alert">
                <span class="block sm:inline text-justify">{{ session('loginError') }}</span>
                <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3" aria-label="CloseLoginError">
                    <svg class="h-6 w-6 text-red-500 cursor-pointer" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a.5.5 0 0 1-.706 0L10 10.707l-3.646 3.646a.5.5 0 0 1-.707-.707L9.293 10 5.646 6.354a.5.5 0 1 1 .707-.707L10 9.293l3.646-3.646a.5.5 0 0 1 .707.707L10.707 10l3.647 3.646a.5.5 0 0 1 0 .707z" />
                    </svg>
                </button>
            </div>
        @endif
    </div>
    <div class="flex justify-center items-center pt-2 pb-32">
        <div class="w-80 lg:w-96 p-6 bg-[#F4A261] rounded-md">
            <div class="flex justify-center items-center">
                <a href="/master"><img class="w-40 hover:scale-105 duration-300 mb-3" src="/assets/icon.png"
                        alt="" srcset=""></a>
            </div>

            <form action="/master" method="POST">
                @csrf
                <div>
                    <input name="email" type="email" autocomplete="email" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                        @error('email') border-red-500 @enderror required" value="{{ old('email') }}" placeholder="Alamat email" />
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                </div>
                <div class="mt-3">
                    <input name="password" type="password" autocomplete="current-password" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800"
                        @error('password') border-red-500 @enderror required" value="{{ old('password') }}" placeholder="Password" />
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror 
                </div>
                <div class="text-sm text-right">
                    <a href="jajvascript:void(0);" class="text-blue-600 text-xs font-semibold hover:underline">
                        Kamu lupa password?
                    </a>
                </div>

                <div class="mt-4">
                    <button type="submit"
                        class="border-2 border-[#e46444] bg-[#E76F51] text-white py-1 w-full rounded-md hover:scale-105 duration-300 font-semibold"><i
                            class="bi bi-box-arrow-in-right"></i> Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const closeButtonSuccessRegis = document.querySelector('[aria-label="CloseSuccessRegis"]');
        const alertBoxSuccessRegis = closeButtonSuccessRegis ? closeButtonSuccessRegis.closest(
            '.bg-green-100') : null;

        if (closeButtonSuccessRegis) {
            closeButtonSuccessRegis.addEventListener('click', function() {
                alertBoxSuccessRegis.remove();
            });
        }

        const closeButtonLoginError = document.querySelector('[aria-label="CloseLoginError"]');
        const alertBoxLoginError = closeButtonLoginError ? closeButtonLoginError.closest('.bg-red-100') : null;

        if (closeButtonLoginError) {
            closeButtonLoginError.addEventListener('click', function() {
                alertBoxLoginError.remove();
            });
        }

        const showPasswordCheckbox = document.getElementById('showPassword');
        const passwordInput = document.getElementById('password');

        showPasswordCheckbox.addEventListener('change', function() {
            if (this.checked) {
                passwordInput.type = 'text';
            } else {
                passwordInput.type = 'password';
            }
        });
    });
</script>

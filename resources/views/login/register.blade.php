@extends('layouts.layoutlogin')
@section('container')
    <div class="flex justify-center items-center h-screen">
        <div class="w-80 lg:w-2/5 p-6 shadow-md bg-[#FFA658] rounded-md">
            <div class="flex justify-center items-center">
                <a href="/"><img class="w-36 hover:scale-105 duration-300" src="/assets/icon.png"
                        alt="" srcset=""></a>
            </div>
            <h1 class="text-3xl block text-center font-semibold text-white">{{ $title }}</h1>
            <form action="/register" method="post">
                @csrf
                <div class="mt-3">
                    <input name="name" type="text" autocomplete="name" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                        @error('name') border-red-500 @enderror"
                        value="{{ old('name') }}" placeholder="Nama Pengguna" />
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <input name="email" type="email" autocomplete="email" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                        @error('email') border-red-500 @enderror"
                        value="{{ old('email') }}" placeholder="Alamat email" />
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <input type="password" id="password" name="password" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800 
                    @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}" placeholder="Password" />
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-2">
                    <input type="password" id="password_confirmation" name="password_confirmation" required
                        class="bg-gray-100 focus:bg-opacity-60 w-full text-sm px-4 py-3.5 rounded-md outline-gray-800
                        @error('password') border-red-500 @enderror"
                        value="{{ old('password') }}" placeholder="Konfirmasi Password" />
                    <label for="showPassword" class="ml-2 text-xs cursor-pointer"><input type="checkbox" class="text-xs"
                            id="showPassword" /> Tampilkan Password</label>
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mt-3 flex justify-between items-center gap-8">
                    <div>
                        <p class="text-xs font-semibold">Sudah punya akun? <a href="/"
                                class="text-indigo-800 text-xs font-semibold hover:underline">Login sekarang</a></p>
                    </div>
                </div>
                <div class="mt-2">
                    <button type="submit"
                        class="border-2 border-[#C05D04] bg-[#FE8D27] text-white py-1 w-full rounded-md hover:scale-105 duration-300 font-semibold"><i
                            class="bi bi-person-fill-add"></i>&nbsp;&nbsp;Registrasi</button>
                </div>
            </form>
        </div>
    </div>
@endsection

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

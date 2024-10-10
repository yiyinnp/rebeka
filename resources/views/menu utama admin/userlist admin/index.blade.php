@extends('layouts.layoutadmin')
@section('container')
    <div class="main-content lg:ml-[250px] transition-all duration-300 ease-in-out">
        <div class="flex justify-center items-center pt-28">
            <h1 class="text-4xl font-black text-[#FE8D27]">{{ $title }}</h1>
        </div>
        <div class="flex justify-center items-center pt-5">
            <div class="w-8/12">
                @if (session()->has('success'))
                    <div class="pb-3">
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 w-full rounded-lg relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                            <button type="button" class="absolute top-0 bottom-0 right-0 px-4 py-3"
                                aria-label="CloseSuccess">
                                <svg class="h-6 w-6 text-green-500 cursor-pointer" role="button"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <title>Close</title>
                                    <path
                                        d="M14.348 14.849a.5.5 0 0 1-.706 0L10 10.707l-3.646 3.646a.5.5 0 0 1-.707-.707L9.293 10 5.646 6.354a.5.5 0 1 1 .707-.707L10 9.293l3.646-3.646a.5.5 0 0 1 .707.707L10.707 10l3.647 3.646a.5.5 0 0 1 0 .707z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                @endif
                <div class="flex justify-between py-2">
                    <a href="{{ route('createUser') }}">
                        <button class="border-2 border-green-400 bg-green-400 text-white py-2 w-32 rounded-full 
                        hover:scale-105 font-medium">
                        <i class="bi bi-plus-circle"></i> Tambah</button>
                    </a>
            
                    <form action="" method="get" class="flex">
                        <input type="text" name="search" class="border border-gray-300 rounded-l-lg px-4 py-2 w-full md:w-72 focus:outline-none focus:border-[#395886]" placeholder="Cari...">
                        <button class="bg-blue-500 hover:bg-[#395886] text-white px-4 py-2 rounded-r-lg md:ml-0"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <table class="table-auto border-collapse w-full rounded-md">
                    <thead class="text-white">
                        <tr class="bg-gray-500 text-center">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Nama Pengguna</th>
                            <th class="px-4 py-2">Level</th>
                            <th class="px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr class="bg-white divide-y divide-gray-400">
                            <td class="text-center py-1">{{ $loop->iteration }}</td>
                            <td class="py-1">{{ $user->email }}</td>
                            <td class="py-1">{{ $user->name }}</td>
                            <td class="py-1">{{ $user->level }}</td>
                            <td class="text-center py-1">
                                <div class="flex justify-center space-x-2">
                                    <!-- Tombol View -->
                                    {{-- <a href="{{ route('showUser', $user->id) }}">
                                        <button class="w-10 h-10 bg-blue-300 hover:bg-blue-500 rounded-md flex justify-center items-center">
                                            <i class="bi bi-eye"></i>
                                        </button>
                                    </a> --}}
                            
                                    <!-- Tombol Edit -->
                                    <form action="{{ route('editUser', $user->id) }}" method="GET">
                                        @csrf
                                        <button class="w-10 h-10 bg-amber-300 hover:bg-amber-500 hover:border-amber-500 rounded-md flex justify-center items-center">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </form>
                            
                                    <!-- Tombol Delete -->
                                    <form action="{{ route('deleteUser', $user->id) }}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="w-10 h-10 bg-rose-400 hover:bg-rose-600 hover:border-rose-600 rounded-md flex justify-center items-center" onclick="return confirm('Apakah Anda yakin menghapus data ini?')">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const closeButtonSuccess = document.querySelector('[aria-label="CloseSuccess"]');
            const alertBoxSuccess = closeButtonSuccess ? closeButtonSuccess.closest('.bg-green-100') : null;
    
            if (closeButtonSuccess) {
                closeButtonSuccess.addEventListener('click', function() {
                    alertBoxSuccess.remove();
                });
            }
    
            
        });
    </script>
@endsection

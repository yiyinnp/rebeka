<span class="absolute text-white text-4xl top-5 left-4 cursor-pointer" onclick="Open()">
    <i class="bi bi-filter-left px-2 bg-[#314C74] rounded-md"></i>
</span>
<div
    class="sidebar fixed top-0 bottom-0 lg:left-0 left-[-300px] p-2 w-[250px] overflow-y-auto text-center bg-[#314C74] rounded-r-lg z-10">
    <div class="flex justify-center">
        <a href=""><img class="w-36 object-contain" src="/assets/icon.png" alt="" srcset=""></a>
        <i class="bi bi-x-lg text-white ml-20 cursor-pointer lg:hidden" onclick="Open()"></i>
    </div>
    <hr class="my-2 border-b-3 border-[#21334F]">

    <a href="/literasi-dashboard">
        <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
        {{ $active == 'Literasi Dashboard' ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
            <span class="text-[15px] ml-4 text-[#F0F3FA]">Literasi</span>
        </div>
    </a>

    <a href="/keamanan-dashboard">
        <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
        {{ $active == 'Keamanan Dashboard' ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
            <span class="text-[15px] ml-4 text-[#F0F3FA]">Keamanan</span>
        </div>
    </a>

    <a href="/evaluasi-dashboard">
        <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
        {{ ($active == "Evaluasi Dashboard") ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
            <span class="text-[15px] ml-4 text-[#F0F3FA] text-left">Evaluasi</span>
        </div>
    </a>
    <a href="/permainan-dashboard">
        <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
        {{ ($active == "Permainan Dashboard") ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
            <span class="text-[15px] ml-4 text-[#F0F3FA] text-left"> Permainan</span>
        </div>
    </a>

    @if (auth()->user()->level == 'guru')
        <a href="/daftar-akun-pengguna">
            <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
            {{ $active == 'Daftar Pengguna' ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
                <span class="text-[15px] ml-4 text-[#F0F3FA] text-left"> Daftar Akun Pengguna</span>
            </div>
        </a>
    @endif

    <hr class="my-2 border-b-3 border-[#21334F]">

    <a href="/info-pengguna-dashboard">
        <div
            class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white
        {{ $active == 'Profil' ? 'bg-[#8AAEED] rounded-md text-white hover:text-white' : '' }}">
            <span class="text-[15px] ml-4 text-[#F0F3FA]"> Profil</span>
        </div>
    </a>

    <form id="logoutForm" action="/logout-master" method="post">
        @csrf
        <div class="p-2.5 mt-1 flex rounded-md px-4 duration-300 cursor-pointer hover:bg-[#8AAEED] text-white">
            <button type="submit">
                <span class="text-[15px] ml-4 text-[#F0F3FA]">Keluar</span>
            </button>
        </div>
    </form>
</div>

<script>
    function Open() {
        const sidebar = document.querySelector('.sidebar');
        sidebar.classList.toggle('left-0');

        // Cek apakah sidebar terbuka atau tidak
        const isOpen = sidebar.classList.contains('left-0');
    }

    document.addEventListener('DOMContentLoaded', function() {
        var logoutForm = document.getElementById('logoutForm');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function(e) {
                e.preventDefault(); // Prevent form submission
                var confirmation = confirm('Apakah Anda yakin ingin logout?');
                if (confirmation) {
                    this.submit(); // Submit the form if user confirms
                } else {
                    alert('Logout dibatalkan.');
                }
            });
        }
    });
</script>

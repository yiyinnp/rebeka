<header id="navbar" class="bg-[#F5F5F5] fixed top-0 mx-2 my-2 w-[calc(100%-1rem)] rounded-lg z-10">
    <nav class="flex justify-between items-center w-[92%] mx-auto">        
        @auth
        <div>
            <a href=""><img class="w-32 hover:scale-105 duration-300" src="/assets/icon.png" alt="" srcset=""></a>
        </div>
            <!--tombol burger-->
            <div class="absolute top-0 right-0 mr-4 mt-4 block sm:hidden">
                <button id="menu-toggle" class="text-[#FE8D27] focus:outline-none">
                    <svg class="h-6 w-6 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path d="M4 6h16v2H4V6zm0 5h16v2H4v-2zm0 5h16v2H4v-2z" />
                    </svg>
                </button>
            </div>
            
            <div class="flex flex-1 items-center justify-center">
                <div class="hidden sm:ml-6 sm:block">
                    <div class="flex space-x-2 bg-[#D9D9D9] rounded-full">
                        <a href="/literasi" 
                            class=" duration-300 px-3 py-2 text-base font-semibold hover:underline-rounded hover:scale-105
                            {{ ($active == 'Literasi') ? 'bg-[#FE8D27] rounded-full text-white' : 'hover:underline-rounded hover:scale-105' }}">
                            Literasi
                        </a>
                        <a href="/keamanan" 
                            class=" duration-300 px-3 py-2 text-base font-semibold
                            {{ ($active == 'Keamanan') ? 'bg-[#FE8D27] rounded-full text-white' : 'hover:underline-rounded hover:scale-105' }}">
                            Keamanan
                        </a>
                        <a href="/evaluasi" 
                            class=" duration-300 px-3 py-2 text-base font-semibold
                            {{ ($active == 'Evaluasi') ? 'bg-[#FE8D27] rounded-full text-white' : 'hover:underline-rounded hover:scale-105' }}">
                            Evaluasi
                        </a>
                        <a href="/permainan" 
                            class=" duration-300 px-3 py-2 text-base font-semibold
                            {{ ($active == 'Permainan') ? 'bg-[#FE8D27] rounded-full text-white' : 'hover:underline-rounded hover:scale-105' }}">
                            Permainan
                        </a>
                        <a href="/info-pengguna" 
                            class=" duration-300 px-3 py-2 text-base font-semibold
                            {{ ($active == 'Profil Pengguna') ? 'bg-[#FE8D27] rounded-full text-white' : 'hover:underline-rounded hover:scale-105' }}">
                            Info Pengguna
                        </a>
                    </div>
                </div>
            </div>
        @endauth
    </nav>
    <div id="mobile-menu" class="sm:hidden bg-[#F5F5F5] hidden">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="/literasi" class="block px-3 py-2 rounded-md text-base font-semibold {{ ($active == "Literasi") ? 'bg-[#FE8D27] rounded-md text-white' : ''}}">Literasi</a>
            <a href="/keamanan" class="block px-3 py-2 rounded-md text-base font-semibold {{ ($active == "Keamanan") ? 'bg-[#FE8D27] rounded-md text-white' : ''}}">Keamanan</a>
            <a href="/evaluasi" class="block px-3 py-2 rounded-md text-base font-semibold {{ ($active == "Evaluasi") ? 'bg-[#FE8D27] rounded-md text-white' : ''}}"">Evaluasi</a>
            <a href="/permainan" class="block px-3 py-2 rounded-md text-base font-semibold {{ ($active == "Permainan") ? 'bg-[#FE8D27] rounded-md text-white' : ''}}">Permainan</a>
            <a href="/info-pengguna" class="block px-3 py-2 rounded-md text-base font-semibold {{ ($active == "Profil Pengguna") ? 'bg-[#FE8D27] rounded-md text-white' : ''}}">Profil Pengguna</a>
        </div>
    </div>
</header>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        var navbar = document.getElementById('navbar');
        
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-opacity-90', 'shadow-lg');
                navbar.classList.remove('bg-opacity-100');
            } else {
                navbar.classList.remove('bg-opacity-90', 'shadow-lg');
                navbar.classList.add('bg-opacity-100');
            }
        });

        // Toggle menu on mobile
        var menuToggle = document.getElementById('menu-toggle');
        if (menuToggle) {
            menuToggle.addEventListener('click', function() {
                var mobileMenu = document.getElementById('mobile-menu');
                if (mobileMenu) {
                    mobileMenu.classList.toggle('hidden');
                }
            });
        }

        var dropdownToggle = document.getElementById('dropdown-toggle');
        var dropdownMenu = document.getElementById('dropdown-menu');
        if (dropdownToggle && dropdownMenu) {
            dropdownToggle.addEventListener('click', function() {
                dropdownMenu.classList.toggle('hidden');
            });
        }

        // Close dropdown menu when clicking outside
        document.addEventListener('click', function(event) {
            var dropdownMenu = document.getElementById('dropdown-menu');
            var dropdownToggle = document.getElementById('dropdown-toggle');
            if (dropdownMenu && dropdownToggle && !dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });

        var logoutForm = document.getElementById('logoutForm');
        if (logoutForm) {
            logoutForm.addEventListener('submit', function(e) {
                e.preventDefault(); //mencegah aksi default dari form, yaitu pengiriman data ke server.
                var confirmation = confirm('Apakah Anda yakin ingin logout?');
                if (confirmation) {
                    this.submit();
                } else {
                    alert('Logout dibatalkan.');
                }
            });
        }
    });
</script>


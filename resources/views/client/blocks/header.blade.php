<div class="header">
    <div class="container">
        <div class="info">
            <div class="left">
                <span>
                    <i class="fa-solid fa-location-dot"></i> 31/2 Nguyen Binh Khiem, P.Dakao, Q.1
                </span>
                <span>
                    <i class="fa-solid fa-phone"></i>
                    (+84) 708-240-602
                </span>
            </div>
            <div class="right">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/vo.khang.9847" target="_blank">
                            <i class="fa-brands fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/vhk209/" target="_blank">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://mail.google.com/mail/u/0/#inbox" target="_blank">
                            <i class="fa-solid fa-envelope"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg bg-body-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('asset/client/img/logo.png') }}" alt="">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarScroll"
                aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse choice" id="navbarScroll">
                <ul class="navbar-nav mr-auto my-2 my-lg-0 navbar-nav-scroll">
                    <li class="nav-item" id="home">
                        <a class="nav-link active" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item" id="about">
                        <a class="nav-link" href="{{ url('/about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item" id="product">
                        <a class="nav-link" href="{{ url('/product') }}">PRODUCTS</a>
                    </li>
                    <li class="nav-item" id="blog">
                        <a class="nav-link" href="{{ url('/blog') }}">BLOGS</a>
                    </li>
                    <li class="nav-item" id="contact">
                        <a class="nav-link" href="{{ url('/contact') }}">CONTACT</a>
                    </li>
                </ul>
                <div class="search d-flex">
                    <input type="search" placeholder="Search Product" class="form-control inputSearch me-2"
                        aria-label="Search" value="{{ old('keySearch') }}" onkeydown="handleSearch(event)" />
                    <i class="fa-solid fa-magnifying-glass"></i>
                </div>
            </div>
            <a href="{{ url('/cart') }}" class="cart">
                <i class="fa-solid fa-cart-shopping"></i>
                {{-- <span>{{ Cart::count() }}</span> --}}
                <span>3</span>
            </a>
            <div class="user">
                @guest
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                    <span>/</span>
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                @else
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endguest
            </div>
        </div>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.nav-item .nav-link');

        function setActiveLink() {
            navLinks.forEach(link => {
                if (link.classList.contains('active')) {
                    link.classList.remove('active');
                }
            });

            const currentPath = window.location.pathname;
            const currentPage = currentPath.split('/').filter(Boolean).pop() || 'home';

            const activeLink = document.querySelector(`.nav-item#${currentPage} .nav-link`);
            if (activeLink) {
                activeLink.classList.add('active');
            }
        }

        navLinks.forEach(link => {
            link.addEventListener('click', function() {
                setActiveLink();
            });
        });

        // Run on page load
        setActiveLink();
    });
</script>

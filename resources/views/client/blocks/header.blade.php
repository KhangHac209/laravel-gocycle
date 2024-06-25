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
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/about') }}">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/product') }}">PRODUCTS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/blog') }}">BLOGS</a>
                    </li>
                    <li class="nav-item">
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
                <a href="{{ url('/login') }}">Login</a>
                <span>/</span>
                <a href="{{ url('/register') }}">Register</a>
            </div>
        </div>
    </nav>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Khi một thẻ nav-link được nhấp vào, thêm class 'active'
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>

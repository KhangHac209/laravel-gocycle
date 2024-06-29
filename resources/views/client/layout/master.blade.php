<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GoCycle</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('asset/client/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/slick/slick-theme.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('asset/client/css/App.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Header.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Banner.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Contact.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/index.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Footer.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/AboutUs.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Blog.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/DetailBlog.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/CardProduct.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/DetailProduct.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/ListProduct.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/BackTop.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Order.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Review.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Products.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/Title.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/client/css/BrandProduct.css') }}" type="text/css">



</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('client.blocks.header')
    <!-- Header Section End -->

    {{-- <!-- Hero Section Begin -->
    @include('client.blocks.hero')
    <!-- Hero Section End --> --}}

    @yield('content')

    @include('client.pages.backtop');
    @include('client.blocks.footer')
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="{{ asset('asset/client/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('asset/client/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('asset/client/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/slick/slick.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('my-script')

</body>

</html>

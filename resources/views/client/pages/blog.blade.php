@extends('client.layout.master')

@section('content')
    <html>

    <head>
        <title>My Now Amazing Webpage</title>

    </head>

    <body>

        <div class="autoplay">
            <div>your content</div>
            <div>your content</div>
            <div>your content</div>
        </div>

        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.autoplay').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    autoplay: true,
                    autoplaySpeed: 1000,
                });
            });
        </script>

    </body>

    </html>
@endsection

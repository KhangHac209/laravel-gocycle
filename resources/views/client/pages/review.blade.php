<div class="container">
    @include('components.Title', ['sub' => 'Review', 'title' => 'See What They Said About Us'])
    @php
        $settings = [
            'slidesToShow' => 3,
            'autoplay' => true,
            // Other settings...
        ];
    @endphp
    <x-slider :settings="$settings">
        <div class="review">
            <!-- Review content here -->
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/33-300x300.jpg" alt="" />
            <h3>Elizabeth Bailey - Customer</h3>
            <p>“I had a fantastic experience today buying my first road bike. I'm pretty intimidated by the sport, but
                Wayne never treated me like I was stupid.”</p>
        </div>
        <div class="review">
            <!-- Review content here -->
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/co-founder2-300x300.jpg" alt="" />
            <h3>Jack Sparrow - Customer</h3>
            <p>"I brought my Trek bike in to get the brakes adjusted. Not only did Daniel see me right away, but also he
                went above-and-beyond in checking out the bike."</p>
        </div>
        <div class="review">
            <!-- Review content here -->
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/Why-Choose-Us.jpg" alt="" />
            <h3>Shannon - Customer</h3>
            <p>"I just purchased a 2013 Domane from the Springfield store. I want to pass along to you that I had an
                excellent experience working with them."</p>
        </div>
        <div class="review">
            <!-- Review content here -->
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/co-founder1.jpg" alt="" />
            <h3>Majida - Customer</h3>
            <p>"I had a great experience with the salesmen who helped me. I wanted to let you know your staff have
                earned a loyal customer."</p>
        </div>
    </x-slider>
</div>

@section('my-script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({
                // Configure your slider settings here
                infinite: true,
                speed: 700,
                slidesToShow: 4,
                slidesToScroll: 3,
                autoplay: true,
                autoplaySpeed: 3000,
                cssEase: 'linear',
            });
        });
    </script>
@endsection

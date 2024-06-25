<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/slide2.jpg" class="d-block w-100"
                alt="...">
            <div class="text">
                <h3>Here You Find Right City E-Bike</h3>
                <p>Fast, fun, and functional. That’s what a boost of electric power means for your ride. Whether for
                    recreation or transportation.</p>
                <a href="{{ url('/product') }}" class="clickButton">Discover Now</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://probike.templaza.net/wp-content/uploads/2023/08/Home-2-Slider-3.jpg" class="d-block w-100"
                alt="...">
            <div class="text">
                <h3>It's Easy To Get Around</h3>
                <p>It's a fun-loving solution to so many of life’s challenges: parking, polluting, packing – and
                    even pedaling, with powerful electric drive systems that make it fun and easy to get around.</p>
                <a href="{{ url('/product') }}" class="clickButton">Discover Now</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>

</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
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

@extends('client.layout.master')

@section('content')
    @include('client.pages.banner')


    @include('client.pages.products')

    @include('client.pages.brand_product')
    <section>
        <div class="container pe-3 my-3">
            <div class="about">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="thumb">
                            <img src="https://xedapgiakho.vn/wp-content/uploads/2021/04/4000-1-1067x800.jpg" alt=""
                                class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="title">
                            @include('components.Title', [
                                'sub' => 'About Us',
                                'title' => 'Bicycles Are Our Works, But Also Our Passion',
                            ])

                        </div>
                        <p>
                            Each of us has our own challenges, goals and reasons to ride. At Go Cycle, our purpose is to
                            help you unleash your full potential no matter the chosen path. We do this with our products,
                            our people and the stories we share. Come feel what it's like to be limitless. Come ride with
                            us.
                        </p>
                        <p>
                            Go Cycle is the world's leading brand of high-quality bicycles and cycling gear. Part of the
                            Probike Group, which was founded in 1972, the brand combines craftsmanship, technology and
                            innovative design.
                        </p>
                        <a href="{{ url('/about') }}" class="clickButton">More About Us</a>
                    </div>
                </div>
            </div>

            <div class="about my-5">
                <div class="row flex-row-reverse">
                    <div class="col-lg-6 col-md-12">
                        <div class="thumb">
                            <img src="https://probike.templaza.net/wp-content/uploads/elementor/thumbs/Why-Choose-Us-qb0yhwapwtbo1u2f2e93ndhhbbfdnlgmvl8ttzgnko.jpg"
                                alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="title">
                            @include('components.Title', [
                                'sub' => 'WHY CHOOSE US',
                                'title' => 'Ride With Style, Convenient, Safe And Relaxed',
                            ])
                        </div>
                        <p>
                            Go Cycle has long been one of cycling's main catalysts for change. We introduced lighter,
                            stronger aluminum frames at a time when the industry standard was steel. We were first to make
                            carbon fiber bikes widely available to the world. We defined the look and feel of modern road
                            racing bikes with our Compact Road technology.
                        </p>
                        <a href="{{ url('/about') }}" class="clickButton">More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('client.pages.review')
@endsection
@section('my-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Thành công',
                    text: '{{ session('success') }}'
                });
            @endif
        });
    </script>
@endsection

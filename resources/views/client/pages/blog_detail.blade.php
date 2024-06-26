@extends('client.layout.master')

@section('content')
    <div class="detailBlog">
        <div class="container">
            <div class="row">
                <i onclick="window.history.back()" class="fa-solid fa-angles-left back"></i>
                <div class="col-lg-8 col-md-8">
                    <div class="title">
                        <h3>{{ $blog->title }}</h3>
                    </div>
                    <div class="thumb">
                        <img src="{{ $blog->thumb }}" alt="" />
                    </div>
                    <h4>{{ $blog->description }}</h4>
                    <p>{{ $blog->text }}</p>
                    <h3>HOW TO OPTIMISE YOUR PROTEIN STRATEGY FOR CYCLING</h3>
                    <p>The Lite version of the popular SingleTrack II shorts features a familiar tailored fit and length
                        with a ‘barely there’ feel, being lightweight and breathable without compromising durability. A
                        zippered fly with a popper closure gives the shorts a clean look and elasticated Velcro adjuster
                        tabs enable you to fine-tune the fit around the waist. There are three well-sized zippered pockets –
                        two on the front and one on the rear. The high elastane content ensures stretch in all directions
                        for an excellent fit, which can be altered via the adjuster tabs on the waistband.</p>
                    <img src="https://probike.templaza.net/wp-content/uploads/2023/07/claudio-schwarz-UwWN33MH6IM-unsplash.jpg"
                        alt="" />
                    <p>The 13-inch inseam length of the regular version works perfectly with knee pads, and the shorter
                        10-inch version is great without protection.</p>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="thumbleft">
                        <img src="https://probike.templaza.net/wp-content/uploads/2023/09/about-alice.png" alt="" />
                        <h3>Alice Hayes</h3>
                        <p>Go Cycle is the world's leading brand of high-quality bicycles and cycling gear. Part of the Go
                            Cycle Group, which was founded in 1972.</p>
                    </div>
                    <div class="recent">
                        <h2>Recent Post</h2>
                        @foreach ($recentBlogs as $recentBlog)
                            <div class="list">
                                <div class="thumb">
                                    <img src="{{ $recentBlog->thumb }}" alt="" />
                                </div>
                                <div class="title">
                                    <h3>{{ $recentBlog->title }}</h3>
                                    <p>Mark 3,2024</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

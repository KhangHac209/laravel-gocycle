@extends('client.layout.master')

@section('content')
    <div class="blog">
        <div class="container">
            <div class="row">
                @foreach ($blog as $item)
                    <div class="col-lg-6 col-md-6 mt-3">
                        <a href="{{ route('blog.show', $item->id) }}">
                            <div class="thumb">
                                <img src="{{ $item->thumb }}" alt="" />
                                <p>Mark 3,2024</p>
                            </div>
                            <h3>{{ $item->title }}</h3>
                            <p>{{ $item->description }}</p>
                            <a href="{{ route('blog.show', $item->id) }}" class="clickButton">Read More</a>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

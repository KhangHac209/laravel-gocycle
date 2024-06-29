<!-- Slider.blade.php -->

@props(['settings'])

<div class="slider">
    {{ $slot }}
</div>

@section('my-script')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.slider').slick({!! json_encode($settings) !!});
        });
    </script>
@endsection

@extends('client.layout.master')

@section('content')
    <!-- Categories Section Begin -->
    @include('client.pages.banner')


    {{-- @section('my-script')
    <script type="text/javascript">
        $(document).ready(function(event) {
            $('.btn-add-to-cart').on('click', function(event) {
                event.preventDefault();
                var productId = $(this).data('product-id');

                $.ajax({
                    url: "{{ route('cart.add.product') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        productId: productId,
                    },
                    success: function(response) {
                        alert(response.message);
                    }
                })
            });
        });
    </script>
@endsection --}}
@endsection

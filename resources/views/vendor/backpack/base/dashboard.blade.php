@extends(backpack_view('blank'))

@section('content')
    <div class="row">
        <div class="col-3">
            <div class="border rounded p-3 mb-4">
                <p class="mb-0">В базе <b>{{ $productsCount }}</b> товаров в <b>{{ $categoriesCount }}</b> категориях.</p>
            </div>
            <button class="btn btn-sm btn-primary count-goods-in-menu">Оптимизировать меню категорий</button>
        </div>
    </div>
@endsection


@push('after_scripts')
    <script>
        $('.count-goods-in-menu').on('click', function () {
            $.ajax({
                async: true,
                type: "POST",
                dataType: "json",
                url: '{{ route('count-goods-in-menu') }}',
                success: (response) => {  console.log(response) }
            })
                .done(function (response) {
                    console.log(response)
                })

                .catch(function (error) {
                    new Noty({
                        type: "error",
                        text: error.responseJSON.exception + '<br>' + error.responseJSON.message,
                        timeout: false
                    }).show();
                    console.log(error.responseJSON)
                })
        })
    </script>
@endpush

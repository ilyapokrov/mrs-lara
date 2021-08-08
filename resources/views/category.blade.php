@extends('layouts.main')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/products.js') }}"></script>
@endpush

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="container-xxl">
        @include('sections.categories')

        <div class="py-3">

            <div class="mb-3">
                <h1 class="font-11 mb-3">{{ $category->name }}</h1>
                <p class="mb-4"> {{ $description }}</p>
            </div>

            <div class="row">

                <div class="col-12 col-md-3">
                    @include('sections.filter')
                </div>

                <div class="col-12 col-md-9">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-6 col-sm-4 col-lg-3 pb-2 px-0">
                                @include('sections.product-card', ['product' => $product])
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="py-3">
                {{ $products->onEachSide(1)->links() }}
            </div>
        </div>
    </div>

    <div class="modal fade" id="images-popup">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body p-0">
                    <div id="carousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner border-bottom"></div>
                        <ol class="carousel-indicators justify-content-start my-2 mx-3"></ol>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
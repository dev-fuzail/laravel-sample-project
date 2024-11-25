@extends("layouts.admin.main")
@section('page-css')
<style>
    .owl-item {
    display: flex !important;
    justify-content: center !important;
    align-items: center !important;
    }
    .owl-carousel {
    height: auto !important;
    }


</style>
@endsection
@section('content')

<div class="content">
    @include('layouts.admin.header')

    <div class="container-fluid pt-4 px-4">
        <div class="bg-secondary rounded h-100 p-4 d-flex flex-column align-items-center text-center">
            <h2 class="mb-4">Product Show</h2>
            <div class="owl-item d-flex justify-content-center align-items-center" style="min-height: 400px;">
                <div class="text-center">
                    <img class="img-fluid mb-4" src="{{ asset('storage/'.$product['image_link']) }}" style="width: 100px; height: 100px;">
                    <h5 class="mb-1">{{ $product['product_name'] }}</h5>
                    <p>{!! $product['details'] !!}</p>
                </div>
            </div>
        <a href="{{ route('product.index') }}" class="btn btn-primary">Go Back</a>

        </div>
    </div>
        

    @include('layouts.admin.footer')
</div>

@endsection
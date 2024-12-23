@extends('layouts/master_layout')

@section('page-css')
<style>
    /* Container for the product details */
    .product-detail-container {
        margin: 40px 0;
    }

    /* Product Image Styling */
    .product-detail-image img {
        width: 100%;
        height: auto;
        max-height: 400px;
        object-fit: cover;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Product Info Styling */
    .product-info {
        padding: 20px;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .product-info h1 {
        font-size: 28px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
    }

    .product-info .price-text {
        font-size: 22px;
        font-weight: bold;
        color: #f26522;
        margin: 20px 0;
    }

    .product-info p {
        font-size: 16px;
        line-height: 1.6;
        color: #555;
    }

    /* Button Styling */
    .product-action-buttons {
        margin-top: 20px;
    }

    .product-action-buttons .btn {
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .product-action-buttons .btn-buy-now {
        background-color: #f26522;
        color: white;
        border: none;
    }

    .product-action-buttons .btn-buy-now:hover {
        background-color: #d85e1f;
        transform: scale(1.05);
    }

    .product-action-buttons .btn-add-to-cart {
        background-color: white;
        color: #f26522;
        border: 2px solid #f26522;
        margin-left: 15px;
    }

    .product-action-buttons .btn-add-to-cart:hover {
        background-color: #f26522;
        color: white;
        transform: scale(1.05);
    }
</style>
@endsection

@section('content')
<div class="product-detail-container container">
    <div class="row">
        <!-- Product Image -->
        <div class="col-lg-6 col-md-6 product-detail-image">
            <img src="{{ asset('storage/'.$product['image_link']) }}" alt="{{ $product['product_name'] }}">
        </div>

        <!-- Product Info -->
        <div class="col-lg-6 col-md-6 product-info">
            <h1>{{ $product['product_name'] }}</h1>
            <p class="price-text">Price: ${{ $product['price'] }}</p>
            <p>{!! $product['details'] !!}</p>

            <!-- Action Buttons -->
            <div class="product-action-buttons">
                <button class="btn btn-buy-now">Buy Now</button>
                <button class="btn btn-add-to-cart">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
</div>
@endsection

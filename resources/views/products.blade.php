@extends('layouts/master_layout')
@section('content')
<div class="jewellery_section">
        <div id="jewellery_main_slider" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <h1 class="fashion_taital">All Products</h1>
                    <div class="fashion_section_2">
                    <div class="row">
                        @foreach ($products as $item)
                        <div class="col-lg-4 col-sm-4">
                            <div class="box_main">
                                <h4 class="shirt_text">{{ $item['product_name'] }}</h4>
                                <p class="price_text">Start Price  <span style="color: #262626;">$ 100</span></p>
                                <div class="jewellery_img"><img src="{{ asset('storage/'.$item['image_link']) }}"></div>
                                <div class="btn_main">
                                    <div class="buy_bt"><a href="#">Buy Now</a></div>
                                    <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                            </div>
                        </div>   
                        @endforeach
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#jewellery_main_slider" role="button" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        </a>
        <a class="carousel-control-next" href="#jewellery_main_slider" role="button" data-slide="next">
        <i class="fa fa-angle-right"></i>
        </a>
        <div class="loader_main">
            <div class="loader"></div>
        </div>
    </div>
</div>
@endsection
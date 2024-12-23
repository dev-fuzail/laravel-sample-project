@extends('layouts/master_layout')
@section('page-css')
<style>
.custom-pagination .pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.custom-pagination .pagination li {
    list-style: none;
    margin: 0 5px;
}

.custom-pagination .pagination li a,
.custom-pagination .pagination li span {
    display: block;
    padding: 10px 15px;
    color: #f26522;
    border: 1px solid #f26522;
    border-radius: 5px;
    text-decoration: none;
    transition: all 0.3s;
}

.custom-pagination .pagination li a:hover {
    background-color: #f26522;
    color: white;
}

.custom-pagination .pagination li.active span {
    background-color: #f26522;
    color: white;
    border-color: #f26522;
}

/* Product image container styling */
.box_main img {
    width: 100%;
    height: auto;
    max-height: 200px;
    object-fit: cover;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 10px;
    background-color: #f9f9f9;
}
</style>
@endsection

@section('content')
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
                           <p class="price_text">Start Price <span style="color: #262626;">$ {{ $item['price'] }}</span></p>
                           <div>
                              <img src="{{ asset('storage/'.$item['image_link']) }}" alt="{{ $item['product_name'] }}">
                           </div>
                           <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                              <a href="{{ route('product_detail', $item['id']) }}" 
                                 style="background-color: #f26522; color: white; padding: 10px 20px; font-size: 14px; font-weight: bold; text-transform: uppercase; text-decoration: none; border-radius: 5px; transition: all 0.3s ease; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
                                 Buy Now
                              </a>
                              <!-- Add to Cart Button -->
                              <button 
                                 style="display: inline-flex; align-items: center; justify-content: center; background-color: #fff; color: #f26522; padding: 10px; font-size: 14px; font-weight: bold; border: 2px solid #f26522; border-radius: 50%; width: 40px; height: 40px; transition: all 0.3s ease; cursor: pointer; margin-left: auto;"
                                 onmouseover="this.style.backgroundColor='#f26522'; this.style.color='white'; this.style.transform='scale(1.1)';"
                                 onmouseout="this.style.backgroundColor='#fff'; this.style.color='#f26522'; this.style.transform='scale(1)';">
                                 <i class="fa fa-shopping-cart" style="font-size: 16px;"></i>
                              </button>
                           </div>                                                
                        </div>
                     </div>
                     @endforeach
                  </div>
                  <!-- Pagination Links -->
                  <div class="custom-pagination">
                     {{ $products->links('pagination::bootstrap-4') }}
                  </div>                 
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection

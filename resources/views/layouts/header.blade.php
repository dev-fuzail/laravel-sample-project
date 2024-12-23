         <div class="banner_bg_main">
         @include('layouts.navbar')
         <!-- logo section start -->
         <div class="logo_section">
            <div class="container">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="logo"><a href="index.html"><img src="{{ asset('assets/images/logo.png') }}"></a></div>
                  </div>
               </div>
            </div>
         </div>
         <!-- logo section end -->
         <!-- header section start -->
         <div class="header_section" style="position: relative; z-index: 2; padding: 20px 0; background-color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);">
            <div class="container">
                <div class="containt_main" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                    <!-- Dropdown for Categories -->
                    <div class="dropdown" style="margin-right: 20px;">
                        <div class="form-group" style="margin-right: 20px;">
                            <select id="category_id" class="form-control btn btn-secondary" style="border-radius: 5px; box-shadow: none;">
                                <option value="">All Categories</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category['id'] }}">{{ $category['name'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Search Bar -->
                    <div class="main" style="flex-grow: 1; max-width: 600px; position: relative;">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search here" id="search_box" style="border-radius: 5px; box-shadow: none;">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button" style="background-color: #f26522; border-color: #f26522; border-radius: 5px;">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div id="search_results" style="position: absolute; top: 100%; left: 0; width: 100%; background-color: white; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); display: none; border-radius: 5px; z-index: 10; overflow-y: auto; max-height: 200px;">
                            <!-- Example search result -->
                            <a href="#" style="display: block; padding: 10px; text-decoration: none; color: #333; border-bottom: 1px solid #f1f1f1;">Search Result 1</a>
                            <a href="#" style="display: block; padding: 10px; text-decoration: none; color: #333; border-bottom: 1px solid #f1f1f1;">Search Result 2</a>
                        </div>
                    </div>

                    <!-- Cart Icon -->
                    <div class="header_box" style="margin-left: 20px;">
                        <div class="login_menu">
                            <ul style="list-style: none; margin: 0; padding: 0; display: flex; align-items: center;">
                                <li>
                                    <button id="cart_btn" style="text-decoration: none; color: #333; display: flex; align-items: center;">
                                        <i class="fa fa-shopping-cart" aria-hidden="true" style="font-size: 18px; margin-right: 5px;"></i>
                                        <span class="padding_10" style="font-weight: bold;">Cart</span>
                                    </button>
                                </li>
                                <li>
                                    <button id="orders_btn" style="text-decoration: none; color: #333; display: flex; align-items: center;">
                                        <i class="fa fa-shopping-bag" aria-hidden="true" style="font-size: 18px; margin-right: 5px;"></i>
                                        <span class="padding_10" style="font-weight: bold;">Orders</span>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         <!-- header section end -->
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div class="container">
               <div id="my_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="{{ route('products') }}">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favriot shoping</h1>
                              <div class="buynow_bt"><a href="{{ route('products') }}">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                     <div class="carousel-item">
                        <div class="row">
                           <div class="col-sm-12">
                              <h1 class="banner_taital">Get Start <br>Your favourite shopping</h1>
                              <div class="buynow_bt"><a href="{{ route('products') }}">Buy Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
                  <i class="fa fa-angle-left"></i>
                  </a>
                  <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
                  <i class="fa fa-angle-right"></i>
                  </a>
               </div>
            </div>
         </div>
         <!-- banner section end -->
      </div>
         <div class="modal fade" id="card_modal" tabindex="-1" role="dialog" aria-labelledby="card_modal" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h2 class="modal-title" id="card_modal_title">Your Cart</h2>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="cart-items-container">
                             <div id="cart_items">
                                 <!-- Dynamically added cart items will go here -->
                             </div>
                         </div>
                     </div>
                     <div class="modal-footer">
                         <p>Total: $<span id="total_amount">0.00</span></p>
                         <button id="place_order" class="btn btn-primary">Place Order</button>
                         <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                         {{--                         <a href="{{ route('checkout') }}" class="btn btn-primary">Checkout</a>--}}
                     </div>
                 </div>
             </div>
         </div>

         <div class="modal fade" id="orders_modal" tabindex="-1" role="dialog" aria-labelledby="card_modal" aria-hidden="true">
             <div class="modal-dialog modal-dialog-centered" role="document">
                 <div class="modal-content">
                     <div class="modal-header">
                         <h2 class="modal-title" id="orders_modal_title">Your Orders</h2>
                         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                             <span aria-hidden="true">&times;</span>
                         </button>
                     </div>
                     <div class="modal-body">
                         <div class="cart-items-container">
                             <div id="orders_container">
                                 <!-- Dynamically added cart items will go here -->
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>

         <div aria-live="polite" aria-atomic="true" style="position: relative; min-height: 200px;">
             <div class="toast d-none" style="position: absolute; top: 0; right: 0;">
                 <div class="toast-header">
                     <h3 class="mr-auto">Message</h3>
                     <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="toast-body">
                     <p id="toast_message"></p>
                 </div>
             </div>
         </div>

     @section('header-page-js')
     <script>
         $(document).ready(function() {

             $('#search_box').on('input', function(e) {
                 e.preventDefault();

                 let search = $("#search_box").val();
                 let category = $("#category_dropdown").val(); // Get selected category from dropdown

                 // If no category is selected, set category to null
                 category = category ? category : null;

                 // Check if the search value is not empty
                 if (search.trim() !== "") {
                     $.ajax({
                         url: "{{ route('search') }}",
                         data: { "_token": '{{ csrf_token() }}', "value": search, "category": category },
                         method: 'get',
                         success: function(data) {
                             // Clear previous search results and show the dropdown
                             $('#search_results').empty().show();

                             let resultHtml = "";

                             // Loop through the products and create HTML for each item
                             data.products.forEach(item => {
                                 resultHtml += `<a class="dropdown-item" href="{{ url('product-detail') }}/${item.id}">
                                         ${item.product_name}
                                         <img style="height: 30px; width: 30px;"
                                         src="{{ asset('storage/'.'${item.image_link}') }}" alt="${item.product_name}">
                                       </a>`;
                             });

                             // Append the result HTML to the search results container
                             $('#search_results').append(resultHtml);
                         },
                         error: function(xhr, status, error) {
                             console.error("AJAX Error: " + error);
                         }
                     });
                 } else {
                     // Hide the search results if input is empty
                     $('#search_results').empty().hide();
                 }
             });

             $("#cart_btn").on('click', function(e){
                 e.preventDefault();
                 $.ajax({
                     url: 'http://localhost:8000/cart_details',
                     data: {"_token":"{{ csrf_token() }}"},
                     success: function(data) {
                         const cartItemsContainer = $("#cart_items");
                         cartItemsContainer.empty(); // Clear previous items

                         if (data.cart.length === 0) {
                             cartItemsContainer.append('<div class="empty-cart text-center"><p>Your cart is empty!</p></div>');
                         } else {
                             let itemsHtml = "";
                             data.cart.forEach(item => {
                                 itemsHtml += `
                            <div class="cart-item d-flex justify-content-between align-items-center mb-3" id="cart-item-${item.id}">
                                <div>
                                    <input type="checkbox" class="item-checkbox" data-id="${item.id}" data-price="${item.product.price}">
                                    <h6>${item.product.product_name}</h6>
                                    <p>Price: $${item.product.price}</p>
                                </div>
                                <button class="btn btn-danger btn-sm remove-cart-item" data-id="${item.id}">
                                    Remove
                                </button>
                            </div>`;
                             });
                             cartItemsContainer.append(itemsHtml);
                         }

                         updateTotalAmount();
                     },
                     error: function(xhr, status, error) {
                         console.error("AJAX Error: " + error);
                     }
                 });
                 $("#card_modal").modal('show');
             });

             $(document).on('change', '.item-checkbox', function() {
                 updateTotalAmount();
             });

             function updateTotalAmount() {
                 let totalAmount = 0;
                 $('.item-checkbox:checked').each(function() {
                     totalAmount += parseFloat($(this).data('price'));
                 });
                 $('#total_amount').text(totalAmount.toFixed(2)); // Update the total amount
             }

             $(document).on('click', '.remove-cart-item', function(e){
                 e.preventDefault();
                 let cartItemId = $(this).data('id');
                 $.ajax({
                     url: 'http://localhost:8000/remove-from-cart',
                     method: 'POST',
                     data: {"_token":"{{ csrf_token() }}", "cart_item_id": cartItemId},
                     success: function(response) {
                         if (response.success) {
                             $('#cart-item-' + cartItemId).remove();
                             updateTotalAmount(); // Recalculate total when an item is removed
                             alert('Item removed successfully!');
                         } else {
                             alert('Error removing item');
                         }
                     },
                     error: function(xhr, status, error) {
                         console.error("AJAX Error: " + error);
                         alert('Something went wrong!');
                     }
                 });
             });

             $('#place_order').on('click', function() {
                 let selectedItems = [];
                 $('.item-checkbox:checked').each(function() {
                     selectedItems.push($(this).data('id'));
                 });

                 if (selectedItems.length > 0) {
                     $.ajax({
                         url: 'http://localhost:8000/place-order',
                         method: 'POST',
                             data: {"_token":"{{ csrf_token() }}", "selected_items": selectedItems},
                         success: function(response) {
                             if (response.success) {
                                 alert('Order placed successfully!');
                                 // Optionally, redirect to the order confirmation page or update UI
                             } else {
                                 alert('Error placing order');
                             }
                         },
                         error: function(xhr, status, error) {
                             console.error("AJAX Error: " + error);
                             alert('Something went wrong!');
                         }
                     });
                 } else {
                     alert('Please select at least one item to place the order.');
                 }
             });

             $("#orders_btn").on('click', function (e) {
                 e.preventDefault();

                 $.ajax({
                     url: 'http://localhost:8000/orders',
                     data: {"_token":"{{ csrf_token() }}"},
                     method: 'GET',
                     success: function(data) {
                         const ordersContainer = $("#orders_container");
                         ordersContainer.empty();

                         if (data.orders.length === 0) {
                             ordersContainer.append('<p>No orders found!</p>');
                         } else {
                             let ordersHtml = "";
                             data.orders.forEach(order => {
                                 console.log(order);
                                 let orderStatus = order.status == 1? 'Confirmed': 'Pending';
                                 ordersHtml += `
                            <div class="order-item d-flex justify-content-between align-items-center mb-3" id="order-${order.id}">
                                <div>
                                    <h6>Order #${order.id}</h6>
                                    <p>Product: ${order.product.product_name}
                                        <img style="height: 30px; width: 30px;"
                                         src="{{ asset('storage/'.'${order.product.image_link}') }}">
                                     </p>
                                     <p>Total Bill: ${order.order_price.price}</p>
                                </div>
                                <div>
                                    ${orderStatus}
                                </div>
                              <button class="btn btn-danger cancel-order" data-id="${order.id}">Cancel</button>
                            </div>`;
                             });
                             ordersContainer.append(ordersHtml);
                         }
                         $("#orders_modal").modal('show');
                     },
                     error: function(xhr, status, error) {
                         console.error("AJAX Error: " + error);
                     }
                 });
             });

             $(document).on('click', '.cancel-order', function(e) {
                 e.preventDefault();
                 let orderId = $(this).data('id');

                 $.ajax({
                     url: 'http://localhost:8000/cancel-order',
                     method: 'POST',
                     data: {"_token":"{{ csrf_token() }}", "order_id": orderId},
                     success: function(response) {
                         if (response.success) {
                             // Update the order status in the UI
                             $(`#order-${orderId}`).find('.btn-danger').replaceWith('<span class="badge badge-danger">Canceled</span>');
                             alert('Order canceled successfully!');
                         } else {
                             alert('Error canceling order');
                         }
                     },
                     error: function(xhr, status, error) {
                         console.error("AJAX Error: " + error);
                         alert('Something went wrong!');
                     }
                 });
             });
         });

      </script>
      @endsection

<div class="container" style="position: relative; z-index: 9999;">
   <div class="header_section_top" style="background-color: #fff; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); padding: 10px 0;">
      <div class="row">
         <div class="col-sm-12">
            <div class="custom_menu" style="text-align: center;">
               <ul style="list-style: none; margin: 0; padding: 0; display: flex; justify-content: center; gap: 20px;">
                  <li style="display: inline;">
                     <a href="{{ route('dashboard') }}" style="text-decoration: none; color: #333; font-weight: bold;">Home</a>
                  </li>
                  <li style="display: inline;">
                     <a href="{{ route('products') }}" style="text-decoration: none; color: #333; font-weight: bold;">All Products</a>
                  </li>
                  <li style="display: inline;">
                     <a href="{{ route('about') }}" style="text-decoration: none; color: #333; font-weight: bold;">About</a>
                  </li>
                   @guest
                  <li style="display: inline;">
                     <a href="{{ route('login') }}" style="text-decoration: none; color: #333; font-weight: bold;">Login</a>
                  </li>
                  <li style="display: inline;">
                     <a href="{{ route('register') }}" style="text-decoration: none; color: #333; font-weight: bold;">Register</a>
                  </li>
                   @endguest
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>

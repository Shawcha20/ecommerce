   <!-- product section -->
   <section class="product_section layout_padding" id="product">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @foreach ($product as $item )

        @endforeach
          <div class="col-sm-6 col-md-4 col-lg-4">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a href="" class="option1">
                      product details
                      </a>
                      @isset($user)
                      <a href="/product/{{$user->name}}/cart" class="option2">
                        Buy Now
                        </a>
                        <a href="/product/{{$user->name}}/cart" class="option2">
                          add to cart
                          </a>
                      @else
                       <a href="{{url('/product/login')}}" class="option2">
                        Buy Now
                        </a>

                        <a href="{{url('/product/login')}}" class="option2">
                          add to cart
                          </a>
                      @endisset

                   </div>
                </div>
                <div class="img-box">
                   <img src="/homepage/images/p1.png" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                      Men's Shirt
                   </h5>
                   <h6>
                      $75
                   </h6>
                </div>
             </div>
          </div>
       </div>
       <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div>
    </div>
 </section>
 <!-- end product section -->

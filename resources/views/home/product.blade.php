   <!-- product section -->
   <section class="product_section layout_padding" id="product">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
        @if(isset($product))
        @foreach ($product as $item)
          <div class="col-sm-6 col-md-4 col-lg-4">

            <div class="box">
                <div class="option_container">
                   <div class="options">

                      @isset($user)
                      <a href="{{ route('product.show',['id'=>$item->id,'user'=>$user->id]) }}" class="option1">
                        product details
                     </a>
                      {{-- <a href="{{ route('buySingle.cart',['id'=>$item->id,'user'=>$user->id]) }}" class="option2">
                        Buy Now
                        </a> --}}
                        <a href="{{ route('home.addcart',['id'=>$item->id,'user_id'=>$user->id]) }}" class="option2">
                          add to cart
                          </a>
                      @else
                      <a href="{{ route('product.show',['id'=>$item->id]) }}" class="option1">
                        product details
                     </a>
                       {{-- <a href="{{url('/product/login')}}" class="option2">
                        Buy Now
                        </a> --}}

                        <a href="{{url('/product/login')}}" class="option2">
                          Add to cart
                          </a>
                      @endisset

                   </div>
                </div>
                <div class="img-box">
                   <img src="/products/{{ $item->image }}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                     {{ $item->name}}
                   </h5>
                   <h6>
                      @if (isset($item->discount))
                      {{ $item->discount }}
                      <strike class="text-danger">{{ $item->price }}</strike>
                      @else
                        {{ $item->price }}
                      @endif
                   </h6>
                </div>
             </div>
          </div>
          @endforeach
          <span class="mt-5 justify-content-center d-flex">
            <!-- /* $product->appends(Request::all())->links() */-->
            {!! $product->withQueryString()->links('pagination::bootstrap-5') !!}
        </span>
          @endif
        </div>

       {{-- <div class="btn-box">
          <a href="">
          View All products
          </a>
       </div> --}}
    </div>
 </section>
 <!-- end product section -->

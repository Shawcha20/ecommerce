         <!-- slider section -->
         <section class="slider_section" id="home">
            <div class="slider_bg_box">
               <img src="/homepage/images/slider-bg.jpg" alt="">
            </div>
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                   @foreach($offer as $index => $offer)
                   <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                      <div class="container">
                         <div class="row">
                            <div class="col-md-7 col-lg-6">
                               <div class="detail-box">
                                  <h1>
                                     <span>
                                        {{ $offer->offerTitle }}
                                     </span>
                                     <br>
                                     {{ $offer->offerProduct }}
                                  </h1>
                                  <p>
                                     {{ $offer->offerDes }}
                                  </p>
                                  <div class="btn-box">
                                     <a href="#" class="btn1">
                                     Shop Now
                                     </a>
                                  </div>
                               </div>
                            </div>
                         </div>
                      </div>
                   </div>
                   @endforeach
                </div>
                <div class="container">
                   <ol class="carousel-indicators">
                      @foreach($offer as $index => $offer)
                      <li data-target="#customCarousel1" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
                      @endforeach
                   </ol>
                </div>
             </div>

         </section>
         <!-- end slider section -->

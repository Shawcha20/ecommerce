 <div class="hero_area">
     <!-- header section strats -->
     <header class="header_section">
         <div class="container">
             <nav class="navbar navbar-expand-lg navbar-light bg-light custom_nav-container fixed-top">
                 <div class="container-fluid">
                        @if($user!=null)
                     <a class="navbar-brand" href="{{ route('home.index',['user_id'=>$user->id]) }}"><img width="250"
                             src="homepage/images/logo.png" alt="#" /></a>
                        @else
                        <a class="navbar-brand" href="{{ route('home.index') }}"><img width="250"
                            src="homepage/images/logo.png" alt="#" /></a>
                         @endif
                     <button class="navbar-toggler" type="button" data-toggle="collapse"
                         data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                         aria-expanded="false" aria-label="Toggle navigation">
                         <span class="navbar-toggler-icon"></span>
                     </button>
                     <div class="collapse navbar-collapse" id="navbarSupportedContent">
                         <ul class="navbar-nav mr-auto">
                             <li class="nav-item active">
                                @if($user==null)
                                 <a class="nav-link" href="{{ route('home.index') }}">Home</a>
                                 @else
                                 <a class="nav-link" href="{{ route('home.index',['user_id'=>$user->id]) }}">Home</a>
                                 @endif
                             </li>
                             <li class="nav-item dropdown">
                                 <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"
                                     role="button" aria-haspopup="true" aria-expanded="false">Pages <span
                                         class="caret"></span></a>
                                 <ul class="dropdown-menu">
                                     <li><a href="about.blade.php">About</a></li>
                                     <li><a href="testimonial.html">Testimonial</a></li>
                                 </ul>
                             </li>
                             <li class="nav-item">
                                 <a class="nav-link" href="{{ isset($user) ? route('product.home', ['user_id' => $user->id]) : route('product.home') }}">Products</a>
                             </li>

                             @if (!isset($user))
                                 <li class="nav-item">
                                     <a class="nav-link" href="{{ route('product.error') }}">Orders</a>
                                 </li>
                             @else
                                 <li class="nav-item">
                                     <a class="nav-link"
                                         href="{{ route('showOrder.buy', ['user' => $user->id]) }}">Orders</a>
                                 </li>
                             @endif

                             <li class="nav-item">
                                 <a class="nav-link" href="#sub">Contact</a>
                             </li>
                         </ul>
                         <ul class="navbar-nav ml-auto">
                             <li class="nav-item">
                                 @if ($user != null)
                                     <a class="nav-link" href="{{ route('home.cart', ['id' => $user->id]) }}">
                                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                     </a>
                                 @else
                                     <a class="nav-link" href="{{ route('product.error') }}">
                                         <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                     </a>
                                 @endif

                             </li>
                             <li class="navbar-nav ml-auto">


                                <div class="container">
                                    <div class="row">
                                        <div class="col">
                                            <form action="{{ isset($user) ? route('search.product', ['user_id' => $user->id]) : route('search.product') }}" method="POST" class="d-flex">
                                                @csrf
                                                <input type="text" class="form-control mr-2" placeholder="Search" name="search">
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                             @if ($user != null)
                                 <li class="nav-item dropdown">
                                     <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                                         role="button" data-toggle="dropdown" aria-haspopup="true"
                                         aria-expanded="false">
                                         {{ $user->name }}
                                     </a>
                                     <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                         <a class="dropdown-item" href="{{ route('login.logout') }}">Log Out</a>
                                     </div>
                                 </li>
                             @else
                                 <li class="nav-item">
                                     <a href="{{ route('home.login') }}"> <button
                                             class="btn btn-outline-primary my-2 my-sm-0" type="button">Sign
                                             In</button></a>
                                 </li>
                                 <li class="nav-item">
                                     <a href="{{ route('home.signup') }}"><button
                                             class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button">Sign
                                             Up</button> </a>
                                 </li>
                             @endif
                         </ul>
                     </div>
                 </div>
             </nav>
         </div>
 </div>
 </header>

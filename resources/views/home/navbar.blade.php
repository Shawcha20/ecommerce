 <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light custom_nav-container fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.html"><img width="250" src="homepage/images/logo.png"
              alt="#" /></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="#home">Home</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                      aria-haspopup="true" aria-expanded="false">Pages <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                  </ul>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#product">Products</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#blog">Blog</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#sub">Contact</a>
              </li>
          </ul>
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link" href="#">
                      <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                  </a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="#">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </a>
              </li>
              @if (request()->is('home') )
                  <li class="nav-item">
                      <a href="{{ route('home.login') }}"> <button
                              class="btn btn-outline-primary my-2 my-sm-0" type="button">Sign In</button></a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('home.signup') }}"><button
                              class="btn btn-outline-success my-2 my-sm-0 ml-2" type="button">Sign
                              Up</button> </a>
                  </li>
              @elseif (request()->is('login')|| request()->is('signup'))
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Account
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('login.logout') }}">Log Out</a>
                      </div>
                  </li>
              @endif
          </ul>
      </div>
    </div>
  </nav>
</div>
</div>
</header>

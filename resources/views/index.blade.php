<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>Fregg</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />


  <!-- font wesome stylesheet -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

  <!-- bootstrap core css -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
  <!-- responsive style -->
  <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />
</head>

<body>
  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
          <a class="navbar-brand mr-5" href="index">
            <img src="{{ asset('images/bloglogo.png') }}" alt="">
            <span>
              mini blog
            </span>
          </a>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
              <ul class="navbar-nav  ">
              @if (Route::has('login'))
                  <nav class="-mx-3 flex flex-1 justify-end">
                      @auth
                          <a
                              href="{{ url('/dashboard') }}"
                              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                          >
                              Dashboard
                          </a>
                      @else
                          <a
                              href="{{ route('login') }}"
                              class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                          >
                              Log in
                          </a>

                          @if (Route::has('register'))
                              <a
                                  href="{{ route('register') }}"
                                  class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                              >
                                  Register
                              </a>
                          @endif
                      @endauth
                  </nav>
              @endif
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- end header section -->

    <!-- slider section -->
    <section class=" slider_section position-relative">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="row">
                <div class="col-md-7">
                  <div class="detail-box">
                    <div>
                      <h1>
                        Welcome To <br>
                        <span>
                          Mini Blog Writing Site
                        </span>
                      </h1>
                      <p>
                        You can buy attention (advertising). You can beg for attention from the media. You can bug people one at a time to get attention (sales). Or you can earn attention 
                        by creating something interesting and valuable and then publishing it online for free. 
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>

  <!-- about section -->

  <section class="about_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                About
              </h2>
            </div>
            <p>
              It is a small blog writing site where you can write a small blog and publish it, where
              other poeple can read your blog. Also you have the ability to edit or delete your blogs. 
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="{{ asset('images/about-img.png') }}" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- end about section -->
  <div class="body_bg layout_padding">

  <!-- service section -->

    <section class="service_section ">
      <div class="container">
        <div class="heading_container">
          <h2>
            What you can do
          </h2>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img height="100px" width="100px" src="{{ asset('images/s-1.png') }}" alt="">
              </div>
              <h4>
                Create
              </h4>
              <p>
                You can create your own blog and post it to the public so that they could read.
              </p>
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="box align-items-end align-items-md-start text-right text-md-left">
              <div class="img-box">
                <img height="100px" width="100px" src="{{ asset('images/s-2.png') }}" alt="">
              </div>
              <h4>
                Read
              </h4>
              <p>
                You can read other users contents as well inside the dashboard.
              </p>
              
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="box">
              <div class="img-box">
                <img height="100px" width="100px" src="{{ asset('images/s-3.png') }}" alt="">
              </div>
              <h4>
                Update
              </h4>
              <p>
                If you want you can update the contents in your own posts which you have posted before.
              </p>
              
            </div>
          </div>
          <div class="col-md-6">
            <div class="box align-items-end align-items-md-start text-right text-md-left">
              <div class="img-box">
                <img height="100px" width="100px" src="{{ asset('images/s-4.png') }}" alt="">
              </div>
              <h4>
                Delete
              </h4>
              <p>
                If you want you can delete your own post, once the post is deleted it cannot be retrieved back.
              </p>
              
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- end service section -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

</body>

</html>
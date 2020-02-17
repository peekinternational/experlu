
<!DOCTYPE html>
<html lang="en">
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <head>
    <title>Experlu</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta property="fb:app_id" content="778141418958555" />

    <meta name="description" content="" />
    <meta name="title" content="Finance Analyst" />
    <meta property="og:title" content="Finance Analyst" />
    <meta property="og:description" content="" />
    <link rel="canonical" href="index.html" />
    <meta property="og:image" content="../www.ageras.com/assets/images/default-open-graph-image.jpg" />

    <link rel="stylesheet" href="{{asset('frontend-assets/css/style-guide-external-9b33b7fc1b.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style-guide-a355bce31e.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/style.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/responsive.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" href="{{asset('frontend-assets/css/materialdesignicons.min.css')}}">

    <link rel="shortcut icon" href="{{asset('frontend-assets/icons/favicon.ico')}}" type="image/x-icon" />
    <link rel="apple-touch-icon" href="{{asset('frontend-assets/icons/apple-touch-icon.png')}}" />
    <link rel="apple-touch-icon" sizes="57x57" href="{{asset('frontend-assets/icons/apple-touch-icon-57x57.png')}}" />
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('frontend-assets/icons/apple-touch-icon-72x72.png')}}" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('frontend-assets/icons/apple-touch-icon-76x76.png')}}" />
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('frontend-assets/icons/apple-touch-icon-114x114.png')}}" />
    <link rel="apple-touch-icon" sizes="120x120" href="{{asset('frontend-assets/icons/apple-touch-icon-120x120.png')}}" />
    <link rel="apple-touch-icon" sizes="144x144" href="{{asset('frontend-assets/icons/apple-touch-icon-144x144.png')}}" />
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('frontend-assets/icons/apple-touch-icon-152x152.png')}}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('frontend-assets/icons/apple-touch-icon-180x180.png')}}" />

     <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
    <script src="{{asset('frontend-assets/js/external-9787175a94.js')}}"></script>
    @yield('style')
    <!-- Global site tag (gtag.js) - Google Ads: 810393520 -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-810393520"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-810393520');
    gtag('config', 'UA-117413918-1');
    </script>

  </head>
  <body>
    @if(Request::Segment(2) != 'invoice_pdf')
    @include('includes.header')
    @endif
    <!-- @yield('inner-header') -->

    @yield('content')

    @include('includes.footer')


    <!--Scroll to top Button-->

    @yield('page-footer')



    <script src="{{('https://use.fontawesome.com/7518055ce7.js')}}"></script>

    <script src="../code.iconify.design/1/1.0.0-rc1/iconify.min.js"></script>
    <script src="{{asset('frontend-assets/js/main-5f7f15f9f8.js')}}"></script>
    <script src="{{asset('frontend-assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend-assets/js/vendor-match-height-32a288c259.js')}}"></script>
    <script src="{{asset('frontend-assets/js/tp.widget.bootstrap.min.js')}}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    @yield('script')
    <script>
    $('.card.service-card').matchHeight();
    ///// Intersection Observer block for dynamic loading offscreen images
    const config = {
    rootMargin: '0px 0px 50px 0px',
    threshold: 0
    };
    function preloadImage(image) {
    image.src = image.dataset.src;
    }
    let myObserver = new IntersectionObserver(function(entries, self) {
    entries.forEach(entry => {
    if(entry.isIntersecting) {
    preloadImage(entry.target);
    self.unobserve(entry.target);
    }
    });
    }, config);
    const imgs = document.querySelectorAll('img[data-src]');
    imgs.forEach(img => {
    myObserver.observe(img);
    });
    </script>
    <script>
      $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [
        "<i class='fa fa-caret-left'></i>",
        "<i class='fa fa-caret-right'></i>"
      ],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 3
        },
        1000: {
          items: 4
        }
      }
    })
    </script>
    </body>
</html>

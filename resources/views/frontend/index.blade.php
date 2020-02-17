@extends('layouts.app')
@section('content')

  <section class="hero" >
    <div class="hero-overlay hidden-xs hidden-sm"  style="opacity: 0.10;" ></div>
    <div class="hero-overlay hidden-md hidden-lg"></div>
    <div class="hero-content" style="padding: 0;">

      @if(session()->has('message'))
        <div class="row">
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Message:</strong>{{session()->get('message')}}
          </div>
        </div>
      @endif
      <div id="hero">
        <div class="row">
          <div class="col-md-12">
		   <img  alt="First slide" src="{{asset('frontend-assets/images/slide1.jpg')}}" style="width: 100%; height: 100%;">
		        <p class="get-started"><a href="#" class="cta-button btn btn-green btn-shadowless btn-lg get-started-btn">
            Get started
            </a></p>
          </div>
        </div>


      </div>
    </div>

  </section>
    <section id="services" class="dark">
      <div class="container">

        <div class="row ">
          <div class="col-xs-12 text-center">
            <h3 class="promoted">Receive up to 3 quotes from our Experts</h3>
          </div>
        </div>

        <div class="row">

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Audit" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Audit</h4>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-calculator" class="mdi iconify mdi-calculator mdi-48px"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Bookkeeping" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Bookkeeping</h4>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-book-multiple" class="mdi iconify mdi-book-multiple mdi-48px"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">

              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Accountant" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Accounting</h4>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-account-edit" class="mdi iconify mdi-account-edit mdi-48px"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">

              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Tax" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Tax</h4>
                  </a>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-account-edit" class="iconify fa fa-money mdi-48px"></i>
                </div>
              </div>

            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Payroll" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Payroll</h4>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-calculator" class="iconify fa fa-usd mdi-48px"></i>
                </div>
              </div>

            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Incorporation" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Incorporation</h4>
                  </a>
                </div>
              </div>

              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-book-multiple" class="iconify fa fa-connectdevelop mdi-48px"></i>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-3 col-sm-6">
            <div class="card card-condensed service-card">
              <div class="row">
                <div class="col-xs-12 text-center">
                  <a data-target="#getModal" data-id="Secretarial" data-toggle="modal"  class="cursor-pointer open-modal" style="text-decoration: none;">
                    <h4 class="promoted">Secretarial service</h4>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 text-center">
                  <i data-icon="mdi-account-edit" class="iconify fa fa-info-circle mdi-48px"></i>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted" class="text-20px" style="margin-top: 40px;">Mix your own service pack</h3>
              <p class="text-20px">
                Looking to build on your brand and not someone else’s? Need a customised combination of services or something not listed here? Our advisory team can help create the perfect tailored solution.

            </p>
          </div>
        </div>
      </div>
    </section>

    <section id="transparency" class="light">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted"><b>How it works</b></h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 text-left">
            <i data-icon="mdi-eye" class="mdi iconify mdi-48px text-green"></i>
            <p class="text-center">In 3 easy steps, you will be matched with a perfect Expert- accountant, bookkeeper or tax advisor</p>
            <div class="row">
              <div class="col-md-4 text-center">
                <h4><b>Tell us what you are looking for</b></h4>
                <p><i class="fa fa-check text-green"></i>
                Summarise what you are looking for in our online form</p>
              </div>
              <div class="col-md-4 text-center">
                <h4><b>Receive 3 proposals</b></h4>
                <p><i class="fa fa-check text-green"></i>
                You will receive upto 3 customised proposals from Experts within 2 working days</p>
              </div>
              <div class="col-md-4 text-center">
                <h4><b>Select your perfect expert</b></h4>
                <p><i class="fa fa-check text-green"></i> You select the Expert which matches your criteria.</p>
                <p><i class="fa fa-check text-green"></i> All this is absolutely free for you!</p>
              </div>
            </div>
            <div class="caption-img">
           <!--    <img src="{{asset('/frontend-assets/images/how_it_work.png')}}" width="100%"> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="how-it-works" class="inverse">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted">Our Latest Blogs</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div id="owl-carousel" class="owl-carousel owl-theme">
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <img src="https://goo.gl/TXsYn9" alt="">
                </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                   </p>
                  </div>
                  <img src="https://goo.gl/5ADFEH" alt="">
                </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                  <img src="https://goo.gl/Y78H36" alt="">
                </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                   </p>
                 </div>
                 <img src="https://goo.gl/AcCvCK" alt="">
               </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                   </p>
                  </div>
                  <img src="https://goo.gl/FioWab" alt="">
                </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                     "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <img src="https://goo.gl/hpPnqU" alt="">
                </div>
              </div>
              <div class="item">
                <div class="img_wrp">
                  <div class="img_text">
                    <h5>What is Lorem Ipsum?</h5>
                    <p>
                      "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                  </div>
                  <img src="https://goo.gl/FioWab" alt="">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->



    <!-- <section id="transparency" class="dark">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted">Experts</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-4 text-center">
            <i data-icon="mdi-eye" class="mdi iconify mdi-48px text-green"></i>
            <h4>Expert 1</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-4 text-center">
            <i data-icon="mdi-seal" class="mdi iconify mdi-48px text-green"></i>
            <h4>Expert 2</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-md-4 text-center">
            <i data-icon="mdi-comment-account-outline" class="mdi iconify  mdi-48px text-green"></i>
            <h4>Expert 3</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12 text-center">
              <a href="" class="btn cta-button btn-lg">View all Experts</a>
          </div>
        </div>
      </div>
    </section> -->
    <section id="contact" class="inverse hidden-xs">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted">Contact us</h3>
          </div>
        </div>

        <div class="row">
          <div class="col-md-10 col-md-offset-1 col-sm-8 col-sm-offset-2 conatct-cols">
            <div class="row">
              <div class="col-md-4 text-center">
                <i data-icon="mdi-email" class="mdi iconify mdi-email mdi-48px"></i>
                <p>
                  E-mail<br />
                  <br />

                </p>
                <p>
                  <a href="{{url('/contact-us')}}" target="_blank" class="btn btn-link btn-lg btn-block btn-shadowless">Go to contact page</a>
                </p>
              </div>
              <div class="col-md-4 text-center">
                <i data-icon="mdi-phone" class="mdi iconify mdi-phone mdi-48px"></i>
                <p>
                  Call<br />
                  <br />

                </p>
                <p>
                  <a href="tel:0203 983 8100" class="btn btn-link btn-lg btn-block btn-shadowless">0203 983 8100</a>
                </p>
              </div>
              <div class="col-md-4 text-center">
                <i data-icon="mdi-message-text" class="mdi iconify mdi-message-text mdi-48px"></i>
                <p>
                  Chat<br />
                  <br />

                </p>
                <p>
                  <a onclick="_dixa('api.setView', 'conversation');" class="btn btn-link btn-lg btn-block btn-shadowless">Start chat</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="light">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted">Why Experlu?</h3>
            <p></p>
          </div>

        </div>

        <div class="row">
          <div class="col-md-4 text-center">
            <div class="icon_holder pull-left" style=" transition-delay: 100ms; -webkit-transition-delay: 100ms; -moz-transition-delay: 100ms; -o-transition-delay: 100ms;"><!-- <span data-icon-type="circle" class="icon-circle fa-stack fa-lg  " style="font-size: 24px;border-color: #072f44;background-color: #072f44;"><i class="qode_icon_font_awesome fa fa-check-circle qode_iwt_icon_element" style="color: #ffffff;"></i></span> -->
              <img src="{{asset('frontend-assets/images/easy.png')}}" width="45px">
            </div>
            <h4>Extraordinarily easy</h4>
            <p>Our match making process makes it spectacularly simple to find your perfect accountant, tax advisor or bookkeeper. From finding a perfect match till onboarding and filing your tax returns, our expert advisors are here to help.</p>
          </div>
          <div class="col-md-4 text-center">
            <div class="icon_holder pull-left" style=" transition-delay: 200ms; -webkit-transition-delay: 200ms; -moz-transition-delay: 200ms; -o-transition-delay: 200ms;"><!-- <span data-icon-type="circle" class="icon-circle  fa-stack fa-lg  " style="font-size: 24px;border-color: #072f44;background-color: #072f44;"><i class="qode_icon_font_awesome fa fa-flag qode_iwt_icon_element" style="color: #ffffff;"></i></span> -->
              <img src="{{asset('frontend-assets/images/truly.png')}}" width="45px">
            </div>
            <h4>Truly transparent</h4>
            <p>Decades of finance experience. We hand pick our Experts from across the country and thoroughly verify them- including their practice certificates, indemnity insurances and professional memberships. So, you can trust that your match is genuinely an EXPERT!</p>
          </div>
          <div class="col-md-4 text-center">
            <div class="icon_holder pull-left" style=" transition-delay: 200ms; -webkit-transition-delay: 200ms; -moz-transition-delay: 200ms; -o-transition-delay: 200ms;"><!-- <span data-icon-type="circle" class="icon-circle fa-stack fa-lg  " style="font-size: 24px;border-color: #072f44;background-color: #072f44;"><i class="qode_icon_font_awesome fa fa-clock-o qode_iwt_icon_element" style="color: #ffffff;"></i></span> -->
              <img src="{{asset('frontend-assets/images/free.png')}}" width="45px">
            </div>
            <h4>Fantastically free</h4>
            <p>Experlu won’t cost you a penny because we get paid by the Expert. Our Experts will save you around 15% of the average fee for similar services. What are you waiting for?</p>
          </div>
        </div>
      </div>
    </section>

    <!-- <section id="reviews" class="dark hidden-xs">
      <div class="container">

        <div class="row">
          <div class="col-xs-12 text-center">
            <h3 class="promoted" style="margin-bottom: 20px;">Latest reviews</h3>
            <p style="margin-bottom: 50px;">Customers rate their experience with financial service providers all across the United Kingdom</p>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
           <div class="carousel slide" data-ride="carousel" id="quote-carousel">


            <ol class="carousel-indicators">
              <li data-target="#quote-carousel" data-slide-to="0" class="active"></li>
              <li data-target="#quote-carousel" data-slide-to="1"></li>
              <li data-target="#quote-carousel" data-slide-to="2"></li>
            </ol>


            <div class="carousel-inner">


              <div class="item active">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="testimonial_content_inner">
                      <div class="testimonial_image_holder">
                        <img src="https://www.gfcadvice.com/wp-content/uploads/2018/11/merilyn.jpg" draggable="false">
                      </div>
                    </div>
                    <p>&ldquo;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sed diam eget risus varius blandit sit amet non magna. Etiam porta sem malesuada magna mollis euismod. Nulla vitae elit libero, a pharetra augue. Donec id elit non mi porta gravida at eget metus.&rdquo;</p>
                    <small><strong>Vulputate M., Dolor</strong></small>
                  </div>
                </div>
              </div>


              <div class="item">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="testimonial_content_inner">
                      <div class="testimonial_image_holder">
                        <img src="https://www.gfcadvice.com/wp-content/uploads/2014/01/bronti-big-150x150.jpg" draggable="false">
                      </div>
                    </div>
                    <p>&ldquo;Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Aenean lacinia bibendum nulla sed consectetur. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.&rdquo;</p>
                    <small><strong>Fringilla A., Vulputate Sit</strong></small>
                  </div>
                </div>
              </div>


              <div class="item">
                <div class="row">
                  <div class="col-sm-12">
                    <div class="testimonial_content_inner">
                      <div class="testimonial_image_holder">
                        <img src="https://www.gfcadvice.com/wp-content/uploads/2018/11/Zulkifli-Bin-Jabal-150x150.jpg" draggable="false">
                      </div>
                    </div>
                    <p>&ldquo;Aenean lacinia bibendum nulla sed consectetur. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Maecenas faucibus mollis interdum. Cras mattis consectetur purus sit amet fermentum.&rdquo;</p>
                    <small><strong>Aenean A., Justo Cras</strong></small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
        </div>

    </div>>
</section> -->

<!-- Match modal -->
<div class="modal fade" id="match" tabindex="-1" role="dialog" aria-labelledby="match-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="promoted modal-title" id="match-label">&nbsp;</h4>
        </div>
        @if(count($errors))
        <script>
        $( document ).ready(function() {
          $('#match').modal('show');

        });

        </script>
        <div class="form-group">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
        @if(session()->has('message'))
        <script>
        $( document ).ready(function() {
          $('#match').modal('show');

        });

        </script>
        <div class="form-group">
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Message:</strong>{{session()->get('message')}}
          </div>
        </div>
        @endif


        <div class="modal-body">

          <div class="step-progress" style="margin-bottom: 40px;">
            <div class="row">

              <div class="col-xs-3 text-center step-progress-1">
                <i class="desktop mdi mdi-pencil-circle mdi-48px hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-1-box mdi-48px visible-xs"></i>
                <div class="hidden-xs">Choose service</div>
              </div>
              <div class="col-xs-3 text-center step-progress-2">
                <i class="desktop mdi mdi-checkbox-blank-circle-outline mdi-48px text-muted hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-2-box mdi-48px text-muted visible-xs"></i>
                <div class="hidden-xs text-muted">Describe your job</div>
              </div>
              <div class="col-xs-3 text-center step-progress-3">
                <i class="desktop mdi mdi-checkbox-blank-circle-outline mdi-48px text-muted hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-3-box mdi-48px text-muted visible-xs"></i>
                <div class="hidden-xs text-muted">Contact information</div>
              </div>
            </div>
          </div>

          <form action="{{ url('/customer/jobpost') }}" method="post">
            {{ csrf_field() }}

            <div class="step-1" data-headline="Choose service">
              <ul class="nav nav-pills nav-stacked">
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="account">
                    <lable  for="Accountant"><i class="mdi mdi-calculator mdi-24px mdi-margin-right"></i> Accountant</lable>
                    <input type="radio" name="services" value="Accountant" id="Accountant" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="book">
                    <i class="mdi mdi-book-multiple mdi-24px mdi-margin-right"></i><lable for="Bookkeeper"> Bookkeeper</lable>
                    <input type="radio" name="services" value="Bookkeeping" id="Bookkeeper" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="tax">
                    <i class="mdi mdi-account-edit mdi-24px mdi-margin-right"></i><lable for="Tax"> Tax</lable>
                    <input type="radio" name="services" value="Tax" id="Tax" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="audit">
                    <i class="mdi mdi-calculator mdi-24px mdi-margin-right"></i><lable for="Audit"> Audit</lable>
                    <input type="radio" name="services" value="Audit" id="Audit" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="payroll">
                    <i class="mdi mdi-account-edit mdi-24px mdi-margin-right"></i><lable for="Payroll"> Payroll</lable>
                    <input type="radio" name="services" value="Payroll" id="Payroll" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="incorporation">
                    <i class="mdi mdi-book-multiple mdi-24px mdi-margin-right"></i><lable for="Incorporation"> Incorporation</lable>
                    <input type="radio" name="services" value="Incorporation" id="Incorporation" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="secretarial_service">
                    <i class="mdi mdi-account-edit mdi-24px mdi-margin-right"></i><lable for="Secretarial_service"> Secretarial service</lable>
                    <input type="radio" name="services" value="Secretarial" id="Secretarial_service" style="display:none">
                  </a>
                </li>
                <li role="presentation">
                  <a href="#" data-industry="accounting" id="service_pack">
                    <i class="mdi mdi-calculator mdi-24px mdi-margin-right"></i><lable for="Service_pack"> Mix your own service pack</lable>
                    <input type="radio" name="services" value="Mix your own service pack" id="Service_pack" style="display:none">
                  </a>
                </li>
              </ul>
            </div>

            <div class="step-2" data-headline="Describe your case">
              <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title" placeholder="Job Title" value="{{ old('job_title') }}" >
              </div>
              <div class="form-group">
                <label>Job Type</label>
                <select class="form-control" name="job_type" >
                  <option>Select Type</option>
                  <option @if( old('job_type') =="individual" )selected="selected"  @endif  value="individual">Indivdual</option>
                  <option @if( old('job_type') =="company" )selected="selected"  @endif  value="company">Company</option>
                </select>
              </div>
              <div class="form-group">
                <label>Year End</label>
                <input type="date" name="ended_year" value="{{ old('ended_year') }}" class="form-control" >
              </div>
              <div class="form-group">
                <label>Job Description</label>
                <textarea class="form-control" id="input-description" name="job_case"  placeholder="Describe your case" style="height: 6em;" > {{ old('job_case') }}</textarea>
              </div>
              <div class="form-group hidden-md hidden-lg">
                <button class="btn btn-default btn-block proceed-button"  data-content="Proceed to the last step" data-no-content="Skip this step">
                  <span>Next</span>
                  <i class="mdi mdi-chevron-double-right"></i>
                </button>
              </div>
              <div class="form-group hidden-xs hidden-sm">
                <button type="button" class="btn btn-default btn-block proceed-button" data-content="Proceed to the last step" data-no-content="Skip this step">
                  <span>Next</span>
                  <i class="mdi mdi-chevron-double-right"></i>
                </button>
              </div>
              <p class="text-muted">A brief description is enough, we will review this in detail and may call you before matching you with your Experts.</p>
            </div>

            <div class="step-3" data-headline="Contact information">
              <div class="form-group">
                <label class="control-label" for="input-name">Name</label>
                <input  type="text" class="form-control" name="customer_name" id="input-name" value="{{ old('customer_name') }}" placeholder="Enter name" data-error="Please enter your name" />
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-email" >E-mail</label>
                <input required type="email" class="form-control" name="job_email" id="input-email" placeholder="Enter e-mail" value="{{ old('job_email') }}" data-error="Please enter a valid e-mail address" />
                <span class="help-block"></span>
              </div>
              <div class="form-group" style="display:table">
                <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                  <select name="mobile_code" id="input" class="phone-nmbr" style="width:139px">
                    <option value="44">United Kingdom (+44)</option>
                    <option value="93">Afghanistan (+93)</option>
                    <option value="355">Albania (+355)</option>
                    <option value="213">Algeria (+213)</option>
                    <option value="1684">American Samoa (+1684)</option>
                    <option value="376">Andorra (+376)</option>
                    <option value="244">Angola (+244)</option>
                    <option value="1264">Anguilla (+1264)</option>
                    <option value="672">Antarctica (+672)</option>
                    <option value="1268">Antigua and Barbuda (+1268)</option>
                    <option value="54">Argentina (+54)</option>
                    <option value="374">Armenia (+374)</option>
                    <option value="297">Aruba (+297)</option>
                    <option value="61">Australia (+61)</option>
                    <option value="43">Austria (+43)</option>
                    <option value="994">Azerbaijan (+994)</option>
                    <option value="1242">Bahamas (+1242)</option>
                    <option value="973">Bahrain (+973)</option>
                    <option value="880">Bangladesh (+880)</option>
                    <option value="1246">Barbados (+1246)</option>
                    <option value="375">Belarus (+375)</option>
                    <option value="32">Belgium (+32)</option>
                    <option value="501">Belize (+501)</option>
                    <option value="229">Benin (+229)</option>
                    <option value="1441">Bermuda (+1441)</option>
                    <option value="975">Bhutan (+975)</option>
                    <option value="591">Bolivia (+591)</option>
                    <option value="387">Bosnia and Herzegovina (+387)</option>
                    <option value="267">Botswana (+267)</option>
                    <option value="47">Bouvet Island (+47)</option>
                    <option value="55">Brazil (+55)</option>
                    <option value="246">British Indian Ocean Territories (+246)</option>
                    <option value="673">Brunei Darussalam (+673)</option>
                    <option value="359">Bulgaria (+359)</option>
                    <option value="226">Burkina Faso (+226)</option>
                    <option value="257">Burundi (+257)</option>
                    <option value="855">Cambodia (+855)</option>
                    <option value="237">Cameroon (+237)</option>
                    <option value="1">Canada (+1)</option>
                    <option value="238">Cape Verde (+238)</option>
                    <option value="1345">Cayman Islands (+1345)</option>
                    <option value="236">Central African Republic (+236)</option>
                    <option value="235">Chad (+235)</option>
                    <option value="56">Chile (+56)</option>
                    <option value="86">China, People's Republic of (+86)</option>
                    <option value="61">Christmas Island (+61)</option>
                    <option value="61">Cocos Islands (+61)</option>
                    <option value="57">Colombia (+57)</option>
                    <option value="269">Comoros (+269)</option>
                    <option value="243">Congo (+243)</option>
                    <option value="682">Cook Islands (+682)</option>
                    <option value="506">Costa Rica (+506)</option>
                    <option value="225">Cote D'ivoire (+225)</option>
                    <option value="385">Croatia (+385)</option>
                    <option value="53">Cuba (+53)</option>
                    <option value="357">Cyprus (+357)</option>
                    <option value="420">Czech Republic (+420)</option>
                    <option value="45">Denmark (+45)</option>
                    <option value="253">Djibouti (+253)</option>
                    <option value="1767">Dominica (+1767)</option>
                    <option value="1809">Dominican Republic (+1809)</option>
                    <option value="670">East Timor (+670)</option>
                    <option value="593">Ecuador (+593)</option>
                    <option value="20">Egypt (+20)</option>
                    <option value="503">El Salvador (+503)</option>
                    <option value="240">Equatorial Guinea (+240)</option>
                    <option value="291">Eritrea (+291)</option>
                    <option value="372">Estonia (+372)</option>
                    <option value="251">Ethiopia (+251)</option>
                    <option value="500">Falkland Islands (+500)</option>
                    <option value="298">Faroe Islands (+298)</option>
                    <option value="679">Fiji (+679)</option>
                    <option value="358">Finland (+358)</option>
                    <option value="33">France (+33)</option>
                    <option value="33">France, Metropolitan (+33)</option>
                    <option value="594">French Guiana (+594)</option>
                    <option value="689">French Polynesia (+689)</option>
                    <option value="33">French Southern Territories (+33)</option>
                    <option value="389">FYROM (+389)</option>
                    <option value="241">Gabon (+241)</option>
                    <option value="220">Gambia (+220)</option>
                    <option value="995">Georgia (+995)</option>
                    <option value="49">Germany (+49)</option>
                    <option value="233">Ghana (+233)</option>
                    <option value="350">Gibraltar (+350)</option>
                    <option value="30">Greece (+30)</option>
                    <option value="299">Greenland (+299)</option>
                    <option value="1473">Grenada (+1473)</option>
                    <option value="590">Guadeloupe (+590)</option>
                    <option value="1671">Guam (+1671)</option>
                    <option value="32">Guatemala (+502)</option>
                    <option value="224">Guinea (+224)</option>
                    <option value="245">Guinea-Bissau (+245)</option>
                    <option value="592">Guyana (+592)</option>
                    <option value="509">Haiti (+509)</option>
                    <option value="61">Heard Island And Mcdonald Islands (+61)</option>
                    <option value="504">Honduras (+504)</option>
                    <option value="852">Hong Kong (+852)</option>
                    <option value="36">Hungary (+36)</option>
                    <option value="354">Iceland (+354)</option>
                    <option value="91">India (+91)</option>
                    <option value="62">Indonesia (+62)</option>
                    <option value="98">Iran (+98)</option>
                    <option value="964">Iraq (+964)</option>
                    <option value="353">Ireland (+353)</option>
                    <option value="972">Israel (+972)</option>
                    <option value="39">Italy (+39)</option>
                    <option value="1876">Jamaica (+1876)</option>
                    <option value="81">Japan (+81)</option>
                    <option value="962">Jordan (+962)</option>
                    <option value="7">Kazakhstan (+7)</option>
                    <option value="254">Kenya (+254)</option>
                    <option value="686">Kiribati (+686)</option>
                    <option value="965">Kuwait (+965)</option>
                    <option value="996">Kyrgyzstan (+996)</option>
                    <option value="856">Lao Peoples Democratic Republic (+856)</option>
                    <option value="371">Latvia (+371)</option>
                    <option value="961">Lebanon (+961)</option>
                    <option value="266">Lesotho (+266)</option>
                    <option value="231">Liberia (+231)</option>
                    <option value="218">Libyan Arab Jamahiriya (+218)</option>
                    <option value="423">Liechtenstein (+423)</option>
                    <option value="423">Lithuania (+370)</option>
                    <option value="352">Luxembourg (+352)</option>
                    <option value="853">Macau (+853)</option>
                    <option value="261">Madagascar (+261)</option>
                    <option value="265">Malawi (+265)</option>
                    <option value="60">Malaysia (+60)</option>
                    <option value="960">Maldives (+960)</option>
                    <option value="223">Mali (+223)</option>
                    <option value="356">Malta (+356)</option>
                    <option value="692">Marshall Islands (+692)</option>
                    <option value="596">Martinique (+596)</option>
                    <option value="222">Mauritania (+222)</option>
                    <option value="230">Mauritius (+230)</option>
                    <option value="262">Mayotte (+262)</option>
                    <option value="52">Mexico (+52)</option>
                    <option value="691">Micronesia (+691)</option>
                    <option value="373">Moldova (+373)</option>
                    <option value="377">Monaco (+377)</option>
                    <option value="976">Mongolia (+976)</option>
                    <option value="1664">Montserrat (+1664)</option>
                    <option value="212">Morocco (+212)</option>
                    <option value="258">Mozambique (+258)</option>
                    <option value="95">Myanmar (+95)</option>
                    <option value="264">Namibia (+264)</option>
                    <option value="674">Nauru (+674)</option>
                    <option value="977">Nepal (+977)</option>
                    <option value="31">Netherlands (+31)</option>
                    <option value="599">Netherlands Antilles (+599)</option>
                    <option value="687">New Caledonia (+687)</option>
                    <option value="64">New Zealand (+64)</option>
                    <option value="505">Nicaragua (+505)</option>
                    <option value="227">Niger (+227)</option>
                    <option value="234">Nigeria (+234)</option>
                    <option value="683">Niue (+683)</option>
                    <option value="672">Norfolk Island (+672)</option>
                    <option value="1670">Northern Mariana Islands (+1670)</option>
                    <option value="47">Norway (+47)</option>
                    <option value="968">Oman (+968)</option>
                    <option value="92">Pakistan (+92)</option>
                    <option value="680">Palau (+680)</option>
                    <option value="507">Panama (+507)</option>
                    <option value="675">Papua New Guinea (+675)</option>
                    <option value="595">Paraguay (+595)</option>
                    <option value="51">Peru (+51)</option>
                    <option value="63">Philippines (+63)</option>
                    <option value="870">Pitcairn (+870)</option>
                    <option value="48">Poland (+48)</option>
                    <option value="351">Portugal (+351)</option>
                    <option value="1">Puerto Rico (+1)</option>
                    <option value="974">Qatar (+974)</option>
                    <option value="262">Reunion (+262)</option>
                    <option value="40">Romania (+40)</option>
                    <option value="7">Russian Federation (+7)</option>
                    <option value="250">Rwanda (+250)</option>
                    <option value="290">Saint Helena (+290)</option>
                    <option value="1869">Saint Kitts and Nevis (+1869)</option>
                    <option value="1758">Saint Lucia (+1758)</option>
                    <option value="508">Saint Pierre and Miquelon (+508)</option>
                    <option value="1784">Saint Vincent and The Grenadines (+1784)</option>
                    <option value="685">Samoa (+685)</option>
                    <option value="378">San Marino (+378)</option>
                    <option value="239">Sao Tome and Principe (+239)</option>
                    <option value="966">Saudi Arabia (+966)</option>
                    <option value="221">Senegal (+221)</option>
                    <option value="248">Seychelles (+248)</option>
                    <option value="232">Sierra Leone (+232)</option>
                    <option value="65">Singapore (+65)</option>
                    <option value="421">Slovakia (+421)</option>
                    <option value="386">Slovenia (+386)</option>
                    <option value="677">Solomon Islands (+677)</option>
                    <option value="252">Somalia (+252)</option>
                    <option value="27">South Africa (+27)</option>
                    <option value="500">South Georgia and Sandwich Islands (+500)</option>
                    <option value="82">South Korea (+82)</option>
                    <option value="34">Spain (+34)</option>
                    <option value="94">Sri Lanka (+94)</option>
                    <option value="249">Sudan (+249)</option>
                    <option value="597">Suriname (+597)</option>
                    <option value="47">Svalbard and Jan Mayen (+47)</option>
                    <option value="268">Swaziland (+268)</option>
                    <option value="46">Sweden (+46)</option>
                    <option value="41">Switzerland (+41)</option>
                    <option value="963">Syrian Arab Republic (+963)</option>
                    <option value="886">Taiwan (+886)</option>
                    <option value="992">Tajikistan (+992)</option>
                    <option value="255">Tanzania (+255)</option>
                    <option value="66">Thailand (+66)</option>
                    <option value="228">Togo (+228)</option>
                    <option value="690">Tokelau (+690)</option>
                    <option value="676">Tonga (+676)</option>
                    <option value="1868">Trinidad and Tobago (+1868)</option>
                    <option value="216">Tunisia (+216)</option>
                    <option value="90">Turkey (+90)</option>
                    <option value="993">Turkmenistan (+993)</option>
                    <option value="1649">Turks and Caicos Islands (+1649)</option>
                    <option value="688">Tuvalu (+688)</option>
                    <option value="256">Uganda (+256)</option>
                    <option value="380">Ukraine (+380)</option>
                    <option value="971">United Arab Emirates (+971)</option>
                    <option value="44">United Kingdom (+44)</option>
                    <option value="1">United States (+1)</option>
                    <option value="699">United States Minor Outlying Islands (+699)</option>
                    <option value="598">Uruguay (+598)</option>
                    <option value="998">Uzbekistan (+998)</option>
                    <option value="678">Vanuatu (+678)</option>
                    <option value="39">Vatican City State (+39)</option>
                    <option value="58">Venezuela (+58)</option>
                    <option value="84">Vietnam (+84)</option>
                    <option value="1284">Virgin Islands (British) (+1284)</option>
                    <option value="1340">Virgin Islands (U.S.) (+1340)</option>
                    <option value="681">Wallis And Futuna Islands (+681)</option>
                    <option value="212">Western Sahara (+212)</option>
                    <option value="967">Yemen (+967)</option>
                    <option value="381">Yugoslavia (+381)</option>
                    <option value="243">Zaire (+243)</option>
                    <option value="260">Zambia (+260)</option>
                    <option value="263">Zimbabwe (+263)</option>
                  </select>
                </span>
                <input type="number" class="form-control" name="mobilenumber" placeholder="" required="required">
              </div>
              <!-- <div class="form-group">
              <label class="control-label" for="input-phone">Phone number</label>
              <input type="text" class="form-control" name="mobilenumber" id="input-phone"  value="{{ old('mobilenumber') }}" placeholder="Enter phone number" data-error="Please enter your phone number" />
              <span class="help-block"></span>
            </div> -->
            <div class="form-group">
              <label class="control-label" for="input-city">City</label>
              <input type="text" class="form-control" name="city" value="{{old('city')}}" id="input-city" placeholder="Please enter your city" />
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <div class="form-group" style="margin-top: 20px;">
                <input required type="checkbox" id="input-email_optin" style="margin-right: 10px;" />
                <label class="control-label" for="input-email_optin">Experlu contact me via email</label>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn cta-button btn-lg btn-block submit-button" style="margin-top: 40px;">Get 3 proposals - free and non binding</button>
            </div>
            <p class="text-muted text-center">Read our <a target="_blank" rel="nofollow" href="{{url('/privacy-policy')}}" class="privacypolicy_link">privacy policy</a></p>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- Match Modal End -->


<!-- Get Modal Start -->
<div class="modal fade job_modal" id="getModal" tabindex="-1" role="dialog" aria-labelledby="match-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">


      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="promoted modal-title" id="match-label">&nbsp;</h4>
        </div>
        @if(count($errors))
        <script>
        $( document ).ready(function() {
          $('#match').modal('show');

        });

        </script>
        <div class="form-group">
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
        </div>
        @endif
        @if(session()->has('message'))
        <script>
        $( document ).ready(function() {
          $('#match').modal('show');

        });

        </script>
        <div class="form-group">
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>
            <strong>Message:</strong>{{session()->get('message')}}
          </div>
        </div>
        @endif


        <div class="modal-body">

          <div class="step-progress" style="margin-bottom: 40px;">
            <div class="row">
              <!-- <div class="col-xs-3 text-center step-progress-1">
                <i class="desktop mdi mdi-pencil-circle mdi-48px hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-1-box mdi-48px visible-xs"></i>
                <div class="hidden-xs">Choose service</div>
              </div> -->
              <div class="col-xs-3 text-center step-progress-2">
                <i class="desktop mdi mdi-checkbox-blank-circle-outline mdi-48px text-muted hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-2-box mdi-48px text-muted visible-xs"></i>
                <div class="hidden-xs text-muted">Describe your job</div>
              </div>
              <div class="col-xs-3 text-center step-progress-3">
                <i class="desktop mdi mdi-checkbox-blank-circle-outline mdi-48px text-muted hidden-xs"></i>
                <i class="mobile mdi mdi-numeric-3-box mdi-48px text-muted visible-xs"></i>
                <div class="hidden-xs text-muted">Contact information</div>
              </div>
            </div>
          </div>

          <form action="{{ url('/customer/jobpost') }}" method="post">
            {{ csrf_field() }}

            <input type="hidden" name="services" id="serviceid" value=""/>

            <div class="step-2" data-headline="Describe your case">
              <div class="form-group">
                <label>Job Title</label>
                <input type="text" class="form-control" name="job_title" placeholder="Job Title" value="{{ old('job_title') }}" >
              </div>
              <div class="form-group">
                <label>Job Type</label>
                <select class="form-control" name="job_type" >
                  <option>Select Type</option>
                  <option @if( old('job_type') =="individual" )selected="selected"  @endif  value="individual">Indivdual</option>
                  <option @if( old('job_type') =="company" )selected="selected"  @endif  value="company">Company</option>
                </select>
              </div>
              <div class="form-group">
                <label>Year End</label>
                <input type="date" name="ended_year" value="{{ old('ended_year') }}" class="form-control" >
              </div>
              <div class="form-group">
                <label>Job Description</label>
                <textarea class="form-control" id="input-description" name="job_case"  placeholder="Describe your case" style="height: 6em;" > {{ old('job_case') }}</textarea>
              </div>
              <div class="form-group hidden-md hidden-lg">
                <button class="btn btn-default btn-block proceed-button"  data-content="Proceed to the last step" data-no-content="Skip this step">
                  <span>Next</span>
                  <i class="mdi mdi-chevron-double-right"></i>
                </button>
              </div>
              <div class="form-group hidden-xs hidden-sm">
                <button type="button" class="btn btn-default btn-block proceed-button proceed-button2" data-content="Proceed to the last step" data-no-content="Skip this step">
                  <span>Next</span>
                  <i class="mdi mdi-chevron-double-right"></i>
                </button>
              </div>
              <p class="text-muted">A brief description is enough, we will review this in detail and may call you before matching you with your Experts.</p>
            </div>

            <div class="step-3" data-headline="Contact information" id="contact_section" style="display:none;">
              <div class="form-group">
                <label class="control-label" for="input-name">Name</label>
                <input  type="text" class="form-control" name="customer_name" id="input-name" value="{{ old('customer_name') }}" placeholder="Enter name" data-error="Please enter your name" />
                <span class="help-block"></span>
              </div>
              <div class="form-group">
                <label class="control-label" for="input-email" >E-mail</label>
                <input required type="email" class="form-control" name="job_email" id="input-email" placeholder="Enter e-mail" value="{{ old('job_email') }}" data-error="Please enter a valid e-mail address" />
                <span class="help-block"></span>
              </div>
              <div class="form-group" style="display:table">
                <span class="input-group-addon" id="basic-addon1" style="padding: 0px 3px !important;">
                  <select name="mobile_code" id="input" class="phone-nmbr" style="width:139px">
                    <option value="44">United Kingdom (+44)</option>
                    <option value="93">Afghanistan (+93)</option>
                    <option value="355">Albania (+355)</option>
                    <option value="213">Algeria (+213)</option>
                    <option value="1684">American Samoa (+1684)</option>
                    <option value="376">Andorra (+376)</option>
                    <option value="244">Angola (+244)</option>
                    <option value="1264">Anguilla (+1264)</option>
                    <option value="672">Antarctica (+672)</option>
                    <option value="1268">Antigua and Barbuda (+1268)</option>
                    <option value="54">Argentina (+54)</option>
                    <option value="374">Armenia (+374)</option>
                    <option value="297">Aruba (+297)</option>
                    <option value="61">Australia (+61)</option>
                    <option value="43">Austria (+43)</option>
                    <option value="994">Azerbaijan (+994)</option>
                    <option value="1242">Bahamas (+1242)</option>
                    <option value="973">Bahrain (+973)</option>
                    <option value="880">Bangladesh (+880)</option>
                    <option value="1246">Barbados (+1246)</option>
                    <option value="375">Belarus (+375)</option>
                    <option value="32">Belgium (+32)</option>
                    <option value="501">Belize (+501)</option>
                    <option value="229">Benin (+229)</option>
                    <option value="1441">Bermuda (+1441)</option>
                    <option value="975">Bhutan (+975)</option>
                    <option value="591">Bolivia (+591)</option>
                    <option value="387">Bosnia and Herzegovina (+387)</option>
                    <option value="267">Botswana (+267)</option>
                    <option value="47">Bouvet Island (+47)</option>
                    <option value="55">Brazil (+55)</option>
                    <option value="246">British Indian Ocean Territories (+246)</option>
                    <option value="673">Brunei Darussalam (+673)</option>
                    <option value="359">Bulgaria (+359)</option>
                    <option value="226">Burkina Faso (+226)</option>
                    <option value="257">Burundi (+257)</option>
                    <option value="855">Cambodia (+855)</option>
                    <option value="237">Cameroon (+237)</option>
                    <option value="1">Canada (+1)</option>
                    <option value="238">Cape Verde (+238)</option>
                    <option value="1345">Cayman Islands (+1345)</option>
                    <option value="236">Central African Republic (+236)</option>
                    <option value="235">Chad (+235)</option>
                    <option value="56">Chile (+56)</option>
                    <option value="86">China, People's Republic of (+86)</option>
                    <option value="61">Christmas Island (+61)</option>
                    <option value="61">Cocos Islands (+61)</option>
                    <option value="57">Colombia (+57)</option>
                    <option value="269">Comoros (+269)</option>
                    <option value="243">Congo (+243)</option>
                    <option value="682">Cook Islands (+682)</option>
                    <option value="506">Costa Rica (+506)</option>
                    <option value="225">Cote D'ivoire (+225)</option>
                    <option value="385">Croatia (+385)</option>
                    <option value="53">Cuba (+53)</option>
                    <option value="357">Cyprus (+357)</option>
                    <option value="420">Czech Republic (+420)</option>
                    <option value="45">Denmark (+45)</option>
                    <option value="253">Djibouti (+253)</option>
                    <option value="1767">Dominica (+1767)</option>
                    <option value="1809">Dominican Republic (+1809)</option>
                    <option value="670">East Timor (+670)</option>
                    <option value="593">Ecuador (+593)</option>
                    <option value="20">Egypt (+20)</option>
                    <option value="503">El Salvador (+503)</option>
                    <option value="240">Equatorial Guinea (+240)</option>
                    <option value="291">Eritrea (+291)</option>
                    <option value="372">Estonia (+372)</option>
                    <option value="251">Ethiopia (+251)</option>
                    <option value="500">Falkland Islands (+500)</option>
                    <option value="298">Faroe Islands (+298)</option>
                    <option value="679">Fiji (+679)</option>
                    <option value="358">Finland (+358)</option>
                    <option value="33">France (+33)</option>
                    <option value="33">France, Metropolitan (+33)</option>
                    <option value="594">French Guiana (+594)</option>
                    <option value="689">French Polynesia (+689)</option>
                    <option value="33">French Southern Territories (+33)</option>
                    <option value="389">FYROM (+389)</option>
                    <option value="241">Gabon (+241)</option>
                    <option value="220">Gambia (+220)</option>
                    <option value="995">Georgia (+995)</option>
                    <option value="49">Germany (+49)</option>
                    <option value="233">Ghana (+233)</option>
                    <option value="350">Gibraltar (+350)</option>
                    <option value="30">Greece (+30)</option>
                    <option value="299">Greenland (+299)</option>
                    <option value="1473">Grenada (+1473)</option>
                    <option value="590">Guadeloupe (+590)</option>
                    <option value="1671">Guam (+1671)</option>
                    <option value="32">Guatemala (+502)</option>
                    <option value="224">Guinea (+224)</option>
                    <option value="245">Guinea-Bissau (+245)</option>
                    <option value="592">Guyana (+592)</option>
                    <option value="509">Haiti (+509)</option>
                    <option value="61">Heard Island And Mcdonald Islands (+61)</option>
                    <option value="504">Honduras (+504)</option>
                    <option value="852">Hong Kong (+852)</option>
                    <option value="36">Hungary (+36)</option>
                    <option value="354">Iceland (+354)</option>
                    <option value="91">India (+91)</option>
                    <option value="62">Indonesia (+62)</option>
                    <option value="98">Iran (+98)</option>
                    <option value="964">Iraq (+964)</option>
                    <option value="353">Ireland (+353)</option>
                    <option value="972">Israel (+972)</option>
                    <option value="39">Italy (+39)</option>
                    <option value="1876">Jamaica (+1876)</option>
                    <option value="81">Japan (+81)</option>
                    <option value="962">Jordan (+962)</option>
                    <option value="7">Kazakhstan (+7)</option>
                    <option value="254">Kenya (+254)</option>
                    <option value="686">Kiribati (+686)</option>
                    <option value="965">Kuwait (+965)</option>
                    <option value="996">Kyrgyzstan (+996)</option>
                    <option value="856">Lao Peoples Democratic Republic (+856)</option>
                    <option value="371">Latvia (+371)</option>
                    <option value="961">Lebanon (+961)</option>
                    <option value="266">Lesotho (+266)</option>
                    <option value="231">Liberia (+231)</option>
                    <option value="218">Libyan Arab Jamahiriya (+218)</option>
                    <option value="423">Liechtenstein (+423)</option>
                    <option value="423">Lithuania (+370)</option>
                    <option value="352">Luxembourg (+352)</option>
                    <option value="853">Macau (+853)</option>
                    <option value="261">Madagascar (+261)</option>
                    <option value="265">Malawi (+265)</option>
                    <option value="60">Malaysia (+60)</option>
                    <option value="960">Maldives (+960)</option>
                    <option value="223">Mali (+223)</option>
                    <option value="356">Malta (+356)</option>
                    <option value="692">Marshall Islands (+692)</option>
                    <option value="596">Martinique (+596)</option>
                    <option value="222">Mauritania (+222)</option>
                    <option value="230">Mauritius (+230)</option>
                    <option value="262">Mayotte (+262)</option>
                    <option value="52">Mexico (+52)</option>
                    <option value="691">Micronesia (+691)</option>
                    <option value="373">Moldova (+373)</option>
                    <option value="377">Monaco (+377)</option>
                    <option value="976">Mongolia (+976)</option>
                    <option value="1664">Montserrat (+1664)</option>
                    <option value="212">Morocco (+212)</option>
                    <option value="258">Mozambique (+258)</option>
                    <option value="95">Myanmar (+95)</option>
                    <option value="264">Namibia (+264)</option>
                    <option value="674">Nauru (+674)</option>
                    <option value="977">Nepal (+977)</option>
                    <option value="31">Netherlands (+31)</option>
                    <option value="599">Netherlands Antilles (+599)</option>
                    <option value="687">New Caledonia (+687)</option>
                    <option value="64">New Zealand (+64)</option>
                    <option value="505">Nicaragua (+505)</option>
                    <option value="227">Niger (+227)</option>
                    <option value="234">Nigeria (+234)</option>
                    <option value="683">Niue (+683)</option>
                    <option value="672">Norfolk Island (+672)</option>
                    <option value="1670">Northern Mariana Islands (+1670)</option>
                    <option value="47">Norway (+47)</option>
                    <option value="968">Oman (+968)</option>
                    <option value="92">Pakistan (+92)</option>
                    <option value="680">Palau (+680)</option>
                    <option value="507">Panama (+507)</option>
                    <option value="675">Papua New Guinea (+675)</option>
                    <option value="595">Paraguay (+595)</option>
                    <option value="51">Peru (+51)</option>
                    <option value="63">Philippines (+63)</option>
                    <option value="870">Pitcairn (+870)</option>
                    <option value="48">Poland (+48)</option>
                    <option value="351">Portugal (+351)</option>
                    <option value="1">Puerto Rico (+1)</option>
                    <option value="974">Qatar (+974)</option>
                    <option value="262">Reunion (+262)</option>
                    <option value="40">Romania (+40)</option>
                    <option value="7">Russian Federation (+7)</option>
                    <option value="250">Rwanda (+250)</option>
                    <option value="290">Saint Helena (+290)</option>
                    <option value="1869">Saint Kitts and Nevis (+1869)</option>
                    <option value="1758">Saint Lucia (+1758)</option>
                    <option value="508">Saint Pierre and Miquelon (+508)</option>
                    <option value="1784">Saint Vincent and The Grenadines (+1784)</option>
                    <option value="685">Samoa (+685)</option>
                    <option value="378">San Marino (+378)</option>
                    <option value="239">Sao Tome and Principe (+239)</option>
                    <option value="966">Saudi Arabia (+966)</option>
                    <option value="221">Senegal (+221)</option>
                    <option value="248">Seychelles (+248)</option>
                    <option value="232">Sierra Leone (+232)</option>
                    <option value="65">Singapore (+65)</option>
                    <option value="421">Slovakia (+421)</option>
                    <option value="386">Slovenia (+386)</option>
                    <option value="677">Solomon Islands (+677)</option>
                    <option value="252">Somalia (+252)</option>
                    <option value="27">South Africa (+27)</option>
                    <option value="500">South Georgia and Sandwich Islands (+500)</option>
                    <option value="82">South Korea (+82)</option>
                    <option value="34">Spain (+34)</option>
                    <option value="94">Sri Lanka (+94)</option>
                    <option value="249">Sudan (+249)</option>
                    <option value="597">Suriname (+597)</option>
                    <option value="47">Svalbard and Jan Mayen (+47)</option>
                    <option value="268">Swaziland (+268)</option>
                    <option value="46">Sweden (+46)</option>
                    <option value="41">Switzerland (+41)</option>
                    <option value="963">Syrian Arab Republic (+963)</option>
                    <option value="886">Taiwan (+886)</option>
                    <option value="992">Tajikistan (+992)</option>
                    <option value="255">Tanzania (+255)</option>
                    <option value="66">Thailand (+66)</option>
                    <option value="228">Togo (+228)</option>
                    <option value="690">Tokelau (+690)</option>
                    <option value="676">Tonga (+676)</option>
                    <option value="1868">Trinidad and Tobago (+1868)</option>
                    <option value="216">Tunisia (+216)</option>
                    <option value="90">Turkey (+90)</option>
                    <option value="993">Turkmenistan (+993)</option>
                    <option value="1649">Turks and Caicos Islands (+1649)</option>
                    <option value="688">Tuvalu (+688)</option>
                    <option value="256">Uganda (+256)</option>
                    <option value="380">Ukraine (+380)</option>
                    <option value="971">United Arab Emirates (+971)</option>
                    <option value="44">United Kingdom (+44)</option>
                    <option value="1">United States (+1)</option>
                    <option value="699">United States Minor Outlying Islands (+699)</option>
                    <option value="598">Uruguay (+598)</option>
                    <option value="998">Uzbekistan (+998)</option>
                    <option value="678">Vanuatu (+678)</option>
                    <option value="39">Vatican City State (+39)</option>
                    <option value="58">Venezuela (+58)</option>
                    <option value="84">Vietnam (+84)</option>
                    <option value="1284">Virgin Islands (British) (+1284)</option>
                    <option value="1340">Virgin Islands (U.S.) (+1340)</option>
                    <option value="681">Wallis And Futuna Islands (+681)</option>
                    <option value="212">Western Sahara (+212)</option>
                    <option value="967">Yemen (+967)</option>
                    <option value="381">Yugoslavia (+381)</option>
                    <option value="243">Zaire (+243)</option>
                    <option value="260">Zambia (+260)</option>
                    <option value="263">Zimbabwe (+263)</option>
                  </select>
                </span>
                <input type="number" class="form-control" name="mobilenumber" placeholder="" required="required">
              </div>
              <!-- <div class="form-group">
              <label class="control-label" for="input-phone">Phone number</label>
              <input type="text" class="form-control" name="mobilenumber" id="input-phone"  value="{{ old('mobilenumber') }}" placeholder="Enter phone number" data-error="Please enter your phone number" />
              <span class="help-block"></span>
            </div> -->
            <div class="form-group">
              <label class="control-label" for="input-city">City</label>
              <input type="text" class="form-control" name="city" value="{{old('city')}}" id="input-city" placeholder="Please enter your city" />
              <span class="help-block"></span>
            </div>
            <div class="form-group">
              <div class="form-group" style="margin-top: 20px;">
                <input required type="checkbox" id="input-email_optin" style="margin-right: 10px;" />
                <label class="control-label" for="input-email_optin">Experlu contact me via email</label>
                <span class="help-block"></span>
              </div>
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn cta-button btn-lg btn-block submit-button" style="margin-top: 40px;">Get 3 proposals - free and non binding</button>
            </div>
            <p class="text-muted text-center">Read our <a target="_blank" rel="nofollow" href="{{url('/privacy-policy')}}" class="privacypolicy_link">privacy policy</a></p>
          </div>
        </form>
      </div>
    </div>

  </div>
</div>
<!-- Get Modal End -->

<script>
console.log('sadasdasdddddddddddd');
$('#account').click(function(){
      $('#Accountant').prop("checked", true);
    });

   $('#book').click(function(){
          $('#Bookkeeper').prop("checked", true);
   });

   $('#tax').click(function(){
          $('#Tax').prop("checked", true);
   });

   $('#audit').click(function(){

          $('#Audit').prop("checked", true);
   });

   $('#payroll').click(function(){
          $('#Payroll').prop("checked", true);
   });

   $('#incorporation').click(function(){
          $('#Incorporation').prop("checked", true);
   });

   $('#secretarial_service').click(function(){
          $('#Secretarial_service').prop("checked", true);
   });

   $('#service_pack').click(function(){
          $('#Service_pack').prop("checked", true);
   });

   $(document).on("click", ".open-modal", function () {
      var serviceid = $(this).data('id');
      $(".job_modal #serviceid").val( serviceid );
      // As pointed out in comments,
      // it is unnecessary to have to manually call the modal.
      // $('#addBookDialog').modal('show');
 });
 $('.proceed-button2').on('click',function () {
   $('#contact_section').show();
 });
</script>
@endsection

<?php 
  $route = Request::route()->uri();

 ?>
<footer>
  @if($route != 'partner/partner_dashboard')
  <section class="inverse condensed primary-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
              <h4 class="promoted">The Company</h4>
              <ul>
                <li>
                  <a title="" href="#"></a>
                </li>
                <li>
                  <a title="Terms of Service" href="{{url('/terms-and-conditions')}}"
                    rel="nofollow"
                  >Terms of Service</a>
                </li>
                <li>
                  <a title="Privacy Policy" href="{{url('/privacy-policy')}}"
                  rel="nofollow">Privacy Policy</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
              <h4 class="promoted">Experts</h4>
              <ul>
                <li>
                  <a title="" href="#"
                  ></a>
                </li>
                <li>
                  <a title="Become a Partner" href="{{url('/partner_register')}}"
                  >Join as an Expert</a>
                </li>
              </ul>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
              <h4 class="promoted">About Us</h4>
              <p>
                <br />
                <a href="tel:0203 983 8100" style="color: white;">0203 983 8100</a><br /><br>
                <a href="mailto:hello@experlu.com" style="color: white;">hello@experlu.com </a><br />
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endif
  <section class="inverse condensed secondary-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <ul>
            <li class="hidden-xs hidden-sm">
              Copyright &copy; Experlu 2019
            </li>
          </ul>
        </div>
        <div class="col-lg-6 text-right">
          <ul>
            <li>
              <a href="https://www.facebook.com/Experlu/" title="Find us on Facebook" rel="nofollow" target="_blank">
              <i class="mdi mdi-facebook"></i></a>
            </li>
            <li>
              <a href="https://www.instagram.com/experluglobal/" title="Find us on Instagram" rel="nofollow" target="_blank">
              <i class="mdi mdi-instagram"></i></a>
            </li>
            <li>
              <a href="https://www.linkedin.com/company/experlu/" title="Find us on LinkedIn" rel="nofollow" target="_blank">
              <i class="mdi mdi-linkedin"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</footer>
          
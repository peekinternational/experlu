<div class="sidebar" data-color="#072f44" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{url('/')}}" class="simple-text logo-mini" style="width: 42%;">
          <div class="logo-image-small">
            <img src="{{asset('/frontend-assets/logo.png')}}" alt="Logo">
          </div>
        </a>
        <a href="{{url('/')}}" class="simple-text logo-normal">
          Experlu
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        @if(Session::get('fa_admin')->role =='admin')
          <li class="active ">
            <a href="{{url('/dashboard')}}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="#admin"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="admin">
              <i class="nc-icon nc-bell-55"></i>
              <p>Admins</p>
            </a>
            <ul class="collapse" id="admin">
              <li><a href="{{url('dashboard/view_admin')}}">View Admin</a></li>
            </ul>

          </li>
          <li>
            <a href="#certification"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="admin">
              <i class="nc-icon nc-bell-55"></i>
              <p>Certifications</p>
            </a>
            <ul class="collapse" id="certification">
              <li><a href="{{url('dashboard/view_certification')}}">Certifications</a></li>
            </ul>

          </li>
          @endif
          @if(Session::get('fa_admin')->role =='admin' || Session::get('fa_admin')->role =='jobs')
          <li>
            <a href="#manageJobs"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="manageJobs">
              <i class="nc-icon nc-bell-55"></i>
              <p>Jobs Management</p>
            </a>
            <ul class="collapse" id="manageJobs">
              <li><a href="{{url('dashboard/job_management')}}">Open Jobs</a></li>
              <li><a href="{{url('dashboard/closed_jobs')}}">Closed Jobs</a></li>
            </ul>

          </li>
           @endif
          <li>

          @if(Session::get('fa_admin')->role =='admin' || Session::get('fa_admin')->role =='quote')
            <a  data-toggle="collapse" href="#manageQuote"  role="button" aria-expanded="false" aria-controls="manageQuote">
              <i class="nc-icon nc-pin-3"></i>
              <p>Manage Quotes</p>
            </a>
            <ul class="collapse" id="manageQuote">
              <li><a href="{{url('dashboard/quotes')}}">New cases</a></li>
              <li><a href="{{url('dashboard/pending-quotes')}}">Pending Quotes</a></li>
            </ul>
          </li>
           @endif
           @if(Session::get('fa_admin')->role =='admin')
          <li>
            <a class="" data-toggle="collapse" href="#customer" role="button" aria-expanded="false" aria-controls="customer">
              <i class="nc-icon nc-diamond"></i>
              <p>Customer</p>
            </a>
            <ul class="collapse" id="customer">
              <li><a href="{{url('dashboard/customer-message')}}">Customer Care</a></li>
              <!-- <li><a href="">Archieved</a></li> -->
              <!-- <li><a href="">Completed</a></li> -->
            </ul>
          </li>
          <li>
            <a class="" data-toggle="collapse" href="#blog" role="button" aria-expanded="false" aria-controls="customer">
              <i class="nc-icon nc-diamond"></i>
              <p>Blogs</p>
            </a>
            <ul class="collapse" id="blog">
              <li><a href="{{url('/dashboard/blogs')}}">Blogs</a></li>
            </ul>
          </li>
          <li>
            <a href="#manageUsers"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="manageUsers">
              <i class="nc-icon nc-single-02"></i>
              <p>User Management</p>
            </a>
            <ul class="collapse" id="manageUsers">
              <li><a href="{{url('dashboard/user_management')}}">Add New User </a></li>
            </ul>
          </li>
          <li>
            <a class="" data-toggle="collapse" href="#accounts" role="button" aria-expanded="false" aria-controls="accounts">
              <i class="nc-icon nc-bell-55"></i>
              <p>Account</p>
            </a>
            <ul class="collapse" id="accounts">
              <li><a href="{{url('/dashboard/show_invoices')}}">Invoice</a></li>
              <li><a href="{{url('/dashboard/refund_cases')}}">Refund Cases</a></li>
            </ul>
          </li>
          <li>
            <a href="{{url('dashboard/user')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Profile Management</p>
            </a>
          </li>
          <!-- <li>
            <a href="{{url('dashboard/tables')}}">
              <i class="nc-icon nc-tile-56"></i>
              <p>Blogs</p>
            </a>
          </li> -->
          <!-- <li>
            <a class="" data-toggle="collapse" href="#messages" role="button" aria-expanded="false" aria-controls="messages">
              <i class="nc-icon nc-caps-small"></i>
              <p>Messages</p>
            </a>
            <ul class="collapse" id="messages">
              <li><a href="{{url('')}}">Expert Mesages</a></li>
              <li><a href="{{url('')}}">Customer Messages</a></li>
            </ul>
          </li> -->
          @endif
           @if(Session::get('fa_admin')->role =='admin')
           <li>
             <a href="#managepayment"  data-toggle="collapse"  role="button" aria-expanded="false" aria-controls="manageJobs">
               <i class="nc-icon nc-single-02"></i>
               <p>Payments</p>
             </a>
             <ul class="collapse" id="managepayment">
               <li><a href="{{url('dashboard/payment_management')}}">View Payments</a></li>
             </ul>

           </li>
          @endif
           @if(Session::get('fa_admin')->role =='admin')
          <li>
            <a href="{{url('dashboard/help-menu')}}">
              <i class="nc-icon nc-single-02"></i>
              <p>Help Menu</p>
            </a>
          </li>
          @endif
        </ul>
      </div>
    </div>

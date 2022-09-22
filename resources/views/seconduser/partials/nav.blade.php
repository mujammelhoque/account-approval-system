    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo me-5" href="{{ route('seconduser') }}"> <img style="width: 50px;border-radius:10px" src="{{ asset('images')}}/resl1_t.png" class="me-2" alt="logo"></a>
        <a class="navbar-brand brand-logo-mini" href="{{ route('seconduser') }}"><img style="width: 50px;border-radius:10px" src="{{ asset('images')}}/resl1_t.png" alt="logo"></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="ti-view-list"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <div class="input-group-prepend hover-cursor" id="navbar-search-icon">
                <span class="input-group-text" id="search">
                  <i class="ti-search"></i>
                </span>
              </div>
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search">
            </div>
          </li>
        </ul>
         <ul class="navbar-nav navbar-nav-right">

          <?php $count = Auth::user()->newThreadsCount(); ?>

          <li class="nav-item dropdown">
            <a class="nav-link count-indicator " href="{{ route('message-index') }}" >
              <i class="ti-email mx-0"></i>
              @if ($count>0)
              <sup class="badge badge-pill  badge-info">{{ $count }}</sup>

              @endif
            </a>

            {{-- <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="notificationDropdown">
              <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-success">
                    <i class="ti-info-alt mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Application Error</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Just now
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-warning">
                    <i class="ti-settings mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">Settings</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    Private message
                  </p>
                </div>
              </a>
              <a class="dropdown-item">
                <div class="item-thumbnail">
                  <div class="item-icon bg-info">
                    <i class="ti-user mx-0"></i>
                  </div>
                </div>
                <div class="item-content">
                  <h6 class="font-weight-normal">New user registration</h6>
                  <p class="font-weight-light small-text mb-0 text-muted">
                    2 days ago
                  </p>
                </div>
              </a>
            </div> --}}
          </li>
          {{-- <li class="nav-item nav-profile dropdown">
            <a class="nav-link" >
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <button class="btn btn-primary">logout</button>  
            </form>
            </a>
           
          </li> --}}
           @if (!Auth::check())
              <li class="nav-item">
                <a class="nav-link page-scroll" href="{{ route('login') }}">Login</a>
            </li>
              @else
              <li class="nav-item dropdown pt-2">
                <a  id="navbarDropdown" class="nav-link page-scroll dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->username }}
                </a>
    
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item text-info" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
              @endif 
        </ul> 
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="ti-view-list"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="../../index.html">
              <i class="ti-shield menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            
            <div class="collapse" id="ui-basic">

              @if ( auth()->user()->created_by == 0)
              @php
                  $table = auth()->user()->username;
                  $tablename =$table.'_approvalmatrix';
              @endphp
                  
              @else
              @php
                 $admin_username = App\Models\User::find(auth()->user()->created_by);
                 $table = $admin_username->username;
                  $tablename =$table.'_approvalmatrix';
                 
              @endphp
                 @endif
              @php

              $data = DB::table($tablename)
            ->where([
                ['label', '=',0],
            ])
            ->orderBy('id','desc')
            ->first();

              $issetApprove = DB::table($tablename)
            ->where([
                ['user_id', '=',auth()->user()->id],
            ])
            ->exists();
              @endphp


              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('loan-application') }}">Amount Application</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('pending-amount') }}">Pending Amount</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('your-approved-amount') }}">Your approved Amount</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('cancel-amount') }}">Cancel Amount</a></li>
                {{-- <li class="nav-item"> <a class="nav-link" href="{{ route('income-create') }}">Income Create</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('expense-create') }}">Expense Create</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('po-receive-create') }}">Po Receive Create</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('show-poreceive-voucher') }}"> Show Po Receive Voucher</a></li> --}}
                
                
              </ul>
            </div>

            <a class="nav-link" data-bs-toggle="collapse" href="#resl-infra" aria-expanded="false" aria-controls="ui-basic">
              <i class="ti-palette menu-icon"></i>
              <span class="menu-title">Resl Infra</span>
              <i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="resl-infra">


              <ul class="nav flex-column sub-menu">
                
                @if (auth()->user()->finance_justifier ==1)
                <li class="nav-item"> <a class="nav-link" href="{{ route('amount-justify') }}"> Amount Justfy </a></li>

                @endif
                @if (isset($data->user_id))
                @if ( $data->user_id== auth()->user()->id)
                <li class="nav-item"> <a class="nav-link" href="{{ route('income-create') }}">Income Create</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('projects-index') }}">Projcts</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('total-fund') }}">Total found </a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('all-approved-amount') }}">All approve Amount</a></li>
                

                    
                @endif
                @endif
               

                {{-- @if (isset($data->user_id))
                @if ( $data->user_id== auth()->user()->id)
            
              
  
                @endif
                @endif --}}
                @if ($issetApprove)

          
                <li class="nav-item"> <a class="nav-link" href="{{ route('pending-amount') }}">Pending Amount</a></li>    
                <li class="nav-item"> <a class="nav-link" href="{{ route('approved-amount') }}">Approved By You</a></li>
                @endif
                
              </ul>
            </div>

          </li>  

        </ul>
      </nav>

      <!-- partial -->
   

          <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
              <div class="navbar nav_title" style="border: 0;">
                <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>RESL</span></a>
              </div>
  
              <div class="clearfix"></div>
  
              <!-- menu profile quick info -->
              <div class="profile clearfix">
                <div class="profile_pic">
                  <img style="width: 50px;border-radius:10px" class="img-circle profile_img" src="{{ asset('images')}}/resl1_t.png" alt="logo">
                </div>
                <div class="profile_info">
                  <span>Welcome,</span>
                  <h2> {{ Auth::user()->username }}</h2>
                </div>
              </div>
              <!-- /menu profile quick info -->
  
              <br />
  
              <!-- sidebar menu -->
              <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">
                  {{-- <h3>General</h3> --}}
                  <ul class="nav side-menu">
                    
                    {{-- <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="index.html">Dashboard</a></li>
                        <li><a href="index2.html">Dashboard2</a></li>
                        <li><a href="index3.html">Dashboard3</a></li>
                      </ul>
                    </li> --}}

                     
                    {{-- <li><a ><i class="fa fa-edit"></i> Voucher Create <span class="fa fa-chevron-down"></span> </a>
                      <ul class="nav child_menu">
                        <li><a href="{{ route('income-create') }}">Income</a></li>
                        <li><a href="{{ route('expense-create') }}">Expense</a></li>
                        <li><a href="{{ route('po-receive-create') }}">Po Receive</a></li>
                      </ul>
                    </li> --}}

                    <li><a><i class="fa fa-desktop"></i> Approval <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ route('approval-mattrix.create') }}">Approval Condition Set</a></li>
                        <li><a href="{{ route('approval-mattrix.index') }}">Approval Condition display</a></li>
                      {{--                         
                        <li><a href="{{ route('loan-application') }}">Apply Amount</a></li>
                        <li> <a href="{{ route('pending-amount') }}">Pending amount</a></li>
                        <li> <a href="{{ route('cancel-amount') }}">Cancel amount</a></li>
                        <li> <a href="{{ route('approved-amount') }}">You approved  </a></li>
                        <li> <a href="{{ route('your-approved-amount') }}">Your approved amount </a></li>
                        <li> <a href="{{ route('all-approved-amount') }}">All approved Amount</a></li> 
                        --}}
                      
                      </ul>
                    </li>

                    {{-- <li><a><i class="fa fa-table"></i> Show Voucher <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="{{ route('show-income-voucher') }}">Income Voucher</a></li>
                        <li><a href="{{ route('show-expense-voucher') }}">Expense Voucher</a></li>
                        <li><a href="{{ route('show-poreceive-voucher') }}">Po Receive</a></li>
                      </ul>
                    </li> --}}

                    {{-- <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="chartjs.html">Chart JS</a></li>
                        <li><a href="chartjs2.html">Chart JS2</a></li>
                        <li><a href="morisjs.html">Moris JS</a></li>
                        <li><a href="echarts.html">ECharts</a></li>
                        <li><a href="other_charts.html">Other Charts</a></li>
                      </ul>
                    </li> --}}

                    {{-- <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                      </ul>
                    </li> --}}

                  </ul>
                </div>
                <div class="menu_section">
                  {{-- <h3>Live On</h3> --}}
                  <ul class="nav side-menu">

                    {{-- <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="e_commerce.html">E-commerce</a></li>
                        <li><a href="projects.html">Projects</a></li>
                        <li><a href="project_detail.html">Project Detail</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="profile.html">Profile</a></li>
                      </ul>
                    </li> --}}

                    {{-- <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                        <li><a href="page_403.html">403 Error</a></li>
                        <li><a href="page_404.html">404 Error</a></li>
                        <li><a href="page_500.html">500 Error</a></li>
                        <li><a href="plain_page.html">Plain Page</a></li>
                        <li><a href="login.html">Login Page</a></li>
                        <li><a href="pricing_tables.html">Pricing Tables</a></li>
                      </ul>
                    </li> --}}

                    {{-- <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="#level1_1">Level One</a>
                          <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                              <li class="sub_menu"><a href="level2.html">Level Two</a>
                              </li>
                              <li><a href="#level2_1">Level Two</a>
                              </li>
                              <li><a href="#level2_2">Level Two</a>
                              </li>
                            </ul>
                          </li>
                          <li><a href="#level1_2">Level One</a>
                          </li>
                      </ul>
                    </li>   --}}
                                    
                    {{-- <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li> --}}
                  </ul>
                </div>
  
              </div>
              <!-- /sidebar menu -->
  
              <!-- /menu footer buttons -->
              <div class="sidebar-footer hidden-small">
                {{-- <a data-toggle="tooltip" data-placement="top" title="Settings">
                  <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                </a> --}}
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#departmentModal">
                  <span class="glyphicon glyphicon-tasks" aria-hidden="true">
                  
                  </span>
                </a>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#seconduser">
                  <span class="glyphicon glyphicon-user" aria-hidden="true">
  
                  </span>
                </a>
                {{-- <a data-toggle="tooltip" data-placement="top" title="Lock">
                  <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                </a> --}}
                {{-- <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                  <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                </a> --}}
              </div>
              <!-- /menu footer buttons -->
            </div>
          </div>
  
          <!-- top navigation -->
          <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                      {{-- <img src="images/img.jpg" alt=""> --}}
                       {{ Auth::user()->username }}
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      {{-- <a class="dropdown-item"  href="javascript:;"> Profile</a> --}}
                        {{-- <a class="dropdown-item"  href="javascript:;">
                          <span class="badge bg-red pull-right">50%</span>
                          <span>Settings</span>
                        </a>
                    <a class="dropdown-item"  href="javascript:;">Help</a> --}}
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button class="btn btn-primary">logout</button>  
                    </form>
                    </div>
                  </li>
                  <?php $count = Auth::user()->newThreadsCount(); ?>

                  <li role="presentation" class="nav-item dropdown open">
                    <a href="{{ route('message-index') }}" class="info-number" >
                      <i class="fa fa-envelope-o"></i>
                      @if ($count>0)
                      <sup class=" text-info font-weight-bold">{{ $count }}</sup>

                      @endif
                    </a>

                    {{-- <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul> --}}
                  </li>
                </ul>
              </nav>
            </div>
          </div>
          <!-- /top navigation -->
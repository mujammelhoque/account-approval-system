 <!-- Header Section Start -->
 
 <header id="home" class="hero-area">    
    {{-- <div class="overlay">
      <span></span>
      <span></span>
    </div> --}}
    <nav class="navbar navbar-expand-md bg-info fixed-top scrolling-navbar">
      <div class="container">
        <a href="{{ url('/') }}" class="navbar-brand"><img style="width: 50px;border-radius:10px" src="{{ asset('images')}}/resl1_t.png" alt=""></a>       
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lni-menu"></i>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('home-active')" href="{{ url('/') }}">Home</a>
            </li>
           
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('services-active')" href="{{ url('/services') }}">Services</a>
            </li>                            
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('Client-active')" href="{{ url('/client-lists') }}">Client List
              </a>
            </li>       
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('trainings-active')" href="{{ url('trainings') }}">Trainings</a>
            </li>     
            {{-- <li class="nav-item">
              <a class="nav-link page-scroll" href="#team">Team</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Blog</a>
            </li>   --}}
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('About-active')" href="{{ url('/about-us') }}">About</a>
            </li>  
          
            <li class="nav-item">
              <a class="nav-link page-scroll  @yield('Contact-active')" href="{{ url('contact') }}">Contact</a>
            </li> 
      
            
            @if (!Auth::check())
            <li class="nav-item">
              <a class="nav-link page-scroll " href="{{ route('login') }}">Login</a>
          </li>
            @else
            <li class="nav-item dropdown pt-2">
              <a  id="navbarDropdown" class="nav-link page-scroll dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->username }}
              </a>
  
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="{{ route('logout') }}"
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
            
            @if (Auth::check())
            <?php $count = Auth::user()->newThreadsCount(); ?>
            <li class="nav-item">
          
                @if ($count > 0)
                <a class="nav-link page-scroll text-light " href="{{ route('message-index') }}">
                <i class="fa-brands fa-facebook-messenger"></i><sup >{{$count  }}</sup>
              </a>
                @else
                <a class="nav-link page-scroll text-light " href="{{ route('message-index') }}">
                  <i class="fa-brands fa-facebook-messenger"></i>
                </a>
            @endif
              
            </li> 
            @endif 
          </ul>
        </div>
      </div>
    </nav>  
    
  </header>
  <!-- Header Section End --> 


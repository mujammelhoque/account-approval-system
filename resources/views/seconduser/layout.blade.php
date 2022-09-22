@include('seconduser.partials.topheader')
@include('seconduser.partials.nav')
<div class="main-panel">

 @yield('pagecontent')
 
  @include('seconduser.partials.footer')
  
</div>

@include('seconduser.partials.modal')
    @include('seconduser.partials.bottomfooter')
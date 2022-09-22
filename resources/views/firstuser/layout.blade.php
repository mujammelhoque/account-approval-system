@include('firstuser.partials.topheader')
<body class="nav-md">
  <div class="container body">
    <div class="main_container">
@include('firstuser.partials.nav')
 

 @yield('pagecontent')
 

    

 
  @include('firstuser.partials.footer')
  

@include('firstuser.partials.modal')
</div>
@include('firstuser.partials.bottomfooter')
</div>
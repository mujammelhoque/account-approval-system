@extends('user-interface.user_layout')
@section('Contact-active')
active 
@endsection
@section('content')
<br>
<br>
<br>
<br>
<div class="container">
    <div class="jumbotron">
      <div class="row">
        <div class="col-md-6">

          <h1>Contact Us </h1>


          <p>   </p>       
          <p>   </p>

          <p>Reliable Engineering & Solutions Ltd</p>
          <p>House #282-284, Road #4, Level #3</p>
          <p>Mirpur DOHS, Dhaka-1216, Bangladesh</p>

          <p> 
             
              <img src="{{ asset('images')}}/baseline-alternate_email-24px.svg" width="16" height="16" alt="Email RESL"> 
             
            <a href="mailto:info@reslbd.com?Subject=Request%20for%20RESL">info@reslbd.com</a> </p>


          <p>
             
              <img src="{{ asset('images')}}/baseline-perm_phone_msg-24px.svg" width="16" height="16" alt="Call Energy Consultancy"> 
             +880 17 0166 3911</p>
          <p>              
             
              <img src="{{ asset('images')}}/baseline-perm_phone_msg-24px.svg" width="16" height="16" alt="Call Environment Consultancy"> 
             +880 17 8044 3300</p>
          <p>              
             
              <img src="{{ asset('images')}}/baseline-perm_phone_msg-24px.svg" width="16" height="16" alt="Civil Engineering & Consultancy"> 
             +880 17 1150 5861</p>
          <p>
           
              <img src="{{ asset('images')}}/baseline-home-24px.svg" width="16" height="16" alt="RESL"> 
            <a href="www.reslbd.com">www.reslbd.com</a>
          </p>

        </div>
        <div class="col-md-6">

          <img class="img-responsive img-rounded" src="{{ asset('images/resl1_t.png') }}" width="300" height="300" alt="Reliable Engineeting & Solutions Ltd">

        </div>

      </div>
    </div>
</div>
    
@endsection
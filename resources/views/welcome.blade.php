@extends('user-interface.user_layout')
@section('home-active')
active 
@endsection
@section('content')
    
   
    <!-- Cool Fetatures Section Start -->
    <section id="features" class="section">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-md-4">
              <img class="img-fluid img-responsive img-rounded" src="{{ asset('images') }}/index_page_img_760X350_v2.jpg" alt="">
          </div>
          <!-- /.col-md-8 -->
          <div class="col-md-4">
              <h1>Reliable Engineering & Solutions Limited</h1>
              <p align="justify">RESL is an Engineering company formed by a group of senior professionals from nation wide industries with a vision to provide sustainable growth and to provide quality services to support industrial sector for Economic development of Bangladesh.</p>
              <a class="btn btn-primary btn-lg" href="{{ url('contact') }}">Call to Action!</a>
          </div>
          <!-- /.col-md-4 -->
      </div>
      </div>

     
      <hr>
     
      <div class="container ">
       

        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="features-text section-header text-center">  
              <div>   
                <h2 class="section-title mt-4">Services We Provide</h2>
                <div class="desc-text">
                  <em class="text-dark"> RESL is a Professional Engineering company formed by group of highly qualified professionals from respected engineering universities with decades of support and service experience in the eminent industrial sectors of Bangladesh.</em>
                </div>
              </div> 
            </div>
          </div>

        </div>
          <div class="row  mb-2">
            <div class="col-md-6 col-sm-12">
                <img style="height:150px; width:100%" class="img-fluid img-responsive img-rounded" src="{{ asset('images/construction') }}/constructions-test.gif" alt="">
             
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-6 col-sm-12">
              <img style="height:150px; width:100%" class="img-fluid img-responsive img-rounded" src="{{ asset('images/construction') }}/energy-audit.webp" alt="">
            </div>
            <!-- /.col-md-4 -->
        </div>
     
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row featured-bg">
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class=" feature-item featured-border1">
               <div class="feature-icon float-left">
                <i class="lni lni-island"></i>  
               </div>
               <div>
                <h6> <em>Engineering Company in Bangladesh</em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>Energy Audit for Green Transformation Fund (GTF) of Bangladesh Bank (BB)</li>
                    <li>Energy Audit for Fulfill the Requirement of Buyer for Garments and Textile industries</li>
                    <li>Energy Audit for Fulfill the Requirement of Petro Bangla for Titas Gas </li>
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                <i class="lni lni-anchor"></i>
               </div>
               <div >
                <h6> <em>Energy Efficient and Environment Friendly Product Supplier</em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>Steam Boiler fired by NG/LPG/Diesel/HFO – Thermax, Schneider Kessel</li>
                    <li>Exhaust Gas Boiler (EGB)- Thermax, Schneider Kessel</li>
                    <li>Thermo Oil Heater – Thermax </li>
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                 <i class="lni-invention"></i>
               </div>
               <div >
                <h6> <em>Electrical Product Supplier for Safe Life, Asset, Data and Business Goodwill of your Organization</em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>Electrical Substation Equipment – Transformer, HT Switch Gears, LT Switch Gears, PFI Plant</li>
                    <li>Variable Frequency Drives and Inverters</li>
                    <li>Distribution Boards, Cable Tray, Cable Ladder</li>
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border2">
               <div class="feature-icon float-left">
                <i class="lni lni-sun"></i>               </div>
                <div >
                  <h6> <em>Fire Engineering Solution
                  </em></h6>
                 </div>
                 <div>
                  <small>
                    <ul>
                      <li>Fire Safety Audit to meet ILO, ACCORD & ALLIANCE requirement according to BNBC, BS and NFPA standard.</li>
                      <li>Design of Fire Detection and Protection (Hydrant & Sprinkler) system with Hydraulic Calculation according to standards*.</li>
                      <li>Supply equipments for Fire Detection and Protection (Hydrant & Sprinkler) system of SFFECO and Others.</li>
                    </ul>
                    </small>          
                 </div>
                 <div class="text-end">  
                   <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
                 </div>
              </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border3">
               <div class="feature-icon float-left">
                <i class="lni lni-helmet"></i>               </div>
                <div >
                  <h6> <em>Civil Engineering consultancy
                  </em></h6>
                 </div>
                 <div>
                  <small>
                    <ul>
                      <li>Architectural and structural design consultancy for residential, industrial and green buildings.</li>
                      <li>Retrofitting design and implementation for industrial sectors considering audit requirements.</li>
                      <li>Supervision and construction of new & green factory buildings.</li>
                    </ul>
                    </small>          
                 </div>
                 <div class="text-end">  
                   <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
                 </div>
              </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
          
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item">
               <div class="feature-icon float-left">
                <i class="lni lni-construction"></i>
               </div>
               <div >
                <h6> <em>New and Green Factory Solution
                </em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>Architectural and Structural Design for New & Green factory Building*.</li>
                    <li>Energy planning for Energy Efficient Factory, New Factory & Green Factory*.</li>
                    <li>Single line diagram / Design and installation of electrical system for New & Green factory*.</li>
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item">
               <div class="feature-icon float-left">
                <i class="lni lni-hammer"></i>
               </div>
               <div >
                <h6> <em>Construction of Factories & Buildings
                </em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>Construction of New & Green factory Building. </li>
                    <li>Construction of Buildings and Apartments.</li>
                    <li>Construction of ETP for waste management for New & Green factory Building.</li>
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item">
               <div class="feature-icon float-left">
                <i class="lni lni-laptop-phone"></i>
          
               </div>
               <div >
                <h6> <em>IT Solution
                </em></h6>
               </div>
               <div>
                <small>
                  <ul>
                    <li>RESL aims to bring out its IT experience to the market and to meet the Millennium Development Goal (MGD). It emphasis on providing technical consultancy to plan, procure, deploy and operate of Enterprise IT infrastructure. It assists organisations with end-to-end networking, remote office/application connectivity, datacenter buildup and operation of active and passive components. </li>
      
                  </ul>
                  </small>          
               </div>
               <div class="text-end">  
                 <a class="btn btn-secondary" href="{{ url('/services') }}" class="text-primary">..more</a>
               </div>
            </div>
            <!-- End Fetatures -->
          </div>
           <!-- End Col -->
    

        </div>
        <!-- End Row -->
      </div>
     
          <hr>
      {{-- symbol of trust .Start --}}
      <div class="container">
        <h2 class="text-center mb-5 mt-5"> Symbol of Trust</h2>
        <canvas>
        </canvas>
        <div class="row">
          <div class="col-md-4">
              <img class="img-fluid" src="{{ asset('images')}}/Energy.png" alt="">
              <h2>Energy Audit and Power Solution</h2>
              <p>RESL is a certified Energy Auditing Firm. Respected industry-wide auditors with extensive experience in multi disiplin energy certification. Accridated by Petro Bangla and its distribution agencies (Titas, Karnaphuli, Jalalabad, Bakhrabad and Pashchimanchal)</p>
              <!--<a class="btn btn-default" href="#">More Info</a> -->
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4">
               <img  class="img-fluid" src="{{ asset('images')}}/Environment.png" alt="">
              <h2>Environmental Compliance & Engineering Auditing</h2>
              <p>Environmental complience audit, impact analysis and remidification. Electrical and Fire Safety Audit according to the guideline of ILO, ACCORD & ALLIANCE. Standardized and accridated by BNBC, BS and NFPA </p>
              <!--<a class="btn btn-default" href="#">More Info</a>-->
          </div>
          <!-- /.col-md-4 -->
          <div class="col-md-4">
              <img  class="img-fluid" src="{{ asset('images')}}/Civil.png" alt="Civil Consultancy and Deployment">
              <h2>Civil Engineering Solution</h2>
              <p>Electrical and Fire Safety Audit according to the guideline of ILO, ACCORD & ALLIANCE. Standardized and accridated by BNBC, BS and NFPA. Architectural and Structural Design (RCC & Steel) for New & Green factory Building. Retrofitting design and implementation. Construction of WTP for edible and usable water solution and ETP, STP for waste management.</p>
              <!--<a class="btn btn-default" href="#">More Info</a>-->
          </div>
          <!-- /.col-md-4 -->
      </div>
      </div>
      {{-- symbol of trust .End--}}

    </section>
    <!-- Cool Fetatures Section End --> 



    @endsection
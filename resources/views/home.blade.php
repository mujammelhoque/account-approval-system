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
     
      <div class="container">
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
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row featured-bg">
         <!-- Start Col -->
          <div class="col-lg-6 col-md-6 col-xs-12 p-0">
             <!-- Start Fetatures -->
            <div class="feature-item featured-border1">
               <div class="feature-icon float-left">
                <i class="lni lni-island"></i>               </div>
               <div class="feature-info float-left">
                 <h6>Environmental Solutions</h6>
               </div>

               <br><br>
               <div>
                <small>Environment Audit to meet for Garments & Textile industries according to ISO: 14001 (EMS).</small>

                <?php
                // $str=" Environment Audit to meet for Garments & Textile industries according to ISO: 14001 (EMS).";
                // echo mb_strimwidth($str, 0, 80, "...");
                //Hello W...
                ?>
             
               </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h6>Energy and Power Solution</h6>
               </div>
               
               <br><br>
               <div>
                 <small>Energy planning for Energy Efficient Factory, New Factory & Green Factory.</small>
                <?php
                // $str="Energy planning for Energy Efficient Factory, New Factory & Green Factory.  ";
                
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
                          </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>

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
               <div class="feature-info float-left">
                 <h6>Electrical Engineering Solution</h6>
         
               </div>
               
               <br><br>
               <div>
                <small>Electrical Safety Audit to meet ILO, ACCORD & ALLIANCE requirement according to BNBC ...</small>

                <?php
                // $str="Electrical Safety Audit to meet ILO, ACCORD & ALLIANCE requirement according to BNBC ...";
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
             
              </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h6>Fire Engineering Solution</h6>
               </div>
              
               <br><br>
               <div>
                <small>Fire Safety Audit to meet ILO, ACCORD & ALLIANCE requirement according to BNBC...</small>

                <?php
                // $str="Fire Safety Audit to meet ILO, ACCORD & ALLIANCE requirement according to BNBC...";
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
            
              </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h6>Civil Engineering consultancy</h6>

               </div>
               
               <br><br>
               <div>
                <small>Architectural and structural design consultancy for residential, industrial...</small>

                <?php
                // $str="Architectural and structural design consultancy for residential, industrial...";
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
              
              </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h6>New and Green Factory Solution</h6>
               </div>
               
               <br><br>
               <div>
                <small>Architectural and Structural Design for New & Green factory Building*.</small>
                <?php
                // $str="Architectural and Structural Design for New & Green factory Building*.";
                // echo mb_strimwidth($str, 0, 70, "...");
                // //Hello W...
                ?>
             
              </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h6>Construction of Factories & Buildings</h6>
               </div>
               
               <br><br>
               <div>
                <small>Construction of New & Green factory Building.</small>

                <?php
                // $str="Construction of New & Green factory Building.";
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
               
                 </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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
               <div class="feature-info float-left">
                 <h4>IT Solution</h4>
               </div>
               
               <br><br>
               <div>
                <small>RESL aims to bring out its IT experience to the market and to meet..</small>

                <?php
                // $str=" RESL aims to bring out its IT experience to the market and to meet..  ";
                // echo mb_strimwidth($str, 0, 70, "...");
                //Hello W...
                ?>
            </div>
               <a  href="{{ url('/services') }}" class="btn btn-primary mt-2">more</a>
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


    <!-- Recent Showcase Section Start -->
    <section id="showcase">
      <div class="container-fluid right-position">
        <!-- Start Row -->
        <div class="row gradient-bg">
          <div class="col-lg-12">
            <div class="showcase-text section-header text-center">  
              <div>   
                <h2 class="section-title">Recent Works</h2>
                {{-- <div class="desc-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p>
                </div> --}}
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row justify-content-center showcase-area">
          <div class="col-lg-12 col-md-12 col-xs-12 pr-0">
            <div class="showcase-slider owl-carousel">
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/a(2).jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/02.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/a(3).jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/images (1).jfif"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/04.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/05.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/02.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/03.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/04.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/05.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/01.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="{{ asset('landingpage-asset')}}/img/showcase/02.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="{{ asset('landingpage-asset')}}/img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/03.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/04.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="screenshot-thumb">
                  <img src="img/showcase/05.jpg" class="img-fluid" alt="" />
                  <div class="hover-content text-center">
                    <div class="fancy-table">
                      <div class="table-cell">
                        <div class="single-text">
                          <p>Icon , Web</p>
                          <h5>Redesign Slack</h5>
                        </div>
                        <div class="zoom-icon">
                          <a class="lightbox" href="img/showcase/01.jpg"><i class="lni-zoom-in"></i></a>
                          <a href="#"><i class="lni-link"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             

              
            </div>
          </div>
        </div>
        <!-- End Row -->
      </div>
    </section>
     

    <!-- Team section Start -->
    <section id="team" class="section">
      <div class="container">
        <!-- Start Row -->
        <div class="row">
          <div class="col-lg-12">
            <div class="team-text section-header text-center">  
              <div>   
                <h2 class="section-title">Team Members</h2>
                {{-- <div class="desc-text">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do</p>  
                  <p>eiusmod tempor incididunt ut labore et dolore.</p>
                </div> --}}
              </div> 
            </div>
          </div>

        </div>
        <!-- End Row -->
        <!-- Start Row -->
        <div class="row">

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>  --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Patric Green</h5>
                  <p>Lead Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
 
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div> --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Celina D Cruze</h5>
                  <p>Front-end Developer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
 
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div> --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Daryl Dixon</h5>
                  <p>Content Writer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
 
          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
                {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div> --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Mark Parker</h5>
                  <p>Support Engineer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
 

        </div>
        <!-- End Row -->
        <!-- Start new Row -->

        <div class="row mt-3">

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>  --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Patric Green</h5>
                  <p>Lead Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>  --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Patric Green</h5>
                  <p>Lead Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>  --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Patric Green</h5>
                  <p>Lead Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->

          <!-- Start Col -->
          <div class="col-lg-3 col-md-6 col-xs-12">
            <div class="single-team">
              <div class="team-thumb">
                <img src="{{ asset('landingpage-asset')}}/img/team/01.jpg" class="img-fluid" alt="">
              </div>

              <div class="team-details">
              {{-- <div class="team-social-icons">
                  <ul class="social-list">
                    <li><a href="#"><i class="lni-facebook-filled"></i></a></li>
                    <li><a href="#"><i class="lni-twitter-filled"></i></a></li>
                    <li><a href="#"><i class="lni-google-plus"></i></a></li>
                  </ul>
                </div>  --}}
                <div class="team-inner text-center">
                  <h5 class="team-title">Patric Green</h5>
                  <p>Lead Designer</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Start Col -->
        </div>
        <!-- End new Row -->
      
      </div>
    </section>
    <!-- Team section End -->

    @endsection
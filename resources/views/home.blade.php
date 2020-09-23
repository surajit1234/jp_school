@extends('layouts.home')

@section('content')
    <!-- HOME -->
    <section id="home">
      <div class="row">
                <div class="owl-carousel owl-theme home-slider">
                     <div class="item item-first">
                          <div class="caption">
                               <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                         <h1>Develop Passion for Learning</h1>
                                         <h3>International Education with Indian Values</h3>
                                         <a href="#" class="section-btn btn btn-default smoothScroll">Discover more</a>
                                    </div>
                               </div>
                          </div>
                     </div>

                     <div class="item item-second">
                          <div class="caption">
                               <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                         <h1>Develop Passion for Learning</h1>
                                         <h3>International Education with Indian Values.</h3>
                                         <a href="#" class="section-btn btn btn-default smoothScroll">Discover more</a>
                                    </div>
                               </div>
                          </div>
                     </div>

                     <div class="item item-third">
                          <div class="caption">
                               <div class="container">
                                    <div class="col-md-6 col-sm-12">
                                         <h1>Develop Passion for Learning</h1>
                                         <h3>International Education with Indian Values. Visit <a rel="nofollow" href="https://www.facebook.com/templatemo">templatemo</a> page.</h3>
                                         <a href="#" class="section-btn btn btn-default smoothScroll">Discover more</a>
                                    </div>
                               </div>
                          </div>
                     </div>
                </div>
      </div>
    </section>

     <!-- ABOUT -->
    <section id="about">
      <div class="container">
           <div class="row">

                <div class="col-md-6 col-sm-12">
                     <div class="about-info">
                          <h2>Young Dreams Start Here</h2>
                          <figure>
                               <span><i class="fa fa-users"></i></span>
                               <figcaption>
                                    <h3>Vision</h3>
                                    <p>JP School aspires to develop ethical student of action. Through a focus on learning, research and innovation, we will be recognised by our own community, the national and international community as a leading school in education. </p>
                               </figcaption>
                          </figure>

                          <figure>
                               <span><i class="fa fa-certificate"></i></span>
                               <figcaption>
                                    <h3>Mission</h3>
                                    <p>Founded in 2002 , the school is a venture of the “”. Since it’s inception , the school has grown and established a reputation for incorporating innovative and modern methods of the teaching and learning process; not to mention academic excellence.</p>
                               </figcaption>
                          </figure>

                          <figure>
                               <span><i class="fa fa-bar-chart-o"></i></span>
                               <figcaption>
                                    <h3>Goal</h3>
                                    <p>We take great pride on being awarded the ISA (INTERNATIONAL SCHOOL AWARD) from 2008 – 2019. Been awarded the Best Infrastructure Award 2017 – 18.</p>
                               </figcaption>
                          </figure>
                     </div>
                </div>

                <div class="col-md-offset-1 col-md-4 col-sm-12">
                     <div class="entry-form">
                          <form action="#" method="post">
                               <h2>We will Contact you Happily.</h2>
                               <input type="text" name="full name" class="form-control" placeholder="Full name" required="">

                               <input type="email" name="email" class="form-control" placeholder="Your email address" required="">

                               <input type="text" name="phone" class="form-control" placeholder="Your Contact" required="">

                               <button class="submit-btn form-control" id="form-submit">Sent Us</button>
                          </form>
                     </div>
                </div>

           </div>
      </div>
    </section>


    <!-- FEATURE -->
    <!-- <section id="feature">
      <div class="container">
           <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>School Events</h2>
                     </div>
                </div>
                <div class="col-md-4 col-sm-4">
                     <div class="feature-thumb">
                          <span>01</span>
                          <h3>Trending Courses</h3>
                          <p>Known is free education HTML Bootstrap Template. You can modify in any way and use this for your website.</p>
                     </div>
                </div>

                <div class="col-md-4 col-sm-4">
                     <div class="feature-thumb">
                          <span>02</span>
                          <h3>Books & Library</h3>
                          <p>You are allowed to use Known HTML Template for your commercial or non-commercial websites.</p>
                     </div>
                </div>

                <div class="col-md-4 col-sm-4">
                     <div class="feature-thumb">
                          <span>03</span>
                          <h3>Certified Teachers</h3>
                          <p>Please spread a word about us. Template redistribution is NOT allowed on any download website.</p>
                     </div>
                </div>

           </div>
      </div>
    </section> -->   


    <!-- TEAM -->
    <section id="team">
      <div class="container">
           <div class="row">

                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>Teachers <small>Meet Professional Trainers</small></h2>
                     </div>
                </div>

                <div class="col-md-3 col-sm-6">
                     <div class="team-thumb">
                          <div class="team-image">
                               <img src="{{asset('public/front/images/author-image1.jpg')}}" class="img-responsive" alt="">
                          </div>
                          <div class="team-info">
                               <h3>Mark Wilson</h3>
                               <span>I love Teaching</span>
                          </div>
                          <ul class="social-icon">
                               <li><a href="#" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                               <li><a href="#" class="fa fa-twitter"></a></li>
                               <li><a href="#" class="fa fa-instagram"></a></li>
                          </ul>
                     </div>
                </div>

                <div class="col-md-3 col-sm-6">
                     <div class="team-thumb">
                          <div class="team-image">
                               <img src="{{asset('public/front/images/author-image2.jpg')}}" class="img-responsive" alt="">
                          </div>
                          <div class="team-info">
                               <h3>Catherine</h3>
                               <span>Education is the key!</span>
                          </div>
                          <ul class="social-icon">
                               <li><a href="#" class="fa fa-google"></a></li>
                               <li><a href="#" class="fa fa-instagram"></a></li>
                          </ul>
                     </div>
                </div>

                <div class="col-md-3 col-sm-6">
                     <div class="team-thumb">
                          <div class="team-image">
                               <img src="{{asset('public/front/images/author-image3.jpg')}}" class="img-responsive" alt="">
                          </div>
                          <div class="team-info">
                               <h3>Jessie Ca</h3>
                               <span>I like Online Courses</span>
                          </div>
                          <ul class="social-icon">
                               <li><a href="#" class="fa fa-twitter"></a></li>
                               <li><a href="#" class="fa fa-envelope-o"></a></li>
                               <li><a href="#" class="fa fa-linkedin"></a></li>
                          </ul>
                     </div>
                </div>

                <div class="col-md-3 col-sm-6">
                     <div class="team-thumb">
                          <div class="team-image">
                               <img src="{{asset('public/front/images/author-image4.jpg')}}" class="img-responsive" alt="">
                          </div>
                          <div class="team-info">
                               <h3>Andrew Berti</h3>
                               <span>Learning is fun</span>
                          </div>
                          <ul class="social-icon">
                               <li><a href="#" class="fa fa-twitter"></a></li>
                               <li><a href="#" class="fa fa-google"></a></li>
                               <li><a href="#" class="fa fa-behance"></a></li>
                          </ul>
                     </div>
                </div>

           </div>
      </div>
    </section>


    <!-- Courses -->
    <section id="courses">
      <div class="container">
           <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>School Events <!-- <small>Upgrade your skills with newest courses</small> --></h2>
                     </div>
                     <div class="owl-carousel owl-theme owl-courses">
                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="courses-thumb">
                                         <div class="courses-top">
                                              <div class="courses-image">
                                                   <img src="{{asset('public/front/images/courses-image1.jpg')}}" class="img-responsive" alt="">
                                              </div>
                                              <div class="courses-date">
                                                   <span><i class="fa fa-calendar"></i> 12 / 7 / 2018</span>
                                                   <span><i class="fa fa-clock-o"></i> Mahalaya</span>
                                              </div>
                                         </div>

                                         <div class="courses-detail">
                                              <h3><a href="#">Social Media Management</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div>

                                         <!-- <div class="courses-info">
                                              <div class="courses-author">
                                                   <img src="{{asset('public/front/images/author-image1.jpg')}}" class="img-responsive" alt="">
                                                   <span>Mark Wilson</span>
                                              </div>
                                              <div class="courses-price">
                                                   <a href="#"><span>USD 25</span></a>
                                              </div>
                                         </div> -->
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="courses-thumb">
                                         <div class="courses-top">
                                              <div class="courses-image">
                                                   <img src="{{asset('public/front/images/courses-image2.jpg')}}" class="img-responsive" alt="">
                                              </div>
                                              <div class="courses-date">
                                                   <span><i class="fa fa-calendar"></i> 20 / 7 / 2018</span>
                                                   <span><i class="fa fa-clock-o"></i> 4.5 Hours</span>
                                              </div>
                                         </div>

                                         <div class="courses-detail">
                                              <h3><a href="#">Teacher's Day Celebration at School</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div>

                                         <!-- <div class="courses-info">
                                              <div class="courses-author">
                                                   <img src="{{asset('public/front/images/author-image2.jpg')}}" class="img-responsive" alt="">
                                                   <span>Jessica</span>
                                              </div>
                                              <div class="courses-price">
                                                   <a href="#"><span>USD 80</span></a>
                                              </div>
                                         </div> -->
                                    </div>
                               </div>
                          </div>
                          <!-- 
                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="courses-thumb">
                                         <div class="courses-top">
                                              <div class="courses-image">
                                                   <img src="{{asset('public/front/images/courses-image3.jpg')}}" class="img-responsive" alt="">
                                              </div>
                                              <div class="courses-date">
                                                   <span><i class="fa fa-calendar"></i> 15 / 8 / 2018</span>
                                                   <span><i class="fa fa-clock-o"></i> 6 Hours</span>
                                              </div>
                                         </div>

                                         <div class="courses-detail">
                                              <h3><a href="#">Marketing Communication</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div>

                                         <div class="courses-info">
                                              <div class="courses-author">
                                                   <img src="{{asset('public/front/images/author-image3.jpg')}}" class="img-responsive" alt="">
                                                   <span>Catherine</span>
                                              </div>
                                              <div class="courses-price free">
                                                   <a href="#"><span>Free</span></a>
                                              </div>
                                         </div>
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="courses-thumb">
                                         <div class="courses-top">
                                              <div class="courses-image">
                                                   <img src="{{asset('public/front/images/courses-image4.jpg')}}" class="img-responsive" alt="">
                                              </div>
                                              <div class="courses-date">
                                                   <span><i class="fa fa-calendar"></i> 10 / 8 / 2018</span>
                                                   <span><i class="fa fa-clock-o"></i> 8 Hours</span>
                                              </div>
                                         </div>

                                         <div class="courses-detail">
                                              <h3><a href="#">Summer Kids</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div>

                                         <div class="courses-info">
                                              <div class="courses-author">
                                                   <img src="{{asset('public/front/images/author-image1.jpg')}}" class="img-responsive" alt="">
                                                   <span>Mark Wilson</span>
                                              </div>
                                              <div class="courses-price">
                                                   <a href="#"><span>USD 45</span></a>
                                              </div>
                                         </div>
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="courses-thumb">
                                         <div class="courses-top">
                                              <div class="courses-image">
                                                   <img src="{{asset('public/front/images/courses-image5.jpg')}}" class="img-responsive" alt="">
                                              </div>
                                              <div class="courses-date">
                                                   <span><i class="fa fa-calendar"></i> 5 / 10 / 2018</span>
                                                   <span><i class="fa fa-clock-o"></i> 10 Hours</span>
                                              </div>
                                         </div>

                                         <div class="courses-detail">
                                              <h3><a href="#">Business &amp; Management</a></h3>
                                              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                         </div>

                                         <div class="courses-info">
                                              <div class="courses-author">
                                                   <img src="{{asset('public/front/images/author-image2.jpg')}}" class="img-responsive" alt="">
                                                   <span>Jessica</span>
                                              </div>
                                              <div class="courses-price free">
                                                   <a href="#"><span>Free</span></a>
                                              </div>
                                         </div>
                                    </div>
                               </div>
                          </div> -->

                     </div>

           </div>
      </div>
    </section>


    <!-- TESTIMONIAL -->
    <section id="testimonial">
      <div class="container">
           <div class="row">

                <div class="col-md-12 col-sm-12">
                     <div class="section-title">
                          <h2>Student Reviews <small>from around the world</small></h2>
                     </div>

                     <div class="owl-carousel owl-theme owl-client">
                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="tst-image">
                                         <img src="{{asset('public/front/images/tst-image1.jpg')}}" class="img-responsive" alt="">
                                    </div>
                                    <div class="tst-author">
                                         <h4>Jackson</h4>
                                         <span>Shopify Developer</span>
                                    </div>
                                    <p>You really do help young creative minds to get quality education and professional job search assistance. I’d recommend it to everyone!</p>
                                    <div class="tst-rating">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="tst-image">
                                         <img src="{{asset('public/front/images/tst-image2.jpg')}}" class="img-responsive" alt="">
                                    </div>
                                    <div class="tst-author">
                                         <h4>Camila</h4>
                                         <span>Marketing Manager</span>
                                    </div>
                                    <p>Trying something new is exciting! Thanks for the amazing law course and the great teacher who was able to make it interesting.</p>
                                    <div class="tst-rating">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="tst-image">
                                         <img src="{{asset('public/front/images/tst-image3.jpg')}}" class="img-responsive" alt="">
                                    </div>
                                    <div class="tst-author">
                                         <h4>Barbie</h4>
                                         <span>Art Director</span>
                                    </div>
                                    <p>Donec erat libero, blandit vitae arcu eu, lacinia placerat justo. Sed sollicitudin quis felis vitae hendrerit.</p>
                                    <div class="tst-rating">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                    </div>
                               </div>
                          </div>

                          <div class="col-md-4 col-sm-4">
                               <div class="item">
                                    <div class="tst-image">
                                         <img src="{{asset('public/front/images/tst-image4.jpg')}}" class="img-responsive" alt="">
                                    </div>
                                    <div class="tst-author">
                                         <h4>Andrio</h4>
                                         <span>Web Developer</span>
                                    </div>
                                    <p>Nam eget mi eu ante faucibus viverra nec sed magna. Vivamus viverra sapien ex, elementum varius ex sagittis vel.</p>
                                    <div class="tst-rating">
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                         <i class="fa fa-star"></i>
                                    </div>
                               </div>
                          </div>

                     </div>

           </div>
      </div>
    </section> 


    <!-- CONTACT -->
    <section id="contact">
      <div class="container">
           <div class="row">

                <div class="col-md-6 col-sm-12">
                     <form id="contact-form" role="form" action="" method="post">
                          <div class="section-title">
                               <h2>Contact us <small>we love conversations. let us talk!</small></h2>
                          </div>

                          <div class="col-md-12 col-sm-12">
                               <input type="text" class="form-control" placeholder="Enter full name" name="name" required="">
                
                               <input type="email" class="form-control" placeholder="Enter email address" name="email" required="">

                               <textarea class="form-control" rows="6" placeholder="Tell us about your message" name="message" required=""></textarea>
                          </div>

                          <div class="col-md-4 col-sm-12">
                               <input type="submit" class="form-control" name="send message" value="Send Message">
                          </div>

                     </form>
                </div>

                <div class="col-md-6 col-sm-12">
                     <div class="contact-image">
                          <img src="{{asset('public/front/images/contact-image.jpg')}}" class="img-responsive" alt="Smiling Two Girls">
                     </div>
                </div>

           </div>
      </div>
    </section>       
@endsection

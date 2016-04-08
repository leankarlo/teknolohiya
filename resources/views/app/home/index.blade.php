@extends('app.layouts.base_layout')

@section('title')
	<title>{{ Config::get('app.clientapp') }}</title>
@stop

@section('head')

@stop


@section('content')
	
	<!-- BEGIN INTRO SECTION -->
    <section id="intro">
        <!-- Slider BEGIN -->
        <div class="page-slider">
            <div class="fullwidthbanner-container revolution-slider">
                <div class="banner">
                    <ul id="revolutionul">
                        <!-- THE NEW SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="9400" data-thumb="">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="../../../../../images/app/bg/bg_slider1.jpg" alt="">
                          
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-340" 
                                data-voffset="-70"
                                data-speed="900"
                                data-start="1000"
                                data-easing="easeOutExpo">
                                <h3>We Build <br>Customize ERP</h3>
                            </div>
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-385" 
                                data-voffset="45"
                                data-speed="900"
                                data-start="1500"
                                data-easing="easeOutExpo">
                                <p class="subtitle-v1">To Manage Your <br>
                                Small to Enterprise Business</p>
                            </div>
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-500" 
                                data-voffset="140"
                                data-speed="900" 
                                data-start="2000" 
                                data-easing="easeOutExpo">
                                <!-- <a href="#" class="btn-brd-white">Learn More</a> -->
                            </div>     
                            <div class="caption lfb tp-resizeme"
                                data-x="right"
                                data-y="bottom" 
                                data-hoffset="50"
                                data-speed="900" 
                                data-start="2500"
                                data-easing="easeOutExpo">
                                <img src="../../../../../images/app/member/men.png" alt="Image 3">
                            </div>
                        </li>
                        <!-- THE NEW SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="6000" data-thumb="">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="../../../../../images/app/bg/bg_slider2.jpg" alt="">
                          
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-272" 
                                data-voffset="-30"
                                data-speed="900"
                                data-start="1000"
                                data-easing="easeOutExpo">
                                <h3 class="title-v2">Mobile Apps <br>
                                for your Business</h3>
                            </div>
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-450" 
                                data-voffset="110"
                                data-speed="900"
                                data-start="1500"
                                data-easing="easeOutExpo">
                                <p class="subtitle-v2">Across Any Platform:</p>
                            </div>
                            <a href="#" class="caption lft tp-resizeme slide_thumb_img slide_border"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-270" 
                                data-voffset="102"
                                data-speed="900" 
                                data-start="1500" 
                                data-easing="easeOutExpo">
                                <img src="../../../../../images/app/widgets/icon_android.png" alt="Image 1">
                                |
                            </a>
                            <a href="#" class="caption lft tp-resizeme slide_thumb_img"
                                data-x="center"
                                data-y="center"
                                data-hoffset="-218" 
                                data-voffset="102"
                                data-speed="900" 
                                data-start="1500" 
                                data-easing="easeOutExpo">
                                <img src="../../../../../images/app/widgets/icon_ios.png" alt="Image 2">
                            </a>     
                            <div class="caption lfb tp-resizeme"
                                data-x="right"
                                data-y="bottom"
                                data-hoffset="100"
                                data-speed="900" 
                                data-start="2000"
                                data-easing="easeOutExpo">
                                <img src="../../../../../images/app/widgets/device.png" alt="Image 3">
                            </div>
                        </li>
                        <!-- THE NEW SLIDE -->
                        <li data-transition="fade" data-slotamount="8" data-masterspeed="700" data-delay="6000" data-thumb="">
                            <!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
                            <img src="../../../../../images/app/bg/blank.png" alt="">

                            <div class="caption fulllscreenvideo tp-videolayer"
                                    data-x="0"
                                    data-y="0"
                                    data-speed="600"
                                    data-start="1000"
                                    data-easing="Power4.easeOut"
                                    data-endspeed="500"
                                    data-endeasing="Power4.easeOut"
                                    data-autoplay="true"
                                    data-autoplayonlyfirsttime="false"
                                    data-nextslideatend="true"
                                    data-videowidth="100%"
                                    data-videoheight="100%"
                                    data-videopreload="meta"
                                    data-videomp4="http://themepunch.com/revolution/wp-content/uploads/2014/05/among_the_stars.mp4"
                                    data-videowebm="http://themepunch.com/revolution/wp-content/uploads/2014/05/among_the_stars.webm"
                                    data-videocontrols="none"
                                    data-forcecover="1"
                                    data-forcerewind="on"
                                    data-aspectratio="16:9"
                                    data-volume="mute"
                                    data-videoposter="../../../../../images/app/bg/bg_slider3.jpg">
                            </div>
                          
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-voffset="-100"
                                data-speed="900"
                                data-start="1000"
                                data-easing="easeOutExpo">
                                <h3>Let us show you</h3>
                            </div>
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center"
                                data-voffset="10"
                                data-speed="900"
                                data-start="1500"
                                data-easing="easeOutExpo">
                                <h3 class="red-title">A few things</h3>
                            </div>
                            <div class="caption lft tp-resizeme"
                                data-x="center"
                                data-y="center" 
                                data-voffset="130"
                                data-speed="900" 
                                data-start="2000" 
                                data-easing="easeOutExpo">
                                <a href="#" class="btn-brd-white">Learn More</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Slider END -->
    </section>
    <!-- END INTRO SECTION -->

        <!-- BEGIN ABOUT SECTION -->
        <section id="about">
            <!-- Services BEGIN -->
            <div class="container service-bg">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="services sm-margin-bottom-100">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="../../../../../images/app/widgets/icon1.png" alt="">
                                </div>
                            </div>
                            <h2>We Deliver on Time</h2>
                            <p>Delivering Project on <br> Schedule is our Priority</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services sm-margin-bottom-100">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="../../../../../images/app/widgets/icon2.png" alt="">
                                </div>
                            </div>
                            <h2>Created for all type Devices</h2>
                            <p>Websites that is responsive <br> to all kinds of device or screen</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="services">
                            <div class="services-wrap">
                                <div class="service-body">
                                    <img src="../../../../../images/app/widgets/icon3.png" alt="">
                                </div>
                            </div>
                            <h2>Great individual Design</h2>
                            <p>We are technology artist <br> adn we value great designs</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Services END -->
        </section>
        <!-- END ABOUT SECTION -->

        <!-- BEGIN FEATURES SECTION -->
        <section id="features">
            <!-- Features BEGIN -->
            <div class="features-bg">
                <div class="container">
                    <div class="heading">
                        <h2><strong>Our</strong> Skills and Services</h2>
                        <p>Delivering Quality and Artistic Designs</p>
                    </div><!-- //end heading -->

                    <!-- Features -->
                    <div class="row margin-bottom-70">
                        <div class="col-md-6 md-margin-bottom-70">
                            <div class="features">
                                <img src="../../../../../images/app/widgets/screen1.png" alt="">
                                <div class="features-in">
                                    <h3><a href="#">Supports SEO Website</a></h3>
                                    <p>We make sure that your website is SEO Ready</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features">
                                <img src="../../../../../images/app/widgets/screen2.png" alt="">
                                <div class="features-in">
                                    <h3><a href="#">Awesome design</a></h3>
                                    <p>We call our selfs Artisans for a reason</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- //end row -->
                    <div class="row margin-bottom-80">
                        <div class="col-md-6 md-margin-bottom-70">
                            <div class="features">
                                <img src="../../../../../images/app/widgets/screen3.png" alt="">
                                <div class="features-in">
                                    <h3><a href="#">Responsive Designs</a></h3>
                                    <p>We make sure all website and project are well tested to all devices</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="features">
                                <img src="../../../../../images/app/widgets/screen4.png" alt="">
                                <div class="features-in">
                                    <h3><a href="#">Small to Enterprise ERP Project</a></h3>
                                    <p>We make sure you focus on growing your business and making paper works the eats your time</p>
                                </div>
                            </div>
                        </div>
                    </div><!-- //end row -->
                    <!-- End Features -->
                </div>
            </div>
            <!-- Features END -->
        </section>
        <!-- END FEATURES SECTION -->

        <!-- BEGIN CLIENTS SECTION -->
        <!-- <section id="clients">
            <div class="clients">
                <div class="clients-bg">
                    <div class="container">
                        <div class="heading-blue">
                            <h2>Over <strong>30.000</strong> Customers</h2>
                            <p>and let's see what are they saying</p>
                        </div>

                        <div class="owl-carousel">
                            <div class="item" data-quote="#client-quote-1">
                                <img src="../../../../../images/app/clients/logo1.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-2">
                                <img src="../../../../../images/app/clients/logo2.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-3">
                                <img src="../../../../../images/app/clients/logo3.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-4">
                                <img src="../../../../../images/app/clients/logo4.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-5">
                                <img src="../../../../../images/app/clients/logo5.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-6">
                                <img src="../../../../../images/app/clients/logo6.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-7">
                                <img src="../../../../../images/app/clients/logo7.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-8">
                                <img src="../../../../../images/app/clients/logo8.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-9">
                                <img src="../../../../../images/app/clients/logo9.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-10">
                                <img src="../../../../../images/app/clients/logo10.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-11">
                                <img src="../../../../../images/app/clients/logo11.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-12">
                                <img src="../../../../../images/app/clients/logo12.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-13">
                                <img src="../../../../../images/app/clients/logo13.png" alt="">
                            </div>
                            <div class="item" data-quote="#client-quote-14">
                                <img src="../../../../../images/app/clients/logo14.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="clients-quotes">
                    <div class="container">
                        <div class="client-quote" id="client-quote-1">
                            <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>
                            <h4>Mark Nilson</h4>
                            <span>Director</span>
                        </div>
                        <div class="client-quote" id="client-quote-2">
                            <p>Lorem ipsum dolor sit amet consectetuer adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>
                            <h4>Lisa Wong</h4>
                            <span>Artist</span>
                        </div>
                        <div class="client-quote" id="client-quote-3">
                            <p>Lorem ipsum dolor sit amet consectetuer elit euismod tincidunt aliquam dolor sit amet elit</p>
                            <h4>Nick Dalton</h4>
                            <span>Developer</span>
                        </div>
                        <div class="client-quote" id="client-quote-4">
                            <p>Fusce mattis vestibulum felis, vel semper mi interdum quis. Vestibulum ligula turpis, aliquam a molestie quis, gravida eu libero.</p>
                            <h4>Alex Janmaat</h4>
                            <span>Co-Founder</span>
                        </div>
                        <div class="client-quote" id="client-quote-5">
                            <p>Vestibulum sodales imperdiet euismod.</p>
                            <h4>Jeffrey Veen</h4>
                            <span>Designer</span>
                        </div>
                        <div class="client-quote" id="client-quote-6">
                            <p>Praesent sed sollicitudin mauris. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
                            <h4>Inna Rose</h4>
                            <span>Google</span>
                        </div>
                        <div class="client-quote" id="client-quote-7">
                            <p>Sed ornare enim ligula, id imperdiet urna laoreet eu. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
                            <h4>Jacob Nelson</h4>
                            <span>Support</span>
                        </div>
                        <div class="client-quote" id="client-quote-8">
                            <p>Adipiscing elit euismod tincidunt ut laoreet dolore magna aliquam dolor sit amet consectetuer elit</p>
                            <h4>John Doe</h4>
                            <span>Marketing</span>
                        </div>
                        <div class="client-quote" id="client-quote-9">
                            <p>Nam euismod fringilla turpis vitae tincidunt, adipiscing elit euismod tincidunt aliquam dolor sit amet consectetuer elit</p>
                            <h4>Michael Stawson</h4>
                            <span>Graphic Designer</span>
                        </div>
                        <div class="client-quote" id="client-quote-10">
                            <p>Quisque eget mi non enim efficitur fermentum id at purus.</p>
                            <h4>Liam Nelsson</h4>
                            <span>Actor</span>
                        </div>
                        <div class="client-quote" id="client-quote-11">
                            <p>Integer et ante dictum, hendrerit metus eget, ornare massa.</p>
                            <h4>Madison Klarsson</h4>
                            <span>Director</span>
                        </div>
                        <div class="client-quote" id="client-quote-12">
                            <p>Vestibulum sodales imperdiet euismod.</p>
                            <h4>Ava Veen</h4>
                            <span>Writer</span>
                        </div>
                        <div class="client-quote" id="client-quote-13">
                            <p>Ut sit amet nisl nec dui lobortis gravida ut et neque. Praesent eu metus laoreet, sodales orci nec, rutrum dui.</p>
                            <h4>Sophia Williams</h4>
                            <span>Apple</span>
                        </div>
                        <div class="client-quote" id="client-quote-14">
                            <p>Nam non vulputate orci. Duis sed mi nec ligula tristique semper vitae pretium nisi. Pellentesque nec enim vel magna pulvinar vulputate.</p>
                            <h4>Melissa Korn</h4>
                            <span>Reporter</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- BEGIN PORTFOLIO SECTION -->
        <!-- <section id="portfolio">
            <div class="portfolio">
                <div class="container">
                    <div class="heading">
                        <h2>Theme <strong>Portfolio</strong></h2>
                    </div>

                    <div class="cube-portfolio">
                        <div id="filters-container" class="cbp-l-filters-alignCenter">
                            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item"> All Stuff </div>
                            <div data-filter=".ecommerce" class="cbp-filter-item"> Ecommerce </div>
                            <div data-filter=".admin" class="cbp-filter-item"> Admin Theme </div>
                            <div data-filter=".corporate" class="cbp-filter-item"> Corporate </div>
                            <div data-filter=".retail" class="cbp-filter-item"> Retail </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5 md-margin-bottom-50">
                                <div class="heading-left">
                                    <h2>
                                        <strong>Our Work</strong>
                                        <br>
                                        Lorem ipsum dolor
                                    </h2>
                                    <p>Lorem ipsum dolor sit amet consectetuer ipsum elit sed diam nonummy et euismod tincidunt ut laoreet dolore elit magna aliquam erat et ipsum volutpat magna aliquam  sed diam dolore lorem ipsum dolor sit amet consectetuer ipsum.</p><br>
                                    <a href="#" class="btn-brd-primary">Read More</a>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div id="grid-container" class="cbp-l-grid-agency">
                                    <div class="cbp-item ecommerce">
                                        <div class="cbp-caption">
                                            <div class="cbp-caption-hover-gradient">
                                                <img src="../../../../../images/app/portfolio/01.jpg" alt="">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body portfolio-icons">
                                                        <a href="../../../../../images/app/portfolio/01.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                        <a href="#"><i class="fa fa-file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbp-item admin">
                                        <div class="cbp-caption">
                                            <div class="cbp-caption-hover-gradient">
                                                <img src="../../../../../images/app/portfolio/02.jpg" alt="">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body portfolio-icons">
                                                        <a href="../../../../../images/app/portfolio/02.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                        <a href="#"><i class="fa fa-file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbp-item corporate">
                                        <div class="cbp-caption">
                                            <div class="cbp-caption-hover-gradient">
                                                <img src="../../../../../images/app/portfolio/03.jpg" alt="">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body portfolio-icons">
                                                        <a href="../../../../../images/app/portfolio/03.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                        <a href="#"><i class="fa fa-file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cbp-item retail">
                                        <div class="cbp-caption">
                                            <div class="cbp-caption-hover-gradient">
                                                <img src="../../../../../images/app/portfolio/07.jpg" alt="">
                                            </div>
                                            <div class="cbp-caption-activeWrap">
                                                <div class="cbp-l-caption-alignCenter">
                                                    <div class="cbp-l-caption-body portfolio-icons">
                                                        <a href="../../../../../images/app/portfolio/04.jpg" class="cbp-lightbox" data-title="Title"><i class="fa fa-search"></i></a>
                                                        <a href="#"><i class="fa fa-file"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </section> -->
        <!-- END PORTFOLIO SECTION -->

        <!-- BEGIN PRICING SECTION -->
        <section id="pricing">
            <div class="pricing-bg">
                <div class="container">
                    <div class="heading">
                        <h2>Theme <strong>Pricing</strong></h2>
                    </div><!-- //end heading -->

                    <!-- Pricing -->
                    <div class="row no-space-row">
                        <div class="col-md-4">
                            <div class="pricing no-right-brd">
                                <img src="../../../../../images/app/widgets/icon4.png" alt="">
                                <h4>Basic Website with customized CMS</h4>
                                <span>PhP 45,000</span>
                                <ul class="pricing-features">
                                    <li>Cuztomize CMS</li>
                                    <li>1 Year free hosting</li>
                                    <li>3 Proposal Design</li>
                                    <li>Free 12 Email</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pricing pricing-red">
                                <img src="../../../../../images/app/widgets/icon5.png" alt="">
                                <h4>Business Application Development</h4>
                                <span>Price depends on resource Needed / Month</span>
                                <ul class="pricing-features">
                                    <li>Dedicated Developer</li>
                                    <li>Dedicated Analyst</li>
                                    <li>Dedicated Tester</li>
                                    <li>3 Months Maintenance Free</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="pricing no-left-brd">
                                <img src="../../../../../images/app/widgets/icon6.png" alt="">
                                <h4>Business Application Development and Maintenance</h4>
                                <span>Price depends on resource Needed / Month</span>
                                <ul class="pricing-features">
                                    <li>Dedicated Developer</li>
                                    <li>Dedicated Analyst</li>
                                    <li>Dedicated Tester</li>
                                </ul>
                            </div>
                        </div>
                    </div><!-- //end row -->
                    <!-- End Pricing -->
                </div>
            </div>
        </section>
        <!-- END PRICING SECTION -->

        <!-- BEGIN CONTACT SECTION -->
        <section id="contact">
            <!-- Footer -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="heading-left-light">
                                <h2>Say hello to Teknolohiya</h2>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form">
                                <div class="form-wrap">
                                    <div class="form-wrap-group">
                                        <input type="text" placeholder="Your Name" class="form-control">
                                        <input type="text" placeholder="Subject" class="border-top-transparent form-control">
                                    </div>                
                                    <div class="form-wrap-group border-left-transparent">
                                        <input type="text" placeholder="Your Email" class="form-control">
                                        <input type="text" placeholder="Contact Phone" class="border-top-transparent form-control">
                                    </div>                
                                </div>
                            </div>
                            <textarea rows="8" name="message" placeholder="Write comment here ..." class="border-top-transparent form-control"></textarea>
                            <button type="submit" class="btn-danger btn-md btn-block">Send it</button>
                        </div>
                    </div><!-- //end row -->
                </div>
            </div>
            <!-- End Footer -->

            <!-- Footer Coypright -->
            <div class="footer-copyright">
                <div class="container">
                    <h3>Teknolohiya</h3>
                    <ul class="copyright-socials">
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                    <P>copyrights Teknolohiya Artisans</P>
                </div>
            </div>
            <!-- End Footer Coypright -->
        </section>
        <!-- END CONTACT SECTION -->
    </div>
    <!-- END MAIN LAYOUT -->
    <a href="#intro" class="go2top"><i class="fa fa-arrow-up"></i></a>

@endsection


@section('buttom_scripts')

@stop
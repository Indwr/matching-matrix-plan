<!DOCTYPE html>
<html lang="en">
<?php
	$this->load->view('common/header');
	?>
<body>
   <?php $this->load->view('top-nav'); ?>
 <!-- RIGHT MENU -->
 <style>
 .br-top {

	 height: auto !important;

}
.info-box--column-centered .info-box-thumb
{    width: 180px;}
 </style>
 <div class="modal fade window-popup right-menu-popup" id="right-menu" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="right-menu">
                    <div class="user-menu-close" data-dismiss="modal">
                        <div class="user-menu-content">
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="widget w-info">
                        <a class="site-logo" href="index.html">
                            <!-- MAIN HEADER RESPONSIVE LOGO IMAGE-->
                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/images/logo.png" alt="logo" width="70">
                            <!-- /MAIN HEADER RESPONSIVE LOGO IMAGE-->
                            <div class="logo-text">
                                <div class="logo-title"><span class="weight-black">X</span>Bulon</div>
                                <div class="logo-sub-title">Web</div>
                            </div>
                        </a>
                        <p class="widget-text">Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius est etiam processus dynamicus vestibulum enim.</p>
                    </div>
                    <div class="widget w-login">
                        <h4 class="widget-title">Sign In to Your Account</h4>
                        <form method="post">
                            <div class="form-item">
                                <input placeholder="Username or Email" type="text">
                            </div>
                            <div class="form-item">
                                <input placeholder="Password" type="password">
                            </div>
                            <div class="form-item">
                                <div class="remember-wrap">
                                    <label class="crumina-module crumina-checkbox control--checkbox">Remember Me
                                        <input type="checkbox">
                                        <span class="control__indicator"></span>
                                    </label>



                                    <a href="#">Lost your password?</a>

                                </div>

                            </div>

                            <div class="form-item">

                                <button class="crumina-button button--dark button--l w-100">AUTHORIZE</button>

                            </div>

                        </form>



                    </div>



                    <div class="widget w-contacts">



                        <h4 class="widget-title">Get In Touch</h4>

                        <p class="contacts-text">Lorem ipsum dolor sit amet, duis metus ligula amet in purus, vitae donec vestibulum enim.</p>



                        <div class="contact-item">

                            <img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon1.png" alt="phone">

                            <div class="content">

                                <a href="#" class="title">8 800 567.890.11</a>

                                <p class="sub-title">Mon-Fri 9am-6pm</p>

                            </div>

                        </div>



                        <div class="contact-item">

                            <img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon2.png" alt="mail">

                            <div class="content">

                                <a href="#" class="title">info@topten.com</a>

                                <p class="sub-title">online support</p>

                            </div>

                        </div>



                        <div class="contact-item">

                            <img loading="lazy"  class="crumina-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon3.png" alt="location">

                            <div class="content">

                                <a href="#" class="title">Melbourne, Australia</a>

                                <p class="sub-title">795 South Park Avenue</p>

                            </div>

                        </div>



                    </div>



                </div>

            </div>

        </div>

    </div>

</div>

<!-- /RIGHT MENU -->



<!-- SEARCH POPUP -->

<div class="modal fade window-popup popup-search-popup" id="popup-search" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered" role="document">

        <div class="modal-content">



            <div class="modal-body">

                <div class="container">

                    <div class="row">

                        <form class="search-popup-form">

                            <input class="search-popup-input" placeholder="What are you looking for?" type="text" autofocus>

                            <button type="submit" class="search-popup-enter">

                                <svg class="crumina-icon" width="35" height="35">

                                    <use xlink:href="#icon-enter"></use>

                                </svg>

                            </button>

                            <div class="search-popup-close close" data-dismiss="modal">

                                <svg class="crumina-icon" width="20" height="20">

                                    <use xlink:href="#icon-close"></use>

                                </svg>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<!-- /SEARCH POPUP -->





<!-- MAIN CONTENT WRAPPER -->

<div class="main-content-wrapper">





    <section class="crumina-module crumina-module-slider crumina-main-slider">

        <!--Prev next buttons-->



        <div class="swiper-btn-next">

            <svg class="crumina-icon" width="40" height="30">

                <use xlink:href="#icon-nav-next"></use>

            </svg>

        </div>



        <div class="swiper-btn-prev">

            <svg class="crumina-icon" width="40" height="30">

                <use xlink:href="#icon-nav-prev"></use>

            </svg>

        </div>



        <div class="swiper-container" data-effect="fade" data-show-items="1" data-change-handler="thumbsParent" data-prev-next="1" data-autoplay="4000">



            <!-- Additional required wrapper -->

            <div class="swiper-wrapper">

                <!-- Slides -->

                <div class="swiper-slide bg-grey-theme">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100"> You are welcome to the official website of Xbulon</h2>



                                    <p class="slider-content-text" data-swiper-parallax="-200">Xbulon is your reliable partner and a sure hub for all important need of everyone. In Xbulon we give the platform to transact and also get quick help whenever and however you need it.</p>



                                    <a href="04_service_details_seo.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>



                                </div>



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/01-slide.svg" width="980" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>



                <div class="swiper-slide bg-primary-themes">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0">



                                <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100">WELCOME TO XBULON

                                        <span class="c-white">You are welcome to the official website of Xbulon</span></h2>



                                    <p class="slider-content-text c-white" data-swiper-parallax="-200">You are enabled to transact E-Commerce, Real Estate, Digital Currencies, Network Marketing, Health & Organic Products and also get Services of e-Doctors, e-Counselors, Mediators & Negotiators and Other Special Services; Projects Management, Gas & Steam Turbine Engineering Building and Maintenance,. </p>



                                    <div class="universal-btn-wrapper">

                                        <a href="05_service_details_localseo.html" class="crumina-button button--dark button--l">View Details</a>

                                        <a href="https://crumina.net/html-templates/" class="crumina-button button--white button--bordered button--with-icon button--icon-right button--l">

                                            PURCHASE NOW

                                            <svg class="crumina-icon" width="12" height="10">

                                                <use xlink:href="#icon-arrow-right"></use>

                                            </svg>

                                        </a>

                                    </div>



                                </div>



                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/02-slide.svg" alt="Case">

                                </div>

                            </div>



                        </div>

                    </div>



                </div>



                <div class="swiper-slide bg-red-themes">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0">

                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/03-slide.svg" alt="Case">

                                </div>

                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">



                                <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100">WELCOME TO XBULON</h2>



                                    <p class="slider-content-text c-white" data-swiper-parallax="-200">For any of the services mentioned, we have trusted hands and specialists that are ever ready and diligent to give you the best services/attention that will meet your need. So when you need someone to talk to and confide with, we are here for you. You are welcome to win with us!</p>



                                    <div class="universal-btn-wrapper">

                                        <a href="06_service_details_social_media_marketing.html" class="crumina-button button--dark button--l">VIEW DETAILS</a>

                                        <a href="06_service_details_social_media_marketing.html" class="crumina-button button--white button--bordered button--l">

                                            CHECK DETAILS

                                        </a>

                                    </div>



                                </div>



                            </div>



                        </div>

                    </div>



                </div>



                <div class="swiper-slide bg-yellow-themes">



                    <div class="container">

                        <div class="row align-items-center">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center">



                                <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100">WELCOME TO XBULON</h2>



                                    <p class="slider-content-text c-white" data-swiper-parallax="-200">Xbulon e-Commerce is where you are helped to upload and sell your products using our vast network platform, owing to the number of traffic visiting the site on daily basis, you’re sure of quick sells of your goods. Also our Network market Business plan is programmed to run on a simple matrix structure, which will enable you to easily roll over your Networking Account over and over again within a short period. You are also provided with numerous packages and activities to help you meet your health/ wealth planned goals.</p>



                                    <div class="universal-btn-wrapper">

                                        <a href="https://crumina.net/html-templates/" class="crumina-button button--dark button--l">BUY TOPTEN</a>

                                        <a href="07_service_email_marketing.html" class="crumina-button button--dark button--bordered button--l">CHECK DETAILS</a>

                                    </div>



                                </div>



                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/04-slide.svg" width="940" alt="SEO">

                                </div>



                            </div>



                        </div>

                    </div>



                </div>



                <div class="swiper-slide bg-green-themes">



                    <div class="container">

                        <div class="row align-items-center">



                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0">



                                <div class="slider-content">



                                    <h2 class="h1 slider-content-title" data-swiper-parallax="-100">WELCOME TO XBULON</h2>



                                    <p class="slider-content-text c-white" data-swiper-parallax="-200">Our system is designed to help you achieve your set targets and this is because we have structures in place to enable you doing that.  We believe that anyone that sincerely wants to enjoy steady health and wealth should join in this e-Commerce Network Marketing Business..</p>



                                    <div class="universal-btn-wrapper">

                                        <a href="https://crumina.net/html-templates/" class="crumina-button button--dark button--l">BUY TOPTEN</a>

                                        <a href="08_service_ppc_management.html" class="crumina-button button--white button--bordered button--l">VIEW DETAILS</a>

                                    </div>



                                </div>



                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                                <div class="slider-thumb" data-swiper-parallax="-400" data-swiper-parallax-duration="600">

                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/05-slide.svg" alt="Case">

                                </div>

                            </div>



                        </div>

                    </div>



                </div>



            </div>



            <!--Pagination tabs-->



            <div class="slider-slides main-slider-slides">

                <div class="main-slider-slides-wrap">

                    <div class="slides-item bg-grey-theme swiper-slide-active">

                        <div class="h5 slides-item-title">WELCOME TO XBULON</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon34.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-primary-themes">

                        <div class="h5 slides-item-title">E-Commerce</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon35.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-red-themes">

                        <div class="h5 slides-item-title">Win with us!</div>

                        <div class="slides-item-text"></div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon36.png"  alt="icon">

                    </div>

                    <div class="slides-item bg-yellow-themes">

                        <div class="slides-item-text">Financial target in a shortest of time and effort</div>

                        <img loading="lazy" class="slides-item-icon" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon37.png"  alt="icon">

                    </div>


                </div>

            </div>



        </div>



    </section>



    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top active">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon25.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                                <h5 class="info-box-title font-weight-normal">Xbulon Organics</h5>

                            <p class="info-box-text text-justify">We are focused on producing the best of organic products using raw materials sourced from nature to nurture your health and improve everyday living.

<br>We take delight in providing a quick and easy access to both curative and preventive health products to boost your overall health and well-being.

<br>Our products that is the Xbulon Organics products are powerful and effective, without toxins, chemicals or preservatives. They are made using nature's best resources for a healthier you.
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon26.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Properties</h5>

                            <p class="info-box-text text-justify">In this system visitors are assured that any property bought from this platform is highly assured and authenticated and the price moderate.
 <br>This platform will financially empower members to transact and earn a commission up to 20% by referring someone to buy or sell properties displayed in this website
<br>Other than buying and selling of properties, we give people the opportunity to invest into Real estate. We have various stages one can invest into real estate as stated here;
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon27.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Xbulon Gas & Steam Turbine</h5>

                            <p class="info-box-text text-justify">We have a Team of highly skilled Engineers who are experts in the building and maintenance of gas and steam turbine of any capacity.
<br>We deliver a high performance gas and steam turbine of any capacity anywhere anytime<br>
<b>Nature:</b><br>
The Equipment's are steam turbines, high speed centrifugal pumps.<br>
Overhauls, repairs, reconditioning and lots more.<br>
We create opportunity for our Members to earn good commission, when bring in client in this platform to transact any of the services here give here.</p>

                        </div>

                    </div>

                </div>



                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon28.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Xbulon E-Commerce</h5>

                            <p class="info-box-text text-justify">Xbulon online stores is where you can get every of your necessities just by a click and get the goods delivered to you on time.
<br>Also we give the ample opportunity to advertise and sell your goods taking the advantage of our wide range of network/ customers base from all over the world, all system enjoys a huge amount of traffic from visitor/buyers from all over the continents.
<br>Be confident that whatever you purchase from the admin here is proven and you’re sure of the refund of your money if your request/choice is wrongly delievered.
</p>

                        </div>

                    </div>

                </div>
                  <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Project & Development Management</h5>

                            <p class="info-box-text text-justify">Xbulon Project and Development Management; is a platform from where you can confidently execute all your ideal projects irrespective of your location and where you want your project to be sited.
<br>In this platform we give you real value for your money and deliver on time, eliminating waste managing your budget effectively.
<br>We also manage your capital resources to give you a good return on investment and members also earn good commission whenever they bring in clients execute their project through this platform.
</p>

                        </div>

                    </div>

                </div>


                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Digital Money</h5>

                            <p class="info-box-text text-justify">We buy/sell digital currencies, crypto currency and all forms of payment gateways, and our rate is very normal. We also give our members the opportunity to make good commission per transaction by bringing in clients that will buy/sell their digital currencies.
</p>

                        </div>

                    </div>

                </div>













                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Project Management</h5>

                            <p class="info-box-text text-justify">we help member and supervise projects of our members and also help they get the value of the project they give out to others. Members also earn good commission when the client project to the company.</p>

                        </div>

                    </div>

                </div> -->
                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Negotiator & Mediator</h5>

                            <p class="info-box-text text-justify">we have profession Lawyers and Associates who are very much experienced in the job. We assure you that you be highly satisfied in these contexts.</p>

                        </div>

                    </div>

                </div> -->


                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-md-0 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon29.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Digital Money</h5>

                            <p class="info-box-text text-justify">here visitors can buy and sell digital currencies at good rate. Members who are interested will be able to transact here earning good commission.</p>

                        </div>

                    </div>

                </div> -->

                <!-- <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 element-anime-fadeInUp-js">

                    <div class="crumina-module br-top">

                        <div class="info-box-thumb mb-4">

                            <img loading="lazy" src="<?php echo base_url();?>front_assets/img/demo-content/icons/icon30.svg"  alt="video">

                        </div>

                        <div class="info-box-content">

                            <h5 class="info-box-title font-weight-normal">Organic Herbal Products</h5>

                            <p class="info-box-text text-justify">our teas, herbs and, all the products we have are both preventive and curative.</p>

                        </div>

                    </div>

                </div> -->



            </div>

        </div>

    </section>



    <section class="large-padding-top section-image-bg-black section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12 m-auto">

                    <header class="crumina-module crumina-heading heading--white mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Your Seo Score?</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING TEXT -->

                        <div class="heading-text element-anime-fadeInUp-js">Check your website’s SEO problems for free!</div>

                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                    <form class="seo-score-form mb-5">

                        <div class="form-inline-inputs-wrap element-anime-fadeInUp-js">

                            <input class="input--dark" name="site" type="text" placeholder="Type in your Website URL">

                            <input class="input--dark" name="email" type="email" placeholder="Your email address">

                        </div>

                        <button class="crumina-button button--primary button--l element-anime-opacity-js">CHECK UP</button>

                    </form>

                </div>

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 align-center m-auto">

                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/06-seo-score.svg" alt="Case" class="element-anime-fadeInUp-js">

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row align-items-end">

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">

                    <header class="crumina-module crumina-heading mb-4">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Things That You Can Really Achieve Through This System</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- CRUMINA HEADING TEXT -->

                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div> -->

                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                    <ul class="crumina-list list--standard fill-red-themes mb-4 element-anime-fadeInUp-js">



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

                            In this system you can;

                        </li>

                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Build your strong network base



                        </li>

                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Develop and sell your ideal to the world


                        </li>

                        <!-- /LIST STANDARD ITEM -->



                        <!-- LIST STANDARD ITEM -->

                        <li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Buy/Sell your “Digital Currencies” without hesitation


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet good DOCTORS that will give you the best medical advice and help


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

													Meet Counselors and helpers to guide you through in your challenges


                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet Mediators and Negotiator to stand for you



                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet our Engineers to Build/Maintain Gas & Steam Turbines & you earn from it




                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Meet intelligent, honest Realtors and Architects for you housing project





                        </li>

												<li>

                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Our IT partner is one of the best in the world, will give you the best interactive website






                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Get your projects executed to meet your desired taste and on time
                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Build your business and market your products from local scene to the international

                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Buy organic products and get 10% to 15% discount plus commissions


                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														We offer you space in our system to run your personal business advert to millions of viewers free



                        </li>

												<li>
                            <svg class="crumina-icon" width="12" height="9">

                                <use xlink:href="#icon-check"></use>

                            </svg>

														Deliver your Items and packages to any part of Canada, Norway, Sweden, Netherlands, India, Mauritius, Nigeria, Ghana, Togo, Liberia, Philippines, New Zealand, Cameroon, Tanzania, Uganda, South African, etc




                        </li>

                        <!-- /LIST STANDARD ITEM -->



                    </ul>



                    <div class="universal-btn-wrapper element-anime-opacity-js">

                        <a href="03_services.html" class="crumina-button button--dark button--bordered button--l">LEARN MORE</a>

                        <!-- <a href="34_testimonials.html" class="crumina-button button--primary button--l">GET A QUOTE</a> -->

                    </div>

                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 mt-4 mt-md-0">

                    <img loading="lazy"  class="element-anime-opacity-js" src="<?php echo base_url();?>front_assets/img/demo-content/icons/07-we-offer.svg" alt="Case">

                </div>

            </div>

        </div>

    </section>



    <section class="section-image-bg-grey section-anime-js">

        <div class="row no-gutters align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-1 order-md-0 element-anime-opacity-js">

                <div class="post-thumb format-video">

                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/posts/blog15.jpg" alt="Post">

                    <div class="overlay"></div>

                    <a href="https://www.youtube.com/watch?v=bTqVqk7FSmY" class="play-video js-popup-iframe">

                        <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/theme-content/icons/play.png" alt="play">

                    </a>

                </div>

            </div>

            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 order-0 order-md-0">

                <div class="row justify-content-center align-items-center p-5">

                    <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 align-center">

                        <header class="crumina-module crumina-heading mb-4">

                            <!-- CRUMINA HEADING TITLE -->

                            <div class="title-text-wrap">

                                <h2 class="heading-title element-anime-fadeInUp-js">Watch Our Video</h2>

                            </div>

                            <!-- /CRUMINA HEADING TITLE -->



                            <!-- CRUMINA HEADING DECORATION -->

                            <div class="heading-decoration element-anime-fadeInUp-js"></div>

                            <!-- /CRUMINA HEADING DECORATION  -->

                        </header>



                        <p class="mb-4 element-anime-fadeInUp-js">Our system is very rewarding and interactive to everyone who will join us. We have good features that can help members do business as much as they desire and our payment mode is excellent.</p>



                        <a href="02_about_us.html" class="crumina-button button--dark button--l element-anime-opacity-js">ABOUT US</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding bg-mountains section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto align-center">

                    <header class="crumina-module crumina-heading mb-5">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Packages</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- CRUMINA HEADING TEXT -->

                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div> -->

                        <!-- /CRUMINA HEADING TEXT -->

                    </header>

                </div>

            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Bronze.png" alt="Objective">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Objective</h5> -->

                            <p class="info-box-text">Bronze members are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. Also, you’ll have free E-Health consultation with the specialist.
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Silver.png" alt="Strategy">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Strategy</h5> -->

                            <p class="info-box-text">Silver member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. You a more advantage over Bronze member.
</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Gold.png" alt="Technology">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Technology</h5> -->

                            <p class="info-box-text">Gold member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. Gold members have more advantages over Silver and Bronze members
.</p>

                        </div>

                    </div>

                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-info-box info-box--column-centered">

                        <div class="info-box-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>images/Diamond.png" alt="Analytics">

                        </div>

                        <div class="info-box-content">

                            <!-- <h5 class="info-box-title">Analytics</h5> -->

                            <p class="info-box-text">Diamond member are eligible to do all the businesses we have in this Platform and also earn all the benefits and commissions. This is the climax of it all, members here have great advantages over all other members</p>

                        </div>

                    </div>

                </div>

            </div>

            <div class="row mt-5 justify-content-center align-center">

                <div class="col-lg-8 col-md-10 col-sm-12 col-xs-12">

                    <div class="universal-btn-wrapper element-anime-opacity-js">

                        <a href="36_pricing_tables.html" class="crumina-button button--dark button--l">MORE INFO</a>

                        <a href="https://crumina.net/html-templates/" class="crumina-button button--primary button--l">GET STARTED!</a>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <div class="medium-padding section-image-bg-lime section-anime-js">

        <div class="container">

            <div class="row">



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-counter-item">

                        <div class="counter-numbers counter c-white">

                            <span class="counter-value" data-count="96" data-duration="1500"></span>

                            <div class="units">%</div>

                        </div>

                        <span class="counter-title">Client Retention</span>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-counter-item">

                        <div class="counter-numbers counter c-white">

                            <span class="counter-value" data-count="10" data-duration="1000"></span>

                        </div>

                        <span class="counter-title">Years of Service</span>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-counter-item">

                        <div class="counter-numbers counter c-white">

                            <span class="counter-value" data-count="230" data-duration="1500"></span>

                            <div class="units">+</div>

                        </div>

                        <span class="counter-title">Professionals</span>

                    </div>

                </div>



                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-counter-item">

                        <div class="counter-numbers counter c-white">

                            <span class="counter-value" data-count="6815"></span>

                        </div>

                        <span class="counter-title">Satisfied Clients</span>

                    </div>

                </div>



            </div>

        </div>

    </div>



    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto">

                    <header class="crumina-module crumina-heading mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Unique Services</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <!-- <div class="heading-text element-anime-fadeInUp-js">Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium.</div>
 -->


                    </header>

                </div>

            </div>

            <div class="row justify-content-center">

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case3.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="12_project_details_ver_01.html" class="h6 case-item-title">Xbulon Tea</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">Ecommerce</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case4.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="13_project_details_ver_02.html" class="h6 case-item-title">e-Doctor/Conselor</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">SEO</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-case-item">

                        <a href="#" class="case-item-thumb">

                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/case-studies/case5.jpg" alt="Case">

                        </a>

                        <div class="case-item-content">

                            <a href="12_project_details_ver_01.html" class="h6 case-item-title">X-Series & Natural</a>

                            <div class="case-item-cat">

                                <!-- <a href="#">Food & Drinks</a> -->

                            </div>

                        </div>

                    </div>

                </div>

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 align-center mt-5 element-anime-opacity-js">

                    <a href="11_case_studies.html" class="crumina-button button--dark button--l">ALL PROJECTS</a>

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding bg-yellow-themes section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 col-md-12 mb-4 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-module-slider pagination-bottom-center">

                        <div class="swiper-container" data-show-items="1" data-prev-next="1" data-effect="fade" data-loop="false">



                            <div class="swiper-wrapper">



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Business is like a wheel barrow, nothing happens until you start pushing </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Robert Kiyosaki</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">people never ask if things will work. They are willing to try and find out</h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Brad Gosse</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">If I would be given a chance to start all over again, I would choose “NETWORK MARKETING” </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Bill gates.</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>


																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Move out of your comfort zone. You can only grow if you are willing to feel awkward and uncomfortable when you try something new </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Brian Tracy</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">If you really want to do something, you’ll find a way. If you don’t you’ll find an excuse </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">Jim Rohn
</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">To achieve anything of lasting value, you must partner with others </h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">John Maxwell</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

																<div class="swiper-slide">

                                    <div class="crumina-testimonial-item testimonial-item-modern">

                                        <div class="author-avatar" data-swiper-parallax="-50">

                                            <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author8.png" alt="Author">

                                        </div>

                                        <div class="testimonial-content">

                                            <h5 class="testimonial-text" data-swiper-parallax-x="-200">Opportunities are like sunrise. If you wait for long you miss them</h5>

                                            <div class="author-quote-wrap" data-swiper-parallax="-50">

                                                <div class="post-author author vcard">

                                                    <div class="author-text">

                                                        <a href="#" class="post-author-name fn">William Arthur ward</a>

                                                        <!-- <div class="author-prof">Lead Manager</div> -->

                                                    </div>

                                                </div>

                                                <div class="quote">

                                                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/quote-dark.png" alt="Quote">

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>



                        <!-- If we need pagination -->

                        <div class="swiper-pagination swiper-pagination-dark"></div>

                    </div>

                </div>



                <div class="col-lg-5 col-md-12 element-anime-fadeInUp-js">

                    <h3>Helpful Quotes</h3>





                    <div class="crumina-module js-animate-icon medium-padding-top">



                        <svg class="crumina-icon c-dark" version="1.1" width="320" height="95" viewBox="0 0 640 190" preserveAspectRatio="xMidYMid meet" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">

                            <g id="id661d7e3efaca5682dc50d402" mask="url(#canvasMask)">

                                <path id="Step01" d="M 83.295,170 C 118.295,152 120.295,117.003 19.295,174 C -81.705,231 78.295,197 78.295,197 C 78.295,197 98.295,189 115.295,192 M 83.295,170 Z" style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,22.1376,-98.96839999999999)" class="Step01"></path>

                                <path id="Step02" d="M 147.295,196 C 151.295,202 155.295,207 155.295,207 " style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,-2.5818999999999903,-109.551)" class="Step02"></path>

                                <path id="Step03" d="M 195.295,144 C 189.295,166 182.295,186 177.295,197 M 195.295,144 Z" style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.7130999999999972,-93.051)" class="Step03"></path>

                                <path id="Step04" d="M 148.295,141 C 158.295,97 366.315,126.739 178.295,190.999 C 99.295,217.999 196.305,173.086 221.294,166.001 C 243.607,159.676 258.289,162.001 273.289,165.001 " style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.3153999999999826,-93.6399)" class="Step04"></path>

                                <path id="Step05" d="M 253.295,155 C 245.295,170 241.295,180 248.295,185 M 253.295,155 Z" style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.7128999999999905,-93.051)" class="Step05"></path>

                                <path id="Step06" d="M 260.295,124 C 259.295,129 263.295,134 263.295,134 M 260.295,124 Z" style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.7130999999999972,-93.051)" class="Step06"></path>

                                <path id="Step07" d="M 263.295,158 C 257.295,167 254.295,171 255.295,180 C 256.295,189 270.295,170 279.295,164 C 288.597,157.801 312.318,161.029 285.294,183.999 C 280.294,195.999 303.077,163.404 330.077,165.404 M 263.294,158.002 " style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.931100000000015,-92.4558)" class="Step07"></path>

                                <path id="Step08" d="M 361.295,110 C 334.295,110 300.192,154.686 310.295,184.998 C 311.295,187.998 315.878,175.651 329.293,160 C 335.293,153 329.293,147 327.293,158 C 323.854,176.925 319.842,185.999 329.293,195.999 C 331.353,198.179 333.292,201.997 344.292,196.997 C 351.467,190.191 357.589,177.576 367.29,180.001 C 379.29,183.001 390.29,183.001 402.29,172.001 C 416.467,159.004 406.059,150.423 420.289,152.003 C 447.289,155.003 468.289,145.003 490.289,156.003 C 512.289,167.003 414.227,290.355 333.291,276.004 C 289.258,268.197 511.292,95.006 628.292,99.006 " style="fill: none; stroke: currentColor; stroke-width: 3.0; stroke-opacity: 1.0" transform="matrix(1.0,0.0,0.0,1.0,1.713200000000029,-93.0515)" class="Step08"></path>

                            </g>

                        </svg>



                    </div>

                </div>



            </div>

        </div>

    </section>



    <section class="large-padding bg-grey-theme section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 col-xs-12 m-auto">

                    <header class="crumina-module crumina-heading mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Our Business Networking Packages</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <div class="heading-text element-anime-fadeInUp-js">Subscribe to any of these and start will winning with us</div>



                    </header>

                </div>

            </div>

            <div class="row justify-content-center">

							<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

									<div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

											<div class="main-pricing-content">

													<div class="pricing-thumb">

															<img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/pricing1.svg" alt="Personal">

													</div>



													<h5 class="pricing-title">Bronze</h5>



													<ul class="pricing-tables-position">

															<li class="position-item">

																	<span class="font-weight-bold"></span> Referral Bonus

															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Welcome Pack

															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Direct Placement

															</li>

															<li class="position-item">
																<span class="font-weight-bold"></span> Spillover


															</li>

															<li class="position-item">

																	<span class="font-weight-bold"></span> Promo/Bonus

															</li>

													</ul>



													<h2 class="rate">$<span class="pricing-price">10</span></h2>



													<a href="36_pricing_tables.html" class="crumina-button button--dark button--l">JOIN NOW!</a>



											</div>



									</div>

							</div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/pricing1.svg" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Silver</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">19</span></h2>



                            <a href="36_pricing_tables.html" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

                </div>

								<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/pricing1.svg" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Gold</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">36</span></h2>



                            <a href="36_pricing_tables.html" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

                </div>

								<div class="col-lg-3 col-md-6 col-sm-12 mb-3 mb-lg-0 element-anime-fadeInUp-js">

                    <div class="crumina-module crumina-pricing-tables-item pricing-tables-item-standard">

                        <div class="main-pricing-content">

                            <div class="pricing-thumb">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/icons/pricing1.svg" alt="Personal">

                            </div>



                            <h5 class="pricing-title">Diamond</h5>



                            <ul class="pricing-tables-position">

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Referral Bonus

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Welcome Pack

                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Direct Placement

                                </li>

                                <li class="position-item">
																	<span class="font-weight-bold"></span> Spillover


                                </li>

                                <li class="position-item">

                                    <span class="font-weight-bold"></span> Promo/Bonus

                                </li>

                            </ul>



                            <h2 class="rate">$<span class="pricing-price">70</span></h2>



                            <a href="36_pricing_tables.html" class="crumina-button button--dark button--l">JOIN NOW!</a>



                        </div>



                    </div>

                </div>



            </div>

        </div>

    </section>



    <section class="large-padding section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col">

                    <header class="crumina-module crumina-heading mb-5">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Latest From the Blog</h2>

                            <a href="14_blog.html" class="read-more element-anime-fadeInUp-js" title="See all Projects">

                                Read Our Blog

                                <svg class="crumina-icon" width="15" height="9">

                                    <use xlink:href="#icon-arrow-think"></use>

                                </svg>

                            </a>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                    </header>



                    <div class="crumina-module crumina-module-slider pagination-bottom-center">

                        <div class="swiper-container" data-show-items="3" data-prev-next="1">



                            <div class="swiper-wrapper">



                                <div class="swiper-slide element-anime-fadeInUp-js">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="15_post_details.html" class="h6 post-title entry-title">How To Create A Successful Digital Marketing Blog: Asking Experts</a>



                                        <div class="post-text">

                                            It's not much of a secret that blogs are necessary for the efficient promotion of your business and creating your company's image.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide element-anime-fadeInUp-js">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="16_video_post_format.html" class="h6 post-title entry-title">How Well Do You Know Google Algorithms?? Test Your Knowledge With TopTen</a>



                                        <div class="post-text">

                                            Again and again, you hear about new Google algorithm updates that aim to show the most helpful and relevant content in search results.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide element-anime-fadeInUp-js">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="15_post_details.html" class="h6 post-title entry-title">How To Create A Content Plan</a>



                                        <div class="post-text">

                                            The first rule of the content plan is that there isn't the only correct way to gather topics for the content plan.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="15_post_details.html" class="h6 post-title entry-title">How To Create A Successful Digital Marketing Blog: Asking Experts</a>



                                        <div class="post-text">

                                            It's not much of a secret that blogs are necessary for the efficient promotion of your business and creating your company's image.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="16_video_post_format.html" class="h6 post-title entry-title">How Well Do You Know Google Algorithms?? Test Your Knowledge With TopTen</a>



                                        <div class="post-text">

                                            Again and again, you hear about new Google algorithm updates that aim to show the most helpful and relevant content in search results.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="swiper-slide">

                                    <div class="latest-news-item">

                                        <div class="post-additional-info-wrap">

                                            <div class="post-time-reading">

                                                <svg class="crumina-icon" width="20" height="20">

                                                    <use xlink:href="#icon-timer"></use>

                                                </svg>

                                                March 1, 2020

                                            </div>

                                        </div>



                                        <a href="15_post_details.html" class="h6 post-title entry-title">How To Create A Content Plan</a>



                                        <div class="post-text">

                                            The first rule of the content plan is that there isn't the only correct way to gather topics for the content plan.

                                        </div>



                                        <div class="post-author author vcard">

                                            <div class="author-avatar">

                                                <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/demo-content/avatars/author1.png" alt="Author">

                                            </div>

                                            <div class="author-text">

                                                <a href="#" class="post-author-name fn">Liondekam</a>

                                                <div class="post-date">November 18, 2019</div>

                                            </div>

                                        </div>

                                    </div>

                                </div>





                            </div>



                        </div>



                        <!-- If we need pagination -->

                        <div class="swiper-pagination"></div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <section class="large-padding bg-grey-theme section-anime-js">

        <div class="container">

            <div class="row">

                <div class="col-lg-6 col-md-8 col-sm-12 m-auto">

                    <header class="crumina-module crumina-heading mb-5 align-center">

                        <!-- CRUMINA HEADING TITLE -->

                        <div class="title-text-wrap">

                            <h2 class="heading-title element-anime-fadeInUp-js">Our Valuable Clients</h2>

                        </div>

                        <!-- /CRUMINA HEADING TITLE -->



                        <!-- CRUMINA HEADING DECORATION -->

                        <div class="heading-decoration element-anime-fadeInUp-js"></div>

                        <!-- /CRUMINA HEADING DECORATION  -->



                        <div class="heading-text element-anime-fadeInUp-js">Qui mutationem consuetudium.</div>



                    </header>

                </div>

            </div>

            <div class="crumina-module crumina-module-slider navigation-bottom-center">



                <div class="swiper-btn-next element-anime-opacity-js">

                    <svg class="crumina-icon" width="40" height="30">

                        <use xlink:href="#icon-nav-next"></use>

                    </svg>

                </div>



                <div class="swiper-btn-prev element-anime-opacity-js">

                    <svg class="crumina-icon" width="40" height="30">

                        <use xlink:href="#icon-nav-prev"></use>

                    </svg>

                </div>



                <div class="swiper-container" data-show-items="4" data-prev-next="1">



                    <div class="swiper-wrapper">



                        <div class="swiper-slide element-anime-opacity-js">

                            <a href="09_our_clients.html" class="crumina-module clients-item">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/clients/clients1.png" alt="Client">

                            </a>

                        </div>



                        <div class="swiper-slide element-anime-opacity-js">

                            <a href="09_our_clients.html" class="crumina-module clients-item">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/clients/clients2.png" alt="Client">

                            </a>

                        </div>



                        <div class="swiper-slide element-anime-opacity-js">

                            <a href="09_our_clients.html" class="crumina-module clients-item">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/clients/clients3.png" alt="Client">

                            </a>

                        </div>



                        <div class="swiper-slide element-anime-opacity-js">

                            <a href="09_our_clients.html" class="crumina-module clients-item">

                                <img loading="lazy" class="crumina-icon"  src="<?php echo base_url();?>front_assets/img/demo-content/clients/clients4.png" alt="Client">

                            </a>

                        </div>



                    </div>



                </div>



            </div>

        </div>

    </section>



    <!-- SUBSCRIBE SECTION -->

    <section class="medium-padding-top section-image-bg-breez">

        <div class="container">

            <div class="row">

                <div class="col-lg-7 col-md-12 mb-4">

                    <h4 class="subscribe-title">Subscribe to our Newsletter</h4>

                    <p class="subscribe-subtitle text-white">

                        <span class="font-weight-bold">Join Our Newsletter</span> & Marketing Communication. We'll send you news and offers.

                    </p>

                    <form class="subscribe-form">

                        <div class="input-btn--inline">

                            <input class="input--white" type="email" placeholder="Your email address">

                            <button type="button" class="crumina-button button--dark button--l">SUBSCRIBE</button>

                        </div>

                    </form>

                </div>
                <div class="col-lg-4 d-none d-lg-block mt-auto">
                    <img loading="lazy"  src="<?php echo base_url();?>front_assets/img/theme-content/icons/08-subscribe.svg" alt="subscibe">

                </div>

            </div>

        </div>

    </section>

    <!-- /SUBSCRIBE SECTION -->



    <!-- BACK TO TOP -->

    <div class="back-to-top">

        <svg class="crumina-icon">

            <use xlink:href="#icon-back-to-top"></use>

        </svg>

    </div>

    <!-- /BACK TO TOP -->



</div>

<!-- /MAIN CONTENT WRAPPER -->

    <!-- Start Footer
    ============================================= -->
      <?php $this->load->view('common/footer'); ?>
    <!-- End Footer -->

    <!-- jQuery Frameworks
    ============================================= -->
    <?php
	  $this->load->view('common/footer-script');
	  ?>

</body>
</html>

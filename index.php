<?php require_once('head.php'); ?>

<div class="page-wrapper">
    <?php require_once('header.php'); ?>

    <div class="form-back-drop"></div>
    <section class="hidden-bar">
        <div class="inner-box">
            <div class="cross-icon"><span class="fa fa-times"></span></div>
            <div class="title">
                <p>BOOK YOUR ARTS</p>
            </div>

            <div class="appointment-form">
                <form method="post" action="sms.php">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Enter Your Name" title="Accept Only Name and Space"
                            pattern="[A-Za-z0-9_ ]{1,150}"
                            onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                            required="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Enter Your Email" required="">
                    </div>
                    <div class="form-group">
                        <input type="text" name="phone" placeholder="Enter Your Mobile"
                            onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40)  || (event.keyCode==46))"
                            pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required="">
                    </div>
                    <div class="form-group">
                        <textarea name="message" placeholder="Enter Your Message" title="Accept Only Name and Space"
                            pattern="[A-Za-z0-9_ ]{1,150}"
                            onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                            required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn_enq" class="theme-btn btn-style-three">Submit now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="banner-section">
        <div style="position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden;">
            <video src="0.2 (2).mp4" autoplay muted playsinline
                style="position: absolute; top:0; left:0; width:100%; height:100%;" controls="false">
            </video>
        </div>
    </section>

    <?php include "aboutus-home.php"; ?>

    <?php include 'cirtificate.php'; ?>

    <?php include 'our-service-home.php'; ?>
    <?php include 'our-service-content.php'; ?>

    <?php include 'client-counter.php'; ?>
    <?php include 'news-media-home.php'; ?>
    <?php include 'photograph-home.php'; ?>

    <?php include 'celebraty-home.php'; ?>

    <!-- <section class="projects-section alternate">-->
    <!--     <div class="auto-container">-->
    <!--<div class="upper-box">-->
    <!--         <div class="auto-container">    -->
    <!--             <div class="sec-title text-center light">-->
    <!--		<p>OUR WORK PROCESS</p>-->
    <!--                 <h2 class="add-more-txt-sub-head-new">Couple Painting</h2>-->
    <!--             </div>-->
    <!--         </div>-->
    <!--     </div>-->

    <!--         <div class="mixitup-gallery">                              -->
    <!--             <div class="filter-list row">-->
    <!--                 <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple1.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--                  <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple2.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple2.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		 <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple3.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple4.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple4.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple5.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple5.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple6.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple6.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12" style="display: inline-block;">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple7.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                               -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple7.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                               -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12" style="display: inline-block;">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple8.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                               -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple8.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                               -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12" style="display: inline-block;">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/couple9.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                               -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/couple9.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                               -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--             </div>-->
    <!--         </div>-->
    <!--     </div>-->
    <!-- </section>-->

    <!--  <section class="projects-section alternate">-->
    <!--     <div class="auto-container">-->
    <!--<div class="upper-box">-->
    <!--         <div class="auto-container">    -->
    <!--             <div class="sec-title text-center light">-->
    <!--		<p>OUR WORK PROCESS</p>-->
    <!--                 <h2 class="add-more-txt-sub-head-new">Divine Painting</h2>-->
    <!--             </div>-->
    <!--         </div>-->
    <!--     </div>-->

    <!--         <div class="mixitup-gallery">                              -->
    <!--             <div class="filter-list row">-->
    <!--                 <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine1.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine1.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--                  <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine2.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine2.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		 <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine3.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine3.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine4.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine4.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine5.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine5.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--		<div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">-->
    <!--                     <div class="image-box">-->
    <!--                         <figure class="image"><img src="images/divine6.jpg" alt=""></figure>-->
    <!--                         <div class="overlay-box">                                -->
    <!--                             <div class="btn-box">-->
    <!--                                 <a href="images/divine6.jpg" class="lightbox-image" data-fancybox="gallery"><i class="fa fa-search"></i></a>-->
    <!--                             </div>                                -->
    <!--                         </div>-->
    <!--                     </div>-->
    <!--                 </div>-->

    <!--             </div>-->
    <!--         </div>-->
    <!--     </div>-->
    <!-- </section>-->

    <?php include 'tastimonials.php'; ?>

    <?php include 'footer.php'; ?>
<?php require_once "head.php"; ?>

<div class="page-wrapper">

    <? include "header.php";?>

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
                            onkeypress="return (event.charCode > 64 &amp;&amp;  event.charCode < 91) || (event.charCode > 96 &amp;&amp; event.charCode < 123) || (event.charCode == 32)"
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
                            onkeypress="return (event.charCode > 64 &amp;&amp;  event.charCode < 91) || (event.charCode > 96 &amp;&amp; event.charCode < 123) || (event.charCode == 32)"
                            required=""></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="btn_enq" class="theme-btn btn-style-three">Submit now</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <section class="page-title" style="background-image:url(images/about.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>News &amp; Magazine Gallery</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/">Home</a>
                    </li>
                    <li>News &amp; Magazine Gallery</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="projects-section alternate">
        <div class="auto-container">
            <div class="upper-box">
                <div class="auto-container">
                    <div class="sec-title text-center light">
                        <h2 class="add-more-txt-sub-head-new">News &amp; Media Updates</h2>
                    </div>
                </div>
            </div>

            <div class="mixitup-gallery">
                <div class="filter-list row maggineimages">
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363641.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363641.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363633.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363633.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363625.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363625.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363619.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363619.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363610.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363610.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363600.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363600.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363590.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363590.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363577.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363577.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="project-block all mix landescape interior col-lg-4 col-md-6 col-sm-12">
                        <div class="image-box">
                            <figure class="image"><img
                                    src="https://web.archive.org/web/20240910202215im_/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363571.jpg"
                                    alt="Rajan Maluja Arts"></figure>
                            <div class="overlay-box">
                                <div class="btn-box">
                                    <a href="https://web.archive.org/web/20240910202215/https://www.rajanmaluujaarts.com/images/upload/gallery/banner/1678363571.jpg"
                                        title="Rajan Maluja Arts" class="lightbox-image" data-fancybox="gallery"><i
                                            class="fa fa-search"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <p><strong>Rajan Maaluja</strong> is an example of expressive arts and a painter of global notoriety. He has
                conducted many exhibitions and shows of his works of art in India and in
                other countries too, like the U.S., U. K., Italy, France and more. He has dominated different fields of
                expressive arts, like picture painting, oil
                painting, dynamic work of art, charcoal artwork, Tanjore painting and contemporary workmanship. He has
                formed a group of sprouting craftsmen called
                <strong>RAJAN MAALUJA ARTS</strong>. Art has no limits. Art is infinite. When it comes to India, here
                you will find artists step by step. Know the journey of famous painter</p>
        </div>
    </section>

    <?php require_once 'footer.php'; ?>
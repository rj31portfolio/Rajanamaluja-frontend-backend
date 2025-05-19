<?php require_once "head.php"; ?>
<div class="page-wrapper">

    <?php include 'header.php'; ?>

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
                    <h1>About Us</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="auto-container">
            <div class="row no-gutters">
                <div class="content-column col-lg-8 col-md-12 col-sm-12">
                    <span class="add-new-cc-home">BEST PORTRAIT &amp; SKETCH ARTIST IN DELHI NCR</span>
                    <h1 class="add-home-head-name">RAJAN MALUUJA ARTS</h1>
                    <p class="add-txt-home-about">Rajan Maaluja is an example of expressive arts and a painter of global
                        notoriety. He has conducted many exhibitions and shows of his works of art in India and in other
                        countries too, like the U.S., U. K., Italy, France and more. He has dominated different fields
                        of expressive arts, like picture painting, oil painting, dynamic work of art, charcoal artwork.
                    </p>

                    <h2 class="add-home-head-name">EARLY LIFE</h2>
                    <p class="add-txt-home-about">Rajan Maaluja got keen on drawing and painting from fifth grade
                        itself. As a youngster, he adored making works of art of Hindu Deities, primarily Lord Krishna
                        and Lord Ganapati. His fascination with expressive arts continued expanding as he continued to
                        move up in his school instruction.</p>

                    <h2 class="add-home-head-name">HIS CAREER</h2>
                    <p class="add-txt-home-about">Subsequent to passing his certification course, Bachelor in Fine Arts
                        in First Division and he began showing the craft of attracting and painting to youngsters just
                        as elders. He empowered and supported his students to participate in different artwork rivalries
                        where they won many honours and acknowledgements. In 2015 he framed a group composed primarily
                        of his learners known as RAJAN MAALUJA ARTS. Some of the Fine Arts works created by this group
                        are unrivalled and unmatched in excellence even today.</p>

                    <div align="right"><img src="images/rajan-maluuja-signature.png" class="img-responsive"></div>
                </div>

                <div class="image-column col-lg-4 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="image-box">
                            <img src="images/inner-about.png" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-section">
        <div class="auto-container">
            <div class="row no-gutters">
                <div class="content-column col-lg-6 col-md-12 col-sm-12">

                    <h2 class="add-home-head-name">Personal Life</h2>
                    <p class="add-txt-home-about">Rajan Maaluja believes in religion a lot. He is particularly into
                        mysticism and gives his available energy in reflection. He cherishes visiting religious places
                        from one side of the planet to the other. His top choices are ISKON and VRINDAVAN. He is an
                        impassioned lover of Lord Krishna and follows his lessons as recorded and clarified in Bhagavad
                        Gita. In his free time, he loves seeing films, travelling, and shopping. He additionally has the
                        energy to make remarkable, eye-getting and selective classes of painting at whatever point he
                        has free time.</p>
                </div>

                <div class="image-column col-lg-6 col-md-12 col-sm-12">

                    <h2 class="add-home-head-name">Awards</h2>
                    <p class="add-txt-home-about">From the actual youth, Rajan Maaluja has been winning First Prizes in
                        different canvas rivalries. In school in the entirety of his classes, he was No. 1 in drawing
                        and painting. In school additionally, he was perceived as an undisputed No. 1 compelling artwork
                        student. His best and greatest honours have been the appreciation, commendation and esteem of
                        his creative work and ability from each and every one of his customers. The nature of his work
                        is responsible for his customers’ addiction to visiting RAJAN MAALUJA ARTS over and over.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include 'client-counter.php'; ?>

    <?php require_once 'footer.php'; ?>
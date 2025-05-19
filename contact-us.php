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

    <section class="page-title" style="background-image:url(images/contact.jpg);">
        <div class="auto-container">
            <div class="inner-container clearfix">
                <div class="title-box">
                    <h1>Contact Us</h1>
                </div>
                <ul class="bread-crumb clearfix">
                    <li><a href="index.php">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row">
                <!-- Form Column -->
                <div class="form-column col-lg-7 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="sec-title">
                            <h2>Contact Details</h2>
                        </div>

                        <div class="contact-form">
                            <form method="post" action="https://api.web3forms.com/submit">
                                <input type="hidden" name="access_key" value="8c5317b0-7959-4807-a15d-68b0d4fc6f7b">
                                <div class="row">
                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="name" placeholder="Enter Your Name"
                                            title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}"
                                            onkeypress="return (event.charCode > 64 &amp;&amp;  event.charCode < 91) || (event.charCode > 96 &amp;&amp; event.charCode < 123) || (event.charCode == 32)"
                                            required="">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <input type="email" name="email" placeholder="Enter Your Email" required="">
                                    </div>

                                    <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                        <input type="text" name="phone" placeholder="Enter Your Mobile"
                                            onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40)  || (event.keyCode==46))"
                                            pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required="">
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <textarea name="message" placeholder="Enter Your Message"
                                            title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}"
                                            onkeypress="return (event.charCode > 64 &amp;&amp;  event.charCode < 91) || (event.charCode > 96 &amp;&amp; event.charCode < 123) || (event.charCode == 32)"
                                            required=""></textarea>
                                    </div>

                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <button class="theme-btn btn-style-three" type="submit"
                                            name="btn_enq">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="contact-info">
                            <div class="row">
                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Location</h4>
                                        <p>Sunder Apartment, Block GH10, 56A, Paschim Vihar, Delhi, 110087</p>
                                    </div>
                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Call Us</h4>
                                        <p><a href="tel:+91-9136165775">+91-9136165775</a></p>
                                    </div>

                                </div>

                                <div class="info-block col-lg-4 col-md-4 col-sm-12">
                                    <div class="inner">
                                        <h4>Email</h4>
                                        <p><a href="mailto:rajanmaluujaarts@gmail.com">rajanmaluujaarts@gmail.com</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="map-column col-lg-5 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <div class="map-outer">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14003.379742160028!2d77.0912992!3d28.6643613!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d04745d1d9223%3A0x72369abf0482de50!2sRAJAN%20MALUUJA%20ARTS!5e0!3m2!1sen!2sin!4v1678354819879!5m2!1sen!2sin"
                                width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require_once "footer.php"; ?>
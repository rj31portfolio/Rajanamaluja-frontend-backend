<footer class="main-footer" style="background-image: url(images/background/5.jpg);">
            <div class="auto-container">
                <div class="widgets-section">
                    <div class="row">
                        <div class="big-column col-xl-7 col-lg-12 col-md-12 col-sm-12">
                            <div class="row">
                                <div class="footer-column col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget about-widget">
                                        <p class="widget-title">How to Find Me</p>
                                        <div class="widget-content">
                                            <ul class="add-address-footer-txt">
                                                <li><i class='fa fa-map-marker' aria-hidden='true'></i> Sunder Apartment, Block GH10, 56A, Paschim Vihar, Delhi, 110087</li>
                                                <li><a href='tel:+91-9136165775' class='text-white'><i class='fa fa-mobile' aria-hidden='true'></i> +91-9136165775</a></li>
                                                <li><a href='mailto:rajanmaluujaarts@gmail.com' class='text-white'><i class='fa fa-envelope-o' aria-hidden='true'></i> rajanmaluujaarts@gmail.com</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <p class="widget-title">Useful links</p>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li class=''><a href='index.php'>Home</a></li>
                                                <li class=''><a href='about.php'>About Us</a></li>
            
                                                <li class=''><a href='video-Gallary.php'>Video Gallery</a></li>
                                
                                                <li class=''><a href='contact-us.php'>Contact Us</a></li>
                                                <!-- <li class=''><a href='shipping.php'>Shipping</a></li> -->
                                                <li class=''><a href='privacy-policy.php'>Privacy Policy</a></li>
                                                <li class=''><a href='return-policy.php'>Return Policy</a></li>
                                                <li class=''><a href='terms-of-conditions.php'>Terms & Conditions</a></li>
                                                <li class=''><a href='disclaimer.php'>Disclaimer</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!--Big Column-->
                        <div class="big-column col-xl-5 col-lg-12 col-md-12 col-sm-12">
                            <div class="row clearfix">
                                <div class="footer-column col-xl-5 col-lg-6 col-md-6 col-sm-12">
                                    <?php
                                    require_once 'includes/db.php';

                                    // Fetch categories from the database (limit to 10)
                                    $stmt = $pdo->query("SELECT name, slug FROM categories ORDER BY name ASC LIMIT 8");
                                    $categories = $stmt->fetchAll();
                                    ?>

                                    <div class="footer-widget links-widget">
                                        <p class="widget-title">Our Services</p>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <?php foreach ($categories as $category): ?>
                                                    <li>
                                                        <a href="category.php?slug=<?php echo htmlspecialchars($category['slug']); ?>">
                                                            <?php echo htmlspecialchars($category['name']); ?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!--Footer Column-->
                                <div class="footer-column col-xl-7 col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget gallery-widget">
                                        <p class="widget-title">Book Your Arts</p>
                                        <div class="widget-content footerfrm">
                                            <form method="post" action="sms.php">
                                                <div class="form-group">
                                                    <input type="text" name="name" placeholder="Enter Your Name" title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                                                        required="">
                                                </div>
                                                <div class="form-group">
    <input type="email" name="email" placeholder="Enter Your Email"
        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
        required>
</div>

                                                <div class="form-group">
                                                    <input type="text" name="phone" placeholder="Enter Your Mobile" onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40)  || (event.keyCode==46))"
                                                        pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required="">
                                                </div>
                                                <div class="form-group">
                                                    <textarea name="message" placeholder="Enter Your Message" title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                                                        required=""></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" name="btn_enq" class="theme-btn btn-style-three">Submit now</button>
                                                </div>
                                            </form>
                                            <div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="footer-bottom">
                <div class="auto-container">
                    <div class="inner-container clearfix">
                        <div class="social-links">
                            <ul class="social-icon-two">
                                <li><a href="https://www.facebook.com/RajanMaalujaArts" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/RajanMaaluja" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.instagram.com/rajanmaluujaarts/" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://in.pinterest.com/rajanmaluujaarts/" target="_blank"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.linkedin.com/in/rajanmaluujaarts/" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCd2Hd7CovuFWv43706dcs6A" target="_blank"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
                                <li><a href="tel:09136165775" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            </ul>
                        </div>

                        <div class="copyright-text">
                            <p>Copyright © 2023 <a href="#">Rajan Maaluja Arts</a> All right reserved <!--| Designed & Developed by : <a href="http://viraladsmedia.com/" target="_blank">Viral Ads Media</a></p> -->
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-arrow-circle-o-up"></span></div>
    <script src="js/jquery.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.fancybox.js"></script>
    <script src="js/owl.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/appear.js"></script>
    <script src="js/jquery.bootstrap-touchspin.js"></script>
    <script src="js/mixitup.js"></script>
    <script src="js/Lobibox.js"></script>
    <script src="js/script.js"></script>
    <script src="js/myjs.js"></script>
    <script>
        $(document).on('click', 'a', function() {
            var href = $(this).attr('href').search("tel:");
            if (href == 0) {
                $.ajax({
                    url: "https://www.api.globaladmedia.in/action/execute.php",
                    type: "POST",
                    data: {
                        btn_enq_owner: 'callhistory',
                        domain_key: '5901376fb8cc178c39c66683cfc08f45',
                        subdomain_name: ''
                    },
                    cache: false,
                    success: function(callhistories) {
                        //$(".state_name").html(state_names);
                        console.log(callhistories);
                    }
                });
            }
        });
    </script>

    <div id="sendemail" class="modal fade in" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <!--<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>-->
                    <div class="row">
                        <div class="col-md-12 text-center"><img src="/images/rajan-maluuja-logo.png" class="img-responsive add-popup-logo-dz">
                        </div>

                        <div class="col-md-12">
                            <div class="e_div">
                                <form action="sms.php" method="post" class="submit_data">
                                    <div class="row">
                                        <span class="error-message" id="popup-submit-error"></span>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" class="form-control name" id="popup-contact-name" name="name" placeholder="Your Name*" title="Accept Only Name and Space" pattern="[A-Za-z0-9_ ]{1,150}" onkeypress="return (event.charCode > 64 &&  event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || (event.charCode == 32)"
                                                    required="">
                                                <span class="error-message" id="popup-name-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control mobile" id="popup-contact-phone" name="phone" placeholder="Mobile No.*" onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40)  || (event.keyCode==46))"
                                                    pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required="">
                                                <span class="error-message" id="popup-phone-error"></span>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control mobile" id="popup-contact-phone" name="phone" placeholder="Mobile No.*" onkeydown="return ( event.ctrlKey || event.altKey  || (47<event.keyCode &amp;&amp; event.keyCode<58 &amp;&amp; event.shiftKey==false) || (95<event.keyCode &amp;&amp; event.keyCode<106) || (event.keyCode==8) || (event.keyCode==9) || (event.keyCode>34 &amp;&amp; event.keyCode<40)  || (event.keyCode==46))"
                                                    pattern="[7896][0-9]{9}" minlength="10" maxlength="10" required="">
                                                <span class="error-message" id="popup-phone-error"></span>
                                            </div>

                                        </div>

                                        <div class="col-sm-12" align="center">
                                            <input class="btn btn-default add-new-bg-form-button" type="submit" name="btn_enq" value="Get Instant Call Back">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script type='text/javascript'>
        $(document).ready(function() {
            $('#sendemail').modal('hide');
        });
    </script>

    <div class="call-btn">
        <a href="tel:09136165775"><i class="fa fa-phone"></i> <span>Call Us</span></a></div>
    <div class="whatsapp-btn">
        <a href="https://api.whatsapp.com/send?phone=919136165775&amp;text=" class="whatsappWidget phone-btn" target="_blank"><i class="fa fa-whatsapp" aria-hidden="true"></i> <span>What's App</span></a></div>
</body>

</html>
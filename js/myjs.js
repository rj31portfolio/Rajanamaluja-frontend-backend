var base_url = '';
if (window.location.origin == "http://localhost") {
    base_url = "http://localhost/project/rajanmaluujaarts.com/";
} else {
    base_url = "https://www.rajanmaluujaarts.com/";
}

function redirectWithDelay(url, delay) {
    setTimeout(function() {
        window.location.href = url;
    }, delay);
}

function miniDefaultAnimationAlertNotification(txt) {
    Lobibox.notify('default', {
        position: 'top right',
        size: 'mini',
        msg: txt
    });
}

function miniInfoAnimationAlertNotification(txt) {
    Lobibox.notify('info', {
        position: 'top right',
        size: 'mini',
        msg: txt
    });
}

function miniWarningAnimationAlertNotification(txt) {
    Lobibox.notify('warning', {
        position: 'top right',
        size: 'mini',
        msg: txt
    });
}

function miniErrorAnimationAlertNotification(txt) {
    Lobibox.notify('error', {
        position: 'top right',
        size: 'mini',
        msg: txt
    });
}

function miniSuccessAnimationAlertNotification(txt) {
    Lobibox.notify('success', {
        position: 'top right',
        size: 'mini',
        msg: txt
    });
}
// cart validation
// User cartlist Validation
$(document).ready(function() {
    //product add to cart
    $('.btn_product_add_cart').on('click', function() {
        var btn_product_add_cart = $('.btn_product_add_cart').html();
        var product_id = $(this).attr('id');
        if (product_id == "") {
            warning_notifucation_alert("Some Field Missing. Please Page Reload then try again");
        } else {
            $(".btn_product_add_cart").attr("disabled", "disabled");
            $.ajax({
                url: base_url + "include/execute.php",
                type: "POST",
                data: {
                    button_form_cartlist_action: 'productadded',
                    product_id: product_id
                },
                beforeSend: function() {
                    $('.btn_product_add_cart').html("Please Wait...");
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $(".btn_product_add_cart").html(btn_product_add_cart);
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        $(".btn_product_add_cart").addClass("d-none");
                        $(".btn_product_view_cart").removeClass("d-none");
                        redirectWithDelay(base_url + 'cart.php', 500);
                    } else {
                        $(".btn_product_add_cart").attr("disabled", false);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $(".btn_product_add_cart").html(btn_product_add_cart);
                    }
                }
            });
        }
    });
    // remove product in your cart item
    $('.btn_product_removed_cart').on('click', function() {
        var cart_id = $(this).attr('id');
        if (confirm('Are you sure you want product removed in cart item?')) {
            $.ajax({
                url: base_url + "include/execute.php",
                type: "POST",
                data: {
                    button_form_cartlist_action: 'removed',
                    cart_id: cart_id
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        redirectWithDelay(base_url + "cart.php", 500);
                    } else {
                        miniErrorAnimationAlertNotification(dataResult.msg);
                    }
                }
            });
        }
    });
    // Increased product in your cart item
    $('.btn_product_increas_cart').on('click', function() {
        var cart_id = $(this).attr('id');
        $.ajax({
            url: base_url + "include/execute.php",
            type: "POST",
            data: {
                button_form_cartlist_action: 'increase',
                cart_id: cart_id
            },
            cache: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    miniSuccessAnimationAlertNotification(dataResult.msg);
                    redirectWithDelay(base_url + "cart.php", 1000);
                } else {
                    miniErrorAnimationAlertNotification(dataResult.msg);
                }
            }
        });
    });
    // Decreased product in your cart item
    $('.btn_product_decrease_cart').on('click', function() {
        var cart_id = $(this).attr('id');
        $.ajax({
            url: base_url + "include/execute.php",
            type: "POST",
            data: {
                button_form_cartlist_action: 'decrease',
                cart_id: cart_id
            },
            cache: false,
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    miniSuccessAnimationAlertNotification(dataResult.msg);
                    redirectWithDelay(base_url + "cart.php", 1000);
                } else {
                    miniErrorAnimationAlertNotification(dataResult.msg);
                }
            }
        });
    });
    //product buy now cart
    $('.btn_product_buy_cart').on('click', function() {
        var btn_product_buy_cart = $('.btn_product_buy_cart').html();
        var product_id = $(this).attr('id');
        if (product_id == "") {
            miniWarningAnimationAlertNotification("Some Field Missing. Please Page Reload then try again");
        } else {
            $(".btn_product_buy_cart").attr("disabled", "disabled");
            $.ajax({
                url: base_url + "include/execute.php",
                type: "POST",
                data: {
                    button_form_cartlist_action: 'buynow',
                    product_id: product_id
                },
                beforeSend: function() {
                    $('.btn_product_buy_cart').html("Please Wait...");
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        $(".btn_product_buy_cart").html(btn_product_buy_cart);
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        redirectWithDelay(base_url + "delivery-address.php", 500);
                    } else {
                        $(".btn_product_buy_cart").attr("disabled", false);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $(".btn_product_buy_cart").html(btn_product_buy_cart);
                    }
                }
            });
        }
    });
});
// User authuntication
$(document).ready(function() {
    // User Login Validation
    $('#btn_typ_user_login').on('click', function() {
        var btn_typ_user_login = $('#btn_typ_user_login').html();
        var login_email_phone = $('.login_email_phone').val();
        var login_password = $('.login_password').val();
        $('.login_email_phone').css('border', '1px solid #e4e4e4');
        $('.login_password').css('border', '1px solid #e4e4e4');
        if (login_email_phone == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Email Id OR Phone Number");
            $('.login_email_phone').attr('placeholder', 'Please Enter Your Email Id OR Phone Number');
            $('.login_email_phone').css('border', '3px solid red');
            $('.login_email_phone').focus();
        } else if (login_password == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Password");
            $('.login_password').attr('placeholder', 'Please Enter Your Password');
            $('.login_password').css('border', '3px solid red');
            $('.login_password').focus();
        } else {
            $("#btn_typ_user_login").attr("disabled", "disabled");
            $('.common_error').html('');
            var form = $('#frm_typ_user_login')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: base_url + "include/execute.php",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btn_typ_user_login').html("Please Wait...");
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        $('#btn_typ_user_login').html(btn_typ_user_login);
                        redirectWithDelay(base_url + "cart.php", 500);
                    } else if (dataResult.statusCode == 201) {
                        $("#btn_typ_user_login").attr("disabled", false);
                        $('#btn_typ_user_login').html(btn_typ_user_login);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $('.login_email_phone').css('border', '3px solid red');
                        $('.login_email_phone').focus();
                    } else if (dataResult.statusCode == 202) {
                        $("#btn_typ_user_login").attr("disabled", false);
                        $('#btn_typ_user_login').html(btn_typ_user_login);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $('.login_password').css('border', '3px solid red');
                        $('.login_password').focus();
                    } else {
                        $("#btn_typ_user_login").attr("disabled", false);
                        $('#btn_typ_user_login').html(btn_typ_user_login);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                    }

                }
            });
        }
    });
    // User Registration Validation
    $('#btn_typ_user_registration').on('click', function() {
        var btn_typ_user_registration = $('#btn_typ_user_registration').html();
        var reg_name = $('.reg_name').val();
        var reg_phone = $('.reg_phone').val();
        var reg_email = $('.reg_email').val();
        var reg_password = $('.reg_password').val();
        var reg_cpassword = $('.reg_cpassword').val();
        var reg_condition_accept = $('.reg_condition_accept').val();
        $('.reg_name').css('border', '1px solid #e4e4e4');
        $('.reg_phone').css('border', '1px solid #e4e4e4');
        $('.reg_email').css('border', '1px solid #e4e4e4');
        $('.reg_password').css('border', '1px solid #e4e4e4');
        $('.reg_cpassword').css('border', '1px solid #e4e4e4');
        $('.reg_condition_accept').css('border', '1px solid #e4e4e4');
        if (reg_name == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Name");
            $('.reg_name').attr('placeholder', 'Please Enter Your Name');
            $('.reg_name').css('border', '3px solid red');
            $('.reg_name').focus();
        } else if (reg_phone == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Phone Number");
            $('.reg_phone').attr('placeholder', 'Please Enter Your Phone Number');
            $('.reg_phone').css('border', '3px solid red');
            $('.reg_phone').focus();
        } else if (reg_phone.length != "10") {
            miniWarningAnimationAlertNotification("Please Enter Your 10 Digtit Phone Number");
            $('.reg_phone').attr('placeholder', 'Please Enter Your 10 Digtit Phone Number');
            $('.reg_phone').css('border', '3px solid red');
            $('.reg_phone').focus();
        } else if (reg_email == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Email Id");
            $('.reg_email').attr('placeholder', 'Please Enter Your Email Id');
            $('.reg_email').css('border', '3px solid red');
            $('.reg_email').focus();
        } else if (reg_password == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Password");
            $('.reg_password').attr('placeholder', 'Please Enter Your Password');
            $('.reg_password').css('border', '3px solid red');
            $('.reg_password').focus();
        } else if (reg_cpassword == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Confirm Password");
            $('.reg_cpassword').attr('placeholder', 'Please Enter Your Confirm Password');
            $('.reg_cpassword').css('border', '3px solid red');
            $('.reg_cpassword').focus();
        } else if (reg_password != reg_cpassword) {
            miniWarningAnimationAlertNotification("Please Enter Your Confirm Password NOt Matched");
            $('.reg_cpassword').attr('placeholder', 'Please Enter Your Confirm Password NOt Matched');
            $('.reg_cpassword').css('border', '3px solid red');
            $('.reg_cpassword').focus();
        } else if ($(".reg_condition_accept").prop('checked') == false) {
            miniWarningAnimationAlertNotification("Please I agree to Terms and Conditions");
            $('.reg_condition_accept').attr('placeholder', 'Please I agree to Terms and Conditions');
            $('.reg_condition_accept').css('border', '3px solid red');
            $('.reg_condition_accept').focus();
        } else {
            $("#btn_typ_user_registration").attr("disabled", "disabled");
            $('.common_error').html('');
            var form = $('#frm_typ_user_registration')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: base_url + "include/execute.php",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btn_typ_user_registration').html("Please Wait...");
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        $('#btn_typ_user_registration').html(btn_typ_user_registration);
                        redirectWithDelay(base_url + "cart.php", 100);
                    } else if (dataResult.statusCode == 201) {
                        $("#btn_typ_user_registration").attr("disabled", false);
                        $('#btn_typ_user_registration').html(btn_typ_user_registration);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $('.reg_phone').attr('placeholder', 'Please Enter Your Phone Number');
                        $('.reg_phone').css('border', '3px solid red');
                        $('.reg_phone').focus();
                    } else if (dataResult.statusCode == 202) {
                        $("#btn_typ_user_registration").attr("disabled", false);
                        $('#btn_typ_user_registration').html(btn_typ_user_registration);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                        $('.reg_email').attr('placeholder', 'Please Enter Your Email Id');
                        $('.reg_email').css('border', '3px solid red');
                        $('.reg_email').focus();
                    } else {
                        miniErrorAnimationAlertNotification(dataResult.msg);
                    }

                }
            });
        }
    });
    // User Logout Validation
    $('.btn_typ_user_logout').on('click', function() {
        if (confirm('Are you sure you want Logout?')) {
            $.ajax({
                url: base_url + "include/execute.php",
                type: "POST",
                data: {
                    button_form_user_action: 'logout'
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        redirectWithDelay(base_url + "shop.php", 500);
                    }
                }
            });
        }
    });
    // Shipping Information
    $('#btn_typ_user_billing_and_shipping_details').on('click', function() {
        var btn_typ_user_billing_and_shipping_details = $('#btn_typ_user_billing_and_shipping_details').html();
        var usr_shpng_dtls_bilng_name = $('.usr_shpng_dtls_bilng_name').val();
        var usr_shpng_dtls_bilng_phone = $('.usr_shpng_dtls_bilng_phone').val();
        var usr_shpng_dtls_bilng_email = $('.usr_shpng_dtls_bilng_email').val();
        var usr_shpng_dtls_bilng_address = $('.usr_shpng_dtls_bilng_address').val();
        var usr_shpng_dtls_name = $('.usr_shpng_dtls_name').val();
        var usr_shpng_dtls_phone = $('.usr_shpng_dtls_phone').val();
        var usr_shpng_dtls_email = $('.usr_shpng_dtls_email').val();
        var usr_shpng_dtls_state = $('.usr_shpng_dtls_state').val();
        var usr_shpng_dtls_city = $('.usr_shpng_dtls_city').val();
        var usr_shpng_dtls_locality = $('.usr_shpng_dtls_locality').val();
        var usr_shpng_dtls_pincode = $('.usr_shpng_dtls_pincode').val();
        var usr_shpng_dtls_address = $('.usr_shpng_dtls_address').val();
        $('.usr_shpng_dtls_bilng_name').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_bilng_phone').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_bilng_email').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_bilng_address').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_name').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_phone').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_email').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_state').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_city').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_locality').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_pincode').css('border', '1px solid #e4e4e4');
        $('.usr_shpng_dtls_address').css('border', '1px solid #e4e4e4');
        if (usr_shpng_dtls_bilng_name == "") {
            miniWarningAnimationAlertNotification("Please Enter Billing Name");
            $('.usr_shpng_dtls_bilng_name').attr('placeholder', 'Please Enter Billing Name');
            $('.usr_shpng_dtls_bilng_name').css('border', '3px solid red');
            $('.usr_shpng_dtls_bilng_name').focus();
        } else if (usr_shpng_dtls_bilng_phone == "") {
            miniWarningAnimationAlertNotification("Please Enter Billing Phone Number");
            $('.usr_shpng_dtls_bilng_phone').attr('placeholder', 'Please Enter Billing Phone Number');
            $('.usr_shpng_dtls_bilng_phone').css('border', '3px solid red');
            $('.usr_shpng_dtls_bilng_phone').focus();
        } else if (usr_shpng_dtls_bilng_phone.length != "10") {
            miniWarningAnimationAlertNotification("Please Enter Billing 10 Digit Phone Number");
            $('.usr_shpng_dtls_bilng_phone').attr('placeholder', 'Please Enter Billing 10 Digit Phone Number');
            $('.usr_shpng_dtls_bilng_phone').css('border', '3px solid red');
            $('.usr_shpng_dtls_bilng_phone').focus();
        } else if (usr_shpng_dtls_bilng_email == "") {
            miniWarningAnimationAlertNotification("Please Enter Billing Email ID");
            $('.usr_shpng_dtls_bilng_email').attr('placeholder', 'Please Enter Billing Email ID');
            $('.usr_shpng_dtls_bilng_email').css('border', '3px solid red');
            $('.usr_shpng_dtls_bilng_email').focus();
        } else if (usr_shpng_dtls_bilng_address == "") {
            miniWarningAnimationAlertNotification("Please Enter Billing Address Details");
            $('.usr_shpng_dtls_bilng_address').attr('placeholder', 'Please Enter Billing Address Details');
            $('.usr_shpng_dtls_bilng_address').css('border', '3px solid red');
            $('.usr_shpng_dtls_bilng_address').focus();
        } else if (usr_shpng_dtls_name == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details Name");
            $('.usr_shpng_dtls_name').attr('placeholder', 'Please Enter Your Shipping Details Name');
            $('.usr_shpng_dtls_name').css('border', '3px solid red');
            $('.usr_shpng_dtls_name').focus();
        } else if (usr_shpng_dtls_phone == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details Phone Number");
            $('.usr_shpng_dtls_phone').attr('placeholder', 'Please Enter Your Shipping Details Phone Number');
            $('.usr_shpng_dtls_phone').css('border', '3px solid red');
            $('.usr_shpng_dtls_phone').focus();
        } else if (usr_shpng_dtls_phone.length != "10") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details 10 Digit Phone Number");
            $('.usr_shpng_dtls_phone').attr('placeholder', 'Please Enter Your Shipping Details 10 Digit Phone Number');
            $('.usr_shpng_dtls_phone').css('border', '3px solid red');
            $('.usr_shpng_dtls_phone').focus();
        } else if (usr_shpng_dtls_email == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details Email Id");
            $('.usr_shpng_dtls_email').attr('placeholder', 'Please Enter Your Shipping Details Email Id');
            $('.usr_shpng_dtls_email').css('border', '3px solid red');
            $('.usr_shpng_dtls_email').focus();
        } else if (usr_shpng_dtls_state == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details State Name");
            $('.usr_shpng_dtls_state').attr('placeholder', 'Please Enter Your Shipping Details State Name');
            $('.usr_shpng_dtls_state').css('border', '3px solid red');
            $('.usr_shpng_dtls_state').focus();
        } else if (usr_shpng_dtls_city == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details City Name");
            $('.usr_shpng_dtls_city').attr('placeholder', 'Please Enter Your Shipping Details City Name');
            $('.usr_shpng_dtls_city').css('border', '3px solid red');
            $('.usr_shpng_dtls_city').focus();
        } else if (usr_shpng_dtls_locality == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details Locality Name");
            $('.usr_shpng_dtls_locality').attr('placeholder', 'Please Enter Your Shipping Details Locality Name');
            $('.usr_shpng_dtls_locality').css('border', '3px solid red');
            $('.usr_shpng_dtls_locality').focus();
        } else if (usr_shpng_dtls_pincode == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details Pincode");
            $('.usr_shpng_dtls_pincode').attr('placeholder', 'Please Enter Your Shipping Details Pincode');
            $('.usr_shpng_dtls_pincode').css('border', '3px solid red');
            $('.usr_shpng_dtls_pincode').focus();
        } else if (usr_shpng_dtls_pincode.length != "6") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Details 6 Digit Pincode");
            $('.usr_shpng_dtls_pincode').attr('placeholder', 'Please Enter Your Shipping Details 6 Digit Pincode');
            $('.usr_shpng_dtls_pincode').css('border', '3px solid red');
            $('.usr_shpng_dtls_pincode').focus();
        } else if (usr_shpng_dtls_address == "") {
            miniWarningAnimationAlertNotification("Please Enter Your Shipping Address Details");
            $('.forget_email').attr('placeholder', 'Please Enter Your Shipping Address Details');
            $('.forget_email').css('border', '3px solid red');
            $('.forget_email').focus();
        } else {
            $("#btn_typ_user_billing_and_shipping_details").attr("disabled", "disabled");
            $('.common_error').html('');
            var form = $('#frm_typ_user_billing_and_shipping_details')[0];
            var formData = new FormData(form);
            $.ajax({
                type: "POST",
                url: base_url + "include/execute.php",
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('#btn_typ_user_billing_and_shipping_details').html("Please Wait...");
                },
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == 200) {
                        miniSuccessAnimationAlertNotification(dataResult.msg);
                        $('#btn_typ_user_billing_and_shipping_details').html(btn_typ_user_billing_and_shipping_details);
                        $('#frm_typ_user_billing_and_shipping_details').find('input:text').val('');
                        redirectWithDelay(base_url + "confirmation-checkout.php", 500);
                    } else {
                        $("#btn_typ_user_billing_and_shipping_details").attr("disabled", false);
                        $('#btn_typ_user_billing_and_shipping_details').html(btn_typ_user_billing_and_shipping_details);
                        miniErrorAnimationAlertNotification(dataResult.msg);
                    }

                }
            });
        }
    });
    // User phonepay payment getway
    $('#btn_user_phonepaygetway').on('click', function() {
        var btn_user_phonepaygetway = $('#btn_user_phonepaygetway').html();
        $("#btn_user_phonepaygetway").attr("disabled", "disabled");
        $.ajax({
            url: base_url + "include/phonepe_paymentgetway.php",
            type: "POST",
            data: {
                btn_ordercomplete: 'payme_initialize'
            },
            cache: false,
            beforeSend: function() {
                $('#btn_user_phonepaygetway').html("Please Wait...");
            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    //success_notifucation_alert(dataResult.msg); 
                    redirectWithDelay(dataResult.url, 500);
                } else {
                    $("#btn_user_phonepaygetway").attr("disabled", false);
                    $('#btn_user_phonepaygetway').html(btn_user_phonepaygetway);
                }
            }
        });
    });
    // User Cash on Delivery order place
    $('#btn_user_codorderplace').on('click', function() {
        var btn_user_codorderplace = $('#btn_user_codorderplace').html();
        $("#btn_user_codorderplace").attr("disabled", "disabled");
        $.ajax({
            url: base_url + "include/phonepe_paymentgetway.php",
            type: "POST",
            data: {
                btn_ordercomplete: 'payme_cod_orderplace'
            },
            cache: false,
            beforeSend: function() {
                $('#btn_user_codorderplace').html("Please Wait...");
            },
            success: function(dataResult) {
                var dataResult = JSON.parse(dataResult);
                if (dataResult.statusCode == 200) {
                    //success_notifucation_alert(dataResult.msg); 
                    redirectWithDelay(dataResult.url, 500);
                } else {
                    $("#btn_user_codorderplace").attr("disabled", false);
                    $('#btn_user_codorderplace').html(btn_user_codorderplace);
                }
            }
        });
    });
});
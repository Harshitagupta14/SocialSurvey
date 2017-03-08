<style>
    .mdl-snackbar {
        border-radius: 2px;
        max-width: 568px;
        min-width: 288px;
        transform: translate(-50%, 80px);
    }
    .mdl-snackbar{
        background-color: #323232;
        bottom: 0;
        cursor: default;
        display: flex;
        font-family: "Roboto","Helvetica","Arial",sans-serif;
        justify-content: space-between;
        left: 40%;
        pointer-events: none;
        position: fixed;
        transform: translate(0px, 80px);
        transition: transform 0.25s cubic-bezier(0.4, 0, 1, 1) 0s;
        will-change: transform;
        z-index: 3;
    }
    .mdl-snackbar__text {
        color: white;
        float: left;
        padding: 14px 12px 14px 24px;
        vertical-align: middle;
    }
    .mdl-snackbar--active {
        pointer-events: auto;
        transform: translate(0px, 0px);
        transition: transform 0.25s cubic-bezier(0, 0, 0.2, 1) 0s;
    }
    .mdl-snackbar--active {
        //transform: translate(-50%, 0px);
    }
    .mdl-snackbar__action {
        align-self: center;
        background: transparent none repeat scroll 0 0;
        border: medium none;
        color: rgb(244, 67, 54);
        cursor: pointer;
        float: right;
        font-family: "Roboto","Helvetica","Arial",sans-serif;
        font-size: 14px;
        font-weight: 500;
        letter-spacing: 0;
        line-height: 1;
        opacity: 0;
        outline: medium none;
        overflow: hidden;
        padding: 14px 24px 14px 12px;
        pointer-events: none;
        text-align: center;
        text-decoration: none;
        text-transform: uppercase;
    }
</style>
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script type="text/javascript">
    function display_error(error_message) { //common function for displayinga ll the error

        'use strict';
        var snackbarContainer = document.querySelector('#toast-notify');
        'use strict';
        var data = {
            message: error_message
        };
        snackbarContainer.MaterialSnackbar.showSnackbar(data);
    }
</script>
<script src="<?= $this->config->item('adminassets'); ?>global/scripts/app.min.js" type="text/javascript"></script>
<footer>
    <div class="container">

        <div class="row">
            <div class="col-sm-8 margin-20">
                <ul class="list-inline social">
                    <li>Connect with us on</li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                </ul>
            </div>

            <div class="col-sm-4 text-right">
                <p><small>Copyright &copy; 2017. All rights reserved. <br>
                        Created by <a href="http://designscrazed.org/">Universal E-Solution PVt. Ltd.</a></small></p>
            </div>
        </div>

    </div>
</div>
</footer>
<div class="row pop-up">
    <div class="box small-6 large-centered">
        <a href="#" class="close-button">&#10006;</a>
        <div class="pop-up-container">
            <div class="box"></div>
            <div class="pop-up-container-forms" id="sign_signup_modal">
                <div class="pop-up-container-info">
                    <div class="info-item">
                        <div class="table">
                            <div class="table-cell">
                                <p>
                                    Have an account?
                                </p>
                                <div class="btn btn-primary" style="background-color:#91BAE1;" onclick="switch_modals('login');">
                                    Log in
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="info-item">
                        <div class="table">
                            <div class="table-cell">
                                <p>
                                    Don't have an account?
                                </p>
                                <div class="btn btn-primary" style="background-color:#91BAE1;" onclick="switch_modals('register');">
                                    Sign up
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pop-up-container-form pop-up-container-form-login">
                    <div class="form-item log-in">
                        <div class="table">
                            <div class="table-cell">

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input class="form-control input-sm" id="login_identity" type="text" name="login_identity" required />
                                            <label for="form_control_1">Email</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input class="form-control input-sm" id="login_password" type="password" name="login_password" required />
                                            <label for="form_control_1">Password</label>
                                        </div>
                                    </div>
                                    <input class="btn btn-danger" id="login_user" value="Sign In" name="login_user">

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="form-item sign-up">
                        <div class="table">
                            <div class="table-cell">
                                <form action="" class="" method="post">
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input id="register_first_name"  class="form-control input-sm" required="" type="text">
                                            <label for="form_control_1">First Name <sup>*</sup></label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input id="register_last_name"   class="form-control input-sm" required="" type="text">
                                            <label for="form_control_1">Last Name <sup>*</sup></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input id="register_phone_number"  class="form-control input-sm" required="" type="text">
                                            <label for="form_control_1">Phone Number <sup>*</sup></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input id="register_email_address" class="form-control input-sm" required="" type="text">
                                            <label for="form_control_1">Email  <sup>*</sup></label>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group form-md-line-input form-md-floating-label has-info">
                                            <input id="register_password"  class="form-control input-sm" required="" type="text">
                                            <span class="help-block" >Password must be 8 characters long.</span>
                                            <label for="form_control_1">Password  <sup>*</sup></label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12" style="margin-top:10px;">
                                            <input type="submit"  id="register_user" class="btn btn-primary" value="Register" />
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pop-up-container-forms" id="resend_token_modal" style="display:none; top:40px;">

                <div class="info-item">

                </div>
                <div class="info-item">
                    <div class="table" style="margin-top:20px;">
                        <div class="table-cell" style="margin-top:20px;">
                            <p>
                                Don't have an account?
                            </p>
                            <div class="btn btn-primary" style="background-color:#91BAE1;" onclick="show_sign_signup_modal('register');">
                                Sign up
                            </div>
                        </div>
                        <div class="table-cell">
                            <p>
                                Have an account?
                            </p>
                            <div class="btn btn-primary" style="background-color:#91BAE1;" onclick="show_sign_signup_modal('login');">
                                Log in
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="table">
                        <div class="table-cell">
                            <div class="row">
                                <input type="button" class="btn btn-danger" id="resend_activation_code" data-disabled="yes" value="Resend Activation Link" name="login_user">
                                <span class="" style="">Resend Link in:<span id="resend_token_timer">30</span></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>

    function loginpopup() {
        $('.pop-up').show();
        $('.pop-up').fadeIn(1000);
        $('#overlay').addClass('cover');
    }

    $('.close-button').click(function (e) {
        $('.pop-up').fadeOut(700);
        $('#overlay').removeClass('blur-in');
        $('#overlay').removeClass('cover');
        e.stopPropagation();
    });
    function switch_modals(modal) {
        $(".pop-up-container").toggleClass("log-in");
        if (modal == 'login') {
            $(".pop-up-container-form").removeClass("pop-up-container-form-register");
            $(".pop-up-container-form").addClass('pop-up-container-form-' + modal);
        } else {
            $(".pop-up-container-form").removeClass("pop-up-container-form-login");
            $(".pop-up-container-form").addClass('pop-up-container-form-' + modal);
        }
    }

    function show_sign_signup_modal(modal) {
        $('#resend_token_modal').hide();
        $('#sign_signup_modal').show();
        if (modal == 'login') {
            $(".pop-up-container-form").removeClass("pop-up-container-form-register");
            $(".pop-up-container-form").addClass('pop-up-container-form-' + modal);
        } else {
            $(".pop-up-container-form").removeClass("pop-up-container-form-login");
            $(".pop-up-container-form").addClass('pop-up-container-form-' + modal);
        }
    }


    $("#login_user").click(function (e) {
        e.preventDefault();
        var login_identity = $('#login_identity').val();
        var login_password = $('#login_password').val();
        if (login_identity == '' && login_password == '') {
            display_error('The Email field is required.');
            display_error('The Password field is required.');
        } else if (login_identity == '') {
            display_error('The Email field is required.');
        } else if (login_password == '') {
            display_error('The Password field is required.');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "login-ajax",
                dataType: 'json',
                data: {'login_identity': login_identity, 'login_password': login_password},
                //beforeSend: function () {},
                success: function (stat) {                 //var data = JSON.parse(stat);
                    console.log(stat.success);
                    if (stat.success == true) {
                        var errors = stat.message.split("\n");
                        for (var i = 0; i < errors.length; i++) {
                            var value = errors[i];
                            if (value != '') {
                                var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                display_error(error);
                            }
                        }
                        window.location.href = 'dashboard';
                    } else if (stat.success == false) {
                        var errors = stat.message.split("\n");
                        for (var i = 0; i < errors.length; i++) {
                            var value = errors[i];
                            if (value != '') {
                                var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                display_error(error);
                                if (error == "Your account needs to be activated via email.") {
                                    $('#sign_signup_modal').hide();
                                    $('#resend_token_modal').show();
                                }
                            }
                        }


                    }

                }
            });
        }
    });
    $("#register_user").click(function (e) {
        e.preventDefault();
        var register_first_name = $('#register_first_name').val();
        var register_last_name = $('#register_last_name').val();
        var register_phone_number = $('#register_phone_number').val();
        var register_email_address = $('#register_email_address').val();
        var register_password = $('#register_password').val();
        if (register_first_name == '') {
            display_error('The First Name field is required.');
        } else if (register_last_name == '') {
            display_error('The Last Name field is required.');
        } else if (register_phone_number == '') {
            display_error('The Phone Number field is required.');
        } else if (register_email_address == '') {
            display_error('The Email field is required.');
        } else if (register_password == '') {
            display_error('The Password field is required.');
        } else {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>" + "quick-registration-ajax",
                dataType: 'json',
                data: {'register_first_name': register_first_name, 'register_last_name': register_last_name, 'register_phone_number': register_phone_number, 'register_email_address': register_email_address, 'register_password': register_password},
                //beforeSend: function () {},
                success: function (stat) {                 //var data = JSON.parse(stat);
                    console.log(stat.success);
                    if (stat.success == true) {
                        var errors = stat.message.split("\n");
                        for (var i = 0; i < errors.length; i++) {
                            var value = errors[i];
                            if (value != '') {
                                var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                display_error(error);
                            }
                        }
                        if (stat.registration == true) {
                            $('#sign_signup_modal').hide();
                            $('#resend_token_modal').show();
                        }
                    } else if (stat.success == false) {
                        var errors = stat.message.split("\n");
                        for (var i = 0; i < errors.length; i++) {
                            var value = errors[i];
                            if (value != '') {
                                var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                display_error(error);
                            }
                        }
                    }

                }
            });
        }
    });
    $("#resend_activation_code").click(function (e) {
        e.preventDefault();
        var is_disabled = $("#resend_activation_code").attr('data-disabled');
        if (is_disabled == 'yes') {
            set_resend_link_timer();
        } else {
            document.getElementById('resend_activation_code').setAttribute('data-disabled', 'yes');
            set_resend_link_timer();
            var activation_token_identity = $('#register_email_address').val();
            if (activation_token_identity == '') {
                activation_token_identity = $('#login_identity').val();
            }
            if (activation_token_identity == '') {
                display_error('The First Name field is required.');
            } else {
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>" + "activation-token-resend",
                    dataType: 'json',
                    data: {'send_activation_token': true, 'activation_token_identity': activation_token_identity},
                    //beforeSend: function () {},
                    success: function (stat) {                 //var data = JSON.parse(stat);
                        console.log(stat.success);
                        if (stat.success == true) {
                            var errors = stat.message.split("\n");
                            for (var i = 0; i < errors.length; i++) {
                                var value = errors[i];
                                if (value != '') {
                                    var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                    display_error(error);
                                }
                            }
                            //window.location.href = 'dashboard';
                        } else if (stat.success == false) {
                            var errors = stat.message.split("\n");
                            for (var i = 0; i < errors.length; i++) {
                                var value = errors[i];
                                if (value != '') {
                                    var error = errors[i].replace(/<\/?[^>]+>/gi, '');
                                    display_error(error);
                                }
                            }
                        }

                    }
                });
            }
        }
    });</script>
<?php
if ($this->session->flashdata('account_activated') == 'true') {
    ?>
    <script>
        window.onload = function () {
            display_error("Account has been activated successfully , Please Login to Portal.");
            loginpopup();
        };
    </script>
<?php } else if ($this->session->flashdata('account_activated') == 'false') { ?>
    <script>
        window.onload = function () {
            display_error("Account activation link has expired or token mismatch. Try to login and activate the account again.");
            loginpopup();
        };
    </script>
<?php } else if ($this->session->flashdata('account_activated') == 'already') { ?>
    <script>
        window.onload = function () {
            display_error("Your account has already been activated , Please Login to Portal.");
            loginpopup();
        };
    </script>
<?php } ?>
<!-- Javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/jquery-1.11.0.min.js"><\/script>')</script>
<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/wow.min.js"></script>
<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/bootstrap.min.js"></script>
<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/main.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/modernizr.js"></script>
<script src="<?= $this->config->item('frontassets') ?>video-parralax/js/script.js?v1.1"></script>
<script>     $(document).ready(function () {
        $('.header-video').each(function (i, elem) {
            headerVideo = new HeaderVideo({
                element: elem,
                media: '.header-video__media',
                playTrigger: '.header-video__play-trigger',
                closeTrigger: '.header-video__close-trigger'
            });
        });
    });
</script>
<div id="toast-notify" class="mdl-js-snackbar mdl-snackbar">
    <div class="mdl-snackbar__text"></div>
    <button class="mdl-snackbar__action" type="button"></button>
</div>
</body>
</html>
<script type="text/javascript">

    COUNTER_START = 30;

    function tick() {
        if (document.getElementById('resend_token_timer').innerHTML > 0) {
            document.getElementById('resend_token_timer').innerHTML = document.getElementById('resend_token_timer').innerHTML - 1;
            setTimeout('tick()', 1000);
        } else {
            document.getElementById('resend_activation_code').setAttribute('data-disabled', 'no');
            document.getElementById('resend_activation_code').setAttribute('class', 'btn btn-success');
            document.getElementById('resend_activation_code').removeAttribute('disabled', '');
            document.getElementById('resend_token_timer').innerHTML = 'Done';
        }
    }

    function set_resend_link_timer() {
        document.getElementById('resend_activation_code').setAttribute('disabled', '');
        document.getElementById('resend_activation_code').setAttribute('class', 'btn btn-danger');
        document.getElementById('resend_token_timer').innerHTML = COUNTER_START;
        tick();
    }

</script>

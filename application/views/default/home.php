<body class=" login">
    <!-- BEGIN : LOGIN PAGE 5-1 -->
    <div class="user-login-5">
        <div class="row bs-reset">
            <div class="col-md-6 bs-reset mt-login-5-bsfix">
                <div class="login-bg" style="background-image:url(http://localhost/socialcop/assets/admin/pages/img/login/bg1.jpg)">
                    <!--<img class="login-logo" src="<?= $this->config->item('adminassets'); ?>pages/img/login/logo.png" /> -->
                </div>
            </div>
            <div class="col-md-6 login-container bs-reset mt-login-5-bsfix">
                <div class="login-content">
                    <h1>SOCIALCOP LOGIN</h1>
                    <form action="" class=" " method="post">
                        <div class="alert alert-danger display-hide">
                            <button class="close" data-close="alert"></button>
                            <span>Enter any username and password. </span>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <input id="sender-email" type="text" name="login_identity" class="form-control form-control-solid placeholder-no-fix form-group" placeholder="Username Or Email-Id" required /> </div>
                            <div class="col-xs-6">
                                <input type="password" name="login_password" class="form-control form-control-solid placeholder-no-fix form-group" placeholder="Password" id="user-pass" required /> </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- <div class="rem-password">
                                     <label class="rememberme mt-checkbox mt-checkbox-outline">
                                         <input type="checkbox" name="remember" value="1" /> Remember me
                                         <span></span>
                                     </label>
                                 </div> -->
                            </div>
                            <div class="col-sm-8 text-right">
                                <!--   <div class="forgot-password">
                                       <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                   </div> -->
                                <input type="submit" class="btn green" value="Sign In" name="login_user">
                            </div>
                        </div>
                    </form>
                    <!-- BEGIN FORGOT PASSWORD FORM -->
                    <form class="forget-form" action="javascript:;" method="post">
                        <h3 class="font-green">Forgot Password ?</h3>
                        <p> Enter your e-mail address below to reset your password. </p>
                        <div class="form-group">
                            <input class="form-control placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                        <div class="form-actions">
                            <button type="button" id="back-btn" class="btn green btn-outline">Back</button>
                            <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                        </div>
                    </form>
                    <!-- END FORGOT PASSWORD FORM -->
                </div>
                <div class="login-footer">
                    <div class="row bs-reset">
                        <div class="col-xs-5 bs-reset">
                            <ul class="login-social">
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:;">
                                        <i class="icon-social-dribbble"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xs-7 bs-reset">
                            <div class="login-copyright text-right">
                                <p>Copyright &copy; SOCIALCOP PVT LTD 2016</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

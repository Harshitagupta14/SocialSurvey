<!DOCTYPE html>
<html lang="en"><head>
        <meta charset="utf-8">
        <title><?php echo $this->config->item('sitename'); ?></title>
        <meta name="keywords" content="">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <meta property="og:title" content="">
        <meta property="og:type" content="website">
        <meta property="og:url" content="">
        <meta property="og:site_name" content="">
        <meta property="og:description" content="">

        <!-- Styles -->
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/animate.css">
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= $this->config->item('frontassets') ?>video-parralax/css/main.css">
        <script src="<?= $this->config->item('frontassets') ?>video-parralax/js/modernizr-2.7.1.js"></script>
        <style>
            .header-video {
                position: relative;
                overflow: hidden;
            }
            .header-video iframe,
            .header-video video {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
            }
            .header-video iframe {
                height: 100%;
                width: 100%;
            }
            .header-video video {
                width: 100%;
            }
            .header-video__teaser-video {
                width: 100%;
                height: auto;
            }
            .header-video__media {
                width: 100%;
                height: auto;
            }
        </style>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

        <style>
            .cover {
                height: 100%;
                width: 100%;
                position: absolute;
                z-index: 1;
            }
            .content {
                width: 650px;
                margin: 0 auto;
                padding-top: 100px;
            }
            .pop-up {
                position: fixed;
                margin: 5% auto;
                left: 0;
                right: 0;
                z-index: 2;
            }
            .box {
                background-color: whitesmoke;
                text-align: center;
                margin-left: auto;
                margin-right: auto;
                margin-top: 5%;
                position: relative;
                -webkit-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
                -moz-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
                box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
                width:600px;
            }
            .button {
                margin: 0 auto;
                background-color: #7CCF29;
                margin-bottom: 33px;
            }
            .button:hover {
                background-color: #ef4b4b;
                -webkit-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
                -moz-box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
                box-shadow: 0px 4px 6px 0px rgba(0,0,0,0.1);
            }
            .close-button {
                transition: all 0.5s ease;
                position: absolute;
                background-color: #07a5e7;
                padding: 1.5px 7px;
                left: 0;
                margin-left: -10px;
                margin-top: -9px;
                border-radius: 50%;
                border: 2px solid #fff;
                color: white;
                -webkit-box-shadow: -4px -2px 6px 0px rgba(0,0,0,0.1);
                -moz-box-shadow: -4px -2px 6px 0px rgba(0,0,0,0.1);
                box-shadow: -3px 1px 6px 0px rgba(0,0,0,0.1);
                z-index:1000;
            }
            .close-button:hover {
                background-color: tomato;
                color: #fff;
            }
            h3 {
                text-align: center;
                padding-top: 15px;
                padding-bottom: 15px;
                color: #fff;
                background-color: #07a5e7;
            }
            p {
                padding: 20px 65px 10px 65px;
                color: dimgray;
            }
            h1 {
                color: dimgray;
                font-family: Garamond, Baskerville, "Baskerville Old Face", "Hoefler Text", "Times New Roman", serif;
            }
            .pop-up-container {
                position: relative;
                width: 600px;
                margin: 30px auto 0;
                height: 320px;
                background-color: #91BAE1;
                top: 50%;

                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .box {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                height: 100%;
                overflow: hidden;
            }
            .pop-up-container .box:before, .pop-up-container .box:after {
                content: " ";
                position: absolute;
                left: 152px;
                top: 50px;
                background-color: #91BAE1;
                transform: rotateX(52deg) rotateY(15deg) rotateZ(-38deg);
                width: 300px;
                height: 285px;
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .box:after {
                background-color: #91BAE1;
                top: -10px;
                left: 80px;
                width: 320px;
                height: 180px;
            }
            .pop-up-container .pop-up-container-forms {
                position: relative;
            }
            .pop-up-container .btn:hover {
                opacity: 0.7;
            }
            .pop-up-container .btn, .pop-up-container input {

            }
            .pop-up-container input {
                margin: 0 auto 15px;
                display: block;
                width: 220px;
                -moz-transition: all 0.3s;
                -o-transition: all 0.3s;
                -webkit-transition: all 0.3s;
                transition: all 0.3s;
            }
            .pop-up-container .pop-up-container-forms .pop-up-container-info {
                text-align: left;
                font-size: 0;
            }
            .pop-up-container .pop-up-container-forms .pop-up-container-info .info-item {
                text-align: center;
                font-size: 16px;
                width: 300px;
                height: 320px;
                display: inline-block;
                vertical-align: top;
                color: #fff;
                opacity: 1;
                -moz-transition: all 0.3s;
                -o-transition: all 0.3s;
                -webkit-transition: all 0.3s;
                transition: all 0.3s;
            }
            .pop-up-container .pop-up-container-forms .pop-up-container-info .info-item p {
                font-size: 20px;
                margin: 20px;
            }
            .pop-up-container .pop-up-container-forms .pop-up-container-info .info-item .table-cell {
                padding-right: 35px;
            }
            .pop-up-container .pop-up-container-forms .pop-up-container-info .info-item:nth-child(2) .table-cell {
                padding-left: 35px;
                padding-right: 0;
            }
            .pop-up-container .pop-up-container-form {
                overflow: hidden;
                position: absolute;
                left: 30px;
                top: -90px;
                width: 305px;
                height: 380px;

                background-color: #fff;
                box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .pop-up-container-form-login {
                overflow: hidden;
                position: absolute;
                left: 30px;
                top: -30px;
                width: 305px;
                height: 380px;
                background-color: #fff;
                box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .pop-up-container-form-register {
                overflow: hidden;
                position: absolute;
                left: 30px;
                top: -90px;
                width: 305px;
                height: 600px;
                background-color: #fff;
                box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.2);
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .pop-up-container-form:before {
                content: "✔";
                position: absolute;
                left: 160px;
                top: -50px;
                color: #5356ad;
                font-size: 130px;
                opacity: 0;
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .form-item {
                position: absolute;
                left: 0;
                top: 70px;
                width: 100%;
                height: 100%;
                opacity: 1;
                -moz-transition: all 0.5s;
                -o-transition: all 0.5s;
                -webkit-transition: all 0.5s;
                transition: all 0.5s;
            }
            .pop-up-container .form-item.sign-up {
                position: absolute;
                left: -100%;
                opacity: 0;
            }
            .pop-up-container.log-in .box:before {
                position: absolute;
                left: 180px;
                top: 62px;
                height: 265px;
            }
            .pop-up-container.log-in .box:after {
                top: 22px;
                left: 192px;
                width: 324px;
                height: 220px;
            }
            .pop-up-container.log-in .pop-up-container-form {
                left: 265px;
            }
            .pop-up-container.log-in .pop-up-container-form .form-item.sign-up {
                left: 0;
                opacity: 1;
                top:20px;
            }
            .pop-up-container.log-in .pop-up-container-form .form-item.log-in {
                left: -100%;
                opacity: 0;
            }
            .pop-up-container.active {
                width: 260px;
                height: 140px;
                margin-top: -70px;
            }
            .pop-up-container.active .pop-up-container-form {
                left: 30px;
                width: 200px;
                height: 200px;
            }
            .pop-up-container.active .pop-up-container-form:before {
                content: "✔";
                position: absolute;
                left: 51px;
                top: 5px;
                color: #5356ad;
                font-size: 130px;
                opacity: 1;
            }
            .pop-up-container.active input, .pop-up-container.active .btn, .pop-up-container.active .info-item {
                display: none;
                opacity: 0;
                padding: 0px;
                margin: 0 auto;
                height: 0;
            }
            .pop-up-container.active .form-item {
                height: 100%;
            }
            .pop-up-container.active .pop-up-container-forms .pop-up-container-info .info-item {
                height: 0%;
                opacity: 0;
            }
            .rabbit {
                width: 50px;
                height: 50px;
                position: absolute;
                bottom: 20px;
                right: 20px;
                z-index: 3;
                fill: #fff;
            }
        </style>


        <style>
            .form-group.form-md-line-input .form-control.edited:not([readonly])~label,.form-group.form-md-line-input .form-control:focus:not([readonly])~label,.form-group.form-md-line-input .form-control~.help-block-error,.form-group.form-md-line-input .form-control~label,.form-horizontal .form-group.form-md-line-input>label {
                opacity:1;
                filter:alpha(opacity=100)
            }
            .form-group.form-md-line-input {
                position:relative;
                margin:0 0 35px;
            }
            .form-horizontal .form-group.form-md-line-input {
                padding-top:10px;
                margin:0 -15px 20px
            }
            .form-horizontal .form-group.form-md-line-input>label {
                padding-top:5px;
                font-size:14px;
                color:#888
            }
            .form-group.form-md-line-input .form-control {
                background:0 0;
                border:0;
                border-bottom:1px solid #c2cad8;
                -webkit-border-radius:0;
                -moz-border-radius:0;
                -ms-border-radius:0;
                -o-border-radius:0;
                border-radius:0;
                color:#555;
                box-shadow:none;
                padding-left:0;
                padding-right:0;
                font-size:14px
            }
            .form-group.form-md-line-input .form-control::-moz-placeholder {
                color:#999;
                opacity:1
            }
            .form-group.form-md-line-input .form-control:-ms-input-placeholder {
                color:#999
            }
            .form-group.form-md-line-input .form-control::-webkit-input-placeholder {
                color:#999
            }
            .form-group.form-md-line-input .form-control.form-control-static {
                border-bottom:0
            }
            .form-group.form-md-line-input .form-control.input-sm {
                font-size:14px;
                padding:6px 0
            }
            .form-group.form-md-line-input .form-control.input-lg {
                font-size:20px;
                padding:14px 0
            }
            .form-group.form-md-line-input .input-group,.form-group.form-md-line-input .input-group+.input-group-control,.form-group.form-md-line-input+.input-group,.form-group.form-md-line-input+.input-icon,.form-horizontal .form-group.form-md-line-input .input-group,.form-horizontal .form-group.form-md-line-input .input-group>.input-group-control,.form-inline .form-md-line-input {
                padding-top:0
            }
            .form-group.form-md-line-input .form-control~.form-control-focus,.form-group.form-md-line-input .form-control~label {
                width:100%;
                position:absolute;
                left:0;
                bottom:0;
                pointer-events:none
            }
            .form-horizontal .form-group.form-md-line-input .form-control~.form-control-focus,.form-horizontal .form-group.form-md-line-input .form-control~label {
                width:auto;
                left:15px;
                right:15px
            }
            .form-group.form-md-line-input .form-control~.form-control-focus:after,.form-group.form-md-line-input .form-control~label:after {
                content:'';
                position:absolute;
                z-index:5;
                bottom:0;
                left:50%;
                height:2px;
                width:0;
                visibility:hidden;
                transition:.2s ease all
            }
            .form-group.form-md-line-input .form-control~label {
                top:0;
                margin-bottom:0;
                font-size:14px;
                color:#888
            }
            .form-group.form-md-line-input .form-control.edited:not([readonly])~.form-control-focus,.form-group.form-md-line-input .form-control.edited:not([readonly])~label,.form-group.form-md-line-input .form-control:focus:not([readonly])~.form-control-focus,.form-group.form-md-line-input .form-control:focus:not([readonly])~label {
                color:#888
            }
            .form-group.form-md-line-input .form-control.edited:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input .form-control.edited:not([readonly])~label:after,.form-group.form-md-line-input .form-control:focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input .form-control:focus:not([readonly])~label:after {
                visibility:visible;
                left:0;
                width:100%;
                background:#36c6d3
            }
            .form-group.form-md-line-input .form-control.edited:not([readonly])~.help-block,.form-group.form-md-line-input .form-control:focus:not([readonly])~.help-block {
                color:#36c6d3;
                opacity:1;
                filter:alpha(opacity=100)
            }
            .form-group.form-md-line-input .form-control.edited:not([readonly]):not(:focus)~.help-block,.form-group.form-md-line-input .form-control.edited:not([readonly]):not(:focus)~.help-block-error,.form-group.form-md-line-input .form-control.edited:not([readonly])~.help-block-error,.form-group.form-md-line-input .form-control:focus:not([readonly])~.help-block-error {
                opacity:0;
                filter:alpha(opacity=0)
            }
            .form-group.form-md-line-input .form-control[disabled],.form-group.form-md-line-input .form-control[readonly],fieldset[disabled] .form-group.form-md-line-input .form-control {
                background:0 0;
                cursor:not-allowed;
                border-bottom:1px dashed #c2cad8
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control~label {
                font-size:16px;
                top:25px;
                transition:.2s ease all;
                color:#999
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control.edited~label,.form-group.form-md-line-input.form-md-floating-label .form-control.focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control.form-control-static~label,.form-group.form-md-line-input.form-md-floating-label .form-control:focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control[readonly]~label {
                top:0;
                font-size:13px
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control.input-sm~label {
                font-size:14px;
                top:24px
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control.input-sm.edited~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-sm.focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-sm.form-control-static~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-sm:focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-sm[readonly]~label {
                top:0;
                font-size:13px
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control.input-lg~label {
                font-size:20px;
                top:30px
            }
            .form-group.form-md-line-input.form-md-floating-label .form-control.input-lg.edited~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-lg.focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-lg.form-control-static~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-lg:focus:not([readonly])~label,.form-group.form-md-line-input.form-md-floating-label .form-control.input-lg[readonly]~label {
                top:0;
                font-size:13px
            }
            .form-group.form-md-line-input.form-md-floating-label .input-icon>label {
                padding-left:34px
            }
            .form-group.form-md-line-input.form-md-floating-label .input-icon.right>label {
                padding-left:0;
                padding-right:34px
            }
            .form-group.form-md-line-input.form-md-floating-label .input-group.left-addon label,.form-group.form-md-line-input>.input-icon .form-control {
                padding-left:34px
            }
            .form-group.form-md-line-input.form-md-floating-label .input-group.right-addon label {
                padding-right:34px
            }
            .form-group.form-md-line-input .help-block {
                position:absolute;
                margin:2px 0 0;
                opacity:0;
                filter:alpha(opacity=0);
                font-size:13px
            }
            .form-group.form-md-line-input>.input-icon>i {
                left:0;
                bottom:0;
                margin:9px 2px 10px 10px;
                color:#888
            }
            .form-group.form-md-line-input.has-success .form-control.edited:not([readonly])~.help-block,.form-group.form-md-line-input.has-success .form-control.edited:not([readonly])~i,.form-group.form-md-line-input.has-success .form-control.edited:not([readonly])~label,.form-group.form-md-line-input.has-success .form-control.focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-success .form-control.focus:not([readonly])~i,.form-group.form-md-line-input.has-success .form-control.focus:not([readonly])~label,.form-group.form-md-line-input.has-success .form-control.form-control-static~.help-block,.form-group.form-md-line-input.has-success .form-control.form-control-static~i,.form-group.form-md-line-input.has-success .form-control.form-control-static~label,.form-group.form-md-line-input.has-success .form-control:focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-success .form-control:focus:not([readonly])~i,.form-group.form-md-line-input.has-success .form-control:focus:not([readonly])~label,.form-group.form-md-line-input.has-success label {
                color:#27a4b0
            }
            .form-group.form-md-line-input>.input-icon.input-icon-lg>i {
                top:6px
            }
            .form-group.form-md-line-input>.input-icon.input-icon-sm>i {
                top:-1px
            }
            .form-group.form-md-line-input>.input-icon>label {
                margin-top:-20px
            }
            .form-group.form-md-line-input>.input-icon.right .form-control {
                padding-left:0;
                padding-right:34px
            }
            .form-group.form-md-line-input>.input-icon.right>i {
                left:auto;
                right:8px;
                margin:11px 2px 10px 10px
            }
            .form-horizontal .form-group.form-md-line-input .input-group>.form-control-focus,.form-horizontal .form-group.form-md-line-input .input-group>.input-group-control>.form-control-focus,.form-horizontal .form-group.form-md-line-input .input-icon>.form-control-focus {
                left:0!important;
                right:0!important
            }
            .form-group.form-md-line-input .input-group .input-group-control>label,.form-group.form-md-line-input .input-group>label {
                margin-top:-20px
            }
            .form-group.form-md-line-input .input-group .input-group-addon {
                -webkit-border-radius:0;
                -moz-border-radius:0;
                -ms-border-radius:0;
                -o-border-radius:0;
                border-radius:0;
                background:0 0;
                border:0;
                border-bottom:1px solid #c2cad8
            }
            .form-group.form-md-line-input .input-group .input-group-control {
                padding-top:0;
                position:relative;
                display:table-cell;
                vertical-align:bottom
            }
            .badge,.input-inline {
                vertical-align:middle
            }
            .form-group.form-md-line-input .input-group .input-group-btn .btn {
                -webkit-border-radius:2px;
                -moz-border-radius:2px;
                -ms-border-radius:2px;
                -o-border-radius:2px;
                border-radius:2px
            }
            .form-group.form-md-line-input .input-group .input-group-btn.btn-left .btn {
                margin-right:10px
            }
            .form-group.form-md-line-input .input-group .input-group-btn.btn-right .btn {
                margin-left:10px
            }
            .form-group.form-md-line-input .input-group .help-block {
                margin-top:35px
            }
            .form-group.form-md-line-input .input-group.input-group-sm .help-block {
                margin-top:30px
            }
            .form-group.form-md-line-input .input-group.input-group-lg .help-block {
                margin-top:47px
            }
            .form-group.form-md-line-input.has-success .form-control {
                border-bottom:1px solid #27a4b0
            }
            .form-group.form-md-line-input.has-success .form-control.edited:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-success .form-control.edited:not([readonly])~label:after,.form-group.form-md-line-input.has-success .form-control.focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-success .form-control.focus:not([readonly])~label:after,.form-group.form-md-line-input.has-success .form-control.form-control-static~.form-control-focus:after,.form-group.form-md-line-input.has-success .form-control.form-control-static~label:after,.form-group.form-md-line-input.has-success .form-control:focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-success .form-control:focus:not([readonly])~label:after {
                background:#27a4b0
            }
            .form-group.form-md-line-input.has-success .input-group-addon {
                color:#27a4b0;
                border-bottom:1px solid #27a4b0
            }
            .form-group.form-md-line-input.has-warning .form-control.edited:not([readonly])~.help-block,.form-group.form-md-line-input.has-warning .form-control.edited:not([readonly])~i,.form-group.form-md-line-input.has-warning .form-control.edited:not([readonly])~label,.form-group.form-md-line-input.has-warning .form-control.focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-warning .form-control.focus:not([readonly])~i,.form-group.form-md-line-input.has-warning .form-control.focus:not([readonly])~label,.form-group.form-md-line-input.has-warning .form-control.form-control-static~.help-block,.form-group.form-md-line-input.has-warning .form-control.form-control-static~i,.form-group.form-md-line-input.has-warning .form-control.form-control-static~label,.form-group.form-md-line-input.has-warning .form-control:focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-warning .form-control:focus:not([readonly])~i,.form-group.form-md-line-input.has-warning .form-control:focus:not([readonly])~label,.form-group.form-md-line-input.has-warning label {
                color:#c29d0b
            }
            .form-group.form-md-line-input.has-warning .form-control {
                border-bottom:1px solid #c29d0b
            }
            .form-group.form-md-line-input.has-warning .form-control.edited:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-warning .form-control.edited:not([readonly])~label:after,.form-group.form-md-line-input.has-warning .form-control.focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-warning .form-control.focus:not([readonly])~label:after,.form-group.form-md-line-input.has-warning .form-control.form-control-static~.form-control-focus:after,.form-group.form-md-line-input.has-warning .form-control.form-control-static~label:after,.form-group.form-md-line-input.has-warning .form-control:focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-warning .form-control:focus:not([readonly])~label:after {
                background:#c29d0b
            }
            .form-group.form-md-line-input.has-warning .input-group-addon {
                color:#c29d0b;
                border-bottom:1px solid #c29d0b
            }
            .form-group.form-md-line-input.has-error .form-control.edited:not([readonly])~.help-block,.form-group.form-md-line-input.has-error .form-control.edited:not([readonly])~i,.form-group.form-md-line-input.has-error .form-control.edited:not([readonly])~label,.form-group.form-md-line-input.has-error .form-control.focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-error .form-control.focus:not([readonly])~i,.form-group.form-md-line-input.has-error .form-control.focus:not([readonly])~label,.form-group.form-md-line-input.has-error .form-control.form-control-static~.help-block,.form-group.form-md-line-input.has-error .form-control.form-control-static~i,.form-group.form-md-line-input.has-error .form-control.form-control-static~label,.form-group.form-md-line-input.has-error .form-control:focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-error .form-control:focus:not([readonly])~i,.form-group.form-md-line-input.has-error .form-control:focus:not([readonly])~label,.form-group.form-md-line-input.has-error label {
                color:#e73d4a
            }
            .form-group.form-md-line-input.has-error .form-control {
                border-bottom:1px solid #e73d4a
            }
            .form-group.form-md-line-input.has-error .form-control.edited:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-error .form-control.edited:not([readonly])~label:after,.form-group.form-md-line-input.has-error .form-control.focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-error .form-control.focus:not([readonly])~label:after,.form-group.form-md-line-input.has-error .form-control.form-control-static~.form-control-focus:after,.form-group.form-md-line-input.has-error .form-control.form-control-static~label:after,.form-group.form-md-line-input.has-error .form-control:focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-error .form-control:focus:not([readonly])~label:after {
                background:#e73d4a
            }
            .form-group.form-md-line-input.has-error .input-group-addon {
                color:#e73d4a;
                border-bottom:1px solid #e73d4a
            }
            .form-group.form-md-line-input.has-info .form-control.edited:not([readonly])~.help-block,.form-group.form-md-line-input.has-info .form-control.edited:not([readonly])~i,.form-group.form-md-line-input.has-info .form-control.edited:not([readonly])~label,.form-group.form-md-line-input.has-info .form-control.focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-info .form-control.focus:not([readonly])~i,.form-group.form-md-line-input.has-info .form-control.focus:not([readonly])~label,.form-group.form-md-line-input.has-info .form-control.form-control-static~.help-block,.form-group.form-md-line-input.has-info .form-control.form-control-static~i,.form-group.form-md-line-input.has-info .form-control.form-control-static~label,.form-group.form-md-line-input.has-info .form-control:focus:not([readonly])~.help-block,.form-group.form-md-line-input.has-info .form-control:focus:not([readonly])~i,.form-group.form-md-line-input.has-info .form-control:focus:not([readonly])~label,.form-group.form-md-line-input.has-info label {
                color:#327ad5
            }
            .form-group.form-md-line-input.has-info .form-control {
                border-bottom:1px solid #327ad5
            }
            .form-group.form-md-line-input.has-info .form-control.edited:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-info .form-control.edited:not([readonly])~label:after,.form-group.form-md-line-input.has-info .form-control.focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-info .form-control.focus:not([readonly])~label:after,.form-group.form-md-line-input.has-info .form-control.form-control-static~.form-control-focus:after,.form-group.form-md-line-input.has-info .form-control.form-control-static~label:after,.form-group.form-md-line-input.has-info .form-control:focus:not([readonly])~.form-control-focus:after,.form-group.form-md-line-input.has-info .form-control:focus:not([readonly])~label:after {
                background:#327ad5
            }
            .form-group.form-md-line-input.has-info .input-group-addon {
                color:#327ad5;
                border-bottom:1px solid #327ad5
            }
            .form-inline .form-md-line-input {
                margin:0 20px 0 0
            }
            .form-inline .form-md-line-input>.input-icon {
                padding:0
            }
            .form-horizontal .form-group.form-md-line-input .input-icon .form-control {
                padding-left:33px
            }
            .form-horizontal .form-group.form-md-line-input .input-icon>i {
                top:0
            }
            .form-horizontal .form-group.form-md-line-input .input-icon.right .form-control {
                padding-left:0;
                padding-right:33px
            }
            .form-horizontal .form-group.form-md-line-input .input-group>.input-group-btn .btn {
                margin-bottom:0!important
            }
        </style>
    </head>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title><?php echo $this->config->item('sitename'); ?> | Questionaries</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?= $this->config->item('adminassets'); ?>global/css/components-md.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>global/css/plugins-md.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="<?= $this->config->item('adminassets'); ?>layouts/layout2/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="<?= $this->config->item('adminassets'); ?>layouts/layout2/css/themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="<?= $this->config->item('adminassets'); ?>layouts/layout2/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <script src="<?= $this->config->item('adminassets'); ?>global/plugins/jquery.min.js" type="text/javascript"></script>

        <link rel="shortcut icon" href="favicon.ico" />
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
        <!-- END HEAD -->
        <script>
            var baseurl = '<?= base_url() ?>';
        </script>
    </head>
    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <!-- BEGIN HEADER -->
        <div class="page-header navbar navbar-fixed-top">
            <!-- BEGIN HEADER INNER -->
            <div class="page-header-inner ">
                <!-- BEGIN LOGO -->
                <div class="page-logo">
                    <a href="<?php echo site_url('admin/dashboard'); ?>">
                    </a>
                    <div class="menu-toggler sidebar-toggler">
                        <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                    </div>
                </div>
                <!-- END LOGO -->
                <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <!-- BEGIN PAGE ACTIONS -->
                <!-- DOC: Remove "hide" class to enable the page header actions -->
                <!-- END PAGE ACTIONS -->
                <!-- BEGIN PAGE TOP -->
                <div class="page-top">
                    <!-- BEGIN HEADER SEARCH BOX -->
                    <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                    <form class="search-form search-form-expanded" action="page_general_search_3.html" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search..." name="query">
                            <span class="input-group-btn">
                                <a href="javascript:;" class="btn submit">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </span>
                        </div>
                    </form>
                    <!-- END HEADER SEARCH BOX -->
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="top-menu">
                        <ul class="nav navbar-nav pull-right">
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <?php /** <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-bell"></i>
                              <span class="badge badge-default"> 7 </span>
                              </a>
                              <ul class="dropdown-menu">
                              <li class="external">
                              <h3>
                              <span class="bold">12 pending</span> notifications</h3>
                              <a href="page_user_profile_1.html">view all</a>
                              </li>
                              <li>
                              <ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
                              <li>
                              <a href="javascript:;">
                              <span class="time">just now</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-success">
                              <i class="fa fa-plus"></i>
                              </span> New user registered. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">3 mins</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-danger">
                              <i class="fa fa-bolt"></i>
                              </span> Server #12 overloaded. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">10 mins</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-warning">
                              <i class="fa fa-bell-o"></i>
                              </span> Server #2 not responding. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">14 hrs</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-info">
                              <i class="fa fa-bullhorn"></i>
                              </span> Application error. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">2 days</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-danger">
                              <i class="fa fa-bolt"></i>
                              </span> Database overloaded 68%. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">3 days</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-danger">
                              <i class="fa fa-bolt"></i>
                              </span> A user IP blocked. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">4 days</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-warning">
                              <i class="fa fa-bell-o"></i>
                              </span> Storage Server #4 not responding dfdfdfd. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">5 days</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-info">
                              <i class="fa fa-bullhorn"></i>
                              </span> System Error. </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="time">9 days</span>
                              <span class="details">
                              <span class="label label-sm label-icon label-danger">
                              <i class="fa fa-bolt"></i>
                              </span> Storage server failed. </span>
                              </a>
                              </li>
                              </ul>
                              </li>
                              </ul>
                              </li>
                              <!-- END NOTIFICATION DROPDOWN -->
                              <!-- BEGIN INBOX DROPDOWN -->
                              <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                              <li class="dropdown dropdown-extended dropdown-inbox" id="header_inbox_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-envelope-open"></i>
                              <span class="badge badge-default"> 4 </span>
                              </a>
                              <ul class="dropdown-menu">
                              <li class="external">
                              <h3>You have
                              <span class="bold">7 New</span> Messages</h3>
                              <a href="app_inbox.html">view all</a>
                              </li>
                              <li>
                              <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                              <li>
                              <a href="#">
                              <span class="photo">
                              <img src="<?= $this->config->item('adminassets'); ?>layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                              <span class="subject">
                              <span class="from"> Lisa Wong </span>
                              <span class="time">Just Now </span>
                              </span>
                              <span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                              </a>
                              </li>
                              <li>
                              <a href="#">
                              <span class="photo">
                              <img src="<?= $this->config->item('adminassets'); ?>layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                              <span class="subject">
                              <span class="from"> Richard Doe </span>
                              <span class="time">16 mins </span>
                              </span>
                              <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                              </a>
                              </li>
                              <li>
                              <a href="#">
                              <span class="photo">
                              <img src="<?= $this->config->item('adminassets'); ?>layouts/layout3/img/avatar1.jpg" class="img-circle" alt=""> </span>
                              <span class="subject">
                              <span class="from"> Bob Nilson </span>
                              <span class="time">2 hrs </span>
                              </span>
                              <span class="message"> Vivamus sed nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                              </a>
                              </li>
                              <li>
                              <a href="#">
                              <span class="photo">
                              <img src="<?= $this->config->item('adminassets'); ?>layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> </span>
                              <span class="subject">
                              <span class="from"> Lisa Wong </span>
                              <span class="time">40 mins </span>
                              </span>
                              <span class="message"> Vivamus sed auctor 40% nibh congue nibh... </span>
                              </a>
                              </li>
                              <li>
                              <a href="#">
                              <span class="photo">
                              <img src="<?= $this->config->item('adminassets'); ?>layouts/layout3/img/avatar3.jpg" class="img-circle" alt=""> </span>
                              <span class="subject">
                              <span class="from"> Richard Doe </span>
                              <span class="time">46 mins </span>
                              </span>
                              <span class="message"> Vivamus sed congue nibh auctor nibh congue nibh. auctor nibh auctor nibh... </span>
                              </a>
                              </li>
                              </ul>
                              </li>
                              </ul>
                              </li>
                              <!-- END INBOX DROPDOWN -->
                              <!-- BEGIN TODO DROPDOWN -->
                              <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                              <li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
                              <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                              <i class="icon-calendar"></i>
                              <span class="badge badge-default"> 3 </span>
                              </a>
                              <ul class="dropdown-menu extended tasks">
                              <li class="external">
                              <h3>You have
                              <span class="bold">12 pending</span> tasks</h3>
                              <a href="app_todo.html">view all</a>
                              </li>
                              <li>
                              <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">New release v1.2 </span>
                              <span class="percent">30%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">40% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">Application deployment</span>
                              <span class="percent">65%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">65% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">Mobile app release</span>
                              <span class="percent">98%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">98% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">Database migration</span>
                              <span class="percent">10%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">10% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">Web server upgrade</span>
                              <span class="percent">58%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 58%;" class="progress-bar progress-bar-info" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">58% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">Mobile development</span>
                              <span class="percent">85%</span>
                              </span>
                              <span class="progress">
                              <span style="width: 85%;" class="progress-bar progress-bar-success" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">85% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              <li>
                              <a href="javascript:;">
                              <span class="task">
                              <span class="desc">New UI release</span>
                              <span class="percent">38%</span>
                              </span>
                              <span class="progress progress-striped">
                              <span style="width: 38%;" class="progress-bar progress-bar-important" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100">
                              <span class="sr-only">38% Complete</span>
                              </span>
                              </span>
                              </a>
                              </li>
                              </ul>
                              </li>
                              </ul>
                              </li> */ ?>
                            <!-- END TODO DROPDOWN -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-user">
                                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                    <img alt="" class="img-circle" src="<?= $this->config->item('adminassets'); ?>layouts/layout2/img/avatar3_small.jpg" />
                                    <span class="username username-hide-on-mobile"> <?php echo $this->flexi_auth->get_user_by_identity_row_array()['upro_first_name']; ?> </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-default">
                                    <li>
                                        <a href="<?php echo site_url('account/logout'); ?>">
                                            <i class="icon-key"></i> Log Out </a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                            <!-- BEGIN QUICK SIDEBAR TOGGLER -->
                            <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                            <li class="dropdown dropdown-extended quick-sidebar-toggler">
                                <span class="sr-only">Toggle Quick Sidebar</span>
                                <i class="icon-logout"></i>
                            </li>
                            <!-- END QUICK SIDEBAR TOGGLER -->
                        </ul>
                    </div>
                    <!-- END TOP NAVIGATION MENU -->
                </div>
                <!-- END PAGE TOP -->
            </div>
            <!-- END HEADER INNER -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
                <!-- END SIDEBAR -->
                <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                <div class="page-sidebar navbar-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                    <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                    <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                    <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                        <li class="nav-item start <?php if ($this->uri->segment(1) == 'dashboard') { ?>active open <?php } ?>">
                            <a href="<?= base_url() ?>dashboard" class="nav-link nav-toggle">
                                <i class="icon-home"></i>
                                <span class="title">Dashboard</span>
                                <span class="selected"></span>
                                <span class="arrow open"></span>
                            </a>
                        </li>
                        <li class="nav-item  <?php if ($this->uri->segment(1) == 'survey') { ?>active open <?php } ?>">
                            <a href="<?= base_url() ?>survey" class="nav-link nav-toggle">
                                <i class="icon-diamond"></i>
                                <span class="title">Survey</span>
                                <span class="arrow"></span>
                            </a>
                        </li>
                        <!-- <li class="nav-item  ">
                             <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="icon-bar-chart"></i>
                                 <span class="title">Orders</span>
                                 <span class="arrow"></span>
                             </a>
                             <ul class="sub-menu">
                                 <li class="nav-item  ">
                                     <a href="<?= base_url() ?>admin/order-list" class="nav-link ">
                                         <span class="title">Order List</span>
                                     </a>
                                 </li>
                             </ul>
                         </li>

                         <li class="nav-item  ">
                             <a href="javascript:;" class="nav-link nav-toggle">
                                 <i class="icon-feed"></i>
                                 <span class="title">Contact Us</span>
                                 <span class="arrow"></span>
                             </a>
                             <ul class="sub-menu">
                                 <li class="nav-item  ">
                                     <a href="<?= base_url() ?>admin/enquiry-list" class="nav-link ">
                                         <span class="title">Enquiry List</span>
                                     </a>
                                 </li>
                             </ul>
                         </li> -->


                        <li class="nav-item <?php if ($this->uri->segment(1) == 'organization') { ?>active open <?php } ?>">
                            <a href="<?= base_url() ?>organization" class="nav-link nav-toggle">
                                <i class="icon-user"></i>
                                <span class="title">Organization</span>
                                <span class="arrow"></span>
                            </a>

                        </li>

                        <li class="nav-item <?php if ($this->uri->segment(1) == 'reports') { ?>active open <?php } ?>">
                            <a href="<?= base_url() ?>reports" class="nav-link nav-toggle">
                                <i class="icon-bar-chart"></i>
                                <span class="title">Reports</span>
                                <span class="arrow"></span>
                            </a>

                        </li>

                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
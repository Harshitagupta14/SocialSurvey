<script>
    var last_id = $("#last_id").val();


    window.onload = function load_contents() {

        $.ajax({
            type: "POST",
            async: 'false',
            url: baseurl + 'ajax-fetch-survey-feeds',
            dataType: "json",
            success: function (msg) {

                $('#survey_container').append(msg.html);
                $('#card_view_container_spinner').hide();
                //$('#loader').hide();

            }
        })

    };


</script>

<!-- BEGIN CONTENT -->
<div class="page-content-wrapper" >
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" id="card_view_container">
        <?php if (!empty($message)) { ?>
            <?php echo $message; ?>
        <?php } ?>
        <!-- BEGIN PAGE HEADER-->
        <h1 class="page-title"> Dashboard
            <small>Survey and Statistics</small>
        </h1>
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <i class="icon-home"></i>
                    <a href="index.html">Home</a>
                    <i class="fa fa-angle-right"></i>
                </li>
                <li>
                    <span>Dashboard</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE HEADER-->
        <div class="row" id="survey_container">
            <?php foreach ($survey_feeds as $survey) { ?>
                <div class="col-md-4">
                    <!-- BEGIN Portlet PORTLET-->
                    <div class="portlet light">
                        <div class="portlet-title">
                            <ul class="nav nav-pills">
                                <li class="tooltips" data-container="body" data-placement="top" data-original-title="Questios">
                                    <a href="#" style="background-color:#eee;"> <i class="fa fa-question-circle m-r-5"></i>
                                        <span class="badge badge-danger"> <?php echo $survey['question_count']; ?> </span>
                                    </a>
                                </li>
                                <li  class="tooltips" data-container="body" data-placement="top" data-original-title="Responses">
                                    <a href="#" style="background-color:#eee;"> <i class="fa fa-area-chart"></i>
                                        <span class="badge badge-danger"> 3 </span>
                                    </a>
                                </li>
                                <li style="float:right;"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $this->components->time_elapsed_string($survey['add_time']); ?></li>
                            </ul>

                        </div>
                        <div class="portlet-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4><?php echo $survey['survey_title']; ?></h4>
                                    <span class="label label-warning"> Draft/Pubished </span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="actions" style="float:right;">
                                        <a class="btn btn-circle btn-icon-only btn-default" href="<?php echo site_url('survey/' . $survey['survey_id']); ?>">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-cloud-upload"></i>
                                        </a>
                                        <a class="btn btn-circle btn-icon-only btn-default" href="javascript:;">
                                            <i class="icon-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END Portlet PORTLET-->
                </div>
            <?php } ?>



        </div>

        <div class="mdl-grid " id="card_view_container"></div>


    </div>
    <!-- END CONTENT BODY -->
</div>
<!-- END CONTENT -->
<!-- BEGIN QUICK SIDEBAR -->
<a href="javascript:;" class="page-quick-sidebar-toggler">
    <i class="icon-login"></i>
</a>
<div class="page-quick-sidebar-wrapper" data-close-on-body-click="false">
    <div class="page-quick-sidebar">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="javascript:;" data-target="#quick_sidebar_tab_1" data-toggle="tab"> Users
                    <span class="badge badge-danger">2</span>
                </a>
            </li>
            <li>
                <a href="javascript:;" data-target="#quick_sidebar_tab_2" data-toggle="tab"> Alerts
                    <span class="badge badge-success">7</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> More
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul class="dropdown-menu pull-right">
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-bell"></i> Alerts </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-info"></i> Notifications </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-speech"></i> Activities </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="javascript:;" data-target="#quick_sidebar_tab_3" data-toggle="tab">
                            <i class="icon-settings"></i> Settings </a>
                    </li>
                </ul>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active page-quick-sidebar-chat" id="quick_sidebar_tab_1">
                <div class="page-quick-sidebar-chat-users" data-rail-color="#ddd" data-wrapper-class="page-quick-sidebar-list">
                    <h3 class="list-heading">Staff</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">8</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar3.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Bob Nilson</h4>
                                <div class="media-heading-sub"> Project Manager </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar1.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Nick Larson</h4>
                                <div class="media-heading-sub"> Art Director </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">3</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar4.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Hubert</h4>
                                <div class="media-heading-sub"> CTO </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar2.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ella Wong</h4>
                                <div class="media-heading-sub"> CEO </div>
                            </div>
                        </li>
                    </ul>
                    <h3 class="list-heading">Customers</h3>
                    <ul class="media-list list-items">
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-warning">2</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar6.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lara Kunis</h4>
                                <div class="media-heading-sub"> CEO, Loop Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="label label-sm label-success">new</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar7.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Ernie Kyllonen</h4>
                                <div class="media-heading-sub"> Project Manager,
                                    <br> SmartBizz PTL </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar8.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Lisa Stone</h4>
                                <div class="media-heading-sub"> CTO, Keort Inc </div>
                                <div class="media-heading-small"> Last seen 13:10 PM </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-success">7</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar9.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Deon Portalatin</h4>
                                <div class="media-heading-sub"> CFO, H&D LTD </div>
                            </div>
                        </li>
                        <li class="media">
                            <img class="media-object" src="../assets/layouts/layout/img/avatar10.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Irina Savikova</h4>
                                <div class="media-heading-sub"> CEO, Tizda Motors Inc </div>
                            </div>
                        </li>
                        <li class="media">
                            <div class="media-status">
                                <span class="badge badge-danger">4</span>
                            </div>
                            <img class="media-object" src="../assets/layouts/layout/img/avatar11.jpg" alt="...">
                            <div class="media-body">
                                <h4 class="media-heading">Maria Gomez</h4>
                                <div class="media-heading-sub"> Manager, Infomatic Inc </div>
                                <div class="media-heading-small"> Last seen 03:10 AM </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="page-quick-sidebar-item">
                    <div class="page-quick-sidebar-chat-user">
                        <div class="page-quick-sidebar-nav">
                            <a href="javascript:;" class="page-quick-sidebar-back-to-list">
                                <i class="icon-arrow-left"></i>Back</a>
                        </div>
                        <div class="page-quick-sidebar-chat-user-messages">
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> When could you send me the report ? </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Its almost done. I will be sending it shortly </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:15</span>
                                    <span class="body"> Alright. Thanks! :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:16</span>
                                    <span class="body"> You are most welcome. Sorry for the delay. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> No probs. Just take your time :) </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Alright. I just emailed it to you. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Great! Thanks. Will check it right away. </span>
                                </div>
                            </div>
                            <div class="post in">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar2.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Ella Wong</a>
                                    <span class="datetime">20:40</span>
                                    <span class="body"> Please let me know if you have any comment. </span>
                                </div>
                            </div>
                            <div class="post out">
                                <img class="avatar" alt="" src="../assets/layouts/layout/img/avatar3.jpg" />
                                <div class="message">
                                    <span class="arrow"></span>
                                    <a href="javascript:;" class="name">Bob Nilson</a>
                                    <span class="datetime">20:17</span>
                                    <span class="body"> Sure. I will check and buzz you if anything needs to be corrected. </span>
                                </div>
                            </div>
                        </div>
                        <div class="page-quick-sidebar-chat-user-form">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Type a message here...">
                                <div class="input-group-btn">
                                    <button type="button" class="btn green">
                                        <i class="icon-paper-clip"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-alerts" id="quick_sidebar_tab_2">
                <div class="page-quick-sidebar-alerts-list">
                    <h3 class="list-heading">General</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-success">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-danger">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-warning"> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-default">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <h3 class="list-heading">System</h3>
                    <ul class="feeds list-items">
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-check"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 4 pending tasks.
                                            <span class="label label-sm label-warning "> Take action
                                                <i class="fa fa-share"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> Just now </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-danger">
                                                <i class="fa fa-bar-chart-o"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> Finance Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-default">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-info">
                                            <i class="fa fa-shopping-cart"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> New order received with
                                            <span class="label label-sm label-success"> Reference Number: DR23923 </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 30 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-success">
                                            <i class="fa fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> You have 5 pending membership that requires a quick review. </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 24 mins </div>
                            </div>
                        </li>
                        <li>
                            <div class="col1">
                                <div class="cont">
                                    <div class="cont-col1">
                                        <div class="label label-sm label-warning">
                                            <i class="fa fa-bell-o"></i>
                                        </div>
                                    </div>
                                    <div class="cont-col2">
                                        <div class="desc"> Web server hardware needs to be upgraded.
                                            <span class="label label-sm label-default "> Overdue </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col2">
                                <div class="date"> 2 hours </div>
                            </div>
                        </li>
                        <li>
                            <a href="javascript:;">
                                <div class="col1">
                                    <div class="cont">
                                        <div class="cont-col1">
                                            <div class="label label-sm label-info">
                                                <i class="fa fa-briefcase"></i>
                                            </div>
                                        </div>
                                        <div class="cont-col2">
                                            <div class="desc"> IPO Report for year 2013 has been released. </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col2">
                                    <div class="date"> 20 mins </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
                <div class="page-quick-sidebar-settings-list">
                    <h3 class="list-heading">General Settings</h3>
                    <ul class="list-items borderless">
                        <li> Enable Notifications
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Allow Tracking
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="info" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Log Errors
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Auto Sumbit Issues
                            <input type="checkbox" class="make-switch" data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Enable SMS Alerts
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="success" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <h3 class="list-heading">System Settings</h3>
                    <ul class="list-items borderless">
                        <li> Security Level
                            <select class="form-control input-inline input-sm input-small">
                                <option value="1">Normal</option>
                                <option value="2" selected>Medium</option>
                                <option value="e">High</option>
                            </select>
                        </li>
                        <li> Failed Email Attempts
                            <input class="form-control input-inline input-sm input-small" value="5" /> </li>
                        <li> Secondary SMTP Port
                            <input class="form-control input-inline input-sm input-small" value="3560" /> </li>
                        <li> Notify On System Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="danger" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                        <li> Notify On SMTP Error
                            <input type="checkbox" class="make-switch" checked data-size="small" data-on-color="warning" data-on-text="ON" data-off-color="default" data-off-text="OFF"> </li>
                    </ul>
                    <div class="inner-content">
                        <button class="btn btn-success">
                            <i class="icon-settings"></i> Save Changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END QUICK SIDEBAR -->
</div>
<style>
    .zs-contentAdder--header {
        background-color: white;
        height: 46px;
        min-height: 46px;
        padding: 0 40px;
        text-align: right;
    }
    .zs-contentAdder--header > div, .zs-contentAdder--footer > div {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: space-around;
    }
    .mdl-typography--text-center {
        text-align: center;
    }
    .zs-align-item--center {
        margin-left: auto;
        margin-right: auto;
    }
    .mdl-spinner {
        display: inline-block;
        height: 28px;
        position: relative;
        width: 28px;
    }
    .mdl-spinner.is-active:not(.is-upgraded)::after {
        content: "Loading...";
    }
    .mdl-spinner.is-upgraded.is-active {
        animation: 1568.24ms linear 0s normal none infinite running mdl-spinner__container-rotate;
    }
    @keyframes mdl-spinner__container-rotate {
        100% {
            transform: rotate(360deg);
        }
    }
    .mdl-spinner__layer {
        height: 100%;
        opacity: 0;
        position: absolute;
        width: 100%;
    }
    .mdl-spinner__layer-1 {
        border-color: rgb(66, 165, 245);
    }
    .mdl-spinner--single-color .mdl-spinner__layer-1 {
        border-color: rgb(66, 66, 66);
    }
    .mdl-spinner.is-active .mdl-spinner__layer-1 {
        animation: 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__fill-unfill-rotate, 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__layer-1-fade-in-out;
    }
    .mdl-spinner__layer-2 {
        border-color: rgb(244, 67, 54);
    }
    .mdl-spinner--single-color .mdl-spinner__layer-2 {
        border-color: rgb(66, 66, 66);
    }
    .mdl-spinner.is-active .mdl-spinner__layer-2 {
        animation: 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__fill-unfill-rotate, 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__layer-2-fade-in-out;
    }
    .mdl-spinner__layer-3 {
        border-color: rgb(253, 216, 53);
    }
    .mdl-spinner--single-color .mdl-spinner__layer-3 {
        border-color: rgb(66, 66, 66);
    }
    .mdl-spinner.is-active .mdl-spinner__layer-3 {
        animation: 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__fill-unfill-rotate, 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__layer-3-fade-in-out;
    }
    .mdl-spinner__layer-4 {
        border-color: rgb(76, 175, 80);
    }
    .mdl-spinner--single-color .mdl-spinner__layer-4 {
        border-color: rgb(66, 66, 66);
    }
    .mdl-spinner.is-active .mdl-spinner__layer-4 {
        animation: 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__fill-unfill-rotate, 5332ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__layer-4-fade-in-out;
    }
    @keyframes mdl-spinner__fill-unfill-rotate {
        12.5% {
            transform: rotate(135deg);
        }
        25% {
            transform: rotate(270deg);
        }
        37.5% {
            transform: rotate(405deg);
        }
        50% {
            transform: rotate(540deg);
        }
        62.5% {
            transform: rotate(675deg);
        }
        75% {
            transform: rotate(810deg);
        }
        87.5% {
            transform: rotate(945deg);
        }
        100% {
            transform: rotate(1080deg);
        }
    }
    @keyframes mdl-spinner__layer-1-fade-in-out {
        0% {
            opacity: 0.99;
        }
        25% {
            opacity: 0.99;
        }
        26% {
            opacity: 0;
        }
        89% {
            opacity: 0;
        }
        90% {
            opacity: 0.99;
        }
        100% {
            opacity: 0.99;
        }
    }
    @keyframes mdl-spinner__layer-2-fade-in-out {
        0% {
            opacity: 0;
        }
        15% {
            opacity: 0;
        }
        25% {
            opacity: 0.99;
        }
        50% {
            opacity: 0.99;
        }
        51% {
            opacity: 0;
        }
    }
    @keyframes mdl-spinner__layer-3-fade-in-out {
        0% {
            opacity: 0;
        }
        40% {
            opacity: 0;
        }
        50% {
            opacity: 0.99;
        }
        75% {
            opacity: 0.99;
        }
        76% {
            opacity: 0;
        }
    }
    @keyframes mdl-spinner__layer-4-fade-in-out {
        0% {
            opacity: 0;
        }
        65% {
            opacity: 0;
        }
        75% {
            opacity: 0.99;
        }
        90% {
            opacity: 0.99;
        }
        100% {
            opacity: 0;
        }
    }
    .mdl-spinner__gap-patch {
        border-color: inherit;
        box-sizing: border-box;
        height: 100%;
        left: 45%;
        overflow: hidden;
        position: absolute;
        top: 0;
        width: 10%;
    }
    .mdl-spinner__gap-patch .mdl-spinner__circle {
        left: -450%;
        width: 1000%;
    }
    .mdl-spinner__circle-clipper {
        border-color: inherit;
        display: inline-block;
        height: 100%;
        overflow: hidden;
        position: relative;
        width: 50%;
    }
    .mdl-spinner__circle-clipper .mdl-spinner__circle {
        width: 200%;
    }
    .mdl-spinner__circle {
        animation: 0s ease 0s normal none 1 running none;
        border-bottom-color: transparent !important;
        border-left-color: inherit;
        border-radius: 50%;
        border-right-color: inherit;
        border-style: solid;
        border-top-color: inherit;
        border-width: 3px;
        bottom: 0;
        box-sizing: border-box;
        height: 100%;
        left: 0;
        position: absolute;
        right: 0;
        top: 0;
    }
    .mdl-spinner__left .mdl-spinner__circle {
        border-right-color: transparent !important;
        transform: rotate(129deg);
    }
    .mdl-spinner.is-active .mdl-spinner__left .mdl-spinner__circle {
        animation: 1333ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__left-spin;
    }
    .mdl-spinner__right .mdl-spinner__circle {
        border-left-color: transparent !important;
        left: -100%;
        transform: rotate(-129deg);
    }
    .mdl-spinner.is-active .mdl-spinner__right .mdl-spinner__circle {
        animation: 1333ms cubic-bezier(0.4, 0, 0.2, 1) 0s normal both infinite running mdl-spinner__right-spin;
    }
    @keyframes mdl-spinner__left-spin {
        0% {
            transform: rotate(130deg);
        }
        50% {
            transform: rotate(-5deg);
        }
        100% {
            transform: rotate(130deg);
        }
    }
    @keyframes mdl-spinner__right-spin {
        0% {
            transform: rotate(-130deg);
        }
        50% {
            transform: rotate(5deg);
        }
        100% {
            transform: rotate(-130deg);
        }
    }
    .zs-hidden {
        display: none;
        opacity: 0;
        transform: scale(0);
        visibility: hidden;
    }
</style>
<script>
    function approxDateDiff(mysqlDate) {
        // Split timestamp into [ Y, M, D, h, m, s ]
        var t = mysqlDate.split(/[- :]/);
        // Apply each element to the Date function
        var startDate = new Date(t[0], t[1] - 1, t[2], t[3], t[4], t[5]);
        var now = new Date();
        var difference = (now.getTime() - startDate.getTime()) / 1000 | 0;
        if ((difference / (60 * 60 * 24 * 365) | 0)) {
            var years = Math.round(difference / (60 * 60 * 24 * 365));
            return  years == 1 ? years + ' Year' : years + ' Years';
        }
        if ((difference / (60 * 60 * 24 * 30) | 0)) {
            var months = Math.round(difference / (60 * 60 * 24 * 30));
            return  months + (months == 1 ? ' Month' : ' Months');
        }
        if ((difference / (60 * 60 * 24) | 0)) {
            var days = Math.round(difference / (60 * 60 * 24));
            return  days + (days == 1 ? ' Day' : ' Days');
        }
        if ((difference / (60 * 60) | 0)) {
            var hours = Math.round(difference / (60 * 60));
            return  hours + (hours == 1 ? ' Hour' : ' Hours');
        }
        if ((difference / (60) | 0)) {
            var minutes = Math.round(difference / (60));
            return  minutes + (minutes == 1 ? ' Minute' : ' Minutes');
        }
        if (difference) {
            var seconds = difference;
            return  seconds + (seconds == 1 ? ' sec' : ' secs');
        }
        if (difference == '' || difference == "undefined") {
            return 'just now';
        }


    }
</script>
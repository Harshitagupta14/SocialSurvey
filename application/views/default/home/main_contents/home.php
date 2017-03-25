<div id="overlay">
    <nav id="header" class="navbar navbar-fixed-top">
        <div id="header-container" class="container navbar-container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a id="brand" class="navbar-brand" href="#" style="color:#fff;"><?php echo $this->config->item('sitename'); ?></a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li ><a href="#" class="scroll">Home</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Core <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Create</a></li>
                            <li><a href="#">Collect</a></li>
                            <li><a href="#">Analyse</a></li>
                            <li><a href="#">Visulaize</a></li>
                        </ul>
                    </li>
                    <li ><a href="#" class="scroll">About Us</a></li>
                    <li ><a href="#" class="scroll">Blog</a></li>
                    <li ><a href="#" class="scroll">Contact Us</a></li>
                    <li > <a class="btn btn-success" href="javascript:;" onclick="loginpopup();">Sign-In</a></li>
                </ul>
            </div><!-- /.nav-collapse -->
        </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="header-video" style='background-image: url("<?= $this->config->item('frontassets') ?>video-parralax/img/masthead.jpg");'>
        <div class="container ">

            <aside id="sticky-sidebar">
                <ul class="sidebar-list">
                    <li><a href="javascript:;" class="entypo-pencil sidebar-link" onclick="loginpopup();"><span><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/create.png" alt="Create">Create</span></a></li>
                    <li><a href="<?php echo $this->config->item('base_url_collect'); ?>" class="entypo-database sidebar-link" target="_blank"><span><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/collect.png" alt="Collect">Collect</span></a></li>
                </ul>
            </aside>
            <div class="row hidden-sm hidden-xs">
                <div class="col-sm-12 text-center margin-30 wow fadeIn" data-wow-delay="0.6s" style="visibility: visible; z-index:1000; margin-top:150px;">
                    <h2 style="color:rgba(0,0,0,0.50);">Be the first to</h2>
                    <h2 style="color:rgba(0,0,0,0.50);">Gather data on your contemporary area in order to monitor and explain trends.</h2>
                    <a class="btn btn-primary" style="background-color:#91BAE1;" href="javascript:;" onclick="loginpopup();" > Request Demo </a><br/>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 margin-30 wow fadeIn core-icons-container" data-wow-delay="0.6s">
                    <div class="col-md-3 col-sm-3 col-xs-3 wow fadeIn form-group" data-wow-delay="0.4s"><h2 class="core-icons">Create</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/create.png" alt="Create"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 wow fadeIn" data-wow-delay="0.4s"><h2 class="core-icons">Collect</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/collect.png" alt="Create"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 wow fadeIn" data-wow-delay="0.4s"><h2 class="core-icons">Analyse</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/analyse.png" alt="Create"></div>
                    <div class="col-md-3 col-sm-3 col-xs-3 wow fadeIn" data-wow-delay="0.4s"><h2 class="core-icons">Visualize</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/visualize.png" alt="Create"></div>
                </div>
            </div>
            <div  class="header-video__media"
                  data-video-URL="https://www.youtube.com/embed/Scxs7L0vhZ4"
                  data-teaser="<?= $this->config->item('frontassets') ?>video-parralax/video/teaser-video"
                  data-video-width="560"
                  data-video-height="315"></div>
            <a href="https://www.youtube.com/embed/Scxs7L0vhZ4" class="header-video__play-trigger hidden-md hidden-sm hidden-xs" id="header-video__play-trigger">Play video</a>
            <button type="button" class="header-video__close-trigger hidden-md hidden-sm hidden-xs" id="header-video__close-trigger">Close video</button>
        </div>
    </div>

    <!--<div class="mouse-icon hidden-xs">
        <div class="scroll"></div>
    </div>-->

    <section id="be-the-first" class="pad-xl">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center margin-30 wow fadeIn" data-wow-delay="0.6s">
                    <h2>Be the first</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipis.</p>
                </div>
            </div>

            <div class="iphone wow fadeInUp" data-wow-delay="1s">
                <img src="<?= $this->config->item('frontassets') ?>video-parralax/img/iphone.png">
            </div>
        </div>
    </section>

    <section id="main-info" class="pad-xl">
        <div class="container">
            <div class="row">
                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.4s">
                    <hr class="line purple">
                    <h2 style="color:#666;">Create</h2>
                    <p>Create any type of survey be your Society, Workplace, Social cause and even about your self with over 15+ question formats and publish them with just a click away.</p>
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-delay="0.8s">
                    <hr  class="line blue">
                    <h2 style="color:#666;">Collect & Communicate</h2>
                    <p>Collect high-quality primary data in the most remote locations under the toughest conditions.Our System also provides in built chat system to communicate with your surveyors in real-time.</p>
                </div>
                <div class="col-sm-4 wow fadeIn" data-wow-delay="1.2s">
                    <hr  class="line yellow">
                    <h2 style="color:#666;">Visualize</h2>
                    <p>Discover the insights you need for a better decision through intuitive visualizations and dynamic dashboards.</p>
                </div>
            </div>
        </div>
    </section>


    <!--Pricing--><!--
    <section id="pricing" class="pad-lg">
        <div class="container">
            <div class="row margin-40">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <h2 class="white">Pricing</h2>
                    <p class="white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra orci ut.</p>
                </div>
            </div>

            <div class="row margin-50">

                <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1s">
                    <br />
                    <ul class="list-unstyled pricing-table text-center">
                        <li class="headline"><h5 class="white">Personal</h5></li>
                        <li class="price"><div class="amount">$5<small>/m</small></div></li>
                        <li class="info">2 row section for you package information. You can include all details or icons</li>
                        <li class="features first">Up To 25 Projects</li>
                        <li class="features">10GB Storage</li>
                        <li class="features">Other info</li>
                        <li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a></li>
                    </ul>
                </div>

                <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="0.4s">
                    <ul class="list-unstyled pricing-table active text-center">
                        <li class="headline"><h5 class="white">Professional</h5></li>
                        <li class="price"><div class="amount">$12<small>/m</small></div></li>
                        <li class="info">2 row section for you package information. You can include all details or icons</li>
                        <li class="features first">Up To 25 Projects</li>
                        <li class="features">10GB Storage</li>
                        <li class="features">Other info</li>
                        <li class="features">Other info</li>
                        <li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a></li>
                    </ul>
                </div>

                <div class="col-sm-4 pricing-container wow fadeInUp" data-wow-delay="1.3s">
                    <br />
                    <ul class="list-unstyled pricing-table text-center">
                        <li class="headline"><h5 class="white">Business</h5></li>
                        <li class="price"><div class="amount">$24<small>/m</small></div></li>
                        <li class="info">2 row section for you package information. You can include all details or icons</li>
                        <li class="features first">Up To 25 Projects</li>
                        <li class="features">10GB Storage</li>
                        <li class="features">Other info</li>
                        <li class="features last btn btn-secondary btn-wide"><a href="#">Get Started</a></li>
                    </ul>
                </div>

            </div>

        </div>
    </section>


    <section id="invite" class="pad-lg light-gray-bg">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 text-center">
                    <i class="fa fa-envelope-o margin-40"></i>
                    <h2 class="black">Get the demo of System</h2>
                    <br />
                    <p class="black">Enter email to get your temporary route into our data intelligence survey system.</p>
                    <br />

                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                            <form role="form">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Email">
                                </div>
                                <button type="submit" class="btn btn-primary btn-lg">Request Demo</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <section id="press" class="pad-sm">
        <div class="container">

            <div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="0.8s">
                    <a href="#" target="_blank">
                        <img class="news-img pull-left" src="<?= $this->config->item('frontassets') ?>video-parralax/img/press-01.jpg" alt="Tech Crunch">
                        <p class="black">Best Platform for survey.<br />
                            <small><em>Tech Crunch - January 15, 2017</em></small></p>
                    </a>
                </div>
            </div>

            <div class="row margin-30 news-container">
                <div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 wow fadeInLeft" data-wow-delay="1.2s">
                    <a href="#" target="_blank">
                        <img class="news-img pull-left" src="<?= $this->config->item('frontassets') ?>video-parralax/img/press-02.jpg" alt="Forbes">
                        <p class="black">Best Platform for survey.<br />
                            <small><em>Forbes - Feb 25, 2017</em></small></p>
                    </a>
                </div>
            </div>

        </div>
    </section> -->

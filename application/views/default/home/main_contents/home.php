
<style>
    .navbar-brand {font-size: 24px; }
    .navbar-container { padding: 15px 0 0px 0;}
    .navbar.navbar-fixed-top.fixed-theme {
        background-color: #222;
        border-color: #080808;
        box-shadow: 0 0 5px rgba(0,0,0,.8);
    }
    .navbar-brand.fixed-theme {font-size: 18px;}
    .navbar-container.fixed-theme {padding: 0;}
    .navbar-brand.fixed-theme,
    .navbar-container.fixed-theme,
    .navbar.navbar-fixed-top.fixed-theme,
    .navbar-brand,
    .navbar-container{
        transition: 0.8s;
        -webkit-transition:  0.8s;
    }
    .navbar{background:none !important; top:0px !important;}
    .navbar.open {background:#91BAE1 !important; transition: top 0.4s ease 0s;}
    @media screen and (min-width: 768px) {
        .navbar-nav{float:right !important;}
    }
    .navbar-nav > li > a:hover{background:none !important;  border-bottom: 4px solid #91BAE1;  text-decoration: none;}
    @media screen and (min-width: 768px) {
        .navbar-default .navbar-nav > li.dropdown:hover > a,
        .navbar-default .navbar-nav > li.dropdown:hover > a:hover,
        .navbar-default .navbar-nav > li.dropdown:hover > a:focus {
            background-color: rgb(231, 231, 231);
            color: rgb(85, 85, 85);
        }
        li.dropdown:hover > .dropdown-menu {
            display: block;
        }
    }
    .container-fluid > .navbar-collapse, .container-fluid > .navbar-header, .container > .navbar-collapse, .container > .navbar-header{
        margin-left:0px !important;
        margin-right:0px !important;
    }
    @media screen and (max-width: 768px) {.navbar-nav{background:#666;}}

</style>
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

    <div class="header-video">
        <div class="container hidden-md hidden-sm hidden-xs">

            <div class="row">
                <div class="col-sm-12 text-center margin-30 wow fadeIn" data-wow-delay="0.6s" style="visibility: visible; z-index:1000; margin-top:150px;">

                    <h2 style="color:rgba(0,0,0,0.50);">Be the first to</h2>
                    <h2 style="color:rgba(0,0,0,0.50);">Gather data on your contemporary area in order to monitor and explain trends.</h2>
                    <a class="btn btn-primary" style="background-color:#91BAE1;" href="#">Request Demo</a><br/>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 margin-30 wow fadeIn" data-wow-delay="0.6s" style="visibility: visible; margin-top:35px; margin-left:50px; z-index:1000;">

                    <div class="col-md-3 wow fadeIn form-group" data-wow-delay="0.4s"><h2 style="color:#fff; font-size: 35px; font-weight:300; line-height: 30px;letter-spacing: 0px;">Create</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/create.png" alt="Create"></div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s"><h2 style="color:#fff; font-size: 35px; font-weight:300;line-height: 30px;letter-spacing: 0px;">Collect</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/collect.png" alt="Create"></div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s"><h2 style="color:#fff; font-size: 35px; font-weight:300; line-height: 30px;letter-spacing: 0px; ">Analyse</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/analyse.png" alt="Create"></div>
                    <div class="col-md-3 wow fadeIn" data-wow-delay="0.4s"><h2 style="color:#fff; font-size: 35px; font-weight:300; line-height: 30px;letter-spacing: 0px;">Visualize</h2><img class=" img-responsive" src="<?= $this->config->item('frontassets') ?>images/visualize.png" alt="Create"></div>

                </div>
            </div>
        </div>
        <img src="<?= $this->config->item('frontassets') ?>video-parralax/img/masthead.jpg"
             class="header-video__media"
             data-video-URL="https://www.youtube.com/embed/Scxs7L0vhZ4"
             data-teaser="<?= $this->config->item('frontassets') ?>video-parralax/video/teaser-video"
             data-video-width="560"
             data-video-height="315">
        <a href="https://www.youtube.com/embed/Scxs7L0vhZ4" class="header-video__play-trigger" id="header-video__play-trigger">Play video</a>
        <button type="button" class="header-video__close-trigger" id="header-video__close-trigger">Close video</button>
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

    <script>
        $(document).ready(function () {

            /**
             * This object controls the nav bar. Implement the add and remove
             * action over the elements of the nav bar that we want to change.
             *
             * @type {{flagAdd: boolean, elements: string[], add: Function, remove: Function}}
             */
            var myNavBar = {
                flagAdd: true,
                elements: [],
                init: function (elements) {
                    this.elements = elements;
                },
                add: function () {
                    if (this.flagAdd) {
                        for (var i = 0; i < this.elements.length; i++) {
                            document.getElementById(this.elements[i]).className += " fixed-theme";
                        }
                        this.flagAdd = false;
                    }
                },
                remove: function () {
                    for (var i = 0; i < this.elements.length; i++) {
                        document.getElementById(this.elements[i]).className =
                                document.getElementById(this.elements[i]).className.replace(/(?:^|\s)fixed-theme(?!\S)/g, '');
                    }
                    this.flagAdd = true;
                }

            };

            /**
             * Init the object. Pass the object the array of elements
             * that we want to change when the scroll goes down
             */
            myNavBar.init([
                "header",
                "header-container",
                "brand"
            ]);

            /**
             * Function that manage the direction
             * of the scroll
             */
            function offSetManager() {

                var yOffset = 0;
                var currYOffSet = window.pageYOffset;

                if (yOffset < currYOffSet) {
                    myNavBar.add();
                }
                else if (currYOffSet == yOffset) {
                    myNavBar.remove();
                }

            }

            /**
             * bind to the document scroll detection
             */
            window.onscroll = function (e) {
                offSetManager();
            }

            /**
             * We have to do a first detectation of offset because the page
             * could be load with scroll down set.
             */
            offSetManager();
        });
    </script>
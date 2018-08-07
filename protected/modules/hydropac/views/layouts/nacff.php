<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>National Association of Certified Financial Fiduciaries </title> 

    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="<?php echo $this->moduleUrl ?>css/style.css">
    <link rel="stylesheet" href="<?php echo $this->moduleUrl ?>css/responsive.css">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $this->moduleUrl ?>images/fav-icon/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="<?php echo $this->moduleUrl ?>images/fav-icon/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="<?php echo $this->moduleUrl ?>images/fav-icon/favicon-16x16.png" sizes="16x16">
    
<!—Facebook Pixel Code—>
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js&#8217;');

fbq(‘init', ‘763140343870296');
fbq(‘track', “PageView");</script>
<noscript>
<img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=763140343870296&ev=PageView&noscript=1&#8221;"/></noscript>
<!—End Facebook Pixel Code—>

</head>
<body>

<div class="boxed_wrapper">

<header class="top-bar">
    <div class="container">
         	<div class="col-right float_right">
            	 <ul class="top-bar-info">
                 	<li><i class="icon-technology"></i>Phone: 704-274-3830</li>
                    <li><a href="<?php echo Yii::app()->createUrl("contact-us") ?>">Contact Us</a></li>
                </ul>
                <div class="link">
                    <a href="<?php echo Yii::app()->createUrl("upcoming-classes") ?>" class="thm-btn">Register</a>
                </div>
            </div>
    </div>
</header>

<section class="theme_menu stricky">
    <div class="container">
        <div class="row">
        	<div class="col-md-3">
            	<div class="main-logo">
                    <a href="https://nationalcffassociation.org/"><img src="<?php echo $this->moduleUrl ?>images/logo/logo.png" alt="National Association of Certified Financial Fiduciaries "></a>
                </div>
            </div>
            <div class="col-md-9 menu-column">
                <nav class="menuzord" id="main_menu">
                   <ul class="menuzord-menu">
                        
                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == '/') echo "active"; ?>"><a href="https://nationalcffassociation.org/">Home</a></li>

                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'about-us') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("about-us") ?>">About</a>
                        
                        <ul class="dropdown">
                            <li><a href="<?php echo Yii::app()->createUrl("about-us") ?>">About us</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl("team-members") ?>">Team Members</a></li>
                            <li><a href="<?php echo Yii::app()->createUrl("faq") ?>">FAQ's</a></li> 
                            <li><a href="<?php echo Yii::app()->createUrl("complaint-procedure") ?>">Complaint Procedure</a></li> 
                         </ul>
                        </li>

                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'upcoming-classes') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("upcoming-classes") ?>">Upcoming Classes </a>
                        <!--
                        <ul class="dropdown">
                            <li><a href="<?php echo Yii::app()->createUrl("live-classes") ?>">View Live Classes</a></li>                            
                        </ul>
                        -->
                            
                        </li>

                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'become-a-cff') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("become-a-cff") ?>">Become a CFF</a></li>
                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'qualifications') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("qualifications") ?>">Qualifications</a></li>
                        <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'cff-directory') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("cff-directory") ?>">CFF Directory</a></li>
	                    <li class="<?php if (Yii::app()->getRequest()->getPathInfo() == 'financial-education') echo "active"; ?>"><a href="<?php echo Yii::app()->createUrl("financial-education") ?>">Financial Education </a></li>
                    </ul><!-- End of .menuzord-menu -->
                </nav> <!-- End of #main_menu -->
            </div>
            <!--<div class="right-column">
                <div class="right-area">
                    <div class="nav_side_content">
                        <div class="search_option">
                            <button class="search tran3s dropdown-toggle color1_bg" id="searchDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <form action="#" class="dropdown-menu" aria-labelledby="searchDropdown">
                                <input type="text" placeholder="Search...">
                                <button><i class="fa fa-search" aria-hidden="true"></i></button>
                            </form>
                       </div>
                   </div>
                </div>
                    
            </div>-->
        </div>
                

   </div> <!-- End of .conatiner -->
</section>
    
<?php echo $content ?>    

<div class="call-out">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-12">
                <figure class="logo">
                    <a href="<?php echo Yii::app()->createUrl("site/index") ?>"><img src="<?php echo $this->moduleUrl ?>images/logo/logo2.png" alt=""></a>
                </figure>
            </div>
            <div class="col-md-9 col-sm-12">
                <div class="float_left">
                    <h4>All fiduciaries are not the same. CFF is the standard of Excellence.</h4>
                </div>
                <div class="float_right">
                    <a href="<?php echo Yii::app()->createUrl("cff-directory") ?>" class="thm-btn-tr">Find a CFF</a>
                </div>
            </div>
        </div>
                
    </div>
</div>

<footer class="main-footer">
    
    <!--Widgets Section-->
    <div class="widgets-section">
        <div class="container">
            <div class="row">
                <!--Big Column-->
                <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        
                        <!--Footer Column-->
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget about-widget">
                                <h3 class="footer-title">About Us</h3>
                                
                                <div class="widget-content">
                                    <div class="text">
                                        <p>NACFF was created to provide all the information, tools, and resources needed for financial professionals to ensure they are compliant with the new fiduciary rule. We have taken it a step further by providing a comprehensive fiduciary training program and certification process that will further establish qualified financial professionals as a Certified Financial Fiduciary (CFF)®.</p> </div>
                                    <div class="link">
                                        <a href="<?php echo Yii::app()->createUrl("about-us") ?>" class="default_link">More About us <i class="fa fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Footer Column-->
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget links-widget">
                                <h3 class="footer-title">Useful Links</h3>
                                <div class="widget-content">
                                    <ul class="list">
                                        <li><a href="<?php echo Yii::app()->createUrl("upcoming-classes") ?>">Upcoming CFF Classes</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl("become-a-cff") ?>">Become a CFF </a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl("qualifications") ?>">Qualifications</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl("cff-directory") ?>">CFF Directory</a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl("financial-education") ?>">Financial Education </a></li>
                                        <li><a href="<?php echo Yii::app()->createUrl("contact-us") ?>">Report a Problem</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!--Big Column-->
                <div class="big-column col-md-6 col-sm-12 col-xs-12">
                    <div class="row clearfix">
                        

                        <!--Footer Column-->
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget contact-widget">
                                <h3 class="footer-title">Contact us</h3>
                                <div class="widget-content">
                                    <ul class="contact-info">
                                        <li><span class="icon-signs"></span>National Association of Certified Financial Fiduciaries, <br>8514 McAlpine Park Drive,<br> #280 Charlotte, NC 28211</li>
                                        <li><span class="icon-phone-call"></span> Phone: 704-274-3830</li>
                                        <li><span class="icon-e-mail-envelope"></span><a href="mailto:info@nationalCFFassociation.org">info@nationalCFFassociation.org</a></li>
                                    </ul>
                                </div>
                                <?php
                                $rs = MyUser::model()->findByPk(1);
                                if ($rs){                                    
                                    ?>
                                    <ul class="social">
                                        <li><a target ="_new" href="https://www.facebook.com/<?php echo $rs->facebook_handel ?>"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target ="_new" href="https://twitter.com/<?php echo $rs->twitter_handel ?>"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target ="_new" href="<?php echo $rs->google_plus_handel ?>"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a target ="_new" href="https://www.linkedin.com/us/<?php echo $rs->linkedin_handel ?>"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                    <?php
                                }
                                ?>
                            </div>
                        </div>

                        <!--Footer Column-->
                        <div class="footer-column col-md-6 col-sm-6 col-xs-12">
                            <div class="footer-widget news-widget">
                                <h3 class="footer-title">Newsletter</h3>
                                <div class="widget-content">
                                    <!--Post-->
                                    <div class="text"><p>Sign up today for hints, tips and the <br>latest product news</p></div>
                                    <!--Post-->
                                    <form action="<?php echo Yii::app()->createUrl("nacff/site/savenewsletter") ?>" method = "post" class="default-form">
                                        <input required type="email" name = "email" placeholder="Email Address">
                                        <span class="fa fa-envelope"></span>
                                        <button type="submit" class="thm-btn">Subscribe</button>
                                    </form>
                                </div>
                                
                            </div>
                        </div>                     
                        
                    </div>
                </div>
                
             </div>
         </div>
     </div>
     
     <!--Footer Bottom-->
     <section class="footer-bottom">
        <div class="container">
            <div class="pull-left copy-text">
                <p>Copyrights © 2017 All Rights Reserved. Powered by  <a target = "_blank" href="https://infovinity.com"> Infovinity.</a></p>
                
            </div><!-- /.pull-right -->
            <div class="pull-right get-text">
                <ul>                    
                    <li><a href="<?php echo Yii::app()->createUrl("disclaimer") ?>">NACFF Disclaimer Notice</a></li>
                </ul>
            </div><!-- /.pull-left -->
        </div><!-- /.container -->
    </section>
     
</footer>

<!-- Scroll Top Button -->
    <button class="scroll-top tran3s color2_bg">
        <span class="fa fa-angle-up"></span>
    </button>
    <!-- pre loader  -->
    <div class="preloader"></div>


    <!-- jQuery js -->
    <script src="<?php echo $this->moduleUrl ?>js/jquery.js"></script>
    <!-- bootstrap js -->
    <script src="<?php echo $this->moduleUrl ?>js/bootstrap.min.js"></script>
    <!-- jQuery ui js -->
    <script src="<?php echo $this->moduleUrl ?>js/jquery-ui.js"></script>
    <!-- owl carousel js -->
    <script src="<?php echo $this->moduleUrl ?>js/owl.carousel.min.js"></script>
    <!-- jQuery validation -->
    <script src="<?php echo $this->moduleUrl ?>js/jquery.validate.min.js"></script>

    <!-- mixit up -->
    <script src="<?php echo $this->moduleUrl ?>js/wow.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.mixitup.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.fitvids.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/bootstrap-select.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/menuzord.js"></script>

    <!-- revolution slider js -->
    <script src="<?php echo $this->moduleUrl ?>js/jquery.themepunch.tools.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.themepunch.revolution.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.actions.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.carousel.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.kenburn.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.layeranimation.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.migration.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.navigation.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.parallax.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.slideanims.min.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/revolution.extension.video.min.js"></script>

    <!-- fancy box -->
    <script src="<?php echo $this->moduleUrl ?>js/jquery.fancybox.pack.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.polyglot.language.switcher.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/nouislider.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.bootstrap-touchspin.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/SmoothScroll.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.appear.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.countTo.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/jquery.flexslider.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/imagezoom.js"></script> 
    <script id="map-script" src="<?php echo $this->moduleUrl ?>js/default-map.js"></script>
    <script src="<?php echo $this->moduleUrl ?>js/custom.js"></script>
    
    <script>
    var $video_player, _player, _isPlaying = false;
    $(document).ready(function() {
        $(".various").fancybox({
            'transitionIn'	: 'none',
            'transitionOut'	: 'none',
            'width'             : '75%',
            'height'             : '380',
            'autoSize' : false,
            'scrolling'   : 'no',
	});
        
        $("a.youtube").click(function() {
            $.fancybox({
                    'padding'       : 0,
                    'autoScale'     : false,
                    'transitionIn'  : 'none',
                    'transitionOut' : 'none',
                    'title'         : this.title,
                    'width'     : 680,
                    'height'        : 495,
                    'href'          : this.href.replace(new RegExp("watch\\?v=", "i"), 'v/'),
                    'type'          : 'swf',
                    'swf'           : {
                         'wmode'        : 'transparent',
                        'allowfullscreen'   : 'true'
                    }
                });

            return false;
        });       
        
        $(".fancy_video").fancybox({
           // set type of content (we are building the HTML5 <video> tag as content)
           type: "html",
           // other API options
           scrolling: "no",
           fitToView: false,
           autoSize: false,
           beforeLoad: function () {
               // build the HTML5 video structure for fancyBox content with specific parameters
               this.content = "<video id='video_player' src='" + this.href + "' poster='" + $(this.element).data("poster") + "' width='360' height='360' controls='controls' preload='none' ></video>";
               // set fancyBox dimensions
               this.width = 360; // same as video width attribute
               this.height = 360; // same as video height attribute
           },
           afterShow: function () {
               // initialize MEJS player
               var $video_player = new MediaElementPlayer('#video_player', {
                   defaultVideoWidth: this.width,
                   defaultVideoHeight: this.height,
                   success: function (mediaElement, domObject) {
                       _player = mediaElement; // override the "mediaElement" instance to be used outside the success setting
                       _player.load(); // fixes webkit firing any method before player is ready
                       _player.play(); // autoplay video (optional)
                       _player.addEventListener('playing', function () {
                           _isPlaying = true;
                       }, false);
                   } // success
               });
           },
           beforeClose: function () {
               // if video is playing and we close fancyBox
               // safely remove Flash objects in IE
               if (_isPlaying && navigator.userAgent.match(/msie [6-8]/i)) {
                   // video is playing AND we are using IE
                   _player.remove(); // remove player instance for IE
                   _isPlaying = false; // reinitialize flag
               };
           }
       });
        
    });
    
    
    </script>

</div>
    
    

    
</body>
</html>
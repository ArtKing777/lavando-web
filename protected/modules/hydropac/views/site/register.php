<div class="inner-banner text-center">
    <div class="container">
        <div class="box">
            <h3>Register</h3>            
        </div><!-- /.box -->
        <div class="breadcumb-wrapper">
            <div class="clearfix">
                <div class="pull-left">
                    <ul class="list-inline link-list">
                        <li>
                            <a href="index.html">Home</a>
                        </li><!-- comment for inline hack
                        --><li>
                            Register
                        </li>
                    </ul><!-- /.list-line -->
                </div><!-- /.pull-left -->
                <div class="pull-right">
                    <a href="#" class="get-qoute"><i class="fa fa-share-alt"></i>share</a>
                </div><!-- /.pull-right -->
            </div><!-- /.container -->
        </div>
    </div><!-- /.container -->
</div>

<section class="register-section our-team sec-padd-top" id = "register_form">
    <div class="container editor-style">
        <div class="row">
            <article class="col-md-4 col-sm-5 col-xs-12">
                <div class="single-team-member">
                <figure class="img-box">
                    <?php                    
                    if ($rs->video_link != ''){
                        $video_link = $rs->video_link;
                        $class = "youtube";
                    }
                    else {
                        $video_link = $this->getImage($rs->event_video, '370x200');
                        $class = "fancy_video";
                    }
                    ?>
                    <a title="<?php echo $rs->title ?>" data-poster="<?php echo $this->getImage($rs->event_image, '370x200') ?>" href="<?php echo $video_link ?>" class="<?php echo $class ?>">
                        <img src="<?php echo $this->getImage($rs->event_image, '370x200') ?>" alt="">
                    </a>
                    
                    <div class="overlay">
                        <div class="inner-box">
                            <ul class="social video_play_ico">
                                <li><a title="<?php echo $rs->title ?>" data-poster="<?php echo $this->getImage($rs->event_image, '370x200') ?>" href="<?php echo $video_link ?>" class="<?php echo $class ?>"><i class="fa fa-play-circle-o fa-2x"></i></a></li>                                
                            </ul>
                        </div>                            
                    </div>
                    
                </figure>
                <div class="author-info event_overview">
                    <p class="dark"><strong><?php echo $rs->title ?></strong></p>
                    <p class="dark"><strong>Event Date</strong> : <?php echo date("d-M-Y", strtotime($rs->event_date)) ?> </p> 
                    <p><strong>Event Location</strong></p>
                    <p><?php echo $rs->address1 ?></p>
                    <p><?php echo $rs->address2 ?></p>
                    <p><?php echo $rs->city?> <?php echo $rs->state ?> <?php echo $rs->postcode ?></p>                    
                    <p><strong>Price</strong> : $ <?php echo $rs->price ?></p>
                    <p><strong>Instructor</strong>: <?php echo $rs->instructor ?></p>
                </div>
             </div>  
            </article>
            <!--Form Column-->
            <div class="form-column column col-lg-8 col-md-8 col-sm-5 col-xs-12">
                <p style = "margin-bottom: 15px;text-align: justify">
                Thanks for your interest in becoming a CFF®! All Applications must be submitted with full payment at least 15 days prior to the class. Total tuition to attend this course is $1145.00. Tuition includes $250 non-refundable application/Background Check fee, and $895 course fee. If your application is not approved we will refund the $895 course fee. To complete the registration please fill out the form below.
                </p>
                <div class="section-title">
                    <h3>Complete the form below to register.</h3>
                    <div class="decor"></div>
                </div>
                
                <!--Register Form-->
                <div class="default-form-area">
                    <form id="registerForm" name="registerForm" class="default-form" action="<?php echo Yii::app()->createUrl("nacff/site/saveregister", array("id"=>$rs->id)) ?>" method="post">
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" id = "first_name" name="first_name" class="form-control" value="" placeholder="First Name *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" id = "last_name" name="last_name" class="form-control" value="" placeholder="Last Name *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" id = "email" name="email" class="form-control required email" value="" placeholder="Email Address  *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" id = "mobile_number" name="mobile_number" class="form-control" value="" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    
                                    <?php
                                    if ($rs->event_options != ""){
                                        ?>
                                        <select name = "event_option">
                                        <?php
                                        $arr = explode("\n", $rs->event_options);
                                        foreach ($arr as $a){
                                        ?>
                                        <option value = "<?php echo $a ?>"><?php echo $a ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                        <?php
                                    }
                                    ?>                                    
                                </div>
                            </div>
 
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type = "hidden" name = "event_id" value = "<?php echo $rs->id ?>">
                                    <button type = "submit" id="customButton1" class="thm-btn">Register</button>                                    
                                </div>
                            </div> 

                        </div>
                    </form>
                </div>
                
            </div>
            
        </div>
    </div>
</section>


<section class="subscribe sec-padd" style="background-image: url(<?php echo $this->moduleUrl ?>images/background/2.jpg);">
    <div class="container editor-style">
        <div class="row">
        	<div class="section-title ">
            	<h2>Event Location</h2>
        	</div>
            <div class="col-md-6  col-sm-6 col-xs-12">
                <div class="home-google-map">
                    <?php 
                    $q = $rs->address1 . " " . $rs->address2 . " " . $rs->city . " " . $rs->state . " " . $rs->postcode;
                    ?>
                    <iframe frameborder="0" scrolling="no" style="pointer-events:none;" marginheight="0" marginwidth="0" width="100%" height="350" src="https://maps.google.com/maps?hl=en&amp;q=<?php echo $q ?>&amp;ie=UTF8&amp;t=roadmap&amp;z=6&amp;iwloc=B&amp;output=embed"></iframe>
                </div>
            </div>
             <div class="col-md-6  col-sm-6 col-xs-12">
                <p><strong>Event</strong> : <?php echo $rs->title ?></p>
		<p><strong>Address</strong> : <?php echo $rs->address1 ?> <?php echo $rs->address2 ?> <?php echo $rs->address3 ?>.</p>
                <p><strong>City</strong> : <?php echo $rs->city ?></p>                 
                 <p><strong>State</strong> : <?php echo $rs->state ?></p>               
                  <p><strong>Zip Code</strong> : <?php echo $rs->postcode ?> </p>
                  <p><strong>Class Start at</strong> : <?php echo $rs->start_time ?></p>
                
            </div>
        </div>
                
    </div>
</section>

<!--
<section class="default-section sec-padd">
    <div class="container editor-style">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-title">
                <h3>Course Description</h3>
            </div>
                <div class="text-content">
                    <h4 style="font-style:normal;">What You Will Learn</h4>
                    <?php // echo $rs->course['content'] ?>                   
                </div>
            </div>
        </div>
    </div>
</section>
-->

<?php 
if ($rs->title1 != "" || $rs->content1){
    ?>
    <section class="default-section sec-padd">
        <div class="container editor-style">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3><?php echo $rs->title1 ?></h3>
                </div>
                    <div class="text-content">
                        <?php echo $rs->content1 ?>                   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
}
?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:30px;">
                <a href = "#register_form" class="thm-btn">Register Now</a>
            </div>
        </div>
    </div>
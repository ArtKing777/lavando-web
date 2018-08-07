


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

<section class="register-section our-team sec-padd-top">
    <div class="container">
        <div class="row">
            <article class="col-md-4 col-sm-5 col-xs-12">
                <div class="single-team-member">
                <figure class="img-box">
                    <a href="#"><img src="<?php echo $this->frontThemeUrl ?>images/team/class_search.jpg" alt=""></a>
                    <div class="overlay">
                        <div class="inner-box">
                            <ul class="social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            </ul>
                        </div>
                            
                    </div>
                </figure>
                <div class="author-info">
                    <p class="dark"><strong>Event Date</strong> : <?php echo date("d-M-Y", strtotime($rs['event']->event_date)) ?> <br> 
                    <strong>Event Location</strong> : <?php echo $rs['event']->address1 ?><br><?php echo $rs['event']->address2 ?><br>
                    <?php echo $rs['event']->city ?><br>
                    <?php echo $rs['event']->state ?> <?php echo $rs['event']->postcode ?><br> 
                    <strong>Price</strong> : $ <?php echo $rs['event']->price ?> <br>
                    <strong>Instructor</strong>: <?php echo $rs['event']->instructor ?></p>
                </div>
             </div>  
            </article>
            <!--Form Column-->
            <div class="form-column column col-lg-8 col-md-8 col-sm-5 col-xs-12">
                <div class="section-title">
                    <h3>Thanks to register for event. We sent event ticket on email.</h3>
                    <div class="decor"></div>
                </div>                
            </div>
            
        </div>
    </div>
</section>

<section class="subscribe sec-padd" style="background-image: url(<?php echo $this->frontThemeUrl ?>images/background/2.jpg);">
    <div class="container">
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
		<p><strong>Address</strong> : <?php echo $rs->address1 ?> <?php echo $rs->address2 ?>.</p>
                <p><strong>City</strong> : <?php echo $rs->city ?></p>                 
                 <p><strong>State</strong> : <?php echo $rs->state ?></p>               
                  <p><strong>Zip Code</strong> : <?php echo $rs->postcode ?> </p>
                  <p><strong>Class Start at</strong> : <?php echo $rs['event']->event_time ?></p>
                
            </div>
        </div>
                
    </div>
</section>

<section class="default-section sec-padd">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-title">
                        <h3><?php echo $rs['event']->title1 ?></h3>
                    </div>
                <div class="text-content">
                    <?php echo $rs['event']->content1 ?>                   
                </div>
            </div>
        </div>
    </div>
</section>
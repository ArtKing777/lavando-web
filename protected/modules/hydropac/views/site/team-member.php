<section class="our-team">
    <div class="container">
        <div class="row">        
            <?php
            foreach($rs as $rw){
            ?>
            <article class="col-md-6 col-sm-6 col-xs-12">
                <div class="single-team-member">
                <div class="row">
                    <div class="col-md-5"> 
                    <figure class="img-box">
                        <a href="#"><img src="<?php echo $this->getImage($rw->profile_image, '210x160') ?>" alt=""></a>
                        <!--
                        <div class="overlay">
                            <div class="inner-box">
                                <ul class="social"> 
                                    <li><a href="https://www.facebook.com/<?php echo $rw->facebook_handel ?>"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://twitter.com/<?php echo $rw->twitter_handel ?>"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="skype:<?php echo $rw->skype_handel ?>?call"><i class="fa fa-skype"></i></a></li>
                                </ul>
                            </div>                                
                        </div>
                        -->
                    </figure>
                    </div>
                    <div class="col-md-7">
                    <div class="author-info">
                        <a href="#"><h4><?php echo $rw->first_name ?> <?php echo $rw->last_name ?></h4></a>
                        <p><?php echo $rw->designation ?></p>
                        <a class="various thm-btn-sm" href="#inline<?php echo $rw->id ?>" title="<?php echo $rw->first_name ?> <?php echo $rw->last_name ?>">Read More</a>
                        <a href="#contact" class="various thm-btn-sm"  title="Contact <?php echo $rw->first_name ?> <?php echo $rw->last_name ?>">Contact</a>                        
                    </div>
                        
                    <div id="inline<?php echo $rw->id ?>"  style = "display:none;">
                    <p>
                        <?php echo $rw->bio ?>
                    </p>
                    </div>
                        
                    </div>  
                 </div>  
                </div>
            </article>
            <?php
            }
            ?>           
        </div>
    </div>
</section>


<div id = "contact" style = "display:none;">
    <form id="contact_form" action="<?php echo Yii::app()->createUrl("nacff/site/saveinquiry") ?>" name="contact_form" class="default-form" method="post">
        <div class="row-10 clearfix">
            <div class="col-md-4 co-sm-6 col-xs-12 column">
                <div class="form-group">
                    <input type="text" name="first_name" class="form-control" value="" placeholder="Name *" required="">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control required email" value="" placeholder="Email Address *" required="">
                </div>
                <div class="form-group">
                    <input type="text" name="work_phone" class="form-control required phone" value="" placeholder="Phone *" required="">
                </div>
            </div>
            <div class="col-md-8 co-sm-6 col-xs-12 column">
                <div class="form-group style-2">
                    <textarea name="message" style = "height:200px;margin-bottom:15px;" class="form-control textarea required" placeholder="Your Message..."></textarea>
                    <button class="thm-btn thm-color" type="submit" data-loading-text="Please wait..."><i class="fa fa-paper-plane"></i> Contact</button>
                </div>
            </div>

        </div>
    </form>
</div>


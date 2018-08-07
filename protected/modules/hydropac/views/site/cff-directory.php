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
                        
                        <?php
                        if (trim($rw->facebook_handel) != "" || trim($rw->twitter_handel) != "" || trim($rw->linkedin_handel) != "" || trim($rw->skype_handel) != ""){
                            ?>
                            <div class="overlay">
                                <div class="inner-box">
                                    <ul class="social"> 
                                        <?php
                                        if (trim($rw->facebook_handel) != ""){
                                            ?>                                        
                                            <li><a target = "_blank" href="https://www.facebook.com/<?php echo $rw->facebook_handel ?>"><i class="fa fa-facebook"></i></a></li>
                                            <?php
                                        }
                                        ?>
                                            
                                        <?php
                                        if (trim($rw->twitter_handel) != ""){
                                            ?>                                        
                                            <li><a target = "_blank" href="https://twitter.com/<?php echo $rw->twitter_handel ?>"><i class="fa fa-twitter"></i></a></li>
                                            <?php
                                        }
                                        ?>
                                            
                                        <?php
                                        if (trim($rw->skype_handel) != ""){
                                            ?>                                        
                                            <li><a target = "_blank" href="skype:<?php echo $rw->skype_handel ?>?call"><i class="fa fa-skype"></i></a></li>
                                            <?php
                                        }
                                        ?>
                                            
                                        <?php
                                        if (trim($rw->linkedin_handel) != ""){
                                            ?>                                        
                                            <li><a target = "_blank" href="https://www.linkedin.com/<?php echo $rw->linkedin_handel ?>"><i class="fa fa-linkedin"></i></a></li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>                                
                            </div>
                            <?php
                        }
                        ?>
                        
                    </figure>
                    </div>
                    
                    <div class="col-md-7">
                    <div class="author-info">
                        <a href="#"><h4><?php echo $rw->first_name ?> <?php echo $rw->last_name ?></h4></a>
                        <p><?php echo $rw->company_name ?></p>
                        <p><?php echo $rw->address1 ?> <?php echo $rw->address2 ?> <?php echo $rw->address3 ?> 
                           <?php echo $rw->city ?> <?php echo $rw->state ?> <?php echo $rw->postcode ?></p>
                        <ul>
                            <?php
                            if (trim($rw->work_phone) != ''){
                                ?>                      
                                <li><i class = "fa fa-phone"></i>Phone: <?php echo $rw->work_phone ?></li>
                                <?php
                            }
                            ?>
                            <?php
                            if (trim($rw->url) != ''){
                                ?>                      
                                <li><i class = "fa fa-globe"></i><a href = "http://<?php echo $rw->url ?>" target = "_blank">http://<?php echo $rw->url ?></a></li>
                                <?php
                            }
                            ?>
                            
                        </ul>
                        <p style="margin-top:15px;">
                        <a class="various thm-btn-sm" href="#inline<?php echo $rw->id ?>" title="<?php echo $rw->first_name ?> <?php echo $rw->last_name ?>">Read More</a>
                        <a href="#contact" class="various thm-btn-sm"  title="Contact <?php echo $rw->first_name ?> <?php echo $rw->last_name ?>">Contact</a>                        
                        </p>
                    </div>
                    </div>
 
                    <div id="inline<?php echo $rw->id ?>" style = "display:none;">
                    <p>
                        <?php echo $rw->bio ?>
                    </p>
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
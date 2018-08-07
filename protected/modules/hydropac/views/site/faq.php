<section class="about-faq">
    <div class="container">
        <div class="row">
            
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div>
                    <div class="accordion-box style-one">
                        <!--Start single accordion box-->
                        <?php
                        foreach($rs as $rw){
                            ?>
                            <div class="accordion animated out" data-delay="0" data-animation="fadeInUp">
                                <div class="acc-btn">
                                    <p class="title"><?php echo $rw->question ?></p>
                                    <div class="toggle-icon">
                                        <span class="plus fa fa-angle-right"></span><span class="minus fa fa-angle-down"></span>
                                    </div>
                                </div>
                                <div class="acc-content" style="display: none;">
                                    <div class="text"><p>
                                        <?php echo $rw->answer ?>
                                    </p></div>
                                </div>
                            </div>
                            <?php
                        }
                        ?>
                        



                    </div>
                </div>
                    
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="default-form-area sec-padd-top single-faq-bg">
                    <h2>Ask Your Questions</h2>
                    <form id="contact-form" name="contact_form" class="default-form"  action="<?php echo Yii::app()->createUrl("nacff/site/saveinquiry") ?>" method="post" novalidate="novalidate">
                        <div class="row clearfix">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" value="" placeholder="Name *" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control required email" value="" placeholder="Mail *" required="" aria-required="true">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="work_phone" class="form-control" value="" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control textarea required" placeholder="Your questions...." aria-required="true"></textarea>
                                </div>
                            </div>   
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                    <button class="thm-btn" type="submit" data-loading-text="Please wait...">submit now</button>
                                </div>
                            </div>  

                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</section>




<section class="contact_us sec-padd-bottom">
    <div class="container">
        <div class="row">
                     
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h3> Leave a Comment </h3>
                </div>
                
                <div class="default-form-area">
                    <form id="contact-form" action="<?php echo Yii::app()->createUrl("nacff/site/saveinquiry") ?>" name="contact_form" class="default-form" action="" method="post">
                        <div class="row clearfix">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="first_name" class="form-control" value="" placeholder="Your Name *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control required email" value="" placeholder="Your Email *" required="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="work_phone" class="form-control" value="" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="subject" class="form-control" value="" placeholder="Subject">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control textarea required" placeholder="Your Message...."></textarea>
                                </div>
                            </div>   
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="form-group">
                                    
                                    <button class="thm-btn2" type="submit" data-loading-text="Please wait...">Send message</button>
                                </div>
                            </div>   

                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6 col-sm-8 col-xs-12">
                <div class="home-google-map"> 
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1631.082899292676!2d-80.7525273865!3d35.15248560579145!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x885421113b7d7d97%3A0xf0aa44cb76c9d232!2s8514+McAlpine+Park+Dr+%23280%2C+Charlotte%2C+NC+28211%2C+USA!5e0!3m2!1sen!2sin!4v1498568667070" width="100%" height="358" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</section>



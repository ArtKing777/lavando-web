
<div class="inner-banner text-center">
    <div class="container">
        <div class="box">
            <h3>Become a CFF</h3>
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

<section class="checkout-area"> 
    <div class="container form billing-info">
        <form method="post" action="<?php echo Yii::app()->createUrl("nacff/site/savecffapplication", array("id"=>$rs->id)) ?>" id="registerForm">
        <div class="row">
         <div class="section-title">
            <h4>Part A - Applicant Profile</h4>
        </div>
         <p>Note: Your name must appear as it does on government issued ID, such as a driver's license or passport. This same form of identification is required for you to take the CFF® certification examination, and the name on your application and ID must be identical to sit for the examination.</p> <br>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form billing-info">                
                <div class="row">
                    <div class="col-md-4">
                        <div class="field-label">Last Name:</div>
                        <div class="field-input">
                            <input type="text" value ="<?php echo $rs->last_name ?>" id = "last_name" name="last_name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-label">First Name:</div>
                        <div class="field-input">
                            <input type="text" value ="<?php echo $rs->first_name ?>" id = "first_name" name="first_name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="field-label">MI:</div>
                        <div class="field-input">
                            <input type="text" id = "mi_number" name="mi_number" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="field-label">Company Name:</div>
                        <div class="field-input">
                            <input type="text" id = "company_name" name="company_name" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-label">Business Phone:</div>
                        <div class="field-input">
                            <input type="text" id = "work_phone" name="work_phone" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="field-label">Mobile Phone</div>
                        <div class="field-input">
                            <input type="text" value ="<?php echo $rs->mobile_number ?>" id = "mobile_number"  name="mobile_number" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="field-label">Private Email</div>
                        <div class="field-input">
                            <input type="text" value ="<?php echo $rs->email ?>" id = "email" name="email" placeholder="Email Address">
                        </div>
                    </div>
                </div>    
            </div>    
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form shipping-info">
                <div class="section-title">
                    <h3>Mailing Address </h3>
                </div>                    
                
                    <div class="row">
                        <div class="col-md-12"><input type="checkbox" checked="" style="margin-left:0;"> Residential  <input type="checkbox"> Business address</div> <br>
                        <div class="col-md-3">
                            <div class="field-label">Street:</div>
                            <div class="field-input">
                                <input type="text" id = "address1"  name="address1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">City:</div>
                            <div class="field-input">
                                <input type="text" id = "city" name="city" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">State</div>
                            <div class="field-input">
                                <input type="text" id = "state"  name="state" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">Zip Code:</div>
                            <div class="field-input">
                                <input type="text" id = "postcode"  name="postcode" placeholder="">
                            </div>
                        </div>
                    </div>    
                
            </div>    
        </div> 

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form shipping-info">
                <div class="section-title">
                    <h3>Billing Address <span> (If different from mailing address)</span></h3>
                </div>

                
                    <div class="row">
                        <div class="col-md-3">
                            <div class="field-label">Street:</div>
                            <div class="field-input">
                                <input type="text" id = "billing_address1"  name="billing_address1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">City:</div>
                            <div class="field-input">
                                <input type="text" id = "billing_city" name="billing_city" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">State</div>
                            <div class="field-input">
                                <input type="text" id = "billing_state" name="billing_state" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">Zip Code:</div>
                            <div class="field-input">
                                <input type="text" id = "billing_postcode"  name="billing_postcode" placeholder="">
                            </div>
                        </div>
                    </div>    
                
            </div>    
        </div>

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form shipping-info">
                <div class="section-title">
                    <h3>Professional Information </h3>
                </div>

                
                    <div class="row">
                        <div class="col-md-6">
                            <div class="field-label">Industry:</div>
                            <div class="field-input">
                                <input type="text" id = "industry"   name="industry" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="field-label">Title:</div>
                            <div class="field-input">
                                <input type="text" id = "designation" name="designation" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="field-label">License(s) Held:</div>
                            <div class="field-input">
                                <input type="text" id = "licenses"  name="licenses" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="field-label">Certifications Held:</div>
                            <div class="field-input">
                                <input type="text" id = "certificates"  name="certificates" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="field-label">How did you hear about CFF® Certification? 
                                <input type="checkbox" style="margin-left:0;"> CFF Member 
                                <input type="checkbox"> Company
                                <input type="checkbox"> Internet Search
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="field-label"><input type="radio" style="margin-left:0;"> Colleague</div>
                            <div class="field-input">
                                <input type="text" id = "colleague" name="colleague" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="field-label"><input type="radio" style="margin-left:0;"> Other</div>
                            <div class="field-input">
                                <input type="text" id = "other" name="other" placeholder="">
                            </div>
                        </div>
                    </div>    
               
            </div>    
        </div> 

        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="form shipping-info">
                <div class="section-title">
                    <h3>Part B – Background Check Information </h3>
                </div>
                <p>Please provide the following information for the mandatory background check to qualify for the CFF® certification:</p><br>
                
                    <div class="row">
                            <div class="col-md-12"><h4 class="title_h4">Home Address</h4></div>

                        <div class="col-md-3">
                            <div class="field-label">Street:</div>
                            <div class="field-input">
                                <input type="text" id = "home_address1" name="home_address1" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">City:</div>
                            <div class="field-input">
                                <input type="text" id = "home_city" name="home_city" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">State:</div>
                            <div class="field-input">
                                <input type="text" id = "home_state" name="home_state" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="field-label">Zip Code:</div>
                            <div class="field-input">
                                <input type="text" id = "home_postcode" name="home_postcode" placeholder="">
                            </div>
                        </div>
                    </div>    
                
            </div>    
        </div>
    
            <div>    
                <div class="center">
                                            <h3 class="title_h4">Disclosure Questionnaire </h3>
                    <p><strong>As part of your application for CFF® certification, you must complete the following Disclosure Questionnaire.</strong></p><br>
                    <p>You must submit a detailed <strong>written explanation for any “yes” answers for questions 1-6</strong> to: disclosure@nationalcffassociation.org . Note that NACFF certification staff performs background checks. Additional information may be required upon review of your application.</p><br>

                                            </div>
                    <table class="cart-table table-bordered table-responsive">
                            <thead class="cart-header">
                            <tr>
                            <th>YES </th>
                            <th>NO</th>
                            <th></th>
                        </tr></thead>
                        <tbody>
                        <tr>
                            <td><input type="radio" value = "1" name="answer1"></td>
                            <td><input type="radio" value = "2" name="answer1"></td>
                            <td>1.  Have you ever been accused or convicted of a felony? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer2"></td>
                            <td><input type="radio" value = "2" name="answer2"></td>
                            <td>2.  Within the last 10 years, have you been a defendant or respondent in any criminal action relating to your professional or business conduct, or are you currently named as a party in any such action? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer3"></td>
                            <td><input type="radio" value = "2" name="answer3"></td>
                            <td>3.  Within the last 10 years, have you been a defendant or respondent in a civil action, which includes, but is not limited to, a lawsuit, arbitration, or mediation relating to your professional or business conduct, or are you currently named as a party in any such action? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer4"></td>
                            <td><input type="radio" value = "2" name="answer4"></td>
                            <td>4. Within the last 10 years, have you had a license, permit, certificate, registration or membership denied, suspended, revoked or restricted by any governmental, regulatory, or administrative body, or has any such body censured, fined, restricted or reprimanded you?  </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer5"></td>
                            <td><input type="radio" value = "2" name="answer5"></td>
                            <td>5.  Within the last 10 years, have you been named as the subject of an investigation or complaint by any governmental, regulatory or administrative body? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer6"></td>
                            <td><input type="radio" value = "2" name="answer6"></td>
                            <td>6.  Within the last 10 years, have you been censured, fined reprimanded or otherwise disciplined by any professional credentialing organization to which you did or do belong or has such organization named you as a subject of an investigation or complaint?  </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer7"></td>
                            <td><input type="radio" value = "2" name="answer7"></td>
                            <td>7. Are you licensed to sell insurance? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer8"></td>
                            <td><input type="radio" value = "2" name="answer8"></td>
                            <td>8.  Are you licensed to sell securities? </td>
                        </tr>
                        <tr>
                            <td><input type="radio" value = "1" name="answer9"></td>
                            <td><input type="radio" value = "2" name="answer9"></td>
                            <td>9.  Do you have 10 or more years of relevant work experience in your field? </td>
                        </tr>

                        <tr>
                            <td><input type="radio" value = "1" name="answer10"></td>
                            <td><input type="radio" value = "2" name="answer10"></td>
                            <td>10. If your answer to number 9 is NO, do you have 5 years of relevant experience with a bachelor or master's degree <strong>(If your answer is still NO, you do not meet the qualifications to become a CFF® at this time.)</strong> </td>
                        </tr>
                        </tbody>
                    </table><br>
                    <br>
                       <p><strong>This attestation statement is by and between the National Association of Certified Financial Fiduciaries herein referred to as ("NACFF") and the applicant desiring to use the Certified Financial Fiduciary (CFF)® designation mark.</strong></p><br>
                          <p>I affirm that:</p>
                    <ol class="benifit-list">
                        <li>Permission to use the mark CFF® and related marks is valid provided I renew my membership eligibility annually and that I remain in good standing with the NACFF and use the certification and marks in an authorized manner. The NACFF may publish on its website names of certain individuals who have used the certification in an unauthorized manner.</li>
                        <li>The NACFF has the absolute and unrestricted right to revoke my CFF® certification, including any rights I may have to use CFF® marks, if it finds that I have failed to comply with the CFF Code of Conduct, NACFF rules, qualifications and/or regulations. The NACFF has the authority to publish on its website names of certain individuals for whom the right to carry the CFF® certification has been revoked.</li>
                        <li>In consideration of the certification granted, the NACFF, and others acting on its behalf, shall not be liable to me for any actions taken or omitted to be taken in any official capacity or in the scope of employment, except to the extent that such actions or omissions constitute willful misconduct or gross negligence; I hereby release the NACFF, and its agents from any liability for such actions or omissions.</li>
                        <li>I will fulfill recertification requirements to maintain CFF® certification.</li>
                        <li>I will comply with all policies and requirements of the NACFF. If certified as a part of the National Association of Certified Financial Fiduciaries, I will comply with all standards and requirements that the NACFF may issue from time to time, including usage standards for CFF® certification and all other proprietary mark(s). I acknowledge that NACFF is not responsible for any usage standards put in place by outside entities.</li>
                        <li>I understand that NACFF has the authority to perform background checks. I agree to cooperate with any actions and further understand that providing false information, or having others do so, is a violation of the CFF Code of Conduct and NACFF Policies and may result in sanctions.</li>
                        <li>I agree to immediately inform the CFF® Certification Staff of all changes to the information included in this application while I am an applicant, and for as long as I am certified by the NACFF, and to immediately inform the NACFF of any matters that may affect my capability to continue to fulfill certification requirements.</li>
                        <li>I understand that if successful I will be listed in the online certification directory; however, if in the future should I not want to continue to be listed in the online directory, I will contact the NACFF to request removal from the list. I understand that even if my credentials are not listed in the online directory, the NACFF will continue to verify credentials upon request.</li>
                        <li>I agree to give NACFF, its agents, and staff permission to contact me by U.S. mail, electronic mail, facsimile, or through other media on matters that NACFF believes may be of importance to me. Should I wish to be taken off the mailing list, I will send an e-mail request stating such to <a href="mailto:removeme@nationalcffassociation.org">removeme@nationalcffassociation.org  </a></li>
                        <li>I understand and acknowledge that the NACFF Certification Handbook contains the policies applicable to applicants and certificates'. To review and print a copy of the NACFF Certification Handbook visit our website at <a href="http://www.nationalcffassoication.org">http://www.nationalcffassoication.org</a></li>
                        <li>I agree to abide and adhere to the Rules and Standards as specified in the CFF Code of Conduct. To review and print a copy of the CFF Code of Conduct visit our website at <a href="http://www.nationalcffassociation.org">http://www.nationalcffassociation.org</a></li>
                    </ol>   
            </div>    
        </div>
    
        <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px;">
            <div class="form-group">
                <input type = "hidden" name = "event_id" value = "<?php echo $rs->id ?>">
                <center><input type = "submit" class="thm-btn" value = "Register"></center>                
            </div>
        </div> 
    </form>
    </div>
</div>
</section>


<script src="https://checkout.stripe.com/checkout.js"></script>

<script>
var handler = StripeCheckout.configure({
  key: 'pk_test_QUfhnkwk6wtsP5twlyB620XZ',
  image: 'https://stripe.com/img/documentation/checkout/marketplace.png',
  locale: 'auto',
  token: function(token) {
        $.post("<?php echo Yii::app()->createUrl("nacff/site/savepayment", array("id"=>$rs->id)) ?>", {
            is_paid: 1, 
            payment_details: token.id, 
            first_name: $('#first_name').val(), 
            last_name: $('#last_name').val(), 
            mi_number: $('#mi_number').val(),
            company_name: $('#company_name').val(),
            work_phone: $('#work_phone').val(),
            mobile_number: $('#mobile_number').val(),
            email: $('#email').val(), 
            address1: $('#address1').val(),
            city: $('#city').val(),
            state: $('#state').val(),
            postcode: $('#postcode').val(),
            billing_address1: $('#billing_address1').val(),
            billing_city: $('#billing_city').val(),
            billing_state: $('#billing_state').val(),
            billing_postcode: $('#billing_postcode').val(),
            
            industry: $('#industry').val(), 
            designation: $('#designation').val(), 
            licenses: $('#licenses').val(),
            certificates: $('#certificates').val(),
            other: $('#other').val(),
            
            home_address1: $('#home_address1').val(),
            home_city: $('#home_city').val(),
            home_state: $('#home_state').val(),
            home_postcode: $('#home_postcode').val(),
            
            answer1: $('input[name=answer1]:checked').val(),
            answer2: $('input[name=answer2]:checked').val(),
            answer3: $('input[name=answer3]:checked').val(),
            answer4: $('input[name=answer4]:checked').val(),
            answer5: $('input[name=answer5]:checked').val(),
            answer6: $('input[name=answer6]:checked').val(),
            answer7: $('input[name=answer7]:checked').val(),
            answer8: $('input[name=answer8]:checked').val(),
            answer9: $('input[name=answer9]:checked').val(),
            answer10: $('input[name=answer10]:checked').val(),   
            id: <?php echo $rs->id ?>,
            event_id: $('#event_id').val()
        })
        .done(function(data) {
            if (data == "success"){
                location.href = "<?php echo Yii::app()->createUrl("page/slug/thanks-to-payment", array("id"=>$rs->id)) ?>";
            }            
        })
        .fail(function() {
            alert( "error" );
        })
        .always(function() {
            // alert( "finished" );
        });    
    
        //alert(token.id);
        // You can access the token ID with `token.id`.
        // Get the token ID to your server-side code for use.
  }
});

document.getElementById('customButton').addEventListener('click', function(e) {
    // Open Checkout with further options:
    handler.open({
      name: 'NACFF',
      description: '<?php echo $rs->title ?>',
      currency: 'usd',
      amount: <?php echo $rs['event']->price ?>
    });
    e.preventDefault();
});

// Close Checkout on page navigation:
window.addEventListener('popstate', function() {
  handler.close();
});
</script>
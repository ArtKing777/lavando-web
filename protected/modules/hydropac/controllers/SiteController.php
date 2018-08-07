<?php
class SiteController extends Controller
{ 
    public $moduleName = 'frontend';
        
    public function beforeAction($action){
        parent::beforeAction($action);        
        
        //$this->layout = 'nacff';
        return true;
    }
    
    public function actionIndex(){       
        
         
        \Stripe\Stripe::setApiKey("pk_test_QUfhnkwk6wtsP5twlyB620XZ");
        
        $a = \Stripe\Token::create(array(
            "card" => array(
                "number" => "4242424242424242",
                "exp_month" => 4,
                "exp_year" => 2019,
                "cvc" => "314"
            )
        ));
        
        // echo $a;
        
        
        
        
        $this->layout = 'frontend';
        $this->render('index');
    }
    
    
    public function actionPage($slug = ""){        
        
        if ($slug == "news"){
            $this->actionNews();
            exit();
        }
        
        $rs = MyPage::model()->find("slug = '$slug'");
        if (! $rs){
            $this->actionIndex();
            exit();
        }
        
        $pageContent = $this->render('page', array('rs' => $rs), true);
        
        $teamMembers = $this->getTeammembers();
        $pageContent = str_replace("{{team-members}}", $teamMembers, $pageContent);
        
        $faqs = $this->getFaqs();
        $pageContent = str_replace("{{faqs}}", $faqs, $pageContent);
        
        $mission = $this->getMission();
        $pageContent = str_replace("{{mission}}", $mission, $pageContent);
        
        $certificationMarks = $this->getCertificationMarks();
        $pageContent = str_replace("{{certification-marks}}", $certificationMarks, $pageContent);
        
        $searchLiveClasses = $this->getSearchLiveClasses();
        $pageContent = str_replace("{{search-live-classes}}", $searchLiveClasses, $pageContent);
        
        $liveClasses = $this->getLiveClasses();
        $pageContent = str_replace("{{live-classes}}", $liveClasses, $pageContent);
        
        $searchUpcomingWebinars = $this->getSearchUpcomingWebinars();
        $pageContent = str_replace("{{search-upcoming-webinars}}", $searchUpcomingWebinars, $pageContent);
        
        $upcomingWebinars = $this->getUpcomingWebinars();
        $pageContent = str_replace("{{upcoming-webinars}}", $upcomingWebinars, $pageContent);
        
        $cffBanner = $this->getCFFBanner();
        $pageContent = str_replace("{{cff-banner}}", $cffBanner, $pageContent);
        
        $searchCFFDirectory = $this->getSearchCFFDirectory();
        $pageContent = str_replace("{{search-cff-directory}}", $searchCFFDirectory, $pageContent);
        
        $cffDirectory = $this->getCFFDirectory();
        $pageContent = str_replace("{{cff-directory}}", $cffDirectory, $pageContent);
        
        $downloadCffApplicationButton = $this->getDownloadCffApplicationButton();
        $pageContent = str_replace("{{download-cff-application-button}}", $downloadCffApplicationButton, $pageContent);
        
        $downloadNACFFComplaintProcedureButton = $this->getdownloadNACFFComplaintProcedureButton();
        $pageContent = str_replace("{{download-nacff-complaint-procedure-button}}", $downloadNACFFComplaintProcedureButton, $pageContent);
        
        $downloadNACFFComplaintFormButton = $this->getdownloadNACFFComplaintFormButton();
        $pageContent = str_replace("{{download-nacff-complaint-form-button}}", $downloadNACFFComplaintFormButton, $pageContent);
        
        $contactUs = $this->getContactUs();
        $pageContent = str_replace("{{contact-us}}", $contactUs, $pageContent);
        
        echo $pageContent;
    }
    
    public function actionNews($slug = ""){
        if (isset($_REQUEST['s'])){
            $slug = $_REQUEST['s'];
        }
        $rs = MyNews::model()->find("slug = '$slug'");
        
        $pageContent = $this->render('news', array('rs' => $rs), true);
        
        $teamMembers = $this->getTeammembers();
        $pageContent = str_replace("{{team-members}}", $teamMembers, $pageContent);
        
        $faqs = $this->getFaqs();
        $pageContent = str_replace("{{faqs}}", $faqs, $pageContent);
        
        $mission = $this->getMission();
        $pageContent = str_replace("{{mission}}", $mission, $pageContent);
        
        $certificationMarks = $this->getCertificationMarks();
        $pageContent = str_replace("{{certification-marks}}", $certificationMarks, $pageContent);
        
        $searchLiveClasses = $this->getSearchLiveClasses();
        $pageContent = str_replace("{{search-live-classes}}", $searchLiveClasses, $pageContent);
        
        $liveClasses = $this->getLiveClasses();
        $pageContent = str_replace("{{live-classes}}", $liveClasses, $pageContent);
        
        $searchUpcomingWebinars = $this->getSearchUpcomingWebinars();
        $pageContent = str_replace("{{search-upcoming-webinars}}", $searchUpcomingWebinars, $pageContent);
        
        $upcomingWebinars = $this->getUpcomingWebinars();
        $pageContent = str_replace("{{upcoming-webinars}}", $upcomingWebinars, $pageContent);
        
        $cffBanner = $this->getCFFBanner();
        $pageContent = str_replace("{{cff-banner}}", $cffBanner, $pageContent);
        
        $searchCFFDirectory = $this->getSearchCFFDirectory();
        $pageContent = str_replace("{{search-cff-directory}}", $searchCFFDirectory, $pageContent);
        
        $cffDirectory = $this->getCFFDirectory();
        $pageContent = str_replace("{{cff-directory}}", $cffDirectory, $pageContent);
        
        $contactUs = $this->getContactUs();
        $pageContent = str_replace("{{contact-us}}", $contactUs, $pageContent);
        
        echo $pageContent;
    }
       
    public function getTeammembers(){
        $rsTeammembers = MyTeammember::model()->findAll('status_id = 1');
        return $this->renderPartial("team-member", array('rs' => $rsTeammembers), true);
    }
    
    public function getFaqs(){
        $rsFaqs = MyFaq::model()->findAll('status_id = 1');
        return $this->renderPartial("faq", array('rs' => $rsFaqs), true);
    }    
       
    public function getCertificationMarks(){
        return $this->renderPartial("certification-marks", null, true);
    }
    
    public function getMission(){
        return $this->renderPartial("mission", null, true);
    }
    
    public function getSearchLiveClasses(){
        $states = $this->getStates();
        
        $state = "";
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
        }
        
        return $this->renderPartial('search-live-classes', array('states' => $states, 'state' => $state), true);
    }
    
    public function getLiveClasses(){
                
        $state = "";
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
            $stateFullName = $state;
            $arrStates = $this->getStates();
            if (isset($arrStates[$state])){
                $stateFullName = $arrStates[$state];
            }
        }
        
        $cond = 'status_id = 1 AND event_type_id = 1';
        if ($state != ""){
            $cond .= " AND (state = '$state' OR state = '$stateFullName')";
        } 
        $rs = MyEvent::model()->findAll($cond);
        return $this->renderPartial('live-classes', array('rs' => $rs, 'state' => $state), true);
    }
    
    public function getSearchUpcomingWebinars(){
        $states = $this->getStates();
        
        $state = "";
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
        }
        
        return $this->renderPartial('search-upcoming-webinars', array('states' => $states, 'state' => $state), true);
    }
    
    public function getUpcomingWebinars(){
                
        $state = "";
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
        }
        
        $cond = 'status_id = 1 AND event_type_id = 2';
        if ($state != ""){
            $cond .= " AND state = '$state'";
        }
        $rs = MyEvent::model()->findAll($cond);
        return $this->renderPartial('upcoming-webinars', array('rs' => $rs, 'state' => $state), true);
    }
    
    public function getDownloadCffApplicationButton(){
        $rs = MyDownload::model()->find(array('condition' => 'status_id = 1', 'order' => 'id desc'));
        if ($rs){
            //if (is_file("data/nacff/downloads/file_name/" . $rs->file_name)){
                $fileUrl = "data/nacff/" . $rs->file_name;
                return "<a href=\"/$fileUrl\" class=\"thm-btn b-btn-md\">Download CFF Appliction Form</a>";
            //}
        } 
    }
    
    public function getdownloadNACFFComplaintProcedureButton(){
        $rs = MyDownload::model()->find(array('condition' => 'status_id = 1', 'order' => 'id desc'));
        // if ($rs){
            //if (is_file("data/nacff/downloads/file_name/" . $rs->file_name)){
                $fileUrl = "data/nacff/NACFF Complaint Procedure 9-18-17.pdf";
                return "<a href=\"/$fileUrl\" class=\"thm-btn b-btn-md\">Download NACFF Complaint Procedure</a>";
            //}
        //} 
    }
    
    public function getdownloadNACFFComplaintFormButton(){
        $rs = MyDownload::model()->find(array('condition' => 'status_id = 1', 'order' => 'id desc'));
        //if ($rs){
            //if (is_file("data/nacff/downloads/file_name/" . $rs->file_name)){
                $fileUrl = "data/nacff/NACFF Complaint Form 9-18-17.pdf";
                return "<a href=\"/$fileUrl\" class=\"thm-btn b-btn-md\">Download NACFF Complaint Form</a>";
            //}
        //} 
    }
        
    public function getCFFBanner(){
        return $this->renderPartial("cff-banner", null, true);
    }
    
    public function getSearchCFFDirectory(){
        $states = $this->getStates();
        
        $state = "";
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
        }
        
        $postcode = "";
        if (isset($_REQUEST['postcode'])){
            $postcode = $_REQUEST['postcode'];
        }
        
        return $this->renderPartial('search-cff-directory', array('states' => $states, 'state' => $state, 'postcode' => $postcode), true);
    }
        
    public function getCFFDirectory(){
        
        $state = "";
        $postcode = "";
        
        if (isset($_REQUEST['state'])){
            $state = $_REQUEST['state'];
            $stateFullName = $state;
            $arrStates = $this->getStates();
            if (isset($arrStates[$state])){
                $stateFullName = $arrStates[$state];
            }
        }
        
        if (isset($_REQUEST['postcode'])){
            $postcode = $_REQUEST['postcode'];
        }
        
        $cond = "status_id = 1 ";
        if ($state != ""){
            $cond .= " AND (state = '$state' OR state = '$stateFullName')";
        } 
        
        if ($postcode != ""){
            $cond .= " AND postcode = '$postcode'";
        } 
        
        $rs = MyAdvisor::model()->findAll($cond);
        return $this->renderPartial('cff-directory', array('rs' => $rs, 'state' => $state, 'postcode' => $postcode), true);
    }
    
    public function getContactUs(){
        return $this->renderPartial("contact-us", null, true);
    }
       
    public function getStates(){
        $states = array(
          'AL' => 'Alabama',
          'AK' => 'Alaska',
          'AZ' => 'Arizona',
          'AR' => 'Arkansas',
          'CA' => 'California',
          'CO' => 'Colorado',
          'CT' => 'Connecticut',
          'DE' => 'Delaware',
          'DC' => 'District Of Columbia',
          'FL' => 'Florida',
          'GA' => 'Georgia',
          'HI' => 'Hawaii',
          'ID' => 'Idaho',
          'IL' => 'Illinois',
          'IN' => 'Indiana',
          'IA' => 'Iowa',
          'KS' => 'Kansas',
          'KY' => 'Kentucky',
          'LA' => 'Louisiana',
          'ME' => 'Maine',
          'MD' => 'Maryland',
          'MA' => 'Massachusetts',
          'MI' => 'Michigan',
          'MN' => 'Minnesota',
          'MS' => 'Mississippi',
          'MO' => 'Missouri',
          'MT' => 'Montana',
          'NE' => 'Nebraska',
          'NV' => 'Nevada',
          'NH' => 'New Hampshire',
          'NJ' => 'New Jersey',
          'NM' => 'New Mexico',
          'NY' => 'New York',
          'NC' => 'North Carolina',
          'ND' => 'North Dakota',
          'OH' => 'Ohio',
          'OK' => 'Oklahoma',
          'OR' => 'Oregon',
          'PA' => 'Pennsylvania',
          'RI' => 'Rhode Island',
          'SC' => 'South Carolina',
          'SD' => 'South Dakota',
          'TN' => 'Tennessee',
          'TX' => 'Texas',
          'UT' => 'Utah',
          'VT' => 'Vermont',
          'VA' => 'Virginia',
          'WA' => 'Washington',
          'WV' => 'West Virginia',
          'WI' => 'Wisconsin',
          'WY' => 'Wyoming',
        );
        
        return $states;
    }
    
    
    public function actionCFFDirectory($state = ""){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);       
    }
        
    public function actionRegister($id){
        $rs = MyEvent::model()->with('course')->findByPk($id);
        $this->render('register', array('rs' => $rs));
    }
    
    public function actionThanksRegister($id){
        $rs = MyCffApplication::model()->with('event')->findByPk($id);
        $this->render('thanksregister', array('rs' => $rs));
    }
    
    public function actionThanksInquiry($id){
        $rs = MyInquiry::model()->findByPk($id);
        $this->render('thanksinquiry', array('rs' => $rs));
    }
    
    public function actionThanksNewsletter($id){
        $rs = MyNewsletter::model()->findByPk($id);
        $this->render('thanksnewsletter', array('rs' => $rs));
    }
    
    public function actionSaveRegister($id){
        $register = new MyCffApplication();
        $register->event_id = $_POST['event_id'];
        $register->first_name = $_POST['first_name'];
        $register->last_name = $_POST['last_name'];
        $register->email = $_POST['email'];
        $register->mobile_number = $_POST['mobile_number'];
        if (isset($_POST['event_option'])){
            $register->event_option = $_POST['event_option'];
        }
        $register->is_paid = 2;
        $register->payment_details = "";
        if ($register->save()){
            $this->redirect(array('site/payment', 'id'=>$register->id));
        }        
    }
    
    public function actionSaveInquiry(){
        
        $inquiry = new MyInquiry();
        $inquiry->inquiry_date = date("Y-m-d H:i:s");
        $inquiry->first_name = Helper::ReplaceEmpty("first_name", "");       
        $inquiry->email = Helper::ReplaceEmpty("email", "");  
        $inquiry->work_phone = Helper::ReplaceEmpty("work_phone", "");  
        $inquiry->subject = Helper::ReplaceEmpty("subject", "");  
        $inquiry->message  = Helper::ReplaceEmpty("message", "");  
        
        if ($inquiry->save()){
            $this->redirect('page/slug/thanks-for-inquiry');
        }        
    }
    
    public function actionSaveNewsletter(){
        
        $newsletter = new MyNewsletter(); 
        $newsletter->subscribe_date = date("Y-m-d H:i:s");
        $newsletter->email = Helper::ReplaceEmpty("email", "");  
                
        if ($newsletter->save()){
            $this->redirect('page/slug/thanks-to-subscribe');
        }        
    }
    
    public function actionPayment($id){
        $rs = MyCffApplication::model()->with('event')->findByPk($id);
        if ($rs){
            $this->render('payment', array('rs' => $rs));
        }        
    }
    
    public function actionSaveCFFApplication($id){
       
        $register = MyCffApplication::model()->findByPk($id);    
        $register->first_name = $_POST['first_name'];
        $register->last_name = $_POST['last_name'];
        $register->mi_number = $_POST['mi_number'];
        $register->company_name = $_POST['company_name'];
        $register->work_phone = $_POST['work_phone'];
        $register->mobile_number = $_POST['mobile_number'];
        $register->email = $_POST['email'];
        $register->address1 = $_POST['address1'];
        $register->city = $_POST['city'];
        $register->state = $_POST['state'];
        $register->postcode = $_POST['postcode'];
        $register->billing_address1 = $_POST['billing_address1'];
        $register->billing_city = $_POST['billing_city'];
        $register->billing_state = $_POST['billing_state'];
        $register->billing_postcode = $_POST['billing_postcode'];
        $register->industry = $_POST['industry'];
        $register->designation = $_POST['designation'];
        $register->licenses = $_POST['licenses'];
        $register->certificates = $_POST['certificates'];
        $register->home_address1 = $_POST['home_address1'];
        $register->home_city = $_POST['home_city'];
        $register->home_state = $_POST['home_state'];
        $register->home_postcode = $_POST['home_postcode'];
        
        if (isset($_POST['answer1'])){
            $register->answer1 = $_POST['answer1'];
        }
        
        if (isset($_POST['answer2'])){
            $register->answer2 = $_POST['answer2'];
        }
        
        if (isset($_POST['answer3'])){
            $register->answer3 = $_POST['answer3'];
        }
        
        if (isset($_POST['answer4'])){
            $register->answer4 = $_POST['answer4'];
        }
        
        if (isset($_POST['answer5'])){
            $register->answer5 = $_POST['answer5'];
        }
        
        if (isset($_POST['answer6'])){
            $register->answer6 = $_POST['answer6'];
        }
        
        if (isset($_POST['answer7'])){
            $register->answer7 = $_POST['answer7'];
        }
        
        if (isset($_POST['answer8'])){
            $register->answer8 = $_POST['answer8'];
        }
        
        if (isset($_POST['answer9'])){
            $register->answer9 = $_POST['answer9'];
        }
        
        if (isset($_POST['answer10'])){
            $register->answer10 = $_POST['answer10'];
        }
                
        $register->is_paid = 1;
        // $register->payment_details = $_POST['payment_details'];
        if ($register->save()){
            $this->layout = false;
            $this->redirect(array('site/paypal', 'id'=>$register->id));
        }
    }
    
    public function actionPaypal($id){
        $this->layout = false;
        $register = MyCffApplication::model()->with('event')->findByPk($id);
        if ($register){        
            $item_name = $register->event['title'];
            $amount = $register->event['price'];
            $this->render('paypal', array('id' => $id, 'item_name' => $item_name, 'amount' => $amount));
        }
    }
    
    public function actionReturnPaypal(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true); 
        $this->redirect('page/slug/thanks-to-payment');
    }
    
    public function actionCancelPaypal(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true); 
        $this->redirect('page/slug/cancel-payment');
    }
    
    public function actionContactUs(){
        $this->render('contact-us');
    }
      
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                    $this->render('error', $error);
        }
    }
    
    public function getImage($img, $size){
        $imgPath = "data/nacff/" . $img;

        if (is_file($imgPath)){
            return $this->dataUrl . $img;
        }
        else {
            return "http://via.placeholder.com/" . $size;
        }
    }
}
    

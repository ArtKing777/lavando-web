<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CffApplicationsController
 *
 * @author Administrator
 */
class CffApplicationsController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyCffApplication::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status', 'event');
        $search = array('t.first_name', 't.last_name', 't.company_name', 't.designation', 't.mobile_number', 't.email', 'status.name', 'event.title');
        $col = array('id', 'first_name', 'last_name', 'company_name', 'designation', 'mobile_number', 'email', 'status' => array('id', 'name'), 'event' => array('id', 'title'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyCffApplication::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyCffApplication::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyCffApplication();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['profile_image'])){
                $rs->profile_image = StorageHelper::MoveUploadedFile($param['profile_image'], "cff_applications/profile_image/");
            }
            
            if ($rs->save()){     
                
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Saved Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
                $json = Helper::getStr($rs->getErrors(), "");
                ResHelper::sendResponse(411, $json);
            }
        }
        else {
            ResHelper::sendResponse(411, "Invalid input");
        }
    }

    public function actionDelete(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

         $rs =CffApplication::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find CffApplication: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (CffApplication::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'CffApplication: ' . $rs->first_name . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json); 
            }
            else {
                $json = CJSON::encode("Unable to delete CffApplication: " . $rs->first_name . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete CffApplication: " . $rs->first_name . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }  
    
    public function actionExport(){        
        $headings = array(
            'ID', 'First Name', 'MI', 'Last Name', 'Company Name', 'Designation', 
            'Email', 'Workphone', 'Home Phone', 'Mobile Number', 'URL',
            'Address Type', 'Address1', 'Address2', 'Address3', 'City', 'State', 'Country', 'Postcode',
            'Billing Address 1', 'Billing Address 2', 'Billing Address 3', 'Billing City', 'Billing State', 'Billing Country', 'Billing Postcode',
            'Home Address 1', 'Home Address 2', 'Home Address 3', 'Home City', 'Home State', 'Home Country', 'Home Postcode',
            'Industry', 'Licenses', 'Certificates', 
            'Anwer 1', 'Answer 2', 'Answer 3', 'Answer 4', 'Answer 5', 'Answer 6', 'Answer 7', 'Answer 8', 'Answer 9', 'Answer 10',
            'Dropbox', 'Facebook', 'Twitter', 'Linked In', 'Youtube', 'Google Plus', 'Skype',
            'Sttus'
        );
        
        $cols = array(
            'id', 'first_name', 'mi_number', 'last_name', 'company_name', 'designation',
            'email', 'work_phone', 'home_phone', 'mobile_number', 'url', 
            'address_type', 'address1', 'address2', 'address3', 'city', 'state', 'country', 'postcode',
            'billing_address1', 'billing_address2', 'billing_address3', 'billing_city', 'billing_state', 'billing_country', 'billing_postcode',
            'home_address1', 'home_address1', 'home_address3', 'home_city', 'home_state', 'home_country', 'home_postcode',
            'industry', 'licenses', 'certificates',
            'answer1', 'answer2', 'answer3', 'answer4', 'answer5', 'answer6', 'answer7', 'answer8', 'answer9', 'answer10', 
            'dropbox_email', 'facebook_handel','twitter_handel','linkedin_handel','youtube_handel','google_plus_handel','skype_handel',
            'status_id'
        );
        
        $data = array();
        $rs = MyCffApplication::model()->findAll();
        foreach ($rs as $rw){
           $d = array();
           foreach ($cols as $col){
               $d[] = $rw->$col;
           }
           $data[] = $d;              
        }
        
        
        $fileName = "CFF Applications";
        DataHelper::exportToExcel($headings, $data, $fileName);
    }
    
    public function actionGetEvents(){
        $rs = MyEvent::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }
    
    public function actionExportSignInSheet($id = null)
    {   
        $event = MyEvent::model()->find('id = ' . $id);
        $rs = MyCffApplication::model()->with('event')->findAll(array('condition' => 'event_id = ' . $id, 'order' => 'last_name, first_name'));
 
	$html = $this->render('exportsigninsheet', array('rs' => $rs, 'event' => $event), true);
        
        $pdf=Yii::app()->dompdf;
        $pdf->dompdf->set_paper("letter", "landscape");
        $pdf->generate($html , $event->title . '.pdf', true);
    }
}

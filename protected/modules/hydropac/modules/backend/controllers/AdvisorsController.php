<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AdvisorsController
 *
 * @author Administrator
 */
class AdvisorsController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyAdvisor::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status');
        $search = array('t.first_name', 't.last_name', 't.company_name', 't.designation', 't.mobile_number', 't.email', 'status.name');

        $col = array('id', 'first_name', 'last_name', 'company_name', 'designation', 'mobile_number', 'email', 'status' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyAdvisor::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyAdvisor::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyAdvisor();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['profile_image'])){
                $rs->profile_image = StorageHelper::MoveUploadedFile($param['profile_image'], "advisors/profile_image/");
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

         $rs =Advisor::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Advisor: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (Advisor::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Advisor: ' . $rs->username . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Advisor: " . $rs->username . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Advisor: " . $rs->username . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }  
}

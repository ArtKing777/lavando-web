<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TeammembersController
 *
 * @author Administrator
 */
class TeammembersController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyTeammember::model();
        
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

        $rs = MyTeammember::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        if (isset($param['id'])){
            $rs = MyTeammember::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTeammember();
        }

        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['profile_image'])){
                $rs->profile_image = StorageHelper::MoveUploadedFile($param['profile_image'], "teammembers/profile_image/");
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

         $rs =Teammember::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Teammember: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (Teammember::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Teammember: ' . $rs->username . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Teammember: " . $rs->username . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Teammember: " . $rs->username . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }   
}

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsersController
 *
 * @author Administrator
 */
class ProfileController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyUser::model()->findByPk($this->user_id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        
        if (isset($param['id'])){
            $rs = MyUser::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyUser();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['profile_image'])){
                $rs->profile_image = StorageHelper::MoveUploadedFile($param['profile_image'], "users/profile_image/");
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
}

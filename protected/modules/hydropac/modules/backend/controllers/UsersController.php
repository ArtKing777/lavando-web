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
class UsersController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyUser::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('account','userGroup');
        $search = array('t.username', 't.first_name', 't.last_name', 't.company_name', 'account.acccode', 'userGroup.name');

        $col = array('id', 'username', 'first_name', 'designation', 'company_name', 'account' => array('id', 'acccode', 'company_name'), 'userGroup' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyUser::model()->findByPk($param->id);
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

    public function actionDelete(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

         $rs =User::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find User: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (User::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'User: ' . $rs->username . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete User: " . $rs->username . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete User: " . $rs->username . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }
    
    public function actionGetAccounts(){
        $rs = MyAccount::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
    
    public function actionGetUserGroups(){
        $rs = MyUserGroup::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }    
}

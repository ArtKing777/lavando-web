<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PropertiesController
 *
 * @author Administrator
 */
class PropertiesController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyProperty::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('user','propertyType');
        $search = array('t.name', 't.address1', 't.address2', 't.city', 'user.first_name', 'user.last_name', 'propertyType.name');

        $col = array('id', 'name', 'address1', 'address2', 'city', 'user' => array('id', 'first_name', 'last_name', 'mobile_number', 'email'), 'propertyType' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyProperty::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyProperty::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyProperty();
        }
        
        if (Helper::ReadInputs($rs, $param)){
                            
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

         $rs =MyProperty::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Property: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (MyProperty::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Property: ' . $rs->name . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Property: " . $rs->name . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Property: " . $rs->name . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }   
    
    public function actionGetPropertyTypes(){
        $rs = MyPropertyType::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }    
    
    public function actionGetUsers(){
        $rs = MyUser::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
}

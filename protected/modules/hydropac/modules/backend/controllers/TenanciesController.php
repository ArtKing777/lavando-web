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
class TenanciesController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyTenancy::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('property','tenancyType');
        $search = array('t.ref_no', 't.tenancy_date', 't.rent_date', 't.paymode', 't.rent', 't.start_date', 't.end_date', 'property.name', 'tenancyType.name');

        $col = array('id', 'ref_no', 'tenancy_date', 'rent_date', 'paymode', 'rent', 'start_date', 'end_date', 'property' => array('id', 'name'), 'tenancyType' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyTenancy::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyTenancy::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTenancy();
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
    
    public function actionGetTenancyTypes(){
        $rs = MyTenancyType::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }
    
    public function actionGetProperties(){
        $rs = MyProperty::model()->with('user')->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
    
    public function actionGetTenants(){
        $rs = MyTenant::model()->with('tenantType')->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
}

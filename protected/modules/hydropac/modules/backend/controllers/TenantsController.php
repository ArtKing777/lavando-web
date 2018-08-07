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
class TenantsController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyTenant::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('property','tenancyType');
        $search = array('t.tenancy_date', 't.rent_date', 't.paymode', 't.rent', 't.start_date', 't.end_date', 'property.name', 'tenancyType.name');

        $col = array('id', 'tenancy_date', 'rent_date', 'paymode', 'rent', 'start_date', 'end_date', 'property' => array('id', 'name'), 'tenancyType' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyTenant::model()->with(array('tenantDocuments', 'tenantAddresses', 'tenantEmployments'))->findByPk($param->id);
        $json = Jsonize::encode($rs, array('tenantDocuments', 'tenantAddresses', 'tenantEmployments'));
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyTenant::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTenant();
        }
                
        if (Helper::ReadInputs($rs, $param)){
            
            if (isset($param['profile_image'])){
                $rs->profile_image = StorageHelper::MoveUploadedFile($param['profile_image'], "tenant/profile_image/");
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
    
    public function actionSaveTenantDocument(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        if (isset($param['id'])){
            $rs = MyTenantDocument::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTenantDocument();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            
            if (isset($param['file'])){
                $rs->file = StorageHelper::MoveUploadedFile($param['file'], "tenant_document/file/");
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
    
    public function actionSaveTenantAddress(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        if (isset($param['id'])){
            $rs = MyTenantAddress::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTenantAddress();
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
    
    
    public function actionSaveTenantEmployment(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);
        
        if (isset($param['id'])){
            $rs = MyTenantEmployment::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyTenantEmployment();
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

         $rs = MyProperty::model()->findByPk($param['id']);
        
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
    
    public function actionGetTenantTypes(){
        $rs = MyTenantType::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }
    
    public function actionUpdateData(){
        $pk        = Helper::ReplaceEmpty("pk", "");
        $name      = Helper::ReplaceEmpty("name");
        $value     = Helper::ReplaceEmpty("value");
        $custom    = Helper::ReplaceEmpty("customParam", "");
        $rs        = MyTenant::model()->findByPk($pk);
        $rs->$name = $value;
        if ($rs->save()) {
            $json = CJSON::encode(array(
                'rs' => $rs,
                'msg' => 'Saved Successfully'
            ));
            ResHelper::sendResponse(211, $json);
        }
        else {
            $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
            ResHelper::sendResponse(411, $json);
        }
    }
    
    public function actionUpdateTenantDocumentData(){
        $pk        = Helper::ReplaceEmpty("pk", "");
        $name      = Helper::ReplaceEmpty("name");
        $value     = Helper::ReplaceEmpty("value");
        $custom    = Helper::ReplaceEmpty("customParam", "");
        $rs        = MyTenantDocument::model()->findByPk($pk);
        $rs->$name = $value;
        if ($rs->save()) {
            $json = CJSON::encode(array(
                'rs' => $rs,
                'msg' => 'Saved Successfully'
            ));
            ResHelper::sendResponse(211, $json);
        }
        else {
            $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
            ResHelper::sendResponse(411, $json);
        }
    }
    
    public function actionUpdateTenantAddressData(){
        $pk        = Helper::ReplaceEmpty("pk", "");
        $name      = Helper::ReplaceEmpty("name");
        $value     = Helper::ReplaceEmpty("value");
        $custom    = Helper::ReplaceEmpty("customParam", "");
        $rs        = MyTenantAddress::model()->findByPk($pk);
        $rs->$name = $value;
        if ($rs->save()) {
            $json = CJSON::encode(array(
                'rs' => $rs,
                'msg' => 'Saved Successfully'
            ));
            ResHelper::sendResponse(211, $json);
        }
        else {
            $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
            ResHelper::sendResponse(411, $json);
        }
    }
    
    public function actionUpdateTenantEmploymentData(){
        $pk        = Helper::ReplaceEmpty("pk", "");
        $name      = Helper::ReplaceEmpty("name");
        $value     = Helper::ReplaceEmpty("value");
        $custom    = Helper::ReplaceEmpty("customParam", "");
        $rs        = MyTenantEmployment::model()->findByPk($pk);
        $rs->$name = $value;
        if ($rs->save()) {
            $json = CJSON::encode(array(
                'rs' => $rs,
                'msg' => 'Saved Successfully'
            ));
            ResHelper::sendResponse(211, $json);
        }
        else {
            $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
            ResHelper::sendResponse(411, $json);
        }
    }
}

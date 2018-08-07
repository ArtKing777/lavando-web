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
class TenanciesController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionListTenancies(){
        $rs = MyTenancy::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('property','tenancyType');
        $search = array('t.tenancy_date', 't.rent_date', 't.paymode', 't.rent', 't.start_date', 't.end_date', 'property.name', 'tenancyType.name');

        $col = array('id', 'tenancy_date', 'rent_date', 'paymode', 'rent', 'start_date', 'end_date', 'property' => array('id', 'name'), 'tenancyType' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGetTenancy(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyTenancy::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSaveTenancy(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        $rs = new MyTenancy();
        if (Helper::ReadInputs($rs, $param)){
            if ($rs->save()){
                /*
                if(trim($param['photo']) != '' && strpos($param['photo'], DIRECTORY_SEPARATOR) === false){
                    $rs->photo = StorageHelper::getUserDir('profilepic', $rs->id) . $param['photo'];
                    StorageHelper::MoveFlowUploadedFile($param['photo'], $rs->photo);
                    $rs->save();
                }
                */
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

    public function actionUpdateTenancy(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        $rs = MyTenancy::model()->findByPk($param['id']);

        if (Helper::ReadInputs($rs, $param)){
            if ($rs->save()){
                /*
                if(trim($param['photo']) != '' && strpos($param['photo'], DIRECTORY_SEPARATOR) === false){
                    $rs->photo = StorageHelper::getUserDir('profilepic', $rs->id) . $param['photo'];
                    StorageHelper::MoveFlowUploadedFile($param['photo'], $rs->photo);
                    $rs->save();
                }
                */
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Saved Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode(Helper::getStr($rs->getErrors(), ""));
                ResHelper::sendResponse(411, $json);
            }
        }
        else {
            ResHelper::sendResponse(411, "Invalid input");
        }
    }

    public function actionDeleteTenancy(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        $rs =MyTenancy::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find User: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (MyTenancy::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Tenancy: ' . $rs->name . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Tenancy: " . $rs->name . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Tenancy: " . $rs->name . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }

    public function actionSearchTenancies(){
        $rs = MyUser::model()->with('p')->findAll('t.user_group_id = 4');
        $json = Jsonize::encode($rs, array('p'));
        ResHelper::sendResponse(200, $json);
    }    
    
    public function actionGetProperties(){
        $rs = MyProperty::model()->with('user')->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
    
    public function actionGetTenancyTypes(){
        $rs = MyTenancyType::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }
}

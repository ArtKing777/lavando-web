<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NewslettersController
 *
 * @author Administrator
 */
class NewslettersController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyNewsletter::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status');
        $search = array('t.subscribe_date', 't.first_name', 't.last_name', 't.email', 'status.name');

        $col = array('id', 'subscribe_date', 'first_name', 'last_name', 'email', 'status' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyNewsletter::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyNewsletter::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyNewsletter();
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

         $rs = Newsletter::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Newsletter: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (Newsletter::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Newsletter: ' . $rs->username . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Newsletter: " . $rs->username . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Newsletter: " . $rs->username . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }   
}

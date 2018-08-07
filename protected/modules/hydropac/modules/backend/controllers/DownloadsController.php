<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DownloadsController
 *
 * @author Administrator
 */
class DownloadsController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyDownload::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status');
        $search = array('t.title', 'status.name');

        $col = array('id', 'title', 'status' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyDownload::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyDownload::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyDownload();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['file_name'])){
                $rs->file_name = StorageHelper::MoveUploadedFile($param['file_name'], "downloads/file_name/");
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

         $rs = Download::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Download: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (Download::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Download: ' . $rs->username . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Download: " . $rs->username . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Download: " . $rs->username . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }
}

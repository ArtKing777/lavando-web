<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PagesController
 *
 * @author Administrator
 */
class CoursesController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyCourse::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status');
        $search = array('t.course_code', 't.name', 't.title', 'status.name');

        $col = array('id', 'course_code', 'name', 'title', 'status' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyCourse::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyCourse::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyCourse();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['course_image'])){
                $rs->course_image = StorageHelper::MoveUploadedFile($param['course_image'], "course/course_image/");
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

         $rs = MyCourse::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Course: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (MyCourse::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Course: ' . $rs->name . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Course: " . $rs->name . " (" . $rs->id . "). It may be used in some event.");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Course: " . $rs->name . " (" . $rs->id . "). It may be used in some event.");
            ResHelper::sendResponse(411, $json);
        }
    }   
}

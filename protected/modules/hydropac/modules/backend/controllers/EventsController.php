<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventsController
 *
 * @author Administrator
 */
class EventsController extends WSModuleController {
    //put your code here
    
    public function actionIndex() {
        echo " I am here";
    }    
        
    public function actionList(){
        $rs = MyEvent::model();
        
        $criteria=new CDbCriteria;
        $criteria->with = array('status', 'eventType');
        $search = array('t.title', 't.event_date', 't.start_time', 't.end_time', 't.instructor', 't.state', 't.price', 'status.name', 'eventType.name');

        $col = array('id', 'title', 'event_date', 'start_time', 'instructor', 'state', 'price', 'status' => array('id', 'name'), 'eventType' => array('id', 'name'));
        
        $j = DataHelper::getListData($rs, $col, $criteria, $search);
        ResHelper::sendResponse(200, $j);
    }

    public function actionGet(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyEvent::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }

    public function actionSave(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata, true);

        if (isset($param['id'])){
            $rs = MyEvent::model()->findByPk($param['id']);
        }
        else {
            $rs = new MyEvent();
        }
        
        if (Helper::ReadInputs($rs, $param)){
            if (isset($param['event_image'])){
                $rs->event_image = StorageHelper::MoveUploadedFile($param['event_image'], "events/event_image/");
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

         $rs = Event::model()->findByPk($param['id']);
        
        if ($rs == null){
            $json = CJSON::encode("Can't find Event: " . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }

        try{
            if (Event::model()->deleteByPk($param['id'])){
                $json = CJSON::encode(array('rs' => $rs, 'msg' => 'Event: ' . $rs->title . ' (' . $rs->id . ') Deleted Successfully'));
                ResHelper::sendResponse(211, $json);
            }
            else {
                $json = CJSON::encode("Unable to delete Event: " . $rs->title . " (" . $rs->id . ")");
                ResHelper::sendResponse(411, $json);
            }
        }
        catch (CDbException $e){
            $json = CJSON::encode("Unable to delete Event: " . $rs->title . " (" . $rs->id . ")");
            ResHelper::sendResponse(411, $json);
        }
    }

    public function actionGetEventTypes(){
        $rs = MyEventType::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }    
    
    public function actionGetCourses(){
        $rs = MyCourse::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    }  
    
    public function actionGetCourse(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyCourse::model()->findByPk($param->id);
        $json = CJSON::encode($rs);
        ResHelper::sendResponse(200, $json);
    }
    
    public function actionGetEventOptions(){
        $postdata = file_get_contents("php://input");
        $param = json_decode($postdata);

        $rs = MyEvent::model()->findByPk($param->id);
        $arrOptions = array();
        if (trim($rs->event_options != '')){
            $arrOptions = explode("\n", $rs->event_options);            
        }        
        $json = Jsonize::encode($arrOptions);
        ResHelper::sendResponse(200, $json);
    }
}

<?php
class DefaultController extends WSModuleController
{
    public function actionGetUsers(){
        $rs = MyUser::model()->findAll();
        $json = Jsonize::encode($rs);
        ResHelper::sendResponse(200, $json);
    } 
}
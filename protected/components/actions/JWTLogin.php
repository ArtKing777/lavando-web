<?php
class JWTLogin extends CAction {
    
    public function run() {
        $request = Helper::getRequest();
        $username = $request->username;
        $password = $request->password;

        $rs = MyUser::model()->find("t.username = '" . $username . "'");
        if ($rs){
            if ($rs->password == $password){
                $token = MyUser::getAuthToken($rs->id);
                if ($token) {
                    $rs->last_login_time = date("Y-m-d H:i:s");
                    $rs->save();
                    ResHelper::sendResponse(200, $token);
                }
                else {
                    ResHelper::sendResponse(411, "Account is not active");
                }
            }
            else {
                ResHelper::sendResponse(411, "Invalid Password");
            }
        }
        else {
            ResHelper::sendResponse(411, "Invalid Username " . $username);
        }
        Yii::app()->end();
    }
}


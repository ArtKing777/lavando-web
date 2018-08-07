<?php
use \Firebase\JWT\JWT;

class MyUser extends User {

    public function rules() {
        $rules=parent::rules();
        return CMap::mergeArray($rules, array(
            array('username', 'unique'), // generated rule cause of varchar(20) db field
        ));
    }

    public static function getAuthToken($userId){
        if (is_numeric($userId)){
            $cond = "t.id = '" . $userId . "' AND t.status_id = 1 AND t.is_verified = 1";
        }
        else {
            $cond = "t.username = '" . $userId . "' AND t.status_id = 1 AND t.is_verified = 1";
        }

        $col = array('id', 'account_id', 'first_name', 'last_name', 'userGroup' => array('id', 'name'));
        $rs = MyUser::model()->with(array('account','userGroup'))->find($cond);

        if ($rs) {
            if ($rs->account['is_verified'] == 1 && $rs->account['status_id'] == 1) {
                $token = array(
                    "iss" => "http://example.org",
                    "aud" => "http://example.com",
                    "iat" => time(),
                    "nbf" => time(),
                    "uid" => $rs->id,
                    "utype" => $rs->userGroup['tplkey'],
                    "rs" => Jsonize::arr($rs, $col),
                    "otherData" => $rs->first_name . ' ' . $rs->last_name
                );

                $jwt = JWT::encode($token, Helper::YiiParam("jwtKey"));

                return $jwt;
            }
        }
        return false;
     }
}      
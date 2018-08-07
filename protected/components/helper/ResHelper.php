<?php
Class ResHelper {
    public static function sendResponse($status = 200, $body = '', $content_type = 'text/html'){
        $status_header = 'HTTP/1.1 ' . $status . ' ' . ResHelper::getStatusCodeMessage($status);
        header($status_header);
        header('Content-type: ' . $content_type);

        if($body != ''){
            echo $body;
        }

        Yii::app()->end();
    }

    public static function getStatusCodeMessage($status){
        $codes = Array(
            200 => 'OK',
            400 => 'Bad Request',
            401 => 'Unauthorized',
            402 => 'Payment Required',
            403 => 'Forbidden',
            404 => 'Not Found',
            500 => 'Internal Server Error',
            501 => 'Not Implemented',
            211 => 'Success',
            411 => 'Error',
            311 => 'Info',
            312 => 'Wait',
            313 => 'Warning',
        );
        return (isset($codes[$status])) ? $codes[$status] : '';
    }
}
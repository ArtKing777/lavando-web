<?php

Class Helper {
    public static function getRequest(){
        $postdata = file_get_contents("php://input");
        return json_decode($postdata);
    }
    
    public static function isRemotePath($path = ""){
        if (strpos($path, "http://") !== false || strpos($path, "https://") !== false){
            return true;
        }
        else {
            return false;
        }
    }
    
    public static function CleanText($text = ''){
        $text = trim($text);
      //  $text = mysql_real_escape_string($text);
        return Helper::convertToUTF($text);
    }

    public static function getRequestHeader(){
        $storageType = Yii::app()->controller->storageType;
        if ($storageType == "google"){
            $headers = array();
            foreach($_SERVER as $key => $value) {
                if(substr($key, 0, 5) == 'HTTP_') {
                    $headers[str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))))] = $value;
                }
            }
            return $headers;
        }
        else {
            return apache_request_headers();
        }
    }

    public static function ReplaceEmpty($var, $default = "", $inputArray = null){
        if ($inputArray == null){
            if (isset($_REQUEST[$var])){
                return $_REQUEST[$var];
            }
            elseif (isset($_GET[$var])){
                return $_GET[$var];
            }
            elseif (isset($_POST[$var])){
                return $_POST[$var];
            }
            return $default;
        }
        elseif (is_array($inputArray)) {
            if (isset($inputArray[$var])){
                return $inputArray[$var];
            }
            return $default;
        }
    }

    public static function GetRandomString($Length = 16){
            return strtolower(substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $Length));
    }

    public static function IsValidEmail($email){
    	$pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$";
    	if (@eregi($pattern, $email)){
             return true;
    	}
    	else {
    		return false;
    	}
    }

    public static function SetMsg($Msg, $Type = "success"){
        Yii::app()->user->setFlash($Type, $Msg);
    }

    public static function RecordOutput(){
        ob_start();
    }

    public static function GetOutput(){
        $Rtn = ob_get_contents();
        ob_get_clean();
        return $Rtn;
    }

    public static function YiiParam($name = "", $default = null){
        if ($name == ""){
            return Yii::app()->params;
        }
        
        if ( isset(Yii::app()->params[$name]) )
            return Yii::app()->params[$name];
        else
            return $default;
    }

    public static function CheckLogin(){
        if ( Yii::app()->user->isGuest){
           return Yii::app()->createUrl("site/login");
        }
        else {
           return false;
        }
    }

    public static function GetCtrlID($Name = ''){
        return str_replace("]", "_", str_replace("[", "_", $Name));
    }

    public static function GetExtStr($Ext = array(), $Name = "", $Class = ""){
        $ExtStr = "";

        if (is_array($Ext)){
            if (! isset($Ext['id'])){
                if ($Name != ""){
                    $Ext['id'] = Helper::GetCtrlID($Name);
                }
            }

            if (! isset($Ext['class'])){
                if ($Class != ""){
                    $Ext['class'] = $Class;
                }
            }

            foreach ($Ext as $key => $value){
                $ExtStr .= " $key = '$value'";
            }

            return $ExtStr;
        }
        else {
            return $Ext;
        }
    }

    public static function ReadInputs(&$class, $inputArray = null, $excludeArray = array()){
        if ($inputArray == null){
            $inputArray = $_REQUEST;
        }
        elseif (is_string($inputArray)){
            if (isset($_REQUEST[$inputArray])){
                $inputArray = $_REQUEST[$inputArray];
            }
        }

        if (isset($inputArray['extra'])){
            unset($inputArray['extra']);
        }

        if (is_array($inputArray)){
            if (count($inputArray) > 0){
                foreach ($inputArray as $key => $item) {
                    if ($class->hasAttribute($key) && !in_array($key, $excludeArray)) {
                        $class->$key = Helper::ReplaceEmpty($key, null, $inputArray);
                    }
                }
                return true;
            }
        }

        return false;
    }

    public static function GetPropertyOfObj($obj, array $aProps) {
        foreach($aProps as $p) {
            if (is_object($obj)){
                if ($p != 't'){
                    $obj = $obj->$p;
                }
            }
        }

        return $obj;
    }

    public static function YesNo($value = 0){
        if ($value == 1){
            return "Yes";
        }

        return "No";
    }

    

    public static function FormatCur($value, $cur = "USD"){
        $cn=new CNumberFormatter('en');
        return $cur . $cn->format('###,##0', $value );
        // return $cn->formatCurrency($value, $cur);
    }

    public static function FormatDate($value, $format = "d-M-Y"){
        if (trim($value) == "" ||  trim($value) == "1970-01-01 01:00:00" || trim($value) == "01-Jan-1970 01:00:00" || trim($value) == "0000-00-00 00:00:00" || is_null(trim($value))){
            return "";
        }

        return date($format, strtotime($value));
    }

    

    public static function getAge($birth_date){

        return floor((time() - strtotime($birth_date))/31556926);

    }

    

    // ==== FILE RELATED TASKS ==== //

    

    public static function DelTree($dir) { 

        $files = array_diff(scandir($dir), array('.','..')); 

        foreach ($files as $file) { 

            (is_dir("$dir/$file")) ? Helper::DelTree("$dir/$file") : unlink("$dir/$file"); 

        } 

        return rmdir($dir); 

    }

    

    public static function RecursiveCopy($src,$dst) { 

        $dir = opendir($src); 

        @mkdir($dst); 

        while(false !== ( $file = readdir($dir)) ) { 

            if (( $file != '.' ) && ( $file != '..' )) { 

                if ( is_dir($src . '/' . $file) ) { 

                    Helper::RecursiveCopy($src . '/' . $file,$dst . '/' . $file); 

                } 

                else { 

                    copy($src . '/' . $file,$dst . '/' . $file); 

                } 

            } 

        } 

        closedir($dir); 

    } 

    

    public static function WriteToFile($fileName = '', $data = "", $flags = 0){

        return file_put_contents($fileName, $data, $flags);

    }

    

    public static function ReadFromFile($fileName = ''){

        return Helper::GetFileContent($fileName);

    }

    

    public static function GetFileContent($fileName = ''){

        if (is_file($fileName)){

            return file_get_contents($fileName);

        }

        

        return "";

    }

    

    // ==== DATA FOLDER RELATED TASKS ==== //

    

    public static function CreatePath($path) {

        if (Yii::app()->controller->module->storageType != 'google'){

            if (is_dir($path)) return true;

            $prev_path = substr($path, 0, strrpos($path, DIRECTORY_SEPARATOR, -2) + 1 );

            $return = Helper::CreatePath($prev_path);

            return ($return && is_writable($prev_path)) ? mkdir($path) : false;

        }

        else {

            return $path;

        }

    }

     

    

    public static function GetDataDir(){

        return Yii::app()->controller->dataDir;



        $DataDir = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR;

        Helper::CreatePath($DataDir);

        return $DataDir;

    }

    

    public static function GetUserDir($SubFolder = ''){

        $UserDir = Helper::GetDataDir() . "userdata" . DIRECTORY_SEPARATOR . Yii::app()->user->id . DIRECTORY_SEPARATOR;

        if ($SubFolder != ''){

            $UserDir = $UserDir . $SubFolder . DIRECTORY_SEPARATOR;

        }

        Helper::CreatePath($UserDir);

        return $UserDir;

    }

    

    public static function GetDir($SubFolder = ''){

        $Dir = rtrim(Helper::GetDataDir(), DIRECTORY_SEPARATOR)  . DIRECTORY_SEPARATOR;

        if ($SubFolder != ''){

            $Dir = rtrim($Dir . $SubFolder, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;

        }

        Helper::CreatePath($Dir);

        return $Dir;

    }

    

    public static function MoveUploadedImage($ImageName, $NewPath, $isRemove = true){

        $model = Uploadify::model()->find("random_key = '" . addslashes($ImageName) . "'");

        if ($model){

            $NewFileName = $NewPath . $model->name;



            if (rename(Helper::GetDataDir() . $ImageName, $NewFileName)){

                if ($isRemove){

                    $model->deleteAll();

                }

                $fileName = str_replace(Helper::GetDataDir(), "", $NewFileName);

                return (array('file' => $fileName, 'remark' => $model->remark));

            }

        }

        return (array('file' => $ImageName, 'remark' => ''));

    }

    

    public static function TransposeArray($array){

        $transposed_array = array();

        if ($array) {

            foreach ($array as $row_key => $row) {

                if (is_array($row) && !empty($row)){ //check to see if there is a second dimension

                    foreach ($row as $column_key => $element) {

                        $transposed_array[$column_key][$row_key] = $element;

                    }

                }

                else {

                    $transposed_array[0][$row_key] = $row;

                }

            }

            return $transposed_array;

        }

    }



    public static function  CSVArray($file, $delm=",", $encl="\"",$head=false) {



        $csvxrow = file($file);   // ---- csv rows to array ----



        $csvxrow[0] = chop($csvxrow[0]);

        $csvxrow[0] = str_replace($encl,'',$csvxrow[0]);

        $keydata = explode($delm,$csvxrow[0]);

        $keynumb = count($keydata);



        if ($head === true) {

            $anzdata = count($csvxrow);

            $z=0;

            for($x=1; $x<$anzdata; $x++) {

                $csvxrow[$x] = chop($csvxrow[$x]);

                $csvxrow[$x] = str_replace($encl,'',$csvxrow[$x]);

                $csv_data[$x] = explode($delm,$csvxrow[$x]);

                $i=0;

                foreach($keydata as $key) {

                    $out[$z][$key] = $csv_data[$x][$i];

                    $i++;

                }

                $z++;

            }

        }

        else {

            $i=0;

            foreach($csvxrow as $item) {

                $item = chop($item);

                $item = str_replace($encl,'',$item);

                $csv_data = explode($delm,$item);

                for ($y=0; $y<$keynumb; $y++) {

                    $out[$i][$y] = $csv_data[$y];

                }

                $i++;

            }

        }



        return $out;

    }



    public static function getStr($obj, $rtn){

        foreach($obj as $o){

            if (is_array($o) || is_object($o)){

                if ($rtn != ''){

                    $rtn .= ' ';

                }

                $rtn .= Helper::getStr($o, $rtn);

            }

            else {

                if ($rtn != ''){

                    $rtn .= ' ';

                }

                $rtn .= $o;

            }

        }



        return $rtn;

    }



    public static function base64UrlEncode($inputStr)

    {

        return strtr(base64_encode($inputStr), '+/=', '-_,');

    }



    public static function base64UrlDecode($inputStr)

    {

        return base64_decode(strtr($inputStr, '-_,', '+/='));

    }


 public static function CleanSpecailChars($string) {
 
   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


    public static function getFileExt($filename){

        return substr(strrchr($filename, '.'), 1);

    }

    public static function convertToUTF($content) {
        return utf8_encode($content);

        /*
        if(!mb_check_encoding($content, 'UTF-8')
            OR !($content === mb_convert_encoding(mb_convert_encoding($content, 'UTF-32', 'UTF-8' ), 'UTF-8', 'UTF-32'))) {


            $content = mb_convert_encoding($content, 'UTF-8');
            echo $content;

            if (mb_check_encoding($content, 'UTF-8')) {
                // log('Converted to UTF-8');
            } else {
                // log('Could not converted to UTF-8');
            }
        }
        return $content;
        */
    }
    
    public static function slugify($text){
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}


<?php
Class StorageHelper {

    public static function GetDataDir(){
        $dataDir = Yii::app()->controller->dataDir;
        if (StorageHelper::CreatePath($dataDir)){
            return $dataDir;
        }
    }
    
    public static function isFileExist($file){
        $path = StorageHelper::GetFilePath($file);
        if (file_exists($path)){
            return true;
        }
        return false;
    }

    public static function GetFileExtension($file){
        $fileParts = pathinfo($file);
        return $fileParts['extension'];
    }

    public static function CountLinesInFile($file){
        $path = StorageHelper::GetFilePath($file);
        $fp = file($path);
        return count($fp);
    }

    public static function MoveFile($sourceFile, $destinationFile){
        return move_uploaded_file($sourceFile, $destinationFile);
    }

    public static function RenameFile($sourceFile, $destinationFile){
        if (is_file($sourceFile)) {
            return rename($sourceFile, $destinationFile);
        }
    }

    public static function GetFileUrl($file){
        $storageType = Yii::app()->controller->storageType;

        if ($storageType == "google"){
            $fileUrl = StorageHelper::GetDataDir() . $file;
        }
        else {
            $fileUrl = Yii::app()->request->hostInfo . Yii::app()->baseUrl .  "/data/" . Yii::app()->controller->module->id . "/" . $file;
        }

        return $fileUrl;
    }


    public static function GetFilePath($file){
        return StorageHelper::GetDataDir() . $file;
    }

    public static function CreatePath($path) {
         if (Yii::app()->controller->storageType != 'google'){
            if (is_dir($path)) return true;
            if (strlen($path) > 2){
                $prev_path = substr($path, 0, strrpos($path, DIRECTORY_SEPARATOR, -2) + 1 );
            } 
            $return = StorageHelper::CreatePath($prev_path);

            return ($return && is_writable($prev_path)) ? mkdir($path) : false;
        }
        else {
            return true;
        }
    }

    public static function GetDir($SubFolder = ''){
        $Dir = StorageHelper::GetDataDir();
        if ($SubFolder != ''){
            $Dir = $Dir . $SubFolder;
        }
        StorageHelper::CreatePath($Dir);
        return $Dir;
    }
    
    public static function MoveUploadedFile($fileName, $destPath){
        if ($fileName != ""){  
            
            $fileName = str_replace($destPath , "", $fileName);            
            $sourceFile = StorageHelper::GetDataDir() . $fileName;
            
            $destFileName = str_replace("tmp/", "", $fileName);
            $destFileName = str_replace("tmp\\", "", $destFileName);
            
            $destFile   = StorageHelper::GetDataDir() . $destPath . $destFileName;
            
                       
            StorageHelper::RenameFile($sourceFile, $destFile); 
            if (is_file($destFile)){
                chmod($destFile, 0644);
            } 
            return $destPath . $destFileName;
        }
        return "";
    }

    public static function MoveFlowUploadedFile($sourceFile, $destinationFile, $isDesitnationFileWithDataPath = false){
        if (! $isDesitnationFileWithDataPath){
            $destinationFile = StorageHelper::GetDataDir() . $destinationFile;
        }

        if(trim($sourceFile) != '' && strpos($sourceFile, DIRECTORY_SEPARATOR) === false){
            if (is_file(StorageHelper::GetDataDir() . "tmp" . DIRECTORY_SEPARATOR . $sourceFile)){
                if (rename(StorageHelper::GetDataDir() . "tmp" . DIRECTORY_SEPARATOR . $sourceFile, $destinationFile)){
                    return true;
                }
            }
        }
        return false;
    }

    public static function MoveUploadedImage($ImageName, $NewPath, $isRemove = true){
        $model = Uploadify::model()->find("random_key = '" . addslashes($ImageName) . "'");
        if ($model){
            $NewFileName = $NewPath . $model->name;

            if (rename(StorageHelper::GetDataDir() . $ImageName, $NewFileName)){
                if ($isRemove){
                    $model->deleteAll();
                }
                $fileName = str_replace(StorageHelper::GetDataDir(), "", $NewFileName);
                return (array('file' => $fileName, 'remark' => $model->remark));
            }
        }
        return (array('file' => $ImageName, 'remark' => ''));
    }

    public static function WriteToFile($fileName = '', $data = "", $flags = 0){
        $fileName = StorageHelper::GetDataDir() . $fileName;
        return file_put_contents($fileName, $data, $flags);
    }

    public static function ReadFromFile($fileName = ''){
        $fileName = StorageHelper::GetDataDir() . $fileName;
        return Helper::GetFileContent($fileName);
    }

    public static function GetFileContent($fileName = ''){
        $fileName = StorageHelper::GetDataDir() . $fileName;
        if (is_file($fileName)){
            return file_get_contents($fileName);
        }

        return "";
    }

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

    public static function GetUserDir($subFolder = '', $userId = null, $withDataPath = false){
        if ($userId == null){
            $userId = Yii::app()->user->id;
        }

        $userDirWithoutDataPath = "userdata" . DIRECTORY_SEPARATOR . $userId . DIRECTORY_SEPARATOR;
        $userDir = Helper::GetDataDir() . $userDirWithoutDataPath;

        if (trim($subFolder) != ''){
            $userDir = $userDir . trim($subFolder) . DIRECTORY_SEPARATOR;
            $userDirWithoutDataPath = $userDirWithoutDataPath . trim($subFolder) . DIRECTORY_SEPARATOR;
        }

        StorageHelper::CreatePath($userDir);

        if (! $withDataPath){
           return $userDirWithoutDataPath;
        }

        return $UserDir;
    }
}
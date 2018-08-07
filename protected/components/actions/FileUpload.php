<?php
class FileUpload extends CAction {

    public function run($t = "*") {
        $this->controller->layout = false;

        $sourceFile = $_FILES['file']['tmp_name'];
        $fileName = Helper::GetRandomString(6) . "-" . $_FILES['file']['name'];
        $destFile = StorageHelper::GetDataDir() . 'tmp' . DIRECTORY_SEPARATOR . $fileName;
        StorageHelper::RenameFile($sourceFile, $destFile);
        chmod($destFile, 0755);
        echo 'tmp' . DIRECTORY_SEPARATOR . $fileName;
        return;
    }

    public function isValidFile($file, $fileType = "*", $maxFileSize = 10485760){
        $allTypes = array('jpg','jpeg','gif','png','mp4','wav','mpeg','webm','ogv','xls', 'csv', 'ppt','doc','xlsx','pptx','docx','pdf','zip','rar'); // File extensions
        $imageTypes = array('jpg','jpeg','gif','png');
        $sheetTypes = array('csv','xls','xlsx');

        $fileParts = pathinfo($file['name']);

        if ($file['size'] <= $maxFileSize){
            $ext = strtolower($fileParts['extension']);
            if ($fileType == "*"){
                if (in_array($ext, $allTypes)) {
                    return true;
                }
            }
            elseif ($fileType == "image"){
                if (in_array($ext, $imageTypes)) {
                    return true;
                }
            }
            elseif ($fileType == "sheet"){
                if (in_array($ext, $sheetTypes)) {
                    return true;
                }
            }
            else {
                if ($ext == $fileType) {
                    return true;
                }
            }
        }
        return false;
    }
}


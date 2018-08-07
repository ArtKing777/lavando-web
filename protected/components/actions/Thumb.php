<?php
class Thumb extends CAction {
    
    public function run($size = '100x100', $image = "") {
        $this->controller->layout = false;
        $storageType = Yii::app()->controller->storageType;
        $ext = strtolower(substr($image, strrpos($image, '.') + 1));

        if ($storageType == "google"){
            if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
                $arrSize = explode("x", $size);
                $width = $arrSize;
                if (is_array($arrSize)){
                    $width = intval($arrSize[0]);
                }

                if (!is_numeric($width)){
                    $width = 100;
                }

                $options = array('crop' => false, 'secure_url' => false, 'size' => $width);
                $image = StorageHelper::GetFileUrl($image);
                $object_image_url = google\appengine\api\cloud_storage\CloudStorageTools::getImageServingUrl($image, $options);
                header('Location:' .$object_image_url);
                exit();
            }
        }

        if ($ext == 'gif' || $ext == 'jpg' || $ext == 'png' || $ext == 'jpeg'){
            $imagePath = StorageHelper::GetFileUrl($image);
        }
        else {
            $imagePath = $this->controller->themeUrl . '/assets/images/fileicon/' . $ext . '.png';
        }

        $arrSize = explode("x", $size);
        $w = $arrSize[0];
        $h = $arrSize[1];
        
        $file_headers = get_headers($imagePath);

        if($file_headers[0] == 'HTTP/1.0 404 Not Found'){
            $content = file_get_contents('http://placehold.it/' . $size); 
            if ($content !== false) {
               echo $content;
            }
        } else if ($file_headers[0] == 'HTTP/1.0 302 Found' && $file_headers[7] == 'HTTP/1.0 404 Not Found'){
            $content = file_get_contents('http://placehold.it/' . $size); 
            if ($content !== false) {
               echo $content;
            }
        } else {
            $thumb=Yii::app()->phpThumb->create($imagePath);
            $thumb->adaptiveResize($w,$h);
            $thumb->show();
        }
        exit();
    }
}


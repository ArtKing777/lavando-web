<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MyAssetHelper
 *
 * @author Administrator
 */
class AssetHelper {
    
    public static function addCSS($css, $mode = "css"){
        if ($mode == "css") {
            
            if (is_array($css)) {
                foreach ($css as $file) {
                    ?>
                    <link rel="stylesheet" href="<?php echo AssetHelper::RemoteURL($file) ?>" type="text/css"/>
                    <?php
                }
            } 
            else {
                ?>
                <link rel="stylesheet" href="<?php echo AssetHelper::RemoteURL($css) ?>" type="text/css"/>
                <?php
            }
        }
    }

    public static function addJS($js, $mode = "js"){
        if ($mode == "js") {
            if (is_array($js)) {
                foreach ($js as $file) {
                    ?>
                    <script src="<?php echo AssetHelper::RemoteURL($file) ?>"></script>
                    <?php
                }
            } 
            else {
                ?>
                <script src="<?php echo AssetHelper::RemoteURL($js) ?>"></script>
                <?php
            }
        }
    }

    public static function addFile($file, $mode = "js"){
        if (is_array($file)){
            foreach ($file as $f){
                if (Helper::getFileExt($f) == "js"){
                    AssetHelper::addJS($f, $mode);
                }
                else {
                    AssetHelper::addCSS($f, $mode);
                }
            }
        }
        else {
            if (Helper::getFileExt($file) == "js"){
                AssetHelper::addJS($file, $mode);
            }
            else {
                AssetHelper::addCSS($file, $mode);
            }
        }
    }
    
    public static function insertPlugins($plugins = "", $mode = ""){
        
        $arrAssets = require(dirname(__FILE__) . '/../../config/asset.php');

        if (is_array($plugins)){
            foreach ($plugins as $plugin){
                //$plugin = str_replace("-", "_", $plugin);

                if (substr($plugin, 0, 1) != '!'){
                    if (array_key_exists($plugin, $arrAssets)){
                        self::addFile($arrAssets[$plugin], $mode);
                    }
                }
            }
        }
        else {
            if (substr($plugins, 0, 1) != '!'){
                //$plugins = str_replace("-", "_", $plugins);

                if (array_key_exists($plugins, $arrAssets)){
                    self::addFile($arrAssets[$plugins], $mode);
                }
            }
        }
    }
    
    public static function addRouters($addons, $mode = "js"){
        foreach($addons as $addon){
            $path = str_replace(".", "/addons/", $addon);
            $routerPath =  AssetHelper::LocalURL($path . "/router.js");
            self::addFile($routerPath, $mode);
        }
    }
    
    public static function RemoteURL($file){
        if (! Helper::isRemotePath($file)){
            return Helper::YiiParam("libUrl") . $file;
        }
        return $file;
    }
    
    public static function LocalURL($file){
        if (! Helper::isRemotePath($file)){
            return Yii::app()->controller->hostUrl  .  Helper::YiiParam("appDir")  . $file;
        }
        return $file;
    }
}

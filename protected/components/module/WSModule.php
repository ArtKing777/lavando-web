<?php
/**
 * Created by PhpStorm.
 * User: Prakash Khandelwal
 * Date: 2/9/14
 * Time: 9:04 AM
 */

class WSModule extends CWebModule
{
    public $storageType = 'local';
    public $layout = false;
    public $baseUrl;
    public $baseModule;
    public $dataDir;

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        
        $this->layout = $this->layoutPath . ".main";

        $this->setImport(array(
            basename($this->id) . '.models.*',
            basename($this->id) . '.models.base.*',
            basename($this->id) . '.models.mybase.*',
            basename($this->id) . '.components.*',
            basename($this->id) . '.components.base.*',
            basename($this->id) . '.config.*',
        ));
        

        $this->setComponents(array(
            'errorHandler' => array(
                'errorAction' => basename($this->id) . '/default/error'
            ),

            'defaultController' => 'default',
        ));

        $this->setBaseModule('rms');
    }

    public function setBaseModule($baseModule = ''){
        $this->baseModule = $baseModule;
        $this->baseUrl = Yii::app()->baseUrl . "/" .  $this->baseModule;

        Yii::app()->user->setStateKeyPrefix("_{$this->baseModule}");

        if(strpos($_SERVER['SERVER_SOFTWARE'], 'Google App Engine') !== false){
            $this->storageType = "google";
        }

        if ($this->storageType == 'google'){
            $this->dataDir = 'gs://inf-' . $baseModule . DIRECTORY_SEPARATOR;
        }
        else {
            $this->dataDir = dirname(Yii::app()->request->scriptFile) . DIRECTORY_SEPARATOR . "data" . DIRECTORY_SEPARATOR . $baseModule . DIRECTORY_SEPARATOR;
        }
    }

    public function XbeforeControllerAction($controller, $action){
        if (parent::beforeControllerAction($controller, $action)) {
            if ($_SERVER['REMOTE_ADDR'] == '0.1.0.2'){
                return true;
            }

            if (Yii::app()->user->isGuest) {
                if (! ($controller->id == "default" && $action->id == "login")){
                    Yii::app()->request->redirect(Yii::app()->user->loginUrl);
                    return false;
                }
                else {
                    return true;
                }
            } else {
                return true;
            }
        }
        else
            return false;
    }
}
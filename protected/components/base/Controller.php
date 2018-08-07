<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout='//layouts/admin';
    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu=array();
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs=array();

    public $appKey;
    public $appName;
    public $appTitle;
    public $appConfig;
    
    public $moduleName = "backend";

    public $hostUrl;
    public $wsUrl;
    public $dataUrl;
    public $appUrl;
    public $moduleUrl;
    
    public function beforeAction($action){
        parent::beforeAction($action);

        $this->appKey = Helper::YiiParam('appKey');
        $this->appName = Helper::YiiParam('appName');
        $this->appTitle = Helper::YiiParam('appTitle');

        $this->hostUrl = Yii::app()->request->hostInfo .  Yii::app()->baseUrl . '/';
        $this->wsUrl = $this->hostUrl . Helper::YiiParam('appKey') . '/';
        // $this->wsUrl = $this->hostUrl;
        $this->dataUrl = $this->hostUrl . 'data/' . Helper::YiiParam('appKey') . '/';
        
        $this->appUrl = $this->hostUrl . Helper::YiiParam('appDir');
        
        $this->moduleUrl = $this->appUrl . Helper::YiiParam('modules')[$this->moduleName]['name'] . "/";
        
        $this->layout = $this->moduleName; // Gave default value, we can change in Controller in beforeAction method.

        return true;
    }
    
        
    public function actionError()
    {
        if($error=Yii::app()->errorHandler->error)
        {
            if(Yii::app()->request->isAjaxRequest)
                    echo $error['message'];
            else
                    $this->render('error', $error);
        }
    }
}
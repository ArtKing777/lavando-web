<?php
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    
    // 'defaultController'=>'nacff/site',

    'name'=>'Auto Now Me',

    'timeZone' => 'Europe/London',

    'preload'=>array('log'),

    'sourceLanguage' => 'en',

    'import'=>array(
        'application.models.*',	
        'application.models.my.*',
        'application.models.base.*',				
        'application.models.mybase.*',
        'application.mymodels.*',
        'application.components.*',
        'application.components.actions.*',
        'application.components.base.*',
        'application.components.helper.*',
        'application.components.helper.handler.*',
        'application.components.module.*',
        'application.components.gapp.google.appengine.api.cloud_storage.*',
        'application.components.stripe-yii.Stripe.*',
        'application.modules.nacff.models.*', 
        'application.modules.nacff.models.my.*',
        'application.modules.kiara.components.helper.*',
        
        'application.modules.rentcount.models.*', 
        'application.modules.rentcount.models.my.*',
    ),

    'modules'=>array(
        'gii'=>array(
                'class'=>'system.gii.GiiModule',
                'password'=>'pk99india',
                // If removed, Gii defaults to localhost only. Edit carefully to taste.
                'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),

    'components'=>array(

        'Stripe' => array(
            'class' => 'components.stripe-yii.Stripe'
        ),
        
        'paypalManager' => array(
            'class' => 'components.Paypal.Paypal',
        ),
        
        'phpThumb'=>array(
            'class'=>'ext.EPhpThumb.EPhpThumb',
	    ),

        'jsonize'=>array('class'=>'jsonize'),

        'GoogleAPI' => array(
            'class' => 'ext.GoogleAPI.GoogleAPI'
        ),

        'session' => array (
            'class' => 'system.web.CDbHttpSession',
            'connectionID' => 'db',
            'sessionTableName' => 'session',
            'timeout' => 30000,
        ),
        
        'dompdf'=>array(
            'class'=>'ext.yiidompdf.yiidompdf'
        ),
        
        'purl'=>array(
            'class'=>'ext.Purl.Purl'
        ),
        
        'gchart'=>array(
            'class'=>'ext.gchart.HzlVisualizationChart'
        ),
      
	   'Smtpmail'=>array(
            'class'=>'application.extensions.smtpmail.PHPMailer',
            'Host'=>"smtp.gmail.com",
            'Username'=>'webprakash@infovinity.net',
            'Password'=>'123456',
            'Mailer'=>'smtp',
            'Port'=>465,
            'SMTPAuth'=>true, 
        ),
                        
        'user'=>array(
            // enable cookie-based authentication
            'allowAutoLogin'=>true,
        ),

        /*
        'errorHandler'=>array(            
            'errorAction'=>'site/error',
        ),
        
         */
        
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                        // 'class'=>'CFileLogRoute',
						'class'=>'CSyslogRoute',
                        'levels'=>'error, warning',
                ),
                
                // uncomment the following to show log messages on web pages
                /*
                array(
                        'class'=>'CWebLogRoute',
                ),
                */
            ),
        ),

        'PHPExcel'=>array(
            'class'=>'ext.PHPExcel.XPHPExcel'
        ),
                        
        'SimpleHTMLDOM'=>array(
            'class'=>'ext.SimpleHTMLDOM.SimpleHTMLDOM'
        ),
        
        'Zip'=>array(
            'class'=>'ext.zip.EZip',
        ),

        'sendgrid' => array(
            'class' => 'ext.yii-sendgrid.YiiSendGrid',
            'username'=>'awi',
            'password'=>'Pk-99india',
            'disableSslVerification'=>true,
        ),
    ),

    'params'=>array(
		'stripeKey' => 'pk_test_QUfhnkwk6wtsP5twlyB620XZ',
        'libs' => array('common', 'jquery', 'bootstrap', 'font-awesome', 'angular', 
            'moment', 'x-editable', 'angular-animate',
            'angular-cookies', 'angular-resource', 'angular-sanitize', 'angular-touch', 'angular-ui-utils',
            'angular-jwt', 'angular-datatables', 'ng-file-upload', 'AngularJS-Toaster',
            'ngflow', 'angular-ui-router', 'ngstorage', 'angular-bootstrap', 'angular-ui-validate',
            'oclazyload', 'angular-translate', 'angular-daterangepicker', 'angular-ui-tinymce', 'ngmap', 'ngbootbox',
            'ngjstree'),
    ),

    // 'theme' => 'classic',
);
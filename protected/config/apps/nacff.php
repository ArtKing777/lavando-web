<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'modules'=>array(
            'nacff'            
        ),
               
        'defaultController'=>'nacff/site',
        
        'timeZone' => 'US/Eastern',

        'components'=>array(

            'db'=>array(
                'class'=>'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=nacff',
                'emulatePrepare' => true,
                'username' => 'root',
                'password' => '',
                'charset' => 'utf8',
            ),
            
            'urlManager'=>array(     
                'class' => 'application.components.base.UrlManager',
                'urlFormat'=>'path',
                'showScriptName'=>false,
                'appendParams'=>true,
                'rules'=>array(
                    '<module:\w+>/<controller:(default)>/<action:(thumb)>/<size:\w+>/<image:(.)+>'=>'<module>/default/thumb',
                    '<module:\w+>/<controller:(default)>/<action:(thumb)>/<size:\w+>/<image:(.)+>'=>'<module>/default/thumb',
                    '<module:\w+>/<controller:(poweruser)>/<action:(DownloadPortfolioReportComplete)>/<aid:\d+>/<pid:\d+>/<cat:\w+>/<strategy:\w+>'=>'<module>/PowerUser/DownloadPortfolioReportComplete',
                    '<module:\w+>/<controller:(poweruser)>/<action:(DownloadPortfolioSimpleReport)>/<aid:\d+>/<pid:\d+>/<cat:\w+>/<strategy:\w+>'=>'<module>/PowerUser/DownloadPortfolioReportComplete',

                    '<controller:\w+>/<id:\d+>'=>'<controller>/view',                
                    '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                    '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',

                    'nacff/backend/<controller:\w+>/<id:\d+>'=>'nacff/backend/<controller>/view',                
                    'nacff/backend/<controller:\w+>/<action:\w+>/<id:\d+>'=>'nacff/backend/<controller>/<action>',
                    'nacff/backend/<controller:\w+>/<action:\w+>'=>'nacff/backend/<controller>/<action>',

                    'nacff/<controller:\w+>/<id:\d+>'=>'nacff/<controller>/view',                
                    'nacff/<controller:\w+>/<action:\w+>/<id:\d+>'=>'nacff/<controller>/<action>',
                    'nacff/<controller:\w+>/<action:\w+>'=>'nacff/<controller>/<action>',

                    'news/<s:[a-zA-Z0-9-]+>'=>'nacff/site/news',
                    '<slug:[a-zA-Z0-9-]+>'=>'nacff/site/page'
                    // '<slug:[a-zA-Z0-9-]+>/*'=>'nacff/site/page'
                ),
            ),
        ),

        'params'=> array(
            'appKey' => 'nacff',
            'appName' => 'NACFF',
            'appTitle' => "NACFF",
            'appDir' => "apps/nacff/",
            'libUrl' => 'https://rawgit.com/webprakash/autonowme/master/infovinity/',
            'modules' => array(
                "backend" => array(
                    "name" => 'backend',
                    "wsModule" => 'backend/',
                    "addons" => array(
                        'backend.access',
                        'backend.superadmin',
                        'backend.superadmin.dashboard',
                        'backend.superadmin.pages',
                        'backend.superadmin.faqs',
                        'backend.superadmin.news',
                        'backend.superadmin.courses',
                        'backend.superadmin.testimonials',
                        'backend.superadmin.teammembers',
                        'backend.superadmin.events',
                        'backend.superadmin.advisors',
                        'backend.superadmin.cff_applications',
                        'backend.superadmin.inquiries',
                        'backend.superadmin.newsletters',
                        'backend.superadmin.downloads',   
                        'backend.superadmin.users',
                        'backend.superadmin.profile',                        
                    ),
                    "libs" => array('common', 'jquery', 'bootstrap', 'font-awesome', 'angular', 
                                'moment', 'x-editable', 'angular-animate',
                                'angular-cookies', 'angular-resource', 'angular-sanitize', 'angular-touch', 'angular-ui-utils',
                                'angular-jwt', 'angular-datatables', 'ng-file-upload', 'AngularJS-Toaster',
                                'ngflow', 'angular-ui-router', 'ngstorage', 'angular-bootstrap', 'angular-ui-validate',
                                'oclazyload', 'angular-translate', 'angular-daterangepicker', '!angular-date-time-input', '!angular-bootstrap-datetimepicker', 'angular-ui-tinymce', 'ngmap', 'ngbootbox',
                                'ngjstree', 'bootstrap-ui-datetime-picker')
                ),
                "frontend" => array(
                    "name" => 'frontend',
                    "wsModule" => 'frontend/',
                    "libs" => array('common', 'jquery', 'bootstrap', 'font-awesome', 'angular', 
                                'moment', 'x-editable', 'angular-animate',
                                'angular-cookies', 'angular-resource', 'angular-sanitize', 'angular-touch', 'angular-ui-utils',
                                'angular-jwt', 'angular-datatables', 'ng-file-upload', 'AngularJS-Toaster',
                                'ngflow', 'angular-ui-router', 'ngstorage', 'angular-bootstrap', 'angular-ui-validate',
                                'oclazyload', 'angular-translate', 'angular-daterangepicker', '!angular-date-time-input', '!angular-bootstrap-datetimepicker', 'angular-ui-tinymce', 'ngmap', 'ngbootbox',
                                'ngjstree', 'bootstrap-ui-datetime-picker')
                    
                )
            ),
            
            'jwtKey' => 'PrakashKhandelwal',
            'adminEmail'=>'webmaster@example.com'
        )       
    )
);
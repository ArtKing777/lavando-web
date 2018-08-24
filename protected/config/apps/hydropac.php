<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'modules'=>array(
            'hydropac'            
        ),
        
        'import'=>array(       
            'application.modules.hydropac.models.*', 
            'application.modules.hydropac.models.my.*',
        ),
               
        'defaultController'=>'hydropac/site',
        
        'timeZone' => 'US/Eastern',

        'components'=>array(

            'db'=>array(
                'class'=>'CDbConnection',
                'connectionString' => 'mysql:host=160.153.156.3;dbname=clie41871931635;port=3310;',
                'emulatePrepare' => true,
                'username' => 'clie41871931635',
                'password' => 'E})A5hlykY1c}',
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

                    'hydropac/backend/<controller:\w+>/<id:\d+>'=>'hydropac/backend/<controller>/view',                
                    'hydropac/backend/<controller:\w+>/<action:\w+>/<id:\d+>'=>'hydropac/backend/<controller>/<action>',
                    'hydropac/backend/<controller:\w+>/<action:\w+>'=>'hydropac/backend/<controller>/<action>',

                    'hydropac/<controller:\w+>/<id:\d+>'=>'hydropac/<controller>/view',                
                    'hydropac/<controller:\w+>/<action:\w+>/<id:\d+>'=>'hydropac/<controller>/<action>',
                    'hydropac/<controller:\w+>/<action:\w+>'=>'hydropac/<controller>/<action>',

                    // 'news/<s:[a-zA-Z0-9-]+>'=>'hydropac/site/news',
                    // '<slug:[a-zA-Z0-9-]+>'=>'hydropac/site/page'
                    // '<slug:[a-zA-Z0-9-]+>/*'=>'nacff/site/page'
                ),
            ),
        ),

        'params'=> array(
            'appKey' => 'hydropac',
            'appName' => 'Hydropac',
            'appTitle' => "Hydropac",
            'appDir' => "apps/hydropac/",
            'libUrl' => 'https://rawgit.com/webprakash/autonowme/master/infovinity/',
            // 'libUrl' => 'http://localhost/autonowme/infovinity/',
            'modules' => array(
                "backend" => array(
                    "name" => 'backend',
                    "wsModule" => 'backend/',
                    "addons" => array(
                        'backend',
                        'backend.access',
                        'backend.superadmin',
                        'backend.superadmin.dashboard',
                        'backend.superadmin.properties',
                        'backend.superadmin.tenancies',
                        'backend.superadmin.tenancies.tenancy',
                        'backend.superadmin.tenancies.tenancy.tenants',
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
                    "addons" => array(
                        // 'frontend',
                        'frontend.access'                        
                    ),
                    "libs" => array('common', 'jquery', 'bootstrap', 'font-awesome', 'angular', 
                                'moment', '!x-editable', 'angular-animate',
                                'angular-cookies', 'angular-resource', 'angular-sanitize', 'angular-touch', 'angular-ui-utils',
                                'angular-jwt', 'angular-datatables', '!ng-file-upload', 'AngularJS-Toaster',
                                '!ngflow', 'angular-ui-router', 'ngstorage', 'angular-bootstrap', '!angular-ui-validate',
                                'oclazyload', 'angular-translate', '!angular-daterangepicker', '!angular-date-time-input', '!angular-bootstrap-datetimepicker', '!angular-ui-tinymce', '!ngmap', '!ngbootbox',
                                '!ngjstree', '!bootstrap-ui-datetime-picker', 'angular-wizard', 'angular-lock', 'angular-auth0')
                    
                )
            ),
            
            'jwtKey' => 'PrakashKhandelwal',
            'adminEmail'=>'webmaster@example.com'
        )       
    )
);
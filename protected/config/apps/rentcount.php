<?php
return CMap::mergeArray(
    require(dirname(__FILE__) . '/../main.php'),
    array(
        'modules'=>array(
            'rentcount'            
        ),
        
        'import'=>array(       
            'application.modules.rentcount.models.*', 
            'application.modules.rentcount.models.my.*',
        ),
               
        'defaultController'=>'rentcount/site',
        
        'timeZone' => 'US/Eastern',

        'components'=>array(

            'db'=>array(
                'class'=>'CDbConnection',
                'connectionString' => 'mysql:host=localhost;dbname=rentcount',
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

                    'rentcount/backend/<controller:\w+>/<id:\d+>'=>'rentcount/backend/<controller>/view',                
                    'rentcount/backend/<controller:\w+>/<action:\w+>/<id:\d+>'=>'rentcount/backend/<controller>/<action>',
                    'rentcount/backend/<controller:\w+>/<action:\w+>'=>'rentcount/backend/<controller>/<action>',

                    'rentcount/<controller:\w+>/<id:\d+>'=>'rentcount/<controller>/view',                
                    'rentcount/<controller:\w+>/<action:\w+>/<id:\d+>'=>'rentcount/<controller>/<action>',
                    'rentcount/<controller:\w+>/<action:\w+>'=>'rentcount/<controller>/<action>',

                    // 'news/<s:[a-zA-Z0-9-]+>'=>'rentcount/site/news',
                    // '<slug:[a-zA-Z0-9-]+>'=>'rentcount/site/page'
                    // '<slug:[a-zA-Z0-9-]+>/*'=>'nacff/site/page'
                ),
            ),
        ),

        'params'=> array(
            'appKey' => 'rentcount',
            'appName' => 'RentCount',
            'appTitle' => "Rent Count",
            'appDir' => "apps/rentcount/",
            // 'libUrl' => 'https://rawgit.com/webprakash/autonowme/master/infovinity/',
            'libUrl' => 'http://localhost/autonowme/infovinity/',
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
                    "libs" => array('common', 'jquery', 'bootstrap', 'font-awesome', 'angular', 
                                'moment', 'x-editable', 'angular-animate',
                                'angular-cookies', 'angular-resource', 'angular-sanitize', 'angular-touch', 'angular-ui-utils',
                                'angular-jwt', 'angular-datatables', 'ng-file-upload', 'AngularJS-Toaster',
                                'ngflow', 'angular-ui-router', 'ngstorage', 'angular-bootstrap', 'angular-ui-validate',
                                'oclazyload', 'angular-translate', 'angular-daterangepicker', '!angular-date-time-input', '!angular-bootstrap-datetimepicker', 'angular-ui-tinymce', 'ngmap', 'ngbootbox',
                                'ngjstree', 'bootstrap-ui-datetime-picker', 'angular-wizard', 'auth0', 'angular-auth0')                    
                )
            ),
            
            'jwtKey' => 'PrakashKhandelwal',
            'adminEmail'=>'webmaster@example.com'
        )       
    )
);
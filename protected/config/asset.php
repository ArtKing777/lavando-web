<?php
$tempThemeUrl = Helper::YiiParam('themeUrl');

return array(
    
    'common' => array(
        'libs/assets/animate.css/animate.css',
        'libs/assets/simple-line-icons/css/simple-line-icons.css',
        'css/font.css',
    ),
    
    "jquery" => array(
        'libs/jquery/jquery/dist/jquery.min.js',
    ),
    
    "bootstrap" => array(
        'libs/jquery/bootstrap/dist/css/bootstrap.min.css',
        'libs/jquery/bootstrap/dist/js/bootstrap.min.js',
    ),
    
    "font-awesome" => array(
        'libs/assets/font-awesome/css/font-awesome.min.css'
    ),
    
    "angular" => array(
        'libs/angular/angular/angular.js',
    ),
    
    "frontend" => array(
        AssetHelper::LocalURL('/frontend/app.js'),
        AssetHelper::LocalURL('/frontend/ctrl/ctrl.js'),
    ),
    
    "backend" => array(
        'css/app.css',
        'css/infovinity.css',
        AssetHelper::LocalURL('/backend/app.js'),
        AssetHelper::LocalURL('/backend/ctrl/ctrl.js'),
        // 'js/main.js',
    ),
    
    "engine" => array(        
        'js/config.js',
        'js/webprakash/common.js',
        'js/webprakash/webprakash.js',
        'js/config.lazyload.js',
        'js/services/ui-load.js',
    ),
    
    "moment" => array(
        'libs/jquery/moment/min/moment.min.js'        
    ),
    
    "angular-animate" => array(
        'libs/angular/angular-animate/angular-animate.min.js'
    ),
    
    "angular-cookies" => array(
        'libs/angular/angular-cookies/angular-cookies.min.js'
    ),
    
    "angular-resource" => array(
        'libs/angular/angular-resource/angular-resource.min.js'
    ),
    
    "angular-sanitize" => array(
        'libs/angular/angular-sanitize/angular-sanitize.min.js'
    ),
    
    "angular-touch" => array(
        'libs/angular/angular-touch/angular-touch.min.js'
    ),
    
    "angular-ui-utils" => array(
        'libs/angular/angular-ui-utils/ui-utils.min.js'
    ),
    
    "angular-ui-validate" => array(
        'libs/angular/angular-ui-validate/dist/validate.min.js'
    ),
    
    "angular-jwt" => array(
        'libs/angular/angular-jwt/dist/angular-jwt.min.js'
    ),
    
    "angular-datatables" => array(
        'libs/jquery/datatables.net/js/jquery.dataTables.min.js',
        
        
        'libs/jquery/datatables.net-buttons/js/dataTables.buttons.min.js',
        'libs/jquery/datatables.net-buttons/js/buttons.print.min.js',
        'libs/jquery/datatables.net-buttons/js/buttons.html5.min.js',
        'libs/jquery/datatables.net-buttons/js/buttons.flash.min.js',
        'libs/jquery/datatables.net-buttons/js/buttons.colVis.min.js',
        'libs/jquery/datatables.net-buttons-bs/css/buttons.bootstrap.min.css',
        'libs/jquery/datatables.net-buttons-bs/js/buttons.bootstrap.min.js',
        
        'libs/jquery/datatables.net-responsive/js/dataTables.responsive.min.js',
        'libs/jquery/datatables.net-responsive-bs/js/responsive.bootstrap.min.js',
        
        'libs/angular/angular-datatables/dist/css/angular-datatables.min.css',
        'libs/angular/angular-datatables/dist/angular-datatables.min.js',
        
        'libs/angular/angular-datatables/dist/plugins/bootstrap/datatables.bootstrap.min.css',
        'libs/angular/angular-datatables/dist/plugins/bootstrap/angular-datatables.bootstrap.min.js',
        'libs/angular/angular-datatables/dist/plugins/buttons/angular-datatables.buttons.min.js',
        'libs/angular/angular-datatables/dist/plugins/colvis/angular-datatables.colvis.min.js',
        
        'libs/jquery/datatables.net-bs/css/dataTables.bootstrap.min.css',
        'libs/jquery/datatables.net-bs/js/dataTables.bootstrap.min.js',
    ),
    
    "ng-file-upload" => array(
        // 'libs/angular/ng-file-upload/dist/ng-file-upload-shim.min.js',
        'libs/angular/ng-file-upload/ng-file-upload.js'
    ),
    
    "AngularJS-Toaster" => array(
        'libs/angular/AngularJS-Toaster/toaster.css',
        'libs/angular/AngularJS-Toaster/toaster.js'
    ),
    
    "angular-ui-router" => array(
        'libs/angular/angular-ui-router/release/angular-ui-router.min.js'
    ),
    
    "ngstorage" => array(
        'libs/angular/ngstorage/ngStorage.min.js'
    ),    
    
    "angular-bootstrap" => array (
        // 'libs/angular/angular-bootstrap/ui-bootstrap.js',
        'libs/angular/angular-bootstrap/ui-bootstrap-tpls.js'
    ),
    
    "oclazyload" => array (
        'libs/angular/oclazyload/dist/ocLazyLoad.min.js'
    ), 
    
    "angular-translate" => array (
        'libs/angular/angular-translate/angular-translate.min.js',
        'libs/angular/angular-translate-loader-static-files/angular-translate-loader-static-files.min.js',
        'libs/angular/angular-translate-storage-cookie/angular-translate-storage-cookie.min.js',
        'libs/angular/angular-translate-storage-local/angular-translate-storage-local.min.js'
    ), 
    
    "angular-daterangepicker" => array (
        'libs/jquery/bootstrap-daterangepicker/daterangepicker.css',
        'libs/jquery/bootstrap-daterangepicker/daterangepicker.js',
        // 'libs/angular/angular-daterangepicker/js/angular-daterangepicker.js',
    ),

    "angular-bootstrap-datetimepicker" => array(
        'libs/angular/angular-bootstrap-datetimepicker/src/css/datetimepicker.css',
        'libs/angular/angular-bootstrap-datetimepicker/src/js/datetimepicker.js',
        'libs/angular/angular-bootstrap-datetimepicker/src/js/datetimepicker.templates.js'
    ),
    
    "bootstrap-ui-datetime-picker" => array(
        'libs/angular/bootstrap-ui-datetime-picker/dist/datetime-picker.js',
        'libs/angular/bootstrap-ui-datetime-picker/dist/datetime-picker.tpls.js'
    ),
    
    "angular-date-time-input" => array(
        'libs/angular/angular-date-time-input/src/dateTimeInput.js'
    ),
    
    "angular-ui-tinymce" => array (
        'libs/jquery/tinymce/tinymce.js',
        'libs/angular/angular-ui-tinymce/dist/tinymce.min.js'
    ),
    
    "ngbootbox" => array (
        'libs/jquery/bootbox/bootbox.js',
        'libs/angular/ngBootbox/dist/ngBootbox.min.js',
    ), 
    
    "angular-wizard" => array (
        'libs/angular/angular-wizard/dist/angular-wizard.min.css',
        'libs/angular/angular-wizard/dist/angular-wizard.min.js',
    ), 
    
    "angular-lock" => array (
        'libs/jquery/auth0-lock/build/lock.js',
        'libs/jquery/auth0.js/build/auth0.js',
        'libs/angular/angular-lock/dist/angular-lock.js'        
    ), 
    
    "auth0" => array (
        'libs/angular/auth0.js/build/auth0.js'
    ), 
    
    "angular-auth0" => array (
        'libs/angular/angular-auth0/dist/angular-auth0.js'
    ), 
      
    "directives" => array (
        'js/filters/fromNow.js',
        'js/directives/footable-refresh.js',
        'js/directives/setnganimate.js',
        'js/directives/ui-butterbar.js',
        'js/directives/ui-focus.js',
        'js/directives/ui-fullscreen.js',
        'js/directives/ui-jq.js',
        'js/directives/ui-module.js',
        'js/directives/ui-nav.js',
        'js/directives/ui-scroll.js',
        'js/directives/ui-shift.js',
        'js/directives/ui-toggleclass.js',
        // 'js/directives/ui-validate.js',
        'js/directives/editable.js'
    ),
    
    "x-editable" => array (
        'libs/jquery/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css',
        'libs/jquery/x-editable/dist/bootstrap3-editable/js/bootstrap-editable.min.js'        
    )
    
    
);
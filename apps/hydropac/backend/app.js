'use strict';

const MODULES = "addons/";
const CTRL = "ctrl/";
const TPL = "tpl/";

var subModules = [
    'webprakash'
]

var deps = [    
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngTouch',
    'ngStorage',
    'ui.router',
    'ui.bootstrap',
    'ui.load',
    'ui.jq',
    // 'ui.validate',
    'oc.lazyLoad',
    'pascalprecht.translate',
    'angular-jwt',
    'toaster',
    'datatables',
    'datatables.bootstrap',
    'ui.tinymce',
    'ui.bootstrap.datetimepicker',
    'editableModule',
    //'ui.dateTimeInput',
    /*
    'ncy-angular-breadcrumb',
    'datatables',
    'datatables.bootstrap',
    
    'flow',
    'ng-fusioncharts',    
    
    'highcharts-ng',
    
    'jsTree.directive',
    'ui.sortable'
    
    'ngMap',
    'daterangepicker',
    'ui.tree',
    */
   
    'ngFileUpload',   
    'ngBootbox'   
];

angular.module('app', deps.concat(subModules));

angular.module('app').run(function ($state, AuthService) {  
    if (AuthService.getPayload() == false){        
        $state.go('access.signin');        
    }
});


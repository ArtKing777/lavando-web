'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {            
            var moduleKey = "superadmin";						
            $urlRouterProvider.otherwise('/access/signin');            
        }
]);



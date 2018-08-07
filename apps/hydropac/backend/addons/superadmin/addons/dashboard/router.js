'use strict';

/**
 * Config for the router
*/



angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES', 
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {
            var addonKey = "superadmin.dashboard";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/dashboard',
                    templateUrl: addonUrl + 'tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    data: {
                        authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
                    },					
                    resolve: {
                        deps: ['helper',
	                        function(helper ){
	                        	return helper.load(['moment','fullcalendar', 'fullcalendarScheduler', 'ui.calendar', addonUrl + 'ctrl/index.js']);	                            
	                        }]	                        
                    }					
                });
            }
        ]);



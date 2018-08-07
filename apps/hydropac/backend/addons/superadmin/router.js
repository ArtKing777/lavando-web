'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin";
            var addonUrl = getAddonUrl(addonKey);
						
            $urlRouterProvider.otherwise('/access/signin');
            $stateProvider
                .state(addonKey, {
                    abstract: true,
                    url: '/superadmin',
                    templateUrl: addonUrl + 'index.html',
                    ncyBreadcrumb: {
                        label: 'Dashboard'
                    },
                    data: {
                        authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load([addonUrl + 'ctrl/index.js']);
                            }]                        
                    }
                })
            }
        ]);



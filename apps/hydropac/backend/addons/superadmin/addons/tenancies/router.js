'use strict';

/**
 * Config for the router
*/


//var scripts = document.getElementsByTagName("script");
//console.log(scripts[scripts.length-1].src);

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.tenancies";
            var addonUrl = getAddonUrl(addonKey);         

            $stateProvider
                .state(addonKey, {
                    url: '/tenancies',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'Tenancy',
                      'objNames': 'Tenancies'
                    },
                    ncyBreadcrumb: {
                        label: 'Tenancies'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'TenanciesCtrl'
                })
                .state(addonKey + '.list', {
                    url: '/list',
                    templateUrl: addonUrl + 'tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                addonUrl + 'ctrl/list.js'
                            ]);
                        }]
                    },
                    controller: 'TenanciesListCtrl'
                })
            }
        ]);


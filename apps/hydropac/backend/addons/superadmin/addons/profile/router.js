'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.profile";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/profile',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'Profile',
                      'objNames': 'Profile'
                    },
                    ncyBreadcrumb: {
                        label: 'Profile'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'ProfileCtrl'
                })        
                              
                .state(addonKey + '.view', {
                    url: '/view',
                    templateUrl: addonUrl + 'tpl/view.html',
                    ncyBreadcrumb: {
                        label: 'View'
                    },
                    resolve: {
                        dataUser: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {};
                            return dataFactory.postData('profile/get', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(addonUrl + 'ctrl/view.js');
                                    }
                                );
                            }]
                    },
                    controller: 'ProfileViewCtrl'
                })
                
                .state(addonKey + '.update', {
                    url: '/update',
                    templateUrl: addonUrl + 'tpl/update.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataUser: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {};
                            return dataFactory.postData('profile/get', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(addonUrl + 'ctrl/update.js');
                                    }
                                );
                            }]
                    },
                    controller: 'ProfileUpdateCtrl'
                })
            }
        ]);


'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.cff_applications";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/cff-applications',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'CFF Application',
                      'objNames': 'CFF Applications'
                    },
                    ncyBreadcrumb: {
                        label: 'CFF Applications'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){                            
                                return $ocLazyLoad.load([                                
                                    addonUrl + 'ctrl/index.js'
                                ]);
                            }]
                    },
                    controller: 'CffApplicationsCtrl'
                })
                .state(addonKey + '.list', {
                    url: '/list',
                    templateUrl: addonUrl + 'tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        dataEvents: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('cffapplications/getEvents', params);
                        }],
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                addonUrl + 'ctrl/list.js'
                            ]);
                        }]
                    },
                    controller: 'CffApplicationsListCtrl'
                })
                .state(addonKey + '.add', {
                    url: '/add',
                    templateUrl: addonUrl + 'tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(addonUrl + 'ctrl/add.js');
                                    }
                                );
                            }]
                    },
                    controller: 'CffApplicationsAddCtrl'
                })                
                .state(addonKey + '.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataCffApplication: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('cffapplications/get', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(addonUrl + 'ctrl/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'CffApplicationsEditCtrl'
                })
            }
        ]);


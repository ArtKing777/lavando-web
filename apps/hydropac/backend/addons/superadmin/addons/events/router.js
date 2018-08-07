'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.events";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/events',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'Event',
                      'objNames': 'Events'
                    },
                    ncyBreadcrumb: {
                        label: 'Events'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'EventsCtrl'
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
                    controller: 'EventsListCtrl'
                })
                .state(addonKey + '.add', {
                    url: '/add',
                    templateUrl: addonUrl + 'tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        dataEventTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('events/getEventTypes', params);
                        }],
                        dataCourses: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('events/getCourses', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(addonUrl + 'ctrl/add.js');
                                    }
                                );
                            }]
                    },
                    controller: 'EventsAddCtrl'
                })                
                .state(addonKey + '.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataEvent: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('events/get', params);
                        }],
                        dataCourses: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('events/getCourses', params);
                        }],
                        dataEventTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('events/getEventTypes', params);
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
                    controller: 'EventsEditCtrl'
                })
            }
        ]);


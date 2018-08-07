'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.users";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/users',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'User',
                      'objNames': 'Users'
                    },
                    ncyBreadcrumb: {
                        label: 'Users'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'UsersCtrl'
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
                    controller: 'UsersListCtrl'
                })
                .state(addonKey + '.add', {
                    url: '/add',
                    templateUrl: addonUrl + 'tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        dataUserGroups: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('users/getUserGroups', params);
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
                    controller: 'UsersAddCtrl'
                })                
                .state(addonKey + '.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataUserGroups: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('users/getUserGroups', params);
                        }],
                        dataUser: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('users/get', params);
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
                    controller: 'UsersEditCtrl'
                })
            }
        ]);


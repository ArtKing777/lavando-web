'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.courses";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/course',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'Course',
                      'objNames': 'Courses'
                    },
                    ncyBreadcrumb: {
                        label: 'Course'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'CourseCtrl'
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
                    controller: 'CourseListCtrl'
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
                    controller: 'CourseAddCtrl'
                })                
                .state(addonKey + '.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataCourse: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('courses/get', params);
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
                    controller: 'CourseEditCtrl'
                })
            }
        ]);


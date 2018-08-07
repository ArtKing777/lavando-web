'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.faqs";
            var addonUrl = getAddonUrl(addonKey);
						
            $stateProvider
                .state(addonKey, {
                    url: '/faqs',
                    templateUrl: addonUrl + 'tpl/index.html',
                    data:{
                      'addonKey': addonKey,
                      'objName': 'FAQ',
                      'objNames': 'FAQs'
                    },
                    ncyBreadcrumb: {
                        label: 'FAQs'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                addonUrl + 'ctrl/index.js'
                            ]);
                        }]
                    },
                    controller: 'FaqsCtrl'
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
                    controller: 'FaqsListCtrl'
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
                    controller: 'FaqsAddCtrl'
                })                
                .state(addonKey + '.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataFaq: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('faqs/get', params);
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
                    controller: 'FaqsEditCtrl'
                })
            }
        ]);


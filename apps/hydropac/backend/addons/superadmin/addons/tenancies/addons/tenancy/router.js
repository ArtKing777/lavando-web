'use strict';

/**
 * Config for the router
*/


//var scripts = document.getElementsByTagName("script");
//console.log(scripts[scripts.length-1].src);

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            var addonKey = "superadmin.tenancies.tenancy";
            var addonUrl = getAddonUrl(addonKey);        

            $stateProvider
                .state(addonKey, {
                    url: '/tenancy',
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
                    controller: 'TenancyCtrl'
                })
                
                .state(addonKey + '.add', {
                    url: '/add',
                    templateUrl: addonUrl + 'tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    data: {
                        tabs: {
                            'add':true,
                            'edit':false,
                            'tenants':false
                        },
                        activeTab: 1
                    },
                    resolve: {
                        dataTenancyTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/getTenancyTypes', params);
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
                    controller: 'TenancyAddCtrl'
                }) 
                
                .state(addonKey + '.edit', {        
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    data: {
                        tabs: {
                            'add':false,
                            'edit':true,
                            'tenants':true
                        },
                        activeTab: 2
                    },
                    resolve: {
                    	dataTenancyTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/getTenancyTypes', params);
                        }],
                        dataTenancy: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/get', params);
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
                    controller: 'TenancyEditCtrl'
                })
            }
        ]);


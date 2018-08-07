'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 
        function ($stateProvider,$urlRouterProvider) {
            var addonKey = "superadmin.tenancies.tenancy.tenants";
            var addonUrl = getAddonUrl(addonKey);            
                        						
            $stateProvider
                .state(addonKey, {
                    url: '/tenants',
                    templateUrl: addonUrl + 'tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Tenancies'
                    },
                    data: {
                        tabs: {
                            'add':false,
                            'edit':true,
                            'tenants':true
                        },
                        addonUrl : addonUrl
                    },
                    resolve: {   
                    	dataTenantTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenants/getTenantTypes', params);
                        }],
                        deps: ['$ocLazyLoad',
	                        function( $ocLazyLoad ){                            
	                            return $ocLazyLoad.load([                                
	                                addonUrl + 'ctrl/index.js'
	                            ]);
	                        }]
                    },
                    controller: 'TenantsCtrl'
                })
                
                .state(addonKey + '.list', {
                	url: '/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        dataTenants: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/getTenants', params);
                        }],                        
                        deps: ['$ocLazyLoad',
	                        function( $ocLazyLoad ){
	                            return $ocLazyLoad.load([
	                                addonUrl + 'ctrl/list.js'
	                            ]);
	                        }]
                    },
                    controller: 'TenantsListCtrl'
                })      
                
                .state(addonKey + '.edit', {
                    url: '/detail/{id:[0-9]{1,4}}',
                    templateUrl: addonUrl + 'tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                    	dataTenant: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenants/get', params);
                        }],
                        deps: ['$ocLazyLoad',
	                        function( $ocLazyLoad ){
	                            return $ocLazyLoad.load([
	                                addonUrl + 'ctrl/edit.js'
	                            ]);
	                        }]
                    },
                    controller: 'TenantsEditCtrl'
                })
        }
]);

'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', 'USER_ROLES',
        function ($stateProvider,$urlRouterProvider, USER_ROLES) {

            appConfig.wsModuleKey = "superadmin";
            appConfig.wsModuleUrl = appConfig.wsUrl + appConfig.wsModuleKey + '/';
						
            $urlRouterProvider.otherwise('/access/signin');
            $stateProvider
                .state('superadmin', {
                    abstract: true,
                    url: '/superadmin',
                    templateUrl: appConfig.appUrl + 'm/superadmin/index.html',
                    ncyBreadcrumb: {
                        label: 'Dashboard'
                    },
                    data: {
                        authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load([appConfig.appUrl + 'm/superadmin/ctrl/index.js']);
                            }]                        
                    }
                })
                
                // Dashboard Module
                
                .state('superadmin.dashboard', {
                    url: '/dashboard',
                    templateUrl: appConfig.appUrl + 'm/superadmin/dashboard/tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    data: {
                        authorizedRoles: [USER_ROLES.admin, USER_ROLES.editor]
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([appConfig.appUrl + 'm/superadmin/dashboard/ctrl/index.js']);
                        }]
                    }
                })
                
                // Users Module
                
                .state('superadmin.users', {
                    url: '/users',
                    templateUrl: appConfig.appUrl + 'm/superadmin/users/tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Users'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                appConfig.appUrl + 'm/superadmin/users/ctrl/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.users.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/superadmin/users/tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/superadmin/users/ctrl/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.users.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'm/superadmin/users/tpl/add.html',
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
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/users/ctrl/add.js');
                                    }
                                );
                            }]
                    },
                    controller: 'UsersAddCtrl'
                })                
                .state('superadmin.users.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'm/superadmin/users/tpl/edit.html',
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
                            return dataFactory.postData('users/getUser', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/users/ctrl/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'UsersEditCtrl'
                })
                
                .state('superadmin.properties', {
                    url: '/properties',
                    templateUrl: appConfig.appUrl + 'm/superadmin/properties/tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Properties'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                appConfig.appUrl + 'm/superadmin/properties/ctrl/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.properties.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/superadmin/properties/tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/superadmin/properties/ctrl/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.properties.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'm/superadmin/properties/tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        dataPropertyTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('properties/getPropertyTypes', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/properties/ctrl/add.js');
                                    }
                                );
                            }]
                    },
                    controller: 'PropertiesAddCtrl'
                })                
                .state('superadmin.properties.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'superadmin/properties/tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataPropertyTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('properties/getPropertyTypes', params);
                        }],
                        dataProperty: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('properties/getProperty', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/properties/ctrl/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'PropertiesEditCtrl'
                })
                
                
                .state('superadmin.tenancies', {
                    url: '/tenancies',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tpl/index.html',
                    ncyBreadcrumb: {
                        label: 'Tenancies'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){                            
                            return $ocLazyLoad.load([                                
                                appConfig.appUrl + 'm/superadmin/tenancies/ctrl/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.tenancies.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/superadmin/tenancies/ctrl/list.js',
                                appConfig.appUrl + 'm/superadmin/tenancies/ctrl/custom.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.tenancies.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tpl/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
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
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/tenancies/ctrl/add.js');
                                    }
                                );
                            }]
                    },
                    controller: 'TenanciesAddCtrl'
                })                
                .state('superadmin.tenancies.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataPropertyTypes: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/getTenancyTypes', params);
                        }],
                        dataProperty: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('tenancies/getTenancy', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/superadmin/tenancies/ctrl/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'TenanciesEditCtrl'
                })     
                
                .state('superadmin.tenancies.edit.tenant', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tenants/tpl/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/superadmin/tenancies/tenants/ctrl/list.js'
                            ]);
                        }]
                    }
                })      
                
                .state('superadmin.tenancies.edit.tenant1', {
                    url: '/tenant1',
                    templateUrl: appConfig.appUrl + 'm/superadmin/tenancies/tenants/tpl/edit.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/superadmin/tenancies/tenants/ctrl/edit.js'
                            ]);
                        }]
                    }
                })      
                
                .state('superadmin.accounts', {
                    url: '/accounts',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/accounts/index.html',
                    ncyBreadcrumb: {
                        label: 'Accounts'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/js/controllers/superadmin/accounts/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.accounts.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/accounts/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/js/controllers/superadmin/accounts/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.accounts.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/accounts/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/js/controllers/superadmin/accounts/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.accounts.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/accounts/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataAccount: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getAccount', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'm/js/controllers/superadmin/accounts/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'AccountsEditCtrl'
                })

                
                
                .state('superadmin.events', {
                    url: '/events',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/events/index.html',
                    ncyBreadcrumb: {
                        label: 'Events'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/js/controllers/superadmin/events/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.events.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/events/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'm/js/controllers/superadmin/events/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.events.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'm/tpl/superadmin/events/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/events/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.events.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/events/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataEvent: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getEvent', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/events/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'EventsEditCtrl'
                })
                
                .state('superadmin.advisors', {
                    url: '/advisors',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/advisors/index.html',
                    ncyBreadcrumb: {
                        label: 'Advisors'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/advisors/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.advisors.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/advisors/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/advisors/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.advisors.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/advisors/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/advisors/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.advisors.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/advisors/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataAdvisor: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getAdvisor', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/advisors/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'AdvisorsEditCtrl'
                })
                
                
                .state('superadmin.teammembers', {
                    url: '/teammembers',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/teammembers/index.html',
                    ncyBreadcrumb: {
                        label: 'Teammembers'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/teammembers/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.teammembers.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/teammembers/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/teammembers/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.teammembers.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/teammembers/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/teammembers/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.teammembers.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/teammembers/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataAdvisor: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getTeammember', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/teammembers/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'TeammembersEditCtrl'
                })
                
                .state('superadmin.registrations', {
                    url: '/registrations',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/registrations/index.html',
                    ncyBreadcrumb: {
                        label: 'Registrations'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/registrations/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.registrations.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/registrations/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/registrations/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.registrations.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/registrations/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/registrations/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.registrations.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/registrations/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataRegistration: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getRegistration', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/registrations/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'RegistrationsEditCtrl'
                })
                
                .state('superadmin.inquiries', {
                    url: '/inquiries',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/inquiries/index.html',
                    ncyBreadcrumb: {
                        label: 'Inquiries'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/inquiries/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.inquiries.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/inquiries/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/inquiries/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.inquiries.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/inquiries/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/inquiries/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.inquiries.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/inquiries/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataInquiry: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getInquiry', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/inquiries/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'InquiriesEditCtrl'
                })
                
                .state('superadmin.pages', {
                    url: '/pages',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/pages/index.html',
                    ncyBreadcrumb: {
                        label: 'Pages'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/pages/index.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.pages.list', {
                    url: '/list',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/pages/list.html',
                    ncyBreadcrumb: {
                        label: 'List'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/pages/list.js'
                            ]);
                        }]
                    }
                })
                .state('superadmin.pages.add', {
                    url: '/add',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/pages/add.html',
                    ncyBreadcrumb: {
                        label: 'Add'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/pages/add.js');
                                    }
                                );
                            }]
                    }
                })
                .state('superadmin.pages.edit', {
                    url: '/{id:[0-9]{1,4}}',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/pages/edit.html',
                    ncyBreadcrumb: {
                        label: 'Edit'
                    },
                    resolve: {
                        dataPage: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {id: $stateParams.id};
                            return dataFactory.postData('getPage', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/pages/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'PagesEditCtrl'
                })

                .state('superadmin.profile', {
                    url: '/profile',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/profile/index.html',
                    ncyBreadcrumb: {
                        label: 'Profile'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            return $ocLazyLoad.load([
                                appConfig.appUrl + 'js/controllers/superadmin/profile/index.js'
                            ]);
                        }]
                    }
                })

                .state('superadmin.profile.edit', {
                    url: '/edit',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/profile/edit.html',
                    ncyBreadcrumb: {
                        label: 'Update'
                    },
                    resolve: {
                        dataProfile: ['dataFactory', '$stateParams', function(dataFactory, $stateParams){
                            var params = {};
                            return dataFactory.postData('getProfile', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/profile/edit.js');
                                    }
                                );
                            }]
                    },
                    controller: 'ProfileEditCtrl'
                })

                .state('superadmin.profile.settings', {
                    url: '/settings',
                    templateUrl: appConfig.appUrl + 'tpl/superadmin/profile/settings.html',
                    ncyBreadcrumb: {
                        label: 'Settings'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                        return $ocLazyLoad.load(appConfig.appUrl + 'js/controllers/superadmin/profile/settings.js');
                                    }
                                );
                            }]
                    }
                })
        }
    ]
);
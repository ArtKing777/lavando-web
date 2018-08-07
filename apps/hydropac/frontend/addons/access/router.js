'use strict';

/**
 * Config for the router
 */

angular.module('app').config(['$stateProvider', '$urlRouterProvider',
        function ($stateProvider, $urlRouterProvider) {
            
            var addonKey = "access";
            var addonUrl = getAddonUrl(addonKey);
            var moduleUrl = appConfig.appUrl + appConfig.module.name + "/";
                                    
            $urlRouterProvider.otherwise('/app/dashboard');
            $stateProvider
                .state(addonKey, {
                    url: '/access',
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    templateUrl: moduleUrl + 'index.html',
                    //template: '<div ui-view class="fade-in-right-big smooth"></div>'
                })
                .state(addonKey + '.signin', {
                    url: '/signin',
                    templateUrl: addonUrl + TPL + 'signin.html',                    
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    resolve: {
                        deps: ['uiLoad',
                            function( uiLoad ){
                                return uiLoad.load( [addonUrl + CTRL + 'signin.js'] );
                            }]
                    },
                    controller: 'SigninFormController'
                })
                .state(addonKey + '.forgotpwd', {
                    url: '/forgotpwd',
                    templateUrl: addonUrl + TPL + 'forgotpwd.html',
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    resolve: {
                        deps: ['uiLoad',
                            function( uiLoad ){
                                return uiLoad.load( [addonUrl + CTRL + 'forgotpwd.js'] );
                            }]
                    },
                    controller: 'ForgotPwdController'
                })
                .state(addonKey + '.resetpwd', {
                    url: '/resetpwd/{v}',
                    templateUrl: addonUrl + TPL + 'resetpwd.html',
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    resolve: {
                        deps: ['uiLoad',
                            function( uiLoad ){
                                return uiLoad.load( [addonUrl + CTRL + 'resetpwd.js'] );
                            }]
                    },
                    controller: 'ResetPwdController'
                })
                .state(addonKey + '.signup', {
                    url: '/signup',
                    templateUrl: addonUrl + TPL + 'signup.html',
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    resolve: {
                        deps: ['uiLoad',
                            function( uiLoad ){
                                return uiLoad.load( [addonUrl + CTRL + 'signup.js'] );
                            }]
                    }
                })
                .state(addonKey + '.verifyacc', {
                    url: '/verifyacc/{v}',
                    templateUrl: addonUrl + TPL + 'verifyacc.html',
                    data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    resolve: {
                        dataVerification: ['dataFactory', '$stateParams', '$rootScope', function(dataFactory, $stateParams, $rootScope){

                            if($stateParams.v !== '' && $stateParams.v !== undefined) {

                            }
                            else {
                                $stateParams.v = '';
                            }

                            var params = {acckey: $stateParams.v};
                            return dataFactory.postData('accVerify', params);
                        }],
                        deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load([addonUrl + CTRL + 'verifyacc.js']);
                            }]
                    },
                    controller: 'VerifyAccController'
                })
                .state(addonKey + '.404', {
                    url: '/404',
                     data:{
                        addonKey: addonKey,
                        addonUrl: addonUrl
                    },
                    templateUrl: addonUrl + TPL + '404.html'
                })
        }
    ]
);
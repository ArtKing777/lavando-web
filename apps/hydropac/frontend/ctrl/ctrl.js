'use strict';

/* Controllers */

angular.module('app')
    .controller('AppCtrl', ['$scope', '$rootScope', '$translate', '$localStorage', '$window', 'AuthService', '$state', '$cookieStore','toaster',

    function($scope, $rootScope, $translate, $localStorage, $window, AuthService, $state, $cookieStore, toaster) {
            // $scope.ActiveProject = ActiveProject;
            $scope.authError = null;
            
            $scope.logout = function (){
                AuthService.logout();
                if(! $state.includes('access.signin')){
                    $state.go('access.signin');
                };
            }

            $scope.getHeader = function (){
                var utype = AuthService.getPayload().utype;
                return appConfig.appUrl + appConfig.module.name + '/' + TPL + 'blocks/header.html';
            }

            $scope.getFooter = function (){
                var utype = AuthService.getPayload().utype;
                return appConfig.appUrl + appConfig.module.name + '/' + TPL + 'blocks/footer.html';
            }

            $scope.getNav = function(){
                var utype = AuthService.getPayload().utype;
                return appConfig.appUrl + appConfig.module.name + '/' + TPL + 'blocks/nav.html';
            }

            $scope.getSettings = function(){
                var utype = AuthService.getPayload().utype;
                return appConfig.appUrl + appConfig.module.name + '/' + MODULES +  utype + '/blocks/settings.html';
            }


 


            // config

            $scope.app = {
                appConfig: appConfig,
                authData: AuthService.getPayload().rs,
                name: appConfig.appTitle,
                version: '1.3.3',
                // for chart colors
                color: {
                    primary: '#7266ba',
                    info:    '#23b7e5',
                    success: '#27c24c',
                    warning: '#fad733',
                    danger:  '#f05050',
                    light:   '#e8eff0',
                    dark:    '#3a3f51',
                    black:   '#1c2b36'
                },

                settings: {
                    themeID: 1,
                    navbarHeaderColor: 'bg-black',
                    navbarCollapseColor: 'bg-white',
                    asideColor: 'bg-black',
                    headerFixed: true,
                    asideFixed: false,
                    asideFolded: false,
                    asideDock: false,
                    container: false
                }
            }

            // save settings to local storage
            if ( angular.isDefined($localStorage.settings) ) {
                $scope.app.settings = $localStorage.settings;
            } else {
                $localStorage.settings = $scope.app.settings;
            }

            $scope.$watch('app.settings', function(){
                if( $scope.app.settings.asideDock  &&  $scope.app.settings.asideFixed ){
                    // aside dock and fixed must set the header fixed.
                    $scope.app.settings.headerFixed = true;
                }
                // save to local storage
                $localStorage.settings = $scope.app.settings;
            }, true);


    }]);

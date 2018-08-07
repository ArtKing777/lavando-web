'use strict';

/**
 * Config for the router
*/

angular.module('app').config(['$stateProvider', '$urlRouterProvider', '$locationProvider',
        function ($stateProvider,$urlRouterProvider, $locationProvider) {
            
            var moduleKey = "frontend";            
            var moduleUrl = appConfig.appUrl + appConfig.module.name + "/";
            
            $stateProvider
                .state('frontend', {
                    abstract: true,
                    url: '/frontend',
                    templateUrl: moduleUrl + 'index.html',
                    ncyBreadcrumb: {
                        label: 'Dashboard'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad', '$rootScope', '$location', 'tokenService',
                            function( $ocLazyLoad, $rootScope, $location, tokenService ){                        	
                                // return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                            }]                        
                    }
                })               
                
                /*
                .state(moduleKey + '.home', {
                    url: '/home',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/home.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                */
                
                .state(moduleKey + '.home', {
                    url: '/home',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/aboutus.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                    	
                    	deps: ['$ocLazyLoad',
                            function( $ocLazyLoad ){
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                    	return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                                    }
                                );
                            }]
                    },
                    controller: 'RegisterCtrl'
                })
                
                .state(moduleKey + '.dconfirm', {
                    url: '/dconfirm',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/dconfirm.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                    	authenticate: authenticate,
                    	deps: ['$ocLazyLoad', '$location',
                            function( $ocLazyLoad, $location){
                    			
                    			localStorage.setItem('ordkey', $location.hash());
                                return $ocLazyLoad.load('ui.select').then(
                                    function(){
                                    	return $ocLazyLoad.load([moduleUrl + 'ctrl/dconfirm.js']);
                                    }
                                );
                            }]
                    },
                    controller: 'DConfirmCtrl'
                })
				
				.state(moduleKey + '.services', {
                    url: '/services',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/services.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
				
				.state(moduleKey + '.services.services-1', {
                    url: '/services-1',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/services-1.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
				
				.state(moduleKey + '.services.services-2', {
                    url: '/services-2',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/services-2.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
				.state(moduleKey + '.services.services-3', {
                    url: '/services-3',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/services-3.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
				
				.state(moduleKey + '.services.form-validation', {
                    url: '/form-validation',
                    templateUrl: moduleUrl + 'tpl/form-validation.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
				
                .state(moduleKey + '.team', {
                    url: '/team',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/team.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
                .state(moduleKey + '.team.left1', {
                    url: '/left1',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/left1.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
                .state(moduleKey + '.team.left2', {
                    url: '/left2',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/left2.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
                .state(moduleKey + '.team.left3', {
                    url: '/left3',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/left3.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
                .state('login', {
                    url: '/login',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/login.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
				
				.state('sign-up', {
                    url: '/login',
                    // template: '<b>Ranjeet</b>',
                    templateUrl: moduleUrl + 'tpl/sign-up.html',
                    ncyBreadcrumb: {
                        label: 'Home page'
                    },
                    resolve: {
                        deps: ['$ocLazyLoad',
                        function( $ocLazyLoad ){
                            //return $ocLazyLoad.load([moduleUrl + 'ctrl/index.js']);
                        }]
                    }
                })
                
                function authenticate($q, AuthService, $state, $timeout) {            		
            		if (AuthService.getPayload() != false){
            			// Resolve the promise successfully
            			return $q.when()
            		} else {
            			// The next bit of code is asynchronously tricky.
			
            			$timeout(function() {
            				// This code runs after the authentication promise has been rejected.
            				// Go to the log-in page
            				$state.go('access.signin');     
            			})
			
            			// Reject the authentication promise to prevent the state from loading
            			return $q.reject()
            		}
            	}
                
                // $urlRouterProvider.otherwise('/frontend/home');
            
            	$urlRouterProvider.otherwise(function($injector, $location){
            		
            		$injector.invoke(function($rootScope, tokenService, jwtHelper, $state) {
            			if ($location.hash()){
            				console.log('abc');
            				$rootScope.webAuth.parseHash({hash: $location.hash(), state: 'pk99india'}, function(err, authResult) {
                			                			
                			if (err) {
                				console.log('abc');                				
                				return console.log(err);
                			} else {
                				if (authResult){
                    				authResult.socialType = authResult.idTokenPayload.sub.split("|")[0];
                    				
                    				console.log(authResult.accessToken);
                    				
                    				localStorage.setItem('access_token', authResult.accessToken)
                    				localStorage.setItem('id_token', authResult.idToken);
                    				
                    				tokenService.saveToken(authResult.idToken);
                    				var $token = '';
                    				
                    				if ($token = tokenService.getToken()){
                    					if (! jwtHelper.isTokenExpired($token)){
                    						var userProfile = jwtHelper.decodeToken(authResult.idToken);
                    						console.log(userProfile);
                    						
                    						//$scope.register.first_name = $scope.userProfile.given_name;
                    						//$scope.register.last_name = $scope.userProfile.family_name;
                    						//$scope.register.email = $scope.userProfile.email;				
                    						
                    					}			
                    				}	
                    				$state.go('frontend.home');
                    				// return '/frontend/home';
                    				
                    				/*
                    				$rootScope.webAuth.client.userInfo(authResult.accessToken, function(err, user) {
                            			// Now you have the user's information
                            				console.log(user)
                            			});
                    				*/
                    				
                    				// vm.auth.handleAuthentication(authResult);
                				}
                				else {
                					$state.go('frontend.home');
                				}
                			}

                			
            				});
            			}
            			else {
            				console.log('def');
            				$state.go('frontend.home');
            			}
            		});
            		
            		// return '/frontend/home';
            	});
            
            	// $locationProvider.hashPrefix('');
            	
            	// $locationProvider.html5Mode(true);
                
        }

        ]);



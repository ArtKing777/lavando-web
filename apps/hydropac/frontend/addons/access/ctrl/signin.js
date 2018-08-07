'use strict';

/* Controllers */
  // signin controller
app.controller('SigninFormController', ['$scope', '$rootScope', '$http', '$state', '$timeout', 'AuthService', 'APP_EVENTS', 'tokenService',
    function($scope, $rootScope, $http, $state, $timeout, AuthService, APP_EVENTS, tokenService) {
        $scope.authError = null;
        
        var msg = '';
        
        $scope.login = function () {
    		$rootScope.webAuth.client.login({
    			realm: 'Username-Password-Authentication',
    			username: $scope.user.username,
    			password: $scope.user.password,
    			scope: 'openid',
    			responseType: 'code'
    		},
    		function(err, authResult) {
    			if (err) {	        	  
    				if (err.code == 'invalid_grant'){
    					msg = 'Wrong email or password.';
    				}
    	  				
    				$timeout(function() {
    					toaster.pop("error", 'Error', msg);
    				});	  			
    	            return;
    			} 
    			else {
    				console.log(authResult);
    				localStorage.setItem('access_token', authResult.accessToken)
    				localStorage.setItem('id_token', authResult.idToken);
      				
    				AuthService.saveToken(authResult.idToken);
    				console.log(localStorage.getItem('ordkey'));
    				$state.go('frontend.dconfirm', {'#': localStorage.getItem('ordkey') });
    			}
    		});
    	}

        /*
        $scope.login = function () {
            $scope.authError = null;
            var credentials = {'username': $scope.user.username, 'password': $scope.user.password};
             AuthService.login(credentials).then(function (user) {
                var utype = AuthService.getPayload().utype;
			  
                if(! $state.includes(utype + '.dashboard')){
                      $state.go(utype + '.dashboard');
                }
            }, function () {
                $scope.authError = 'Invalid username / password';
            });
        };
        */
    }
]);
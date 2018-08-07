'use strict';

/* Controllers */
  // signin controller
app.controller('SigninFormController', ['$scope', '$rootScope', '$http', '$state', 'AuthService', 'APP_EVENTS',
    function($scope, $rootScope, $http, $state, AuthService, APP_EVENTS) {
        $scope.authError = null;

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
    }
]);
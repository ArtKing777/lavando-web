'use strict';

/* Controllers */
  // signin controller
app.controller('ResetPwdController', ['$scope', '$rootScope', '$http', '$state', 'AuthService', 'dataFactory', '$stateParams', 'APP_EVENTS',
	function($scope, $rootScope, $http, $state, AuthService, dataFactory, $stateParams, APP_EVENTS) {
        $scope.isCollapsed = false;
        $scope.resetError = null;

        $scope.ResetPassword = function () {
            if ($scope.passwrd != $scope.cpasswrd){
                $scope.resetError = "Passwords mismatch";
            }
            else {
                $scope.resetError = null;
            }

            var param = {acckey: $stateParams.v, passwrd: $scope.passwrd};
            dataFactory.postData('ResetPassword', param)
                .success(function (res) {
                    $state.go('access.signin');
                })
                .error(function (error) {
                    // alert(error);
                });
            return false;
        };
    }
]);
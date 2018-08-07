'use strict';

/* Controllers */
  // signin controller
app.controller('ForgotPwdController', ['$scope', '$rootScope', '$http', '$state', 'AuthService', 'dataFactory', 'APP_EVENTS',
	function($scope, $rootScope, $http, $state, AuthService, dataFactory, APP_EVENTS) {
        $scope.isCollapsed = false;

        $scope.requestResetPassword = function () {

            var param = {'username' : $scope.username}
            dataFactory.postData('RequestResetPassword', param)
                .success(function (res) {
                    $scope.isCollapsed = true;
                    // alert(res);
                    // $scope.categories = res.results;
                })
                .error(function (error) {
                    // alert(error);
                });
            return false;
        };
    }
]);
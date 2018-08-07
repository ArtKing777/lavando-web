'use strict';

/* Controllers */
  // signin controller
app.controller('SignupFormController', ['$scope', '$state', 'dataFactory',
	function($scope, $state, dataFactory) {
        $scope.inProcess = false;
        $scope.signupError = null;
        $scope.signupText = "Create New Account";

        $scope.signUp = function(){
            $scope.inProcess = true;
            $scope.signupText = "Processing ...";
            if ($scope.account.password == $scope.account.cpassword){
                dataFactory.postData('signUp', $scope.account)
                    .success(function (res) {
                        $scope.signupText = "Create New Account";
                        $scope.inProcess = false;
                        $state.go('access.signin');
                    })
                    .error(function (error) {
                        $scope.signupText = "Create New Account";
                        $scope.inProcess = false;
                        $scope.status = 'Unable to load customer data: ' + error.message;
                    });
            }
            else {
                $scope.signupError = 'Password & Confirm Password are not matching';
                $scope.signupText = "Create New Account";
                $scope.inProcess = false;
            }
        }
    }
]);
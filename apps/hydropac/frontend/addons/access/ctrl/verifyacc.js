'use strict';

/* Controllers */
  // signin controller
app.controller('VerifyAccController', function($scope, $stateParams, dataFactory) {
        $scope.verifyText = "Invalid Verification Link";
        $scope.verificationStatus = false;
        var params = {acckey: $stateParams.v};

        dataFactory.postData('accVerify', params).success(function (res) {
            if(res.res){
                $scope.verificationStatus = res.res;
                $scope.verifyText = "Your account has successfully verified";
            }
        }).error(function (error) {
            $scope.status = 'Unable to load project data: ' + error.message;
        });


    }
);
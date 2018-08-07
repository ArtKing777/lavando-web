app.controller('ProfileEditCtrl', function($scope, $state, $stateParams, dataFactory, dataProfile) {

    $scope.profile = dataProfile.data;

    $scope.updateProfile = function(){
        dataFactory.postData('updateProfile', $scope.profile)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.dashboard');
            })
            .error(function (error) {
                $scope.status = 'Unable to load profile data: ' + error.message;
            });
    }

    $scope.cancelProfile = function(){
        $state.go(appConfig.wsModuleKey + '.dashboard');
    }
});
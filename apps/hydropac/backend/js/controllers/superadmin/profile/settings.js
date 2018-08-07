app.controller('ProfileSettingsCtrl', function($scope, $state, $stateParams, profileDataFactory, flowFactory, $http, $timeout) {
    $scope.profile = [];

    getProfile();

    $scope.updateSettings = function(){
        profileDataFactory.updateProfile($scope.profile)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.unitslist.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load profile data: ' + error.message;
            });
    }

    $scope.cancelProfile = function(){
        $state.go(appConfig.wsModuleKey + '.dashboard');
    }

    function getProfile() {
        var params = {id: $stateParams.id};
        profileDataFactory.getProfile(params)
            .success(function (res) {
                $scope.profile = res;
            })
    }
});
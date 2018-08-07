app.controller('PowerUsersEditCtrl', function($scope, $state, $stateParams, dataFactory, dataPowerUser) {

    $scope.poweruser = dataPowerUser.data;
    $scope.account = {};

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    }

    $scope.updatePowerUser = function(){
        dataFactory.postData('updatePowerUser', $scope.poweruser)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.powerusers.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load power user data: ' + error.message;
            });
    }

    $scope.cancelPowerUser = function(){
        $state.go(appConfig.wsModuleKey + '.powerusers.list');
    }
});
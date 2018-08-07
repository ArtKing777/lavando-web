app.controller('PowerUsersAddCtrl', function($scope, $state, dataFactory) {
    $scope.account = {};

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    };

    $scope.savePowerUser = function(){
        dataFactory.postData('savePowerUser', $scope.poweruser)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.powerusers.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
    }

    $scope.cancelPowerUser = function(){
        $state.go(appConfig.wsModuleKey + '.powerusers.list');
    }
});
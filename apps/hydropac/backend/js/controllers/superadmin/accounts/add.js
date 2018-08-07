app.controller('AccountsAddCtrl', function($scope, $state, dataFactory) {

    $scope.saveAccount = function(){
        dataFactory.postData('saveAccount', $scope.account)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.accounts.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
    }

    $scope.cancelAccount = function(){
        $state.go(appConfig.wsModuleKey + '.accounts.list');
    }
});
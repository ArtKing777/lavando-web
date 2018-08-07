app.controller('AccountsEditCtrl', function($scope, $state, dataFactory, dataAccount) {
    $scope.account = dataAccount.data;

    $scope.updateAccount = function(){
        dataFactory.postData('updateAccount', $scope.account)
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
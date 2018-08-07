app.controller('RegistrationsAddCtrl', function($scope, $state, dataFactory) {
    $scope.account = {};

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    };

    $scope.saveRegistration = function(){
        dataFactory.postData('saveRegistration', $scope.registration)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.registrations.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
    }

    $scope.cancelRegistration = function(){
        $state.go(appConfig.wsModuleKey + '.registrations.list');
    }
});
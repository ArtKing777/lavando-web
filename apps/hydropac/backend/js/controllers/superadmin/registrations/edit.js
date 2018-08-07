app.controller('RegistrationsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataRegistration) {

    $scope.registration = dataRegistration.data;
    $scope.account = {};

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    }

    $scope.updateRegistration = function(){
        dataFactory.postData('updateRegistration', $scope.registration)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.registrations.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load Registration data: ' + error.message;
            });
    }

    $scope.cancelRegistration = function(){
        $state.go(appConfig.wsModuleKey + '.registrations.list');
    }
});
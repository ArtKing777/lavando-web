app.controller('UsersAddCtrl', function($scope, $rootScope, dataFactory, dataUserGroups, helper, Upload, $parse) {
    $scope.heading = "Add a new " + $scope.data.objName;
    $scope.UserGroups = dataUserGroups.data;
    
    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('users/getAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    };    
});
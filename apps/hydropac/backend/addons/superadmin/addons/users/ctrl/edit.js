app.controller('UsersEditCtrl', function($scope, $state, $stateParams, dataFactory, dataUser, dataUserGroups, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataUser.data.first_name + " " + dataUser.data.last_name;
    
    $scope.UserGroups = dataUserGroups.data;  
    $scope.user = dataUser.data;    
        
    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('users/getAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    };
});
app.controller('PropertiesAddCtrl', function($scope, $state, dataFactory, helper, Upload, $parse, dataPropertyTypes, dataUsers) {
    $scope.heading = "Add a new " + $scope.data.objName;
    $scope.PropertyTypes = dataPropertyTypes.data;
    $scope.users = dataUsers.data;
    $scope.property = {};
            
    $scope.refreshUsers = function(user) {
        var params = {keyword: user, sensor: false};

        return dataFactory.getData('properties/getUsers', params)
            .then(function(response) {
                $scope.users = response.data;
            });
    }
});
app.controller('PropertiesEditCtrl', function($scope, $state, $stateParams, dataFactory, dataPropertyTypes, dataProperty, dataUsers, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataProperty.data.name;
    
    $scope.property = dataProperty.data;   
    $scope.PropertyTypes = dataPropertyTypes.data;
    $scope.Users = dataUsers.data;
    
    $scope.refreshUsers = function(user) {
        var params = {keyword: user, sensor: false};

        return dataFactory.getData('properties/getUsers', params)
            .then(function(response) {
                $scope.users = response.data;
            });
    }      
});
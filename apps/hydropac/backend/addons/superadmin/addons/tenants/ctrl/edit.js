app.controller('TenantsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataProperty, dataPropertyTypes) {

    $scope.property = dataProperty.data;
    $scope.PropertyTypes = dataPropertyTypes.data;
    $scope.user = {};
        
    $scope.refreshUsers = function(user) {
        var params = {keyword: user, sensor: false};

        return dataFactory.getData('properties/getUsers', params)
            .then(function(response) {
                $scope.users = response.data;
            });
    }

    $scope.updateProperty = function(){
        dataFactory.postData('properties/updateProperty', $scope.property).then(
            function (res) {
                $state.go(appConfig.wsModuleKey + '.properties.list');
            },
            function (error) {
                $scope.status = 'Unable to load property data: ' + error.message;
            }
        );
    }

    $scope.cancelProperty = function(){
        $state.go(appConfig.wsModuleKey + '.properties.list');
    }
    
    $scope.alertMe = function(){
        $state.go(appConfig.wsModuleKey + '.tenancies.tenants.list');        
    }
    

});
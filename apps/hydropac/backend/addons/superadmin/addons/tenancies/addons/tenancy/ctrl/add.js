app.controller('TenancyAddCtrl', function($scope, $state, dataFactory, dataTenancyTypes) {
	
	$scope.heading = "Add a new " + $scope.data.objName;
    $scope.tenancy = {};
    $scope.TenancyTypes = dataTenancyTypes.data;
    
    $scope.refreshProperties = function(user) {
        var params = {keyword: user, sensor: false};

        return dataFactory.getData('tenancies/getProperties', params)
            .then(function(response) {
                $scope.properties = response.data;
            });
    }
    
    $scope.saveTenancy = function(){
        dataFactory.postData('tenancies/save', $scope.tenancy).then(
            function (res) {
                $state.go(appConfig.wsModuleKey + '.tenancies.list');
            },
            function (error) {
                $scope.status = 'Unable to load tenancies data: ' + error.message;
            }
        );
    }

    $scope.cancelTenancy = function(){
        $state.go(appConfig.wsModuleKey + '.tenancies.list');
    }
    
});
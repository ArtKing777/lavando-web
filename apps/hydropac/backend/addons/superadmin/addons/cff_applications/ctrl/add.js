app.controller('CffApplicationsAddCtrl', function($scope, $state, dataFactory, helper, Upload, $parse) {
    $scope.heading = "Add a new " + $scope.data.objName;
    
    $scope.refreshEvents = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('cffapplications/getEvents', params)
            .then(function(response) {
                $scope.events = response.data;
            });
    };
});
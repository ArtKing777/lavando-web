app.controller('CffApplicationsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataCffApplication, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataCffApplication.data.first_name + " " + dataCffApplication.data.last_name;
    
    $scope.cffApplication = dataCffApplication.data;  
    
    $scope.refreshEvents = function(event) {
        var params = {keyword: event, sensor: false};

        return dataFactory.getData('cffapplications/getEvents', params)
            .then(function(response) {
                $scope.events = response.data;
            });
    };    
});
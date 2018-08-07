app.controller('AdvisorsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataAdvisor, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataAdvisor.data.first_name + " " + dataAdvisor.data.last_name;
    $scope.advisor = dataAdvisor.data; 
});
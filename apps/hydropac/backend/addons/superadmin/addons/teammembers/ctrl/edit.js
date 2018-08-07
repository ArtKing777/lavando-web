app.controller('TeammembersEditCtrl', function($scope, $state, $stateParams, dataFactory, dataTeammember, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataTeammember.data.first_name + " " + dataTeammember.data.last_name;
    $scope.teammember = dataTeammember.data;  
    
   
});
app.controller('NewslettersEditCtrl', function($scope, $state, $stateParams, dataFactory, dataNewsletter, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataNewsletter.data.first_name + " " + dataNewsletter.data.last_name;
    $scope.newsletter = dataNewsletter.data;  

});
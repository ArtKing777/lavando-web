app.controller('ProfileUpdateCtrl', function($scope, $state, $stateParams, dataFactory, dataUser, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataUser.data.first_name + " " + dataUser.data.last_name;
    $scope.profile = dataUser.data;
});
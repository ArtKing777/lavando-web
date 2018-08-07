app.controller('InquiriesEditCtrl', function($scope, $state, $stateParams, dataFactory, dataInquiry, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataInquiry.data.first_name + " " + dataInquiry.data.last_name;
    $scope.inquiry = dataInquiry.data;  
});
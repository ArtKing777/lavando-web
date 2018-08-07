app.controller('DownloadsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataDownload, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataDownload.data.title;
    $scope.download = dataDownload.data;  
});
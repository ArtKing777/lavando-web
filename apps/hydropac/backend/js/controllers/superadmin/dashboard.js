'use strict';

/* Controllers */

app.controller('DashboardCtrl', ['$scope', '$http', '$rootScope', 'dataFactory', function($scope, $http, $rootScope, dataFactory) {
    var urlBase = appConfig.wsModuleUrl;

    $scope.dashboard = {};
    $scope.signalData = [];

    $scope.dashboard.numberOfSoloAccounts = 0
    $scope.dashboard.numberOfProjectAccounts = 0
    $scope.dashboard.numberOfPowerUsers = 0

    getDashboard();

    function getDashboard() {
        dataFactory.postData("dashboard/getdashboard", {id: $rootScope.authData.id}).then(
            function (res){
                $scope.dashboard.numberOfSoloAccounts = res.data.numberOfSoloAccounts;
                $scope.dashboard.numberOfProjectAccounts = res.data.numberOfProjectAccounts;
                $scope.dashboard.numberOfPowerUsers = res.data.numberOfPowerUsers;
                $scope.dashboard.numberOfNormalUsers = res.data.numberOfNormalUsers;
            });
    }


}]);
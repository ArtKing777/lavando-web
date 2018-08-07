app.controller('SuperAdminCtrl', ['$scope', '$rootScope', '$http', 'AuthService', function($scope, $rootScope, $http, AuthService) {

    var credentials = {};
    $rootScope.authData = AuthService.getPayload().rs;

    $scope.themeUrl = 'awirms/';
    appConfig.wsModuleKey = "superadmin";
    appConfig.wsModuleUrl = appConfig.wsUrl + appConfig.wsModuleKey + '/';
    
    console.log(app.settings);
    
    /*
    $http.post(appConfig.wsModuleUrl + 'getdashboard', credentials)
        .then(function (res) {
            // alert(res.data);
        });
        */
}]);
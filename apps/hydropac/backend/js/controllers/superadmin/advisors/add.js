app.controller('AdvisorsAddCtrl', ['$scope','$state','$rootScope', '$http', '$parse', '$stateParams', 'Upload', 'ActiveProject', 'dataFactory', function($scope,$state,$rootScope, $http, $parse, $stateParams, Upload, ActiveProject, dataFactory) {
         
    $scope.advisor = {};
    $scope.advisor.image1 = "";
        
    if ($scope.advisor.image1 == ''){
        $scope.advisor.image1 = 'default.png';
    }
    
    $scope.advisor.image1Path = appConfig.dataUrl + $scope.advisor.image1;
        
    $scope.upload = function (file, eleName) {
        var uploadUrl = appConfig.wsModuleUrl + 'fileupload';
        
        Upload.upload({
            url: uploadUrl,
            fields: {'eleName': eleName},
            file: file
        }).progress(function (evt) {
            var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
            console.log('progress: ' + progressPercentage + '% ' + evt.config.file.name);
        }).success(function (data, status, headers, config) {
            var model = $parse(eleName);            
            model.assign($scope,data);
            $scope.advisor.image1Path = appConfig.dataUrl + $scope.advisor.image1;            
        }).error(function (data, status, headers, config) {
            console.log('error status: ' + status);
        })
    };

    $scope.saveAdvisor = function(){
        dataFactory.postData('saveAdvisor', $scope.advisor)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.advisors.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
    }

    $scope.cancelAdvisor = function(){
        $state.go(appConfig.wsModuleKey + '.advisors.list');
    }
}]);
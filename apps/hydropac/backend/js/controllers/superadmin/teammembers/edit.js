app.controller('TeammembersEditCtrl', ['$scope','$state','$rootScope', '$http', '$parse', '$stateParams', 'Upload', 'ActiveProject', 'dataFactory', 'dataAdvisor', function($scope,$state,$rootScope, $http, $parse, $stateParams, Upload, ActiveProject, dataFactory, dataAdvisor) {
   
    $scope.teammember = {};
    $scope.teammember.image1 = "";
    
    $scope.teammember = dataTeammember.data;
    
    if ($scope.teammember.image1 == ''){
        $scope.teammember.image1 = 'default.png';
    }
    
    $scope.teammember.image1Path = appConfig.dataUrl + $scope.teammember.image1;
        
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
            $scope.teammember.image1Path = appConfig.dataUrl + $scope.teammember.image1;            
        }).error(function (data, status, headers, config) {
            console.log('error status: ' + status);
        })
    };
    
    $scope.updateTeammember = function(){
        dataFactory.postData('updateTeammember', $scope.teammember)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.teammembers.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load Teammember data: ' + error.message;
            });
    }

    $scope.cancelTeammember = function(){
        $state.go(appConfig.wsModuleKey + '.teammembers.list');
    }
}]);
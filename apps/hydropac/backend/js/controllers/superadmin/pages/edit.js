
app.controller('PagesEditCtrl', ['$scope','$state','$rootScope', '$http', '$parse', '$stateParams', 'Upload', 'ActiveProject', 'dataFactory', 'dataPage', function($scope,$state,$rootScope, $http, $parse, $stateParams, Upload, ActiveProject, dataFactory, dataPage) {

    $scope.page = dataPage.data;
    
    $scope.tinymceOptions = {
        branding: false,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc help'
        ],
        toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons | codesample fullscreen help',
        image_advtab: true,
        templates: [
            { title: 'Test template 1', content: 'Test 1' },
            { title: 'Test template 2', content: 'Test 2' }
        ],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    };
       
    if ($scope.page.image1 == ''){
        $scope.page.image1 = 'default.png';
    }
    
    if ($scope.page.image2 == ''){
        $scope.page.image2 = 'default.png';
    }
    
    if ($scope.page.image3 == ''){
        $scope.page.image3 = 'default.png';
    }
    $scope.page.image1Path = appConfig.dataUrl + $scope.page.image1;
    $scope.page.image2Path = appConfig.dataUrl + $scope.page.image2;
    $scope.page.image3Path = appConfig.dataUrl + $scope.page.image3;   
    
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
            $scope.page.image1Path = appConfig.dataUrl + $scope.page.image1;
            $scope.page.image2Path = appConfig.dataUrl + $scope.page.image2;
            $scope.page.image3Path = appConfig.dataUrl + $scope.page.image3;
        }).error(function (data, status, headers, config) {
            console.log('error status: ' + status);
        })
    };

    $scope.updatePage = function(){
        dataFactory.postData('updatePage', $scope.page)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.pages.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load power user data: ' + error.message;
            });
    }

    $scope.cancelPage = function(){
        $state.go(appConfig.wsModuleKey + '.pages.list');
    }
}]);
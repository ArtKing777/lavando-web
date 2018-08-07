app.controller('EventsEditCtrl', ['$scope','$state','$rootScope', '$http', '$parse', '$stateParams', 'Upload', 'ActiveProject', 'dataFactory', 'dataEvent', function($scope,$state,$rootScope, $http, $parse, $stateParams, Upload, ActiveProject, dataFactory, dataEvent) {
 
    
    
    $scope.event = {};
    $scope.event.image1 = "";
    $scope.event.image2 = "";
    $scope.event.image3 = "";
    
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
    
    $scope.event = dataEvent.data;
    
    if ($scope.event.image1 == ''){
        $scope.event.image1 = 'default.png';
    }
    
    if ($scope.event.image2 == ''){
        $scope.event.image2 = 'default.png';
    }
    
    if ($scope.event.image3 == ''){
        $scope.event.image3 = 'default.png';
    }
    $scope.event.image1Path = appConfig.dataUrl + $scope.event.image1;
    $scope.event.image2Path = appConfig.dataUrl + $scope.event.image2;
    $scope.event.image3Path = appConfig.dataUrl + $scope.event.image3;
    
    

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
            $scope.event.image1Path = appConfig.dataUrl + $scope.event.image1;
            $scope.event.image2Path = appConfig.dataUrl + $scope.event.image2;
            $scope.event.image3Path = appConfig.dataUrl + $scope.event.image3;
        }).error(function (data, status, headers, config) {
            console.log('error status: ' + status);
        })
    };
    
    $scope.account = {};
    
    $scope.today = function() {
      $scope.event_date = new Date();
    };
    $scope.today();

    $scope.clear = function () {
      $scope.event_date = null;
    };
    
    $scope.open = function($event) {
      $event.preventDefault();
      $event.stopPropagation();
      $scope.opened = true;      
    };

    $scope.dateOptions = {
      formatYear: 'yy',
      startingDay: 1,
      class: 'datepicker'
    };

    $scope.initDate = new Date('2016-15-20');
    $scope.formats = ['dd-MMMM-yyyy', 'yyyy/MM/dd', 'dd.MM.yyyy', 'shortDate'];
    $scope.format = $scope.formats[0];

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    }

    $scope.updateEvent = function(){
        dataFactory.postData('updateEvent', $scope.event)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.events.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load power user data: ' + error.message;
            });
    }

    $scope.cancelEvent = function(){
        $state.go(appConfig.wsModuleKey + '.events.list');
    }
}]);
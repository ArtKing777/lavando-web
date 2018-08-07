app.controller('InquiriesEditCtrl', function($scope, $state, $stateParams, dataFactory, dataInquiry) {

    $scope.inquiry = dataInquiry.data;

    $scope.updateInquiry = function(){
        dataFactory.postData('updateInquiry', $scope.inquiry)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.inquiries.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load Inquiry data: ' + error.message;
            });
    }

    $scope.cancelInquiry = function(){
        $state.go(appConfig.wsModuleKey + '.inquiries.list');
    }
});
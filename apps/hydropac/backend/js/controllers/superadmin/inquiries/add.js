app.controller('InquiriesAddCtrl', function($scope, $state, dataFactory) {
    $scope.account = {};

    $scope.refreshAccounts = function(account) {
        var params = {keyword: account, sensor: false};

        return dataFactory.getData('searchAccounts', params)
            .then(function(response) {
                $scope.accounts = response.data;
            });
    };

    $scope.saveInquiry = function(){
        dataFactory.postData('saveInquiry', $scope.inquiry)
            .success(function (res) {
                $state.go(appConfig.wsModuleKey + '.inquiries.list');
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
    }

    $scope.cancelInquiry = function(){
        $state.go(appConfig.wsModuleKey + '.inquiries.list');
    }
});
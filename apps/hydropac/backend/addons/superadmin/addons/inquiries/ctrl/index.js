app.controller('InquiriesCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
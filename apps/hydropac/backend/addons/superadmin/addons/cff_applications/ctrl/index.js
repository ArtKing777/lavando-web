app.controller('CffApplicationsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
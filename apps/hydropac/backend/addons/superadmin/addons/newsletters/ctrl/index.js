app.controller('NewslettersCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
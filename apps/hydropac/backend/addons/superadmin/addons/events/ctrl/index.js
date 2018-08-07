app.controller('EventsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
app.controller('TeammembersCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
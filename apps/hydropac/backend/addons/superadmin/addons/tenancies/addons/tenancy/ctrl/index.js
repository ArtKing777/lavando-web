app.controller('TenancyCtrl', function($scope, $state, $stateParams) {
    $scope.active = 1;
    if (! $state.current.data.tabs.add){
        $scope.active = 2;
    }
});
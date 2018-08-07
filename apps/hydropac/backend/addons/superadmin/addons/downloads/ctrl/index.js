app.controller('DownloadsCtrl', function($scope, $state) {
    $scope.data = $state.$current.parent.data;
});
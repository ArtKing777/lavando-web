app.controller('ProfileViewCtrl', function($scope, $compile, $state, dataUser, helper, DTOptionsBuilder, DTColumnBuilder) {
    $scope.profile = dataUser.data;
});
app.controller('UsersListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('users/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblUsers = null;

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('username').withTitle('Username'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('company_name').withTitle('Company Name'),
        DTColumnBuilder.newColumn('userGroup.name').withTitle('User Type').renderWith(function(data, type, full) {
            return full.userGroup.name;
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('users/delete', 'tblUsers', data)})
    ];
});
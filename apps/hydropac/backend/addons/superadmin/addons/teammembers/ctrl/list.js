app.controller('TeammembersListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('teammembers/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblTeammembers = null;

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),        
        DTColumnBuilder.newColumn('designation').withTitle('Designation'),
        DTColumnBuilder.newColumn('mobile_number').withTitle('Mobile Number'),
        DTColumnBuilder.newColumn('email').withTitle('Email'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
            return '';
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('teammembers/delete', 'tblTeammembers', data)})
    ];     
});
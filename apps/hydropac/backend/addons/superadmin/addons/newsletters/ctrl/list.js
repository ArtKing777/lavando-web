app.controller('NewslettersListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('newsletters/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblNewsletters = null;

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('subscribe_date').withTitle('Date'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('email').withTitle('Email'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('newsletters/delete', 'tblNewsletters', data)})
    ];
});
app.controller('InquiriesListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('inquiries/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblInquiries = null;

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('inquiry_date').withTitle('Date'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('mobile_number').withTitle('Mobile'),
        DTColumnBuilder.newColumn('email').withTitle('Email'),
        DTColumnBuilder.newColumn('subject').withTitle('Subject'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('inquiries/delete', 'tblInquiries', data)})
    ];
});
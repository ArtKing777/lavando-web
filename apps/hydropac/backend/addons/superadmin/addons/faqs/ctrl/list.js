app.controller('FaqsListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('faqs/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblFaqs = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('question').withTitle('Question'),
        DTColumnBuilder.newColumn('priority').withTitle('Priority'),        
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('faqs/delete', 'tblFaqs', data)})
    ];
});
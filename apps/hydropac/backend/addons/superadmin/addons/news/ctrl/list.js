app.controller('NewsListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('news/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblPages = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('title').withTitle('Title'),
        DTColumnBuilder.newColumn('author').withTitle('Author'),
        DTColumnBuilder.newColumn('news_date').withTitle('Date'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('news/delete', 'tblNews', data)})
    ];
});
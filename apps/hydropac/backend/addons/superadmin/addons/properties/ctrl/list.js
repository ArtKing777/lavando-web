app.controller('PropertiesListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('properties/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblPages = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('name').withTitle('Title'),
        DTColumnBuilder.newColumn('address1').withTitle('Address1').renderWith(function(data, type, full) {
            return full.address1 + ' ' + full.address2;
        }),
        DTColumnBuilder.newColumn('city').withTitle('City'),
        DTColumnBuilder.newColumn('propertyType.name').withTitle('Property Type').renderWith(function(data, type, full) {
            return full.propertyType.name;
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('properties/delete', 'tblProperties', data)})
    ];
});
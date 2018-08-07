app.controller('TestimonialsListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('testimonials/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblTestimonials = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('title').withTitle('Title'),
        DTColumnBuilder.newColumn('rating').withTitle('Rating'),
        DTColumnBuilder.newColumn('priority').withTitle('Priority'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('testimonials/delete', 'tblTestimonials', data)})
    ];
});
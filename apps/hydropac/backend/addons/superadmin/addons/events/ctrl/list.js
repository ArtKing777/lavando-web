app.controller('EventsListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('events/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblEvents = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('title').withTitle('Title'),
        DTColumnBuilder.newColumn('eventType.name').withTitle('Event Type'),
        DTColumnBuilder.newColumn('event_date').withTitle('Event Date'),        
        DTColumnBuilder.newColumn('instructor').withTitle('Instructor'),
        DTColumnBuilder.newColumn('state').withTitle('State'),
        DTColumnBuilder.newColumn('price').withTitle('Price'),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('events/delete', 'tblEvents', data)})
    ];    
});
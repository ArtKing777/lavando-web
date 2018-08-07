app.controller('CffApplicationsListCtrl', function($scope, $compile, $state, dataFactory, dataEvents, helper, DTOptionsBuilder, DTColumnBuilder) {

    $scope.dtOptions = getDtOptions('cffapplications/list', DTOptionsBuilder, $compile, $scope);
    $scope.tblCffApplications = null;
    
    $scope.Events = dataEvents.data;
    $scope.event_id = 0;

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('company_name').withTitle('Company Name'),
        DTColumnBuilder.newColumn('designation').withTitle('Designation'),
        DTColumnBuilder.newColumn('mobile_number').withTitle('Mobile Number'),
        DTColumnBuilder.newColumn('email').withTitle('Email'),
        DTColumnBuilder.newColumn('event.title').withTitle('Event').renderWith(function(data, type, full) {
            return full.event.title;
        }),
        DTColumnBuilder.newColumn('status.name').withTitle('Status').renderWith(function(data, type, full) {
            if (full.status){
                return full.status.name;
            }
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(function(data){return helper.getDTActionHTML('cffapplications/delete', 'tblCFFApplications', data)})
    ];
    
    $scope.excelExport = function(){
        location.href = appConfig.wsUrl + 'cffapplications/export';
    }
    
    $scope.exportSignInSheet = function(){
        location.href = appConfig.wsUrl + 'cffapplications/exportsigninsheet/id/' + $scope.event_id;
    }
});
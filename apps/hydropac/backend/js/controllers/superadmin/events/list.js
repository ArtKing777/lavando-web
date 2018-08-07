app.controller('EventsListCtrl', function($scope, $compile, $state, dataFactory, DTOptionsBuilder, DTColumnBuilder, DTInstances) {
    var urlBase = appConfig.wsModuleUrl;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('dom', "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" + "tr" +
                                //"<'row'<'col-sm-12'tr>>" + 
                                "<'row'<'col-sm-5'i><'col-sm-7'p>>",)
                                
        .withOption('ajax', {
             url: urlBase + 'listevents',
             type: 'POST',
             beforeSend : function(xhr) {
                xhr.setRequestHeader("Authorization", window.sessionStorage.getItem('rmsToken'));
            }
        })

         // or here
        .withDataProp('data')
        .withOption('serverSide', true)
        .withOption('order', [[ 0, "desc" ]])
        .withPaginationType('full_numbers')
        .withOption('createdRow', function(row, data, dataIndex) {
            $compile(angular.element(row).contents())($scope);
        })
        .withButtons([            
            {
                extend: 'colvis',
                text: 'Columns'
            },
            'copy',
            'print',
            'pdf',            
            {
                extend: 'excel',
                text: 'Excel'                         
            }
        ])
        .withBootstrap();



    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('title').withTitle('Title'),
        DTColumnBuilder.newColumn('event_date').withTitle('Event Date'),
        DTColumnBuilder.newColumn('event_time').withTitle('Event Time'),
        DTColumnBuilder.newColumn('instructor').withTitle('Instructor'),
        DTColumnBuilder.newColumn('price').withTitle('Price'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];



    function actionsHtml(data, type, full, meta) {
        return '<div class="btn-group dropdown" dropdown>' +
                    '<button class="btn btn-default btn-xs" dropdown-toggle>Action <span class="caret"></span></button>' +
                    '<ul class="dropdown-menu pull-right">' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.events.edit({id:' + full.id + '})">Project Access</a></li>' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.events.edit({id:' + full.id + '})">Power User Settings</a></li>' +
                        '<li><a ui-sref="' + appConfig.wsModuleKey + '.events.edit({id:' + full.id + '})">Edit</a></li>' +
                        '<li><a ng-click = "deleteEvent('+ full.id + ')">Delete</a></li>' +
                    '</ul>' +
                '</div>';
    }

    $scope.addEvent = function(){
        $state.go(appConfig.wsModuleKey + '.events.add');
    }

    $scope.deleteEvent = function(id){
        var r = confirm("Are you sure, you want to delete this record ?");
        if (r == true) {
            var account = {'id' : id}
            dataFactory.postData('deleteEvent', account)
                .success(function (res) {
                    DTInstances.getLast().then(function(dtInstance) {
                        dtInstance.reloadData();
                    });
                })

                .error(function (error) {
                    // alert(error.message);
                    // $scope.status = 'Unable to load customer data: ' + error.message;
                });
        }
    }
});
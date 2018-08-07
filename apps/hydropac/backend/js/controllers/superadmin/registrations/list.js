app.controller('RegistrationsListCtrl', function($scope, $compile, $state, dataFactory, DTOptionsBuilder, DTColumnBuilder, DTInstances) {
    var urlBase = appConfig.wsModuleUrl;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
        .withOption('dom', "<'row'<'col-sm-3'l><'col-sm-6 text-center'B><'col-sm-3'f>>" + "tr" +
                                //"<'row'<'col-sm-12'tr>>" + 
                                "<'row'<'col-sm-5'i><'col-sm-7'p>>",)
        .withOption('ajax', {
             url: urlBase + 'listregistrations',
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
        
        /*
        .withTableTools('vendor/datatables-tabletools/swf/copy_csv_xls_pdf.swf')
        .withTableToolsButtons([
            'copy',
            'print', {
                'sExtends': 'collection',
                'sButtonText': 'Save',
                'aButtons': ['csv', 'xls', 'pdf']
            }
        ])
        */
        .withBootstrap();

        

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        
        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {
            return full.first_name + ' ' + full.last_name;
        }),
        DTColumnBuilder.newColumn('email').withTitle('Email'),
        DTColumnBuilder.newColumn('mobile_number').withTitle('Mobile'),
        DTColumnBuilder.newColumn('event_id').withTitle('Event').renderWith(function(data, type, full) {
            return full.event.title;
        }),  
        DTColumnBuilder.newColumn('is_paid').withTitle('Paid').renderWith(function(data, type, full) {
            if (full.is_paid == 1){
                return "Yes";
            }
            return "No";
        }),
        DTColumnBuilder.newColumn('status_id').withTitle('Status').renderWith(function(data, type, full) {
            return full.status.name;
        }), 
        DTColumnBuilder.newColumn('create_time').withTitle('Register On').notVisible(),
        
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];

    function actionsHtml(data, type, full, meta) {
        return '<div class="btn-group dropdown" dropdown>' +
                    '<button class="btn btn-default btn-xs" dropdown-toggle>Action <span class="caret"></span></button>' +
                    '<ul class="dropdown-menu pull-right">' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.registrations.edit({id:' + full.id + '})">Project Access</a></li>' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.registrations.edit({id:' + full.id + '})">Power User Settings</a></li>' +
                        '<li><a ui-sref="' + appConfig.wsModuleKey + '.registrations.edit({id:' + full.id + '})">Edit</a></li>' +
                        '<li><a ng-click = "deleteRegistration('+ full.id + ')">Delete</a></li>' +
                    '</ul>' +
                '</div>';
    }

    $scope.addRegistration = function(){
        $state.go(appConfig.wsModuleKey + '.registrations.add');
    }

    $scope.deleteRegistration = function(id){
        var r = confirm("Are you sure, you want to delete this record ?");
        if (r == true) {
            var account = {'id' : id}
            dataFactory.postData('deleteRegistration', account)
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
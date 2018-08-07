app.controller('PagesListCtrl', function($scope, $compile, $state, dataFactory, DTOptionsBuilder, DTColumnBuilder, DTInstances) {
    var urlBase = appConfig.wsModuleUrl;

    $scope.dtOptions = DTOptionsBuilder.newOptions()
            .withOption('ajax', {
             url: urlBase + 'listpages',
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
        .withBootstrap();



    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('pagename').withTitle('Page Name'),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];



    function actionsHtml(data, type, full, meta) {
        return '<div class="btn-group dropdown" dropdown>' +
                    '<button class="btn btn-default btn-xs" dropdown-toggle>Action <span class="caret"></span></button>' +
                    '<ul class="dropdown-menu pull-right">' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.pages.edit({id:' + full.id + '})">Project Access</a></li>' +
                        // '<li><a ui-sref="' + appConfig.wsModuleKey + '.pages.edit({id:' + full.id + '})">Power User Settings</a></li>' +
                        '<li><a ui-sref="' + appConfig.wsModuleKey + '.pages.edit({id:' + full.id + '})">Edit</a></li>' +
                        '<li><a ng-click = "deletePage('+ full.id + ')">Delete</a></li>' +
                    '</ul>' +
                '</div>';
    }

    $scope.addPage = function(){
        $state.go(appConfig.wsModuleKey + '.pages.add');
    }

    $scope.deletePage = function(id){
        var r = confirm("Are you sure, you want to delete this record ?");
        if (r == true) {
            var account = {'id' : id}
            dataFactory.postData('deletePage', account)
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
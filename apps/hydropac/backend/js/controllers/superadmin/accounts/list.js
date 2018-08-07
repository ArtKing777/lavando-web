app.controller('AccountsListCtrl', function($scope, $compile, $state, dataFactory, DTOptionsBuilder, DTColumnBuilder, DTInstances) {

    var urlBase = appConfig.wsModuleUrl;
    $scope.dtOptions = DTOptionsBuilder.newOptions()

            .withOption('ajax', {

             url: urlBase + 'listaccounts',

             type: 'POST',

             beforeSend : function(xhr) {

                xhr.setRequestHeader("Authorization", window.sessionStorage.getItem('rmsToken'));

            }

         })
        .withDataProp('data')

        .withOption('serverSide', true)

        .withOption('order', [[ 0, "desc" ]])

        .withPaginationType('full_numbers')

        .withOption('createdRow', function(row, data, dataIndex) {

            $compile(angular.element(row).contents())($scope);

        })

        .withOption('responsive', true)

        .withBootstrap();



    $scope.dtColumns = [

        DTColumnBuilder.newColumn('id').withTitle('ID'),

        DTColumnBuilder.newColumn('acccode').withTitle('Account Code'),

        DTColumnBuilder.newColumn('company_name').withTitle('Company Name'),

        DTColumnBuilder.newColumn('first_name').withTitle('Name').renderWith(function(data, type, full) {

            return full.first_name + ' ' + full.last_name;

        }),

        DTColumnBuilder.newColumn('accountType.name').withTitle('Account Type').renderWith(function(data, type, full) {

            return full.accountType.name;

        }),

        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()

            .renderWith(actionsHtml)

    ];



    function actionsHtml(data, type, full, meta) {

        return '<div class="btn-group dropdown" dropdown>' +

                    '<button class="btn btn-default btn-xs" dropdown-toggle>Action <span class="caret"></span></button>' +

                    '<ul class="dropdown-menu pull-right">' +

                        '<li><a ui-sref="' + appConfig.wsModuleKey + '.accounts.edit({id:' + full.id + '})">Edit</a></li>' +

                        '<li><a ng-click = "deleteAccount('+ full.id + ')">Delete</a></li>' +

                    '</ul>' +

                '</div>';

    }



    $scope.addAccount = function(){

        $state.go(appConfig.wsModuleKey + '.accounts.add');

    }



    $scope.deleteAccount = function(id){

        var r = confirm("Are you sure, you want to delete this record ?");

        if (r == true) {

            var account = {'id' : id}

            dataFactory.postData('deleteaccount',account)

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
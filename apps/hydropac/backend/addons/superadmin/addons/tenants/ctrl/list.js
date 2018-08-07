app.controller('TenantsListCtrl', function($scope, $compile, $state, dataFactory, helper, DTOptionsBuilder, DTColumnBuilder) {


    $scope.editTenant = function(){
        // alert(appConfig.wsModuleKey + '.tenancies.edit.tenants.edit');
        $state.go(appConfig.wsModuleKey + '.tenancies.edit.tenants.edit');
        //$state.go(appConfig.wsModuleKey + '.tenancies.edit.tenant1');
    }
    
    $scope.rent = 499;
    $scope.dtOptions = getDtOptions('tenancies/listtenancies', DTOptionsBuilder, $compile, $scope);
    $scope.tblProperties = {};

    $scope.dtColumns = [
        DTColumnBuilder.newColumn('id').withTitle('ID'),
        DTColumnBuilder.newColumn('tenancy_date').withTitle('App Date'),
        DTColumnBuilder.newColumn('property.name').withTitle('Property').renderWith(function(data, type, full) {
            return full.property.name;
        }),
        DTColumnBuilder.newColumn('paymode').withTitle('Paymode'),
        DTColumnBuilder.newColumn('tenancyType.name').withTitle('Tenancy Type').renderWith(function(data, type, full) {
            return full.tenancyType.name;
        }),
        DTColumnBuilder.newColumn(null).withTitle('Actions').notSortable()
            .renderWith(actionsHtml)
    ];
    
    function actionsHtml(data, type, full, meta) {
        return '' +
        
        '<a class="btn btn-xs btn-default" ui-sref="' + appConfig.wsModuleKey + '.tenancies.edit({id:' + full.id + '})">' + 
               '<i class="fa fa-edit"></i>' +
        '</a>' +
        
        '<button type="button" ng-click="deleteTenancy('+ full.id + ')" class="btn btn-xs btn-default m-l-xs">' + 
               '<i class="fa fa-times"></i>' +
        '</button>';    
    }
    
    

    $scope.addTenancy = function(){
        $state.go(appConfig.wsModuleKey + '.tenancies.add');
        //$state.go(appConfig.wsModuleKey + '.tenancies.edit.tenant1');
    }

    $scope.deleteTenancy = function(id){
        var r = confirm("Are you sure, you want to delete this tenancy ?");
        if (r == true) {
            var account = {'id' : id}
            dataFactory.postData('properties/deleteTenancy', account).then(
                function (res) {
                    $scope.tblTenancies.reloadData(callback, true);
                },
                function (error) {
                    // $scope.status = 'Unable to load customer data: ' + error.message;
                }
            );
        }
    }
    
    function callback(json) {
        console.log(json);
    }
    
    $scope.customDialogOptions = {
        template:"autonowme/rentcount/superadmin/tenancies/tpl/custom-dialog.tpl.html",
        scope: $scope,
        title: 'The best title!',
        buttons: {
            warning: {
                label: "Cancel",
                className: "btn-warning",
                callback: function() {  }
            },
            success: {
                label: "Ok",
                className: "btn-success",
                callback: function() {  }
            }
        }
    };
    
    $scope.dialogOptions= {
            scope: $scope,
            size: 'middium',
            buttons: {
                 success: {
                     label: 'Cancel',
                     className: 'btn-default',
                     callback: function(result) {
                        return true;
                     }
                 },
                 main: {
                    label: 'Confirm',
                    className: 'btn-danger',
                    callback: function() {
                        alert($scope.rent);
                        // return $scope.executeAction();
                    }
                }
            }
        };

    
    $scope.buttons = {
        warning: {
            label: "Cancel",
            className: "btn-warning",
            callback: function() {  }
        },
        success: {
            label: "Ok",
            className: "btn-success",
            callback: function() { }
        }
    };
    
    /*
    $scope.customDialogOptions = {
        message: 'This is a message!',
        title: 'The best title!',
        onEscape: function() {
          $log.info('Escape was pressed');
        },
        show: true,
        backdrop: false,
        closeButton: true,
        animate: true,
        className: 'test-class',
        template:"autonowme/rentcount/superadmin/tenancies/tpl/custom-dialog.tpl.html",
        buttons: {
            warning: {
                label: "Cancel",
                className: "btn-warning",
                callback: function() { }
            },
            success: {
                label: "Ok",
                className: "btn-success",
                callback: function() {  }
            }
        }
    }
    */
    
    $scope.addTenant = function(){
        alert('abc');
    }
});
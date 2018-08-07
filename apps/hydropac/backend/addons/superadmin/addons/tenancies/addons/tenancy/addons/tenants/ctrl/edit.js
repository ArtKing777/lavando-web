app.controller('TenantsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataTenant) {

    $scope.tenant = dataTenant.data;
    $scope.tenant_document = {};
    $scope.tenant_address = {};
    $scope.tenant_employment = {};
    
    $scope.tenant_document.tenant_id = $scope.tenant.id;
    $scope.tenant_address.tenant_id = $scope.tenant.id;
    $scope.tenant_employment.tenant_id = $scope.tenant.id;
    
    $scope.documentDialogOptions= {
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
                    className: 'btn-success',
                    callback: function() {
                    	dataFactory.postData('tenants/saveTenantDocument', $scope.tenant_document).then(
                            function (res) {
                            	$state.go($state.current.name, {}, {reload: true});
                            },
                            function (error) {
                                $scope.status = 'Unable to load tenancies data: ' + error.message;
                            }
                        );
                    }
                }
            }
        };
    
    
    	$scope.addressDialogOptions= {
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
                    className: 'btn-success',
                    callback: function() {
                    	dataFactory.postData('tenants/saveTenantAddress', $scope.tenant_address).then(
                            function (res) {
                            	$state.go($state.current.name, {}, {reload: true});
                            },
                            function (error) {
                                $scope.status = 'Unable to load tenancies data: ' + error.message;
                            }
                        );
                    }
                }
            }
        };
    	
    	
    	$scope.employmentDialogOptions= {
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
                        className: 'btn-success',
                        callback: function() {
                        	dataFactory.postData('tenants/saveTenantEmployment', $scope.tenant_employment).then(
                                function (res) {
                                	$state.go($state.current.name, {}, {reload: true});
                                },
                                function (error) {
                                    $scope.status = 'Unable to load tenancies data: ' + error.message;
                                }
                            );
                        }
                    }
                }
            };
    

});
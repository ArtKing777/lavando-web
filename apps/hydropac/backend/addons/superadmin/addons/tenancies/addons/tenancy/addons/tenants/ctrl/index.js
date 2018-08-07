app.controller('TenantsCtrl', function($scope, $state, $stateParams, dataFactory, dataTenantTypes) {
	$scope.data = $state.current.data;
	$scope.tenantTypes = dataTenantTypes.data;
	$scope.tenant = {};
	$scope.tenant.tenancy_id = $stateParams.id;
	
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
                    className: 'btn-success',
                    callback: function() {
                    	dataFactory.postData('tenants/save', $scope.tenant).then(
                            function (res) {
                            	$state.go($state.current.name, {}, {reload: true});
                                // $state.go(appConfig.wsModuleKey + '.list', {'id': $scope.tenant.tenancy_id});
                            },
                            function (error) {
                                $scope.status = 'Unable to load tenancies data: ' + error.message;
                            }
                        );
                    }
                }
            }
        };
	
	$scope.saveTenant = function(){
		
	}
});
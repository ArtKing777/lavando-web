app.controller('TenantsListCtrl', function($scope, $compile, $state, dataFactory, helper, dataTenants) {
	
	$scope.tenants = dataTenants.data;

	$scope.editTenant = function(tenant){
        // alert(appConfig.wsModuleKey + '.tenancies.edit.tenants.edit');
        $state.go(appConfig.wsModuleKey + '.tenancies.tenancy.tenants.edit', {id: tenant.id});
        //$state.go(appConfig.wsModuleKey + '.tenancies.edit.tenant1');
    }    
	
});
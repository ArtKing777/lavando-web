'use strict';

/* Controllers */
  // signin controller
app.controller('ForgotPwdController', ['$scope', '$rootScope', '$http', '$state', 'AuthService', 'dataFactory', 'APP_EVENTS', '$timeout', 'toaster', 
	function($scope, $rootScope, $http, $state, AuthService, dataFactory, APP_EVENTS, $timeout, toaster) {
        $scope.isCollapsed = false;

        $scope.requestResetPassword = function () {
        	
        	$rootScope.webAuth.changePassword({
   			 connection: 'Username-Password-Authentication',
   		      email:   $scope.user.username
   		    }, function (err, resp) {
   		    	
   		      if(err){
   		    	  console.log(err);
   		    	  
   		    	  $scope.forgotCaption = "Reset Password";
   		    	  $scope.forgotEnabled = true;	
   		    	  
   		    	  $timeout(function() {
   		    		  toaster.pop("error", 'Error', err);
   		    	  }); 
   		      }else{
   		    	  console.log(resp);
   		    	  
   		    	  $scope.forgotCaption = "Reset Password";
   		    	  $scope.forgotEnabled = true;		 
   		    	  
   		    	  /*
   		    	  $scope.register.authScreen = 'signup';
   		    	  $scope.$apply();	
   		    	  */	    	
   		    	  
   		    	  $state.go('access.signin');
   		    	  
   		    	  $timeout(function() {
   		    	    toaster.pop("success", 'Success', resp);
   		    	  }); 
   		    	  
   		    	  
   		        // console.log(resp);
   		      }
   		    });

        	/*
            var param = {'username' : $scope.username}
            dataFactory.postData('RequestResetPassword', param)
                .success(function (res) {
                    $scope.isCollapsed = true;
                    // alert(res);
                    // $scope.categories = res.results;
                })
                .error(function (error) {
                    // alert(error);
                });
             */
            return false;
        };
    }
]);
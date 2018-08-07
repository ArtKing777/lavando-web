'use strict';

var LIVE = true;

var AUTH0_CLIENT_ID='3vGOkvEGF278PlgS9G8pMzJqmMGPLkgd';
var AUTH0_DOMAIN='infovinity.eu.auth0.com';
var AUTH0_CALLBACK_URL='http://www.webprakash.com/sneh';

if (LIVE){
    AUTH0_CLIENT_ID='A1kOEhGWXCIGr5HSURfyQV2ohXgb7wy5';
    AUTH0_DOMAIN='lavando.eu.auth0.com';
    AUTH0_CALLBACK_URL='http://www.webprakash.com/sneh';
}



const MODULES = "addons/";
const CTRL = "ctrl/";
const TPL = "tpl/";

var subModules = [
    'webprakash'
    //'app.access'
]

var deps = [    
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngSanitize',
    'ngTouch',
    'ngStorage',
    'ui.router',
    'ui.bootstrap',
    'ui.load',
    'ui.jq',
    // 'ui.validate',
    'oc.lazyLoad',
    'pascalprecht.translate',
    'angular-jwt',    
    'toaster',
    'datatables',
    'datatables.bootstrap',
    'mgo-angular-wizard',
    // 'auth0.lock',
    'auth0.auth0',
    
    /*
    'ncy-angular-breadcrumb',
    'datatables',
    'datatables.bootstrap',
    
    'flow',
    'ng-fusioncharts',    
    
    'highcharts-ng',
    'editableModule',
    'jsTree.directive',
    'ui.sortable'
    
    'ngMap',
    'daterangepicker',
    'ui.tree',
    */
   
    
    'ngFileUpload',   
    'ngBootbox'   
];

angular.module('app', deps.concat(subModules));


angular.module('app').config(function(angularAuth0Provider) {
	angularAuth0Provider.init({
		//clientID: 'A1kOEhGWXCIGr5HSURfyQV2ohXgb7wy5',
		//domain: 'lavando.eu.auth0.com',
		
		clientID: AUTH0_CLIENT_ID,
		domain: AUTH0_DOMAIN,
		
		responseType: 'id_token token',
		// audience: 'https://' + AUTH0_DOMAIN + '/userinfo',
		redirectUri: AUTH0_CALLBACK_URL,
		// scope: 'openid profile email',
		// _idTokenVerification: false
    });
});

angular.module('app').run(function ($rootScope, $state) {  
	$rootScope.webAuth = new auth0.WebAuth({
		//domain:       'lavando.eu.auth0.com',
		//clientID:     'A1kOEhGWXCIGr5HSURfyQV2ohXgb7wy5',
		
		domain:       AUTH0_DOMAIN,
		clientID:     AUTH0_CLIENT_ID,
		
		/*
		responseType: 'id_token token',
		scope: 'openid profile email',
		audience: 'https://' + AUTH0_DOMAIN + '/userinfo',
		redirectUri: AUTH0_CALLBACK_URL,
		_idTokenVerification: false
		*/
		
    });
    
    $state.defaultErrorHandler(function(error) {
        // This is a naive example of how to silence the default error handler.
        console.log(error);
    });
});

/*
angular.module('app').config(function(lockProvider) {
	  lockProvider.init({
	    clientID: '3vGOkvEGF278PlgS9G8pMzJqmMGPLkgd',
	    domain: 'infovinity.eu.auth0.com',
	    options: {
	    	 auth: {
	    		 	redirect: false,
	    		 	responseType: 'id_token token',
	    		 	
	    		 	params: {
	    		 	    scope: 'openid idToken'
	    		 	}
	    		 	
	    		    // redirectUrl: 'http://localhost/sneh/#!/frontend/home'
	    		  },
	        _idTokenVerification: false
	    }
	    
	  });
});

angular.module('app').run(function(lock, tokenService) {	  
	// For use with UI Router
	lock.interceptHash();
	  
	lock.on('authorization_error', function(err) {		  
		  console.log(err);
	});

	lock.on('authenticated', function(authResult) {
		localStorage.setItem('access_token', authResult.accessToken)
		localStorage.setItem('id_token', authResult.idToken);
		
		tokenService.saveToken(authResult.idToken);

		lock.getUserInfo(authResult.accessToken, function(error, profile) {
			if (error) {
				console.log(error);
			}
			localStorage.setItem('profile', JSON.stringify(profile));
			
			
			
			// console.log(profile);
		});
	});
});
*/

angular.module('app').run(function ($state, AuthService) {  
	if (AuthService.getPayload() == false){        
		$state.go('access.signin');        
    }
});



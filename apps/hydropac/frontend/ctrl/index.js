app.controller('RegisterCtrl', ['$scope', '$rootScope', '$http', '$location', 'tokenService', 'jwtHelper', 'dataFactory', 'angularAuth0', 'WizardHandler', '$timeout', 'toaster', function($scope, $rootScope, $http, $location, tokenService, jwtHelper,  dataFactory, angularAuth0, WizardHandler, $timeout, toaster) {
    
    var dhash = location.hash;
    var pcode = dhash.replace('#!/frontend/home#', '');
    // alert(pcode);
    
    if (LIVE){
	    $scope.apiKey = 'SYtD2_doIMi2GtF8qLg5JTX2gVn0DlyBjoJ717VoFPOf-C4BB6PppNzqMQz01k2UfCJTi0BlBOos3CTMovSETw==';
        $scope.endPoint = 'https://api.shareactor.io/';
	}
    else {
        // Demo Keys
        $scope.apiKey = 'mFbH9C6CrNEihupKafhuy_kzWwWk4vB1ee99iHSjSVQe1Z6hRjduEx6IQv9l4lHhdctBdobnkEuv7K4mjdvjiA==';
        $scope.endPoint = 'https://qa.shareactor.io/';
    }
    
    
    
	// $scope.lock = lock;
	$scope.userProfile = {};
	$scope.register = {};
	$scope.addresses = [];
	$scope.signupCaption = "Sign Up";
	$scope.signupEnabled = true;
	
	$scope.forgotCaption = "RESET PASSWORD";
	$scope.forgotEnabled = true;
	
	$scope.isScreenUpdated = false;
	
	$scope.finishCaption = "PLACE ORDER";
	$scope.finishEnabled = true;
	
	$scope.SAUser = {};
	$scope.SAPaymentMethod = {};
	
	$scope.paymentDone = false;
	
	$scope.register.authScreen = 'signup';
	
	var year = new Date().getFullYear();
    var range = [];
    range.push(year);
    for (var i = 1; i < 10; i++) {
        range.push(year + i);
    }
    $scope.years = range;
	
	
	
	
	$scope.register.postcode = localStorage.getItem('postcode');
	
	
	
	// First Step Helper Function
	
	$scope.validatePostcode = function(){
	    
	    var PC = $scope.register.postcode.toUpperCase();
	    var FourDig = PC.substring(0, 4);
	    var ThreeDig = PC.substring(0, 3);
	    var TwoDig = PC.substring(0, 2);
	    
	    console.log(FourDig);
	    console.log(ThreeDig);
	    console.log(TwoDig);
	    
	    var postcodes = ["SE11", "SW1", "SW10", "SW11", "SW12", "SW13", "SW15", "SW3", "SW4", "SW5", "SW6", "SW7", "SW8", "W1", "W6", "W10", "W4", "SW14", "NW10", "NW6", "NW3", "NW5", "TW9", "TW10", "E14", "WC1", "WC2", "SE1", "EC4", "SW4", "E2", "E1", "EC1", "EC2", "EC3", "NW1", "NW8", "W9", "N1", "N16", "W8", "W14", "W12", "W11", "W2" ];
	    
	    if (postcodes.includes(FourDig) || postcodes.includes(ThreeDig) || postcodes.includes(TwoDig)){
	        return true;
	    }
	    else {
	    	$timeout(function() {
					toaster.pop("error", 'Error', 'We\'re sorry but Lavando is not available in your area :-(');
			});
	    }
	    
	    
	    return false;
	    
	}	
	
	$scope.forgot = function(email){
		$scope.forgotCaption = "PLEASE WAIT ...";
		$scope.forgotEnabled = false;
		
		$rootScope.webAuth.changePassword({
			 connection: 'Username-Password-Authentication',
		      email:   email
		    }, function (err, resp) {
		    	
		      if(err){
		    	  console.log(err);
		    	  
		    	  $scope.forgotCaption = "RESET PASSWORD";
		    	  $scope.forgotEnabled = true;	
		    	  
		    	  $timeout(function() {
		    		  toaster.pop("error", 'Error', err);
		    	  }); 
		      }else{
		    	  console.log(resp);
		    	  
		    	  $scope.forgotCaption = "RESET PASSWORD";
		    	  $scope.forgotEnabled = true;		 
		    	  
		    	  $scope.register.authScreen = 'signup';
		    	  $scope.$apply();		    	  
		    	  
		    	  $timeout(function() {
		    	    toaster.pop("success", 'Success', resp);
		    	  }); 
		    	  
		    	  
		        // console.log(resp);
		      }
		    });
	}
	
	// Second Step Helper Function
	
	$scope.signup = function (email, password) {
		$scope.signupCaption = "PLEASE WAIT ...";
		$scope.signupEnabled = false;
			
		$rootScope.webAuth.signup({
			connection: 'Username-Password-Authentication',
			email: email,
			password: password
		}, function (err) {
	    	 if (err){	        	  
	    		 $scope.signupCaption = "Sign Up";
	    		 $scope.signupEnabled = true;
	  				
	    		 if (err.code == 'user_exists'){
	    			 msg = 'The user you are attempting to sign up has already signed up';	  					
	    		 }
	    		 else if (err.code == 'username_exists'){
	    			 msg = 'The username you are attempting to sign up with is already in use';
	    		 }
	    		 else if (err.code == 'unauthorized'){
	    			 msg = 'If you cannot sign up for this application. May have to do with the violation of a specific rule';  					
	    		 }
	    		 else if (err.code == 'invalid_password'){
	    			 msg = 'The password used doesn\'t comply with the password policy for the connection';	
	    		 }
	    		 else if (err.code == 'password_dictionary_error'){
	    			 msg = 'The chosen password is too common';
	    		 }
	    		 else if (err.code == 'password_no_user_info_error'){
	    			 msg = 'The chosen password is based on user information';
	    		 }
	    		 else if (err.code == 'password_strength_error'){
	    			 msg = 'The chosen password is too weak';
	    		 }
	  				
	    		 $timeout(function() {
	    			 toaster.pop("error", 'Error', msg);
	    		 });  				
	    	 }
	    	 else {
	    		 $scope.login(email, password);
	    	 }
		});
	}
	
	
	$scope.login = function (username, password) {
		$rootScope.webAuth.client.login({
			realm: 'Username-Password-Authentication',
			username: username,
			password: password,
			scope: 'openid',
			responseType: 'code'
		},
		function(err, authResult) {
			if (err) {	        	  
				if (err.code == 'invalid_grant'){
					msg = 'Wrong email or password.';
				}
				else if (err.description){
				    msg = err.description;
				}
	  		
	  		    console.log(err);
	  		
				$timeout(function() {
					toaster.pop("error", 'Error', msg);
				});	  			
	            return;
			} 
			else {
				localStorage.setItem('access_token', authResult.accessToken)
				localStorage.setItem('id_token', authResult.idToken);
  				
				tokenService.saveToken(authResult.idToken);
				$scope.$apply();
			}
		});
	}
	
	$scope.loginSocial = function (type) {
		let social = (type == 0) ? 'facebook' : 'google-oauth2'; 
		$rootScope.webAuth.authorize({
			connection: social,
			responseType: 'id_token token',
	        scope: 'openid profile email',
	        redirectUri: 'http://www.webprakash.com/sneh',
	        state:'pk99india'
		});
	};
	
	$scope.isShowLogin = function(){		
		if ($token = tokenService.getToken()){
			if (! jwtHelper.isTokenExpired($token)){
				if (! $scope.isScreenUpdated){
					$scope.refreshUserInfo();
					$scope.isScreenUpdated = true;
				}
				return false;
			}			
		}		
		return true;
	}
	
	// Order Details Helper Function
	
	$scope.refreshUserInfo = function(){
		if ($token = tokenService.getToken()){
			if (! jwtHelper.isTokenExpired($token)){
				$scope.userProfile = jwtHelper.decodeToken($token);				
				
				$scope.register.first_name = $scope.userProfile.given_name;
				$scope.register.last_name = $scope.userProfile.family_name;
				$scope.register.email = $scope.userProfile.email;				
			}			
		}	
	}	
	
	$scope.refreshAddresses = function() {
        var params = {postcode: $scope.register.postcode, sensor: false};

        return dataFactory.postData('default/searchAddresses', params)
            .then(function(response) {
                console.log(response.data);
                $scope.addresses = response.data;
            });
    }
	
	$scope.selectAddress = function($item, $model){
		var params = {address: $item.Id, sensor: false};

        return dataFactory.postData('default/getAddress', params)
            .then(function(response) {
            	console.log(response.data[0]);
            	$scope.register.address1 = response.data[0].BuildingNumber;
            	$scope.register.address2 = response.data[0].BuildingName;
            	$scope.register.address3 = response.data[0].Street;
            	$scope.register.city = response.data[0].City;
            	$scope.register.rawAddress = response.data[0];
            	$scope.register.lat = response.data[0].Field1;
            	$scope.register.lng = response.data[0].Field2;
            	
            	console.log(response.data);
                // $scope.addresses = response.data;
            });
	}
	
	// ShareActor Helper Functions
	
	$scope.SACreateUser = function(){
		
		var shareactor = new ShareActor({
			apiKey: $scope.apiKey,
			bearerToken: tokenService.getToken(),
			endpoint: $scope.endPoint
		});
		
		var userDetails = {
			"user": {
				"first_name": $scope.register.first_name,
				"last_name": $scope.register.last_name,
				"email": $scope.register.email,
				"mobile_phone_number": $scope.register.mobile_phone_number,
				"addresses": [{
	                "city":$scope.register.city,
	                "service":"pca",
	                "alias":"",
	                "country":"United Kingdom",
	                "zip_code":$scope.register.postcode,
	                "raw": $scope.register.rawAddress,
	                "state":"London",
	                "building": $scope.register.address1 + ' ' + $scope.register.address2,
	                "street_name":$scope.register.address3
	             }]
			}
		};
		
		shareactor.user().create({ body: userDetails }, function(err, user, raw) {
			// The raw parameter contains the full response of the query, it's optional but can be useful to access the response's headers.
			if (err) {
				$scope.finishCaption = "PLACE ORDER";
    			$scope.finishEnabled = true;
    			
			    $timeout(function() {
       			 	toaster.pop("error", 'Error', err.message);
       		 	});
				return;
			}		
			else {
			    $scope.SAUser = user;
			    console.log($scope.SAUser);
			    $scope.SACreatePaymentMethod(user);
			}
						
		});
		
	}
	
	$scope.SACreateOrder = function(user, payment_method){
		
		var shareactor = new ShareActor({
			apiKey: $scope.apiKey,
			bearerToken: tokenService.getToken(),
			endpoint: $scope.endPoint
		});
		
		var d = new Date();
		var nd = addDays(d,2);
		
		var orderDetails = {
			"user" : user._id.$oid,
			"delivery_address": {
                "city":$scope.register.city,
                "service":"pca",
                "alias":"",
                "country":"United Kingdom",
                "zip_code":$scope.register.postcode,
                "raw": $scope.register.rawAddress,
                "state":"London",
                "building": $scope.register.address1 + ' ' + $scope.register.address2,
                "street_name":$scope.register.address3,
                "geo": [
                	Number($scope.register.lat),
                	Number($scope.register.lng)
                  ],
             },
             "billing_address": {
                 "city":$scope.register.city,
                 "service":"pca",
                 "alias":"",
                 "country":"United Kingdom",
                 "zip_code":$scope.register.postcode,
                 "raw": $scope.register.rawAddress,
                 "state":"London",
                 "building": $scope.register.address1 + ' ' + $scope.register.address2,
                 "street_name":$scope.register.address3,
                 "geo": [
                	 Number($scope.register.lat),
                	 Number($scope.register.lng)
                  ],
              },
              "delivery_time": nd.getTime(),
              "currency": "GBP",
              "note": $scope.register.remark,
              "payment_method" : $scope.SAPaymentMethod._id.$oid
		}
			
				
		shareactor.order().create({ body: orderDetails }, function(err, ord, raw) {
			// The raw parameter contains the full response of the query, it's optional but can be useful to access the response's headers.
			if (err) {
			    $scope.finishCaption = "PLACE ORDER";
    			$scope.finishEnabled = true;
    			
			    $timeout(function() {
       			 	toaster.pop("error", 'Error', err.message);
       		 	});
				return;
			}	
			else {
			    $scope.SAOrder = ord;
			    console.log($scope.SAOrder);
			    
			    $scope.SAcreateDelivery();
			    
			    
			}
		});		
	}
	
	$scope.SACreatePaymentMethod = function(user){
	    var paymentMethod = {
			"payment_method": "stripe",
			"token" : $scope.StripePaymentMethod.id      				
		};
		
		console.log(paymentMethod);
		
		var shareactor = new ShareActor({
			apiKey: $scope.apiKey,
			bearerToken: tokenService.getToken(),
			endpoint: $scope.endPoint
		});
		 
		shareactor.paymentMethod().create({ body: paymentMethod }, function(err, payment_method, raw) {
			// The raw parameter contains the full response of the query, it's optional but can be useful to access the response's headers.
			if (err) {
				console.log(err);
				
				$scope.finishCaption = "PLACE ORDER";
    			$scope.finishEnabled = true;

    			$timeout(function() {
       			 	toaster.pop("error", 'Error', err.message);
       		 	});
        			
				return;
			}
			else {
			
			    $scope.SAPaymentMethod = payment_method;
			    console.log(payment_method); 
			
    			/*
    			var Payment = {
    					"orders" : [$scope.SAOrder._id.$oid] , 
    					"payment_method" : $scope.SAPaymentMethod._id.$oid     				
            		};
    			
    			
    			shareactor.payment().create({body: Payment}, function(err, payment, raw){
    				if (err) {
        				console.log(err);
        				return;
        			}    
    				console.log(payment); 
    			});
    			*/
    			 
    			
    			$scope.SACreateOrder($scope.SAUser, payment_method);
			
			    $scope.paymentDone = true;
			}
			
		});
	}
	
	$scope.SACreateStripePaymentMethod = function(user){
		var params = {card_number: $scope.register.card_number, card_mm: $scope.register.card_mm, card_yyyy: $scope.register.card_yyyy, card_cvv: $scope.register.card_cvv, live:LIVE};
		
		return dataFactory.postData('default/getToken', params)
        	.then(function(response) {

        		if (response.data.rslt != 1){
        			
        			$scope.finishCaption = "PLACE ORDER";
        			$scope.finishEnabled = true;

        			$timeout(function() {
   	    			 	toaster.pop("error", 'Error', response.data.msg);
   	    		 	});
        			return;
        		}
        		else {
        		    
        		    $scope.StripePaymentMethod = response.data.msg;
        		    console.log($scope.StripePaymentMethod);
        		    
        		    $scope.SACreateUser();
        			
	        		
	        		       
        		}
        	});
	}
	
	$scope.SAcreateDelivery = function(){
	    var shareactor = new ShareActor({
    		apiKey: $scope.apiKey,
    		bearerToken: tokenService.getToken(),
    		endpoint: $scope.endPoint
    	});
    	
    	
    	var pickup = {
    	    "phone_number":$scope.register.mobile_phone_number,
    	    "address" : {
    	        "geo": [
                	 Number($scope.register.lat),
                	 Number($scope.register.lng)
                ],
    	        "alias":"HOME",
                "state":"London",
                "service_address_id":$scope.register.rawAddress.Id,
                "service":"pca",
                "raw": $scope.register.rawAddress,
                "zip_code": $scope.register.postcode,
                "street_name":$scope.register.address3,
                "country":"United Kingdom",
                "building": $scope.register.address1 + ' ' + $scope.register.address2,
                "city":"London"
    	    },
    	    "name": $scope.register.first_name + " " + $scope.register.last_name
    	};
    	
    	var dropoff =  {  
            "phone_number":"+44 7765252782",
            "address":{  
                "geo":[  
                   51.4902394,
                   -0.1459608
                ],
                "zip_code":"SW1V 4NX",
                "service":"google",
                "street_name":"Winchester Street 113",
                "raw":{  
                    "types":[  
                      "street_address"
                    ],
                    "place_id":"ChIJddMIxx4FdkgRNHGAh46ldnE",
                    "geometry":{  
                        "viewport":{  
                            "northeast":{  
                                "lat":51.4915883802915,
                                "lng":-0.144611819708498
                            },
                             "southwest":{  
                                "lat":51.4888904197085,
                                "lng":-0.147309780291502
                             }
                        },
                        "location_type":"ROOFTOP",
                        "location":{  
                            "lat":51.4902394,
                            "lng":-0.1459608
                        }
                    },
                    "address_components":[  
                        {  
                            "types":[  
                                "street_number"
                            ],
                            "long_name":"113",
                            "short_name":"113"
                        },
                          {  
                             "types":[  
                                "route"
                             ],
                             "long_name":"Winchester Street",
                             "short_name":"Winchester St"
                          },
                          {  
                             "types":[  
                                "neighborhood",
                                "political"
                             ],
                             "long_name":"Pimlico",
                             "short_name":"Pimlico"
                          },
                          {  
                             "types":[  
                                "postal_town"
                             ],
                             "long_name":"London",
                             "short_name":"London"
                          },
                          {  
                             "types":[  
                                "administrative_area_level_2",
                                "political"
                             ],
                             "long_name":"Greater London",
                             "short_name":"Greater London"
                          },
                          {  
                             "types":[  
                                "administrative_area_level_1",
                                "political"
                             ],
                             "long_name":"England",
                             "short_name":"England"
                          },
                          {  
                             "types":[  
                                "country",
                                "political"
                             ],
                             "long_name":"United Kingdom",
                             "short_name":"GB"
                          },
                          {  
                             "types":[  
                                "postal_code"
                             ],
                             "long_name":"SW1V 4NX",
                             "short_name":"SW1V 4NX"
                          }
                    ],
                    "formatted_address":"113 Winchester St, Pimlico, London SW1V 4NX, UK"
                },
                "alias":"",
                "country":"United Kingdom",
                "service_address_id":"ChIJddMIxx4FdkgRNHGAh46ldnE",
                "city":"London"
            },
            "name":"Q-Park Chapman-Andrews"
        };
        
        var requestBody = {
            "pickups": [pickup],
            "items":[  
                {  
                    "quantity":1,
                    "name":"bag"
                }
            ],
            "dropoffs":[dropoff]
        };
    	
    	
        shareactor.order($scope.SAOrder.id).createDelivery({ body: requestBody }, function(err, ord, raw) {
            
            if (err) {
			    $scope.finishCaption = "PLACE ORDER";
    			$scope.finishEnabled = true;
    			
			    $timeout(function() {
       			 	toaster.pop("error", 'Error', err.message);
       		 	});
				return;
			}	
			else {
			    
			    $scope.SADelivery = ord;
			    
			    console.log($scope.SADelivery);
			    
			    shareactor.order($scope.SAOrder.id).triggerDeliveryAction({ body: {"action": "submit"}, deliveryId: $scope.SADelivery._id.$oid}, function(err, res, raw) {
			        
			        if (err) {
        			    $scope.finishCaption = "PLACE ORDER";
            			$scope.finishEnabled = true;
            			
        			    $timeout(function() {
               			 	toaster.pop("error", 'Error', err.message);
               		 	});
        				return;
        			}	
        			else {
        		        shareactor.order($scope.SAOrder.id).update({ body: { 'delivery_status': 'ACCEPTED'} }, function(err, res2, raw) {
        		            
        		            if (err) {
                			    $scope.finishCaption = "PLACE ORDER";
                    			$scope.finishEnabled = true;
                    			
                			    $timeout(function() {
                       			 	toaster.pop("error", 'Error', err.message);
                       		 	});
                				return;
                			}	
                			else {
								WizardHandler.wizard().next();
								// window.location.href = 'https://lavandodrycleaning.com/thank-you/';
                			}
        		            
                		})
        			}
		        });
			}
		})
	}
	
	$scope.goToHomePage = function(){
	    window.location.href = 'http://lavandoapp.com';
	}
	
	function addDays(date, days) {
	  var result = new Date(date);
	  result.setDate(result.getDate() + days);
	  return result;
	}
	
	
	$scope.GotoStep2 = function(){
		console.log('postcode continue clicked?');
		ga('send', {
			hitType: 'event',
			eventCategory: 'Button',
			eventAction: 'Collect My Clothes.',
			eventLabel: 'Web Booking'
		});
		gtag('event', 'Collect My Clothes..');
		localStorage.setItem('postcode', $scope.register.postcode);
		$scope.refreshUserInfo();
		$scope.refreshAddresses();
	}
	
	$scope.GotoStep3 = function(){
		console.log('detail continue clicked');
		ga('send', {
			hitType: 'event',
			eventCategory: 'Button',
			eventAction: 'Continue Details',
			eventLabel: 'Web Booking'
		});
	}
	
	$scope.GotoStep4 = function(){
		
	}
	
	
	$scope.GotoStep5 = function(){
		ga('send', {
			hitType: 'event',
			eventCategory: 'Button',
			eventAction: 'Place Order (Payment)',
			eventLabel: 'Web Booking'
		});
		gtag('event', 'Place Order (Payment)..');
		$scope.finishCaption = "PLEASE WAIT ...";
		$scope.finishEnabled = false;
		
		
		$scope.SACreateStripePaymentMethod();
	}
	
	$scope.refreshUserInfo();
	
	if (pcode != ''){
        $scope.register.postcode = pcode;
        $scope.GotoStep2();
        $timeout(function() {
		    // if (! $scope.isShowLogin()){
		    if ($scope.register.postcode != '' && $scope.register.postcode != null){
			    WizardHandler.wizard().next();
		    }
	    });	
    }
	
	/*
	$timeout(function() {
		// if (! $scope.isShowLogin()){
		if ($scope.register.postcode != '' && $scope.register.postcode != null){
			WizardHandler.wizard().goTo("Details");
		}
	});	
	*/
	
}]);
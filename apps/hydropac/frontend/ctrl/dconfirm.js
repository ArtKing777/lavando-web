app.controller('DConfirmCtrl', ['$scope', '$rootScope', '$location', '$http', 'AuthService', 'tokenService', 'jwtHelper', 'dataFactory', 'angularAuth0', 'WizardHandler', '$timeout', 'toaster', function($scope, $rootScope, $location, $http, AuthService, tokenService, jwtHelper,  dataFactory, angularAuth0, WizardHandler, $timeout, toaster) {
	
	$scope.ord = "";
	$scope.dtime = "";
	
	$scope.showButton = true;
	$scope.disabledButton = true;
	
	console.log($location.hash());
	
	if (LIVE){
	    $scope.apiKey = 'SYtD2_doIMi2GtF8qLg5JTX2gVn0DlyBjoJ717VoFPOf-C4BB6PppNzqMQz01k2UfCJTi0BlBOos3CTMovSETw==';
        $scope.endPoint = 'https://api.shareactor.io/';
	}
    else {
        // Demo Keys
        $scope.apiKey = 'mFbH9C6CrNEihupKafhuy_kzWwWk4vB1ee99iHSjSVQe1Z6hRjduEx6IQv9l4lHhdctBdobnkEuv7K4mjdvjiA==';
        $scope.endPoint = 'https://qa.shareactor.io/';
    }
	
	var shareactor = new ShareActor({
		apiKey: $scope.apiKey,
		bearerToken: AuthService.getToken(),
		endpoint: $scope.endPoint
	});
	
	
	$scope.updateOrder = function(){
	    $scope.disabledButton = true;
	    
	    var shareactor = new ShareActor({
    		apiKey: $scope.apiKey,
    		bearerToken: AuthService.getToken(),
    		endpoint: $scope.endPoint
    	});
    	
    	
    	var dropoff = {
    	    "phone_number":$scope.SAOrder.user.mobile_phone_number,
    	    "address" : $scope.SAOrder.delivery_address,
    	    
    	    /*
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
                "building": $scope.register.address2,
                "city":"London"
    	    },
    	    */
    	    
    	    "name": $scope.SAOrder.user.first_name + " " + $scope.SAOrder.user.last_name
    	};
    	
    	var pickup =  {  
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
    			$scope.disabledButton = false;
    			
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
        		        shareactor.order($scope.SAOrder.id).update({ body: { 'delivery_status': 'DROPOFF_STARTED'} }, function(err, res2, raw) {
        		            
        		            if (err) {
                			    $scope.finishCaption = "PLACE ORDER";
                    			$scope.finishEnabled = true;
                    			
                			    $timeout(function() {
                       			 	toaster.pop("error", 'Error', err.message);
                       		 	});
                				return;
                			}	
                			else {
                			    $scope.showButton = false;
                			    $scope.disabledButton = false;
			                    $scope.$apply();
                			}
        		            
                		})
        			}
		        });
			}
		})
	}
	
	
	shareactor.order($location.hash()).get({}, function(err, ord, raw) {
		  // The raw parameter contains the full response of the query, it's optional but can be useful to access the response's headers.
		  if (err) {
			// Handle error
			return;
		  }
		  
		  $scope.ord = ord;
		  
		  
		  
		  $scope.SAOrder = ord;
		  
		  console.log($scope.SAOrder);
		  
		  $scope.disabledButton = false;
		  
		  var monthNames = [
			    "January", "February", "March",
			    "April", "May", "June", "July",
			    "August", "September", "October",
			    "November", "December"
			  ];
		  
		  var date = new Date(ord.delivery_time.$date*1000);
		  // Hours part from the timestamp
		  var hours = date.getHours();
		  // Minutes part from the timestamp
		  var minutes = "0" + date.getMinutes();
		  // Seconds part from the timestamp
		  var seconds = "0" + date.getSeconds();
		  
		  var day = date.getDate();
		  var monthIndex = date.getMonth();
		  var year = date.getFullYear();

		  // Will display time in 10:30:23 format
		  $scope.dtime = day + ' ' + monthNames[monthIndex] + ' ' + hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);
		  // $scope.dtime = date.toString();

		  console.log(ord); // Bedroom cleaning
		  
		  $scope.$apply();
		  // Update DOM
		});
}]);
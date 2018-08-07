app.controller('EventsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataEventTypes, dataEvent, dataCourses, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataEvent.data.title;
    
    $scope.event = dataEvent.data;   
    $scope.EventTypes = dataEventTypes.data;
    $scope.Courses = dataCourses.data;
    
    $scope.refreshEventContent = function(){
        // alert($scope.event.course_id);
        
        var params = {id: $scope.event.course_id};

        return dataFactory.postData('events/getCourse', params)
            .then(function(response) {
                console.log(response.data);
                $scope.event.title = response.data.title;
                $scope.event.content1 = response.data.content;
            });
    }
      
});
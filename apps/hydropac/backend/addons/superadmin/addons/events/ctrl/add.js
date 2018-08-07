app.controller('EventsAddCtrl', function($scope, $state, dataFactory, helper, Upload, $parse, dataEventTypes, dataCourses) {
    $scope.heading = "Add a new " + $scope.data.objName;
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
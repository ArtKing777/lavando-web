app.controller('TestimonialsEditCtrl', function($scope, $state, $stateParams, dataFactory, dataTestimonial, Upload, $parse, helper) {
    $scope.heading = "Update " + $scope.data.objName + " : " + dataTestimonial.data.first_name + " " + dataTestimonial.data.last_name;
    $scope.testimonial = dataTestimonial.data;  
});
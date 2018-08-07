'use strict';

/* Controllers */

app.controller('DashboardCtrl', ['$scope', '$http', '$rootScope', 'dataFactory', function($scope, $http, $rootScope, dataFactory) {
    var urlBase = appConfig.wsModuleUrl;

    $scope.dashboard = {};
    $scope.signalData = [];

    $scope.dashboard.numberOfSoloAccounts = 0
    $scope.dashboard.numberOfProjectAccounts = 0
    $scope.dashboard.numberOfPowerUsers = 0

    getDashboard();

    function getDashboard() {
        dataFactory.postData("dashboard/getdashboard", {id: $rootScope.authData.id}).then(
            function (res){
                $scope.dashboard.numberOfSoloAccounts = res.data.numberOfSoloAccounts;
                $scope.dashboard.numberOfProjectAccounts = res.data.numberOfProjectAccounts;
                $scope.dashboard.numberOfPowerUsers = res.data.numberOfPowerUsers;
                $scope.dashboard.numberOfNormalUsers = res.data.numberOfNormalUsers;
            });


        /*
        $http.get(urlBase + 'getdashboard', {})
            .success(function (res) {
                $scope.dashboard = res;

                $scope.dashboard.goodPercentage = ($scope.dashboard.numberOfReadings - $scope.dashboard.numberOfErrors) * 100/ $scope.dashboard.numberOfReadings;
                $scope.dashboard.bedPercentage = 100 - $scope.dashboard.goodPercentage;
                $scope.signalData = [Math.round($scope.dashboard.goodPercentage * 100) / 100, Math.round($scope.dashboard.bedPercentage * 100) / 100];

                // $scope.
            })
            .error(function (error) {
                $scope.status = 'Unable to load customer data: ' + error.message;
            });
            */
    }




	var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    /* event source that pulls from google.com */
    $scope.eventSource = {
            url: "http://www.google.com/calendar/feeds/usa__en%40holiday.calendar.google.com/public/basic",
            className: 'gcal-event',           // an option!
            currentTimezone: 'America/Chicago' // an option!
    };

    /* event source that contains custom events on the scope */
    $scope.events = [
      {title:'All Day Job', resourceId: 'b', start: new Date(y, m, 1), className: ['b-l b-2x b-info'], location:'60%', info:'This a all day job that will start from 9:00 am to 9:00 pm, have fun!'},
      {title:'Job 1', resourceId: 'c', start: new Date(y, m, 3), end: new Date(y, m, 4, 9, 30), allDay: false, className: ['b-l b-2x b-danger'], location:'43%', info:'Two days dance training class.'},
      {title:'Job 2', resourceId: 'd', start: new Date(y, m, 6, 16, 0), className: ['b-l b-2x b-info'], location:'22%', info:'The most big racing of this year.'},
      {title:'Job 3', resourceId: 'e', start: new Date(y, m, 8, 15, 0), className: ['b-l b-2x b-info'], location:'89%', info:'Do not forget to watch.'},
      {title:'Job 4', resourceId: 'f', start: new Date(y, m, 9, 19, 30), end: new Date(y, m, 9, 20, 30), className: ['b-l b-2x b-success'], info:'Family party'},
      {title:'Job 5', resourceId: 'g', start: new Date(y, m, d - 5), end: new Date(y, m, d - 2), className: ['bg-success bg'], location:'74%', info:'It is a long long event'},
      {title:'Job 6', resourceId: 'a', start: new Date(y, m, d - 1, 16, 0), className: ['b-l b-2x b-info'], location:'9%', info:'Tokyo Game Racing'},
      {title:'Job 7', resourceId: 'b', start: new Date(y, m, d + 1, 19, 0), end: new Date(y, m, d + 1, 22, 30), allDay: false, className: ['b-l b-2x b-primary'], location:'New York', info:'Party all day'},
      {title:'Job 8', resourceId: 'c', start: new Date(y, m, d + 4, 16, 0), alDay: false, className: ['b-l b-2x b-warning'], location:'34%', info:'Repeat every day'},      
      {title:'Job 9', resourceId: 'd', start: new Date(y, m, 28), end: new Date(y, m, 29), url: 'http://hydropac.co.uk/', className: ['b-l b-2x b-primary']},
      {title:'Job 10', resourceId: 'e', start: new Date(y, m+1, 6, 18, 0), className: ['b-l b-2x b-info']}
    ];

    /* alert on dayClick */
    $scope.precision = 400;
    $scope.lastClickTime = 0;
    $scope.alertOnEventClick = function( date, jsEvent, view ){
      var time = new Date().getTime();
      if(time - $scope.lastClickTime <= $scope.precision){
          $scope.events.push({
            title: 'New Event',
            start: date,
            className: ['b-l b-2x b-info']
          });
      }
      $scope.lastClickTime = time;
    };
    /* alert on Drop */
    $scope.alertOnDrop = function(event, delta, revertFunc, jsEvent, ui, view){
       $scope.alertMessage = ('Event Droped to make dayDelta ' + delta);
    };
    /* alert on Resize */
    $scope.alertOnResize = function(event, delta, revertFunc, jsEvent, ui, view){
       $scope.alertMessage = ('Event Resized to make dayDelta ' + delta);
    };

    $scope.overlay = $('.fc-overlay');
    $scope.alertOnMouseOver = function( event, jsEvent, view ){
      $scope.event = event;
      $scope.overlay.removeClass('left right top').find('.arrow').removeClass('left right top pull-up');
      var wrap = $(jsEvent.target).closest('.fc-event');
      var cal = wrap.closest('.calendar');
      var left = wrap.offset().left - cal.offset().left;
      var right = cal.width() - (wrap.offset().left - cal.offset().left + wrap.width());
      var top = cal.height() - (wrap.offset().top - cal.offset().top + wrap.height());
      if( right > $scope.overlay.width() ) { 
        $scope.overlay.addClass('left').find('.arrow').addClass('left pull-up')
      }else if ( left > $scope.overlay.width() ) {
        $scope.overlay.addClass('right').find('.arrow').addClass('right pull-up');
      }else{
        $scope.overlay.find('.arrow').addClass('top');
      }
      if( top < $scope.overlay.height() ) { 
        $scope.overlay.addClass('top').find('.arrow').removeClass('pull-up').addClass('pull-down')
      }
      (wrap.find('.fc-overlay').length == 0) && wrap.append( $scope.overlay );
    }

    /* config object */
    $scope.uiConfig = {
      calendar:{
    	  week: {
    		  columnFormat : {
                  month: 'dd',
                  week: 'dd',
                  day: 'dd'
              },
    	    },
    	    
    	  
    	schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
    	defaultView: 'timelineDay',
    	groupByResource : true,
    	// defaultView: 'agendaDay',
        height: 450,
        editable: true,
        header:{
          left: 'prev',
          center: 'title',
          right: 'next'
        },
        dayClick: $scope.alertOnEventClick,
        eventDrop: $scope.alertOnDrop,
        eventResize: $scope.alertOnResize,
        eventMouseover: $scope.alertOnMouseOver,
        resources: [
            { id: 'a', title: 'Machine 1' },
            { id: 'b', title: 'Machine 2' },
            { id: 'c', title: 'Machine 3' },
            { id: 'd', title: 'Machine 4' },
            { id: 'e', title: 'Machine 5' },
            { id: 'f', title: 'Machine 6' },
            { id: 'g', title: 'Winding' },
          ]
      }
    };
    
    /* add custom event*/
    $scope.addEvent = function() {
      $scope.events.push({
        title: 'New Event',
        start: new Date(y, m, d),
        className: ['b-l b-2x b-info']
      });
    };

    /* remove event */
    $scope.remove = function(index) {
      $scope.events.splice(index,1);
    };

    /* Change View */
    $scope.changeView = function(view, calendar) {
      $('.calendar').fullCalendar('changeView', view);
    };

    $scope.today = function(calendar) {
      $('.calendar').fullCalendar('today');
    };

    /* event sources array*/
    $scope.eventSources = [$scope.events];


}]);
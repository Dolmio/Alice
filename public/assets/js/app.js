var AliceApp = angular.module('AliceApp', [
  'ngRoute',
  'aliceControllers'
]);

AliceApp.config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
    when('/list', {
      templateUrl: 'assets/html/list.html',
      controller: 'ListCtrl'
    }).
    when('/compare', {
      templateUrl: 'assets/html/compare.html',
      controller: 'CompareCtrl'
    }).
    when('/progress', {
      templateUrl: 'assets/html/progress.html',
      controller: 'ProgressCtrl'
    }).
    when('/form', {
      templateUrl: 'assets/html/form.html',
      controller: 'FormCtrl'
    }).
    otherwise({
      redirectTo: '/list'
    });
  }
]);

var aliceControllers = angular.module('aliceControllers', []);

aliceControllers.controller('ListCtrl', ['$scope',
  function($scope) {

  }
]);

aliceControllers.controller('CompareCtrl', ['$scope',
  function($scope) {

  }
]);

aliceControllers.controller('ProgressCtrl', ['$scope',
  function($scope) {

  }
]);

aliceControllers.controller('FormCtrl', ['$scope',
  function($scope) {

  }
]);

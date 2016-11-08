var app = angular.module("dashboard",['ngRoute'])

.config(['$routeProvider', function($routeProvider){
  $routeProvider.
    when('/transacciones',{
      templateUrl: 'transacciones.html',
      controller: 'MainCtrl'
    }).
    when('/reportes',{
      templateUrl: 'reportes.html',
      controller: 'MainCtrl'
    }).
    when('/graficas',{
      templateUrl: 'graficas.html',
      controller: 'MainCtrl'
    }).
    when('/perfil',{
      templateUrl: 'perfil.html',
      controller: 'MainCtrl'
    }).
    when('/nuevaTransaccion',{
      templateUrl: 'nuevaTransaccion.html',
      controller: 'MainCtrl'
    }).
    when('/editarPerfil',{
      templateUrl: 'editarPerfil.html',
      controller: 'MainCtrl'
    }).
    otherwise({redirectTo: '/transacciones'})
}])

.controller('MainCtrl',['$scope','$http', function($scope, $http){
  $http.get('services.json').then(function(response){
    $scope.services = response.data;
  });
}])
;
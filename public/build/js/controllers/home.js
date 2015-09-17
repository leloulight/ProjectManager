angular.module('app.controllers')
    .controller('HomeController', ['$scope','$cookies', 'User', function($scope, $cookies, User){
        User.user = $cookies.getObject('user');
        console.log(User.user);

    }]);
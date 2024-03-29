angular.module('app.controllers')
    .controller('LoginController', ['$scope', '$location', '$cookies', 'User', 'OAuth', function($scope, $location, $cookies, User, OAuth){

        $scope.user = {

            username: 'edujr.silva@gmail.com',
            password: 'test'

        }

        $scope.error = {
            message: '',
            error: false
        }

        $scope.login = function() {
            if ($scope.form.$valid) {
                OAuth.getAccessToken($scope.user).then(function () {
                    User.authenticated({},{},function(data){
                            $cookies.putObject('user', data);
                            $location.path('home');
                    });


                }, function (response) {
                    console.log(response);
                    $scope.error.error = true;
                    $scope.error.message = response.data.error_description;
                });
            }
        }

    }]);
angular.module('app.controllers')
    .controller('ClientController', ['$scope', '$location', '$routeParams', 'Client', function($scope, $location, $routeParams, Client){

        $scope.client = new Client();

        if ($routeParams.id) {
            $scope.client = Client.get({id: $routeParams.id});
        }

        $scope.init = function () {
            $scope.clients = Client.query();
        }


        $scope.save = function () {

            if ($scope.form.$valid) {
                $scope.client.$save().then(function() {
                    $location.path('/clients');
                })
            }
        }

        $scope.update = function () {

            if ($scope.form.$valid) {
                Client.update({id: $scope.client.id}, $scope.client, function() {
                    $location.path('/clients');
                });
            }
        }

    }]);
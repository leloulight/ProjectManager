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
                $scope.client.$save().then(function () {
                    $location.path('/clients');
                }, function (response) {
                    console.log("Error...");
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

        $scope.delete = function (client) {
            $scope.client = client;
            if (confirm("Do you want to delete?")) {
                $scope.client.$delete().then(function() {
                    $location.path('/clients');
                })
            }
        }

    }]);
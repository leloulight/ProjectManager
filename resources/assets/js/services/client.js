angular.module('app.services')

    .service('Client', ['$resource', 'appConfig', '$httpParamSerializer', function($resource, appConfig, $httpParamSerializer) {
        return $resource(appConfig.baseUrl + '/client/:id', {id: '@id'}, {

            update: {
                method: 'PUT',


                /* I am using this transformRequest only to see how it works, as it's not necessary here since I am not changing anything before the PUT*/
                transformRequest: function (data) {

                    /*
                    if (data.hasOwnProperty('name')) {
                        data.name = data.name + 'You were intercepted!';
                    }
                    */
                    return appConfig.utils.transformRequest(data);
                }
            }

        });
    }])
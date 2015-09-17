angular.module('app.services')

    .service('User', ['$resource', 'appConfig', function($resource, appConfig) {

        return $resource(appConfig.baseUrl + '/user', {}, {
            authenticated: {
                url: appConfig.baseUrl + '/user/authenticated',
                method: 'GET'
            }
            /*
             ,
             query: {
             method: 'GET',
             isArray: true,
             transformResponse: function(data, headers) {
             var dataJson = JSON.parse(data);
             dataJson = dataJson.data;
             return dataJson;
             }
             }
             */

        });
    }])
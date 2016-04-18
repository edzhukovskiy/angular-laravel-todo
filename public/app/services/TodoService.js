/**
 * Created by 37498_000 on 18.04.2016.
 */

function TodoService($http)
{
    return {
        add: function (data) {
            return $http.post(apiUrl+'todo',data).then(successHandler,errorHandler);
        },
        all: function () {
            return $http.get(apiUrl+'todo').then(successHandler,errorHandler);
        },
        one: function (id) {
            return $http.get(apiUrl+'todo/'+id).then(successHandler,errorHandler)
        },
        remove: function (id) {
            return $http.delete(apiUrl+'todo/'+id).then(successHandler,errorHandler)
        },
        update: function (id,data) {
            return $http.put(apiUrl+'todo/'+id,data).then(successHandler,errorHandler)
        }
    };
}
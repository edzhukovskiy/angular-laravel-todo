/**
 * Created by 37498_000 on 18.04.2016.
 */
function PriorityService($http)
{
    return {
        all: function () {
            return $http.get(apiUrl+'priority').then(successHandler);
        }
    };
}
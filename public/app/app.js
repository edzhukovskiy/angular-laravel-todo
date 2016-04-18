/**
 * Created by 37498_000 on 18.04.2016.
 */
var apiUrl = "http://localhost/angular-laravel-todo/public/";

var todo = angular.module('todo',['ui.router']);

todo.factory("TodoSrv",TodoService);
todo.factory("PrioritySrv",PriorityService);

todo.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise("/");

    $stateProvider
        .state('home', {
            url: "/",
            templateUrl: "views/home.html",
            controller:['$scope','$http','TodoSrv','PrioritySrv',TodoController]
        });
});

function successHandler(res) {
    if(res.data.message)
    {
        res.data.success
            ? notify(res.data.message)
            : notify(res.data.message,'danger');
    }
    return res.data;
}

function errorHandler(error) {

}

function notify(message,type)
{
    type = type || 'success';
    $.getScript('node_modules/bootstrap-notify/bootstrap-notify.min.js', function () {
        $.notify({
            message: message
        },{
            type: type
        });
    });
}


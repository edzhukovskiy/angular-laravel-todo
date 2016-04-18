/**
 * Created by 37498_000 on 18.04.2016.
 */

function TodoController($scope,$http,$TodoSrv,$PrioritySrv)
{
    $scope.checkBoxes       = [];
    $scope.todoList         = {};
    $scope.priorityList     = {};
    $scope.todo             = {};

    loadAll();
    loadAllPriorities();

    function loadAll()
    {
        $TodoSrv.all().then(function (todoList) {
            $scope.todoList = todoList;
        });
    }

    function loadAllPriorities()
    {
        $PrioritySrv.all().then(function (priorityList) {
            $scope.priorityList = priorityList;
        });
    }

    $scope.addNew = function () {
        $TodoSrv.add($scope.todo).then(function () {
            loadAll();
        });
    };

    $scope.changeStatus = function (id,checked) {
        $scope.todo.done = checked;
        $TodoSrv.update(id,$scope.todo).then(function () {
            loadAll();
        });
    };

    $scope.remove = function (id) {
        if(confirm("Are you sure you want to delete this item?"))
        {
            $TodoSrv.remove(id).then(function () {
                loadAll();
            });
        }
    };
}
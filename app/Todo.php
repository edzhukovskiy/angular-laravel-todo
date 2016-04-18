<?php
/**
 * Created by PhpStorm.
 * User: 37498_000
 * Date: 18.04.2016
 * Time: 11:53
 */

namespace app;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Todo extends Model
{
    protected $fillable = ['title','priority_id','done'];
    protected $table = 'todolist';

    public function getList()
    {
        $sql = "SELECT t.*, p.color as color FROM todolist t INNER JOIN priorities p ON p.id = t.priority_id ORDER BY t.priority_id ";
        $result = DB::select(DB::raw($sql));
        return $result;
    }
}
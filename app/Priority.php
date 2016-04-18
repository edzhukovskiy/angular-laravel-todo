<?php
/**
 * Created by PhpStorm.
 * User: 37498_000
 * Date: 13.04.2016
 * Time: 16:52
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Priority extends Model
{
    protected $table = "priorities";
    protected $fillable = ['id','title','color'];
}
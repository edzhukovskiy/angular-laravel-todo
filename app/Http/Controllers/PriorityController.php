<?php
/**
 * Created by PhpStorm.
 * User: 37498_000
 * Date: 13.04.2016
 * Time: 16:51
 */

namespace App\Http\Controllers;
use App\Priority;

class PriorityController extends Controller
{

    protected $modelName;

    public function __construct(Priority $priority)
    {
        $this->modelName = $priority;
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->modelName->all());
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->modelName->findOrFail($id));
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json($this->modelName->find($id));
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {

    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id,Request $request)
    {

    }

    public function destroy($id)
    {

    }
}
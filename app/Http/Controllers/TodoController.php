<?php
/**
 * Created by PhpStorm.
 * User: 37498_000
 * Date: 18.04.2016
 * Time: 11:52
 */

namespace App\Http\Controllers;
use App\Todo;

class TodoController extends Controller
{
    protected $model;

    public function __construct(Todo $toDo)
    {
        $this->model = $toDo;
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->model->getList());
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        return response()->json($this->model->findOrFail($id));
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        return response()->json($this->model->find($id));
    }
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function store()
    {
        $validator = \Validator::make(request()->all(),[
            'title'     =>'required|max:255',
            'priority_id'  =>'required',
        ]);

        if($validator->fails())
            return response()->json([
                'success'   =>false,
                'messages'  =>$validator->messages()
            ]);
        if($isSaved = $this->model->create(request()->all()))
            $data = [
                'success'=>true,
                'message'=>'To do successfully saved',
                'response'=>$isSaved
            ];
        else
            $data = [
                'success'=>false,
                'message'=>'Ops!!! can not create todo'
            ];
        return response()->json($data);
    }
    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id)
    {
        $aaa = [
            'title'     =>'required|max:255',
            'priority_id'  =>'required',
        ];
        if(request()->has('done')){
            $aaa = [
                'title'     =>'',
                'priority_id'  =>'',
            ];
        }
        $validator = \Validator::make(request()->all(),[
            $aaa
        ]);

        if($validator->fails())
            return response()->json([
                'success'   =>false,
                'messages'  =>$validator->messages()
            ]);
        if($isUpdated = $this->model->find($id)->update(request()->all()))
            $data = [
                'success'=>true,
                'response'=>$isUpdated
            ];
        else
            $data = [
                'success'=>false,
                'message'=>'Cant create'
            ];

        return response()->json($data);
    }

    public function destroy($id)
    {
        $isDeleted = $this->model->find($id)->delete();

        $data = $isDeleted
            ? [
                'status'=>true,
                'message'=>"todo with id $id deleted"
            ]
            : [
                'status'=>false,
                'message'=>"Can not delete todo with id $id"
            ];

        return response()->json($data);
    }
}
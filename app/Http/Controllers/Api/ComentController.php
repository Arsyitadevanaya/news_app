<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coment;
use Illuminate\Support\Facades\Validator;

class ComentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data = Coment::select('coments.*', 'users.username as user', 'posts.title as post')
        //     ->join('users', 'coments.user_id', '=', 'users.id')
        //     ->join('posts', 'coments.post_id', '=', 'posts.id')
        //     ->orderBy('posts.id', 'asc')
        //     ->get();
        $data=Coment::with(['user','post'])->orderBy('id', 'asc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'data' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataComent = new Coment;

        $rules = [
            'post_id' => 'required',
            'user_id' => 'required',
            'coments_content' => 'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukkan data',
                'data'=>$validator->errors()
            ]);
        }

        $dataComent->post_id= $request->post_id;
        $dataComent->user_id=$request->user_id;
        $dataComent->coments_content=$request->coments_content;
        $post = $dataComent->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=Coment::with(['user','post'])->find($id);
        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'data ditemukan',
                'data' => $data

            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataComent = Coment::find($id);
        if(empty($dataComent)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemuka'
            ],404);
        }

        $rules = [
            'post_id' => 'required',
            'user_id' => 'required',
            'coments_content' => 'required',
        ];
        $validator= Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Gagal melakukan update data',
                'data'=>$validator->errors()
            ]);
        }

        $dataComent->post_id= $request->post_id;
        $dataComent->user_id=$request->user_id;
        $dataComent->coments_content=$request->coments_content;
        $post = $dataComent->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan update data'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataComent = Coment::find($id);
        if(empty($dataComent)){
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemuka'
            ],404);
        }

        $post = $dataComent->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan delete data'
        ]);
    }
}

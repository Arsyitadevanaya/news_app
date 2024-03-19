<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Posts::with(['user'])->orderBy('id', 'asc')->get();
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
        $dataPost = new Posts;

        $rules = [
            'title' => 'required',
            'news_content' => 'required',
            'author' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ]);
        }

        $dataPost->title = $request->title;
        $dataPost->news_content = $request->news_content;
        $dataPost->author = $request->author;
        $post = $dataPost->save();

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

        $data = Posts::with(['user'])->orderBy('id', 'asc')->find($id);
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
        $dataPost = Posts::find($id);
        if (empty($dataPost)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemuka'
            ], 404);
        }

        $rules = [
            'title' => 'required',
            'news_content' => 'required',
            'author' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal melakukan update data',
                'data' => $validator->errors()
            ], 404);
        }

        $dataPost->title = $request->title;
        $dataPost->news_content = $request->news_content;
        $dataPost->author = $request->author;
        $post = $dataPost->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan update data'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataPost = Posts::find($id);
        if (empty($dataPost)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemuka'
            ], 404);
        }

        $post = $dataPost->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses melakukan delete data'
        ], 200);
    }
}

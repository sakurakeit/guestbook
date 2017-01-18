<?php
// Created by Rozhkova ev
namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Comment;
use App\Transformers\CommentTransformer;
//use Illuminate\Validation\Validator;
use \Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
    }

    public function paginate($count)
    {
        $comment = Comment::paginate($count)->toJson();
        return $comment;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //comment = Comment::find($id);
        $comment = Comment::findOrFail($id);

        /*return response([
            "comments" => transform($comment)
        ]);*/
        return $comment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'message' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            if ($validator->fails()) {
                throw new StoreResourceFailedException('Could not create new comment.', $validator->errors());
            }
        } else {
            $com = new Comment();
            $com->parent_id = $request->parent_id;
            $com->user_id = $request->user_id;
            $com->message = $request->message;
            $com->save();
            return 'Data store';//$this->response->item(transform($model));
            //return $this->response->item($entity, new OutputTransformer());
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

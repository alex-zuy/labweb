<?php

namespace App\Http\Controllers;

use App\BlogRecord;
use App\BlogRecordComment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class BlogRecordCommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $blogRecordId = $request->input('blog_record_id');
        $br = BlogRecord::findOrFail($blogRecordId);
        $comments = $br->comments()->orderBy('created_at', 'desc')->get();

        return view('blog.comments-list', ['comments' => $comments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('blog.comment-form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|max:250',
        ]);

        if($validator->fails()) {
            $html = view('blog.comment-form', ['blogRecordId' => $request->input('blog_record_id')])
                ->withErrors($validator)->render();

            return response()->json(['status' => 'retry', 'html' => $html]);
        }
        else {
            $brc = new BlogRecordComment();
            $brc->user()->associate(Auth::user());
            $brc->blog_record_id = $request->input('blog_record_id');
            $brc->text = $request->input('text');
            $brc->save();

            return response()->json(['status' => 'success']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

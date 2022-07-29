<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return all comment status padding

        $comments = Comment::with('user')
            // ->with('order.menuItems.restaurant')
            ->paginate(10);
        // return response()->json([
        //     'success' => true,
        //     'data' => $comments,
        //     'message' => 'comments proses success'
        // ], 200, []);
        $data = [

            'comments' => $comments,

        ];

        return view('dashboard.comments.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function reject(Request $request)
    {
        //update status to rejected
        $comment = Comment::where('id', request()->id)->where('status', 'pending')->first();
        if ($comment) {
            $comment->status = 'rejected';
            $comment->save();
            return back()->with('message', 'Comment has been rejected');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function approve(Request $request)
    {
        //update status to approved
        $comment = Comment::where('id', request()->id)->where('status', 'pending')->first();
        if ($comment) {
            $comment->status = 'approved';
            $comment->save();
            return back()->with('message', 'Comment has been approved');
        } else {
            return back()->with('error', 'Something went wrong');
        }
    }
}

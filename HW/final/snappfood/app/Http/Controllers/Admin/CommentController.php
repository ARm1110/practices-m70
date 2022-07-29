<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        // return all comment status padding

        $comments = Comment::with('user')

            ->paginate(10);

        $data = [

            'comments' => $comments,

        ];

        return view('dashboard.comments.admin.index', compact('data'));
    }
    public function reject(Request $request)
    {
        //update status to rejected
        try {
            Comment::where('id', request()->id)->update([
                'is_verified' => '0',
            ]);
            return back()->with('message', 'Comment has been approved');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }

    public function approve(Request $request)
    {
        //update status to approved
        try {
            Comment::where('id', request()->id)->update([
                'is_verified' => '1',
            ]);
            return back()->with('message', 'Comment has been approved');
        } catch (\Throwable $th) {
            return back()->with('error', 'Something went wrong');
        }
    }
}

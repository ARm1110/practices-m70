<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCommentRequest;
use App\Models\Comment;
use App\Models\MenuItemOrder;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //TODO: Implement CommentController 
    //resource
    public function index()
    {
        // $comments = Comment::all()->where('id', auth()->user()->id);
        // return response()->json($comments);
    }
    public function show($id)
    {
    }
    public function store(StoreCommentRequest $request)
    {
        try {
            // check if menu item order . status ==  'delivered'
            $menuItemOrder = MenuItemOrder::find($request->menuItemsOrder_id)->where('user_id', auth()->user()->id)->where('status', 'delivered');
            if (!$menuItemOrder) {
                $msg = [
                    'status' => 'error',
                    'message' => 'You can only comment on a menu item order that has been delivered'
                ];

                return response()->json($msg, 400);
            }


            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->comment = $request->body;
            $comment->menu_item_order_id = $request->menuItemsOrder_id;
            $comment->rating = $request->rating;
            $comment->save();

            $msg = [
                'success' => true,
                'data' =>   $comment,
                'message' => 'Comment added successfully'
            ];

            return response()->json($msg);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        // $comment = Comment::find($id);
        // $comment->update($request->all());
        // return response()->json($comment);
    }
    public function destroy($id)
    {
        // $comment = Comment::find($id);
        // $comment->delete();
        // return response()->json($comment);
    }

    //custom
    // public function getCommentsByProductId($id)
    // {
    //     $comments = Comment::where('product_id', $id)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByUserId($id)
    // {
    //     $comments = Comment::where('user_id', $id)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByProductIdAndUserId($id, $user_id)
    // {
    //     $comments = Comment::where('product_id', $id)->where('user_id', $user_id)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByProductIdAndUserIdAndComment($id, $user_id, $comment)
    // {
    //     $comments = Comment::where('product_id', $id)->where('user_id', $user_id)->where('comment', $comment)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByProductIdAndComment($id, $comment)
    // {
    //     $comments = Comment::where('product_id', $id)->where('comment', $comment)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByUserIdAndComment($id, $comment)
    // {
    //     $comments = Comment::where('user_id', $id)->where('comment', $comment)->get();
    //     return response()->json($comments);
    // }

    // public function getCommentsByProductIdAndUserIdAndCommentAndRating($id, $user_id, $comment, $rating)
    // {
    //     $comments = Comment::where('product_id', $id)->where('user_id', $user_id)->where('comment', $comment)->where('rating', $rating)->get();
    //     return response()->json($comments);
    // }
}

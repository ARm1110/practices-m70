<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreCommentRequest;
use App\Http\Resources\API\CommentResource;
use App\Models\Comment;
use App\Models\MenuItemOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //resource
    public function index()
    {

        // get all the comments by restaurant_id
        if (isset(request()->restaurant_id)) {
            $query = Order::select('*')
                ->with('menuItems', fn ($query) => $query->where('restaurant_id', request()->restaurant_id))
                ->with('comments')
                ->get();

            //passed to resource
            return CommentResource::collection($query);

            return response()->json([
                'success' => true,
                'data' => $query,
                'request' => request()->restaurant_id,
                'message' => 'comments proses success'
            ], 200, []);
        }
        $comments = Comment::with('user')
            ->with('menuItem')
            ->with('order')
            ->get();
        return response()->json([
            'success' => true,
            'data' => $comments,
            'request' => request()->restaurant_id,
            'message' => 'comments proses success'
        ], 200, []);
    }
    public function show($id)
    {
    }
    public function store(StoreCommentRequest $request)
    {
        try {
            // check if menu item order . status ==  'delivered'
            $order = Order::find($request->order_id)->where('user_id', auth()->user()->id)->where('status', 'ordered');
            if (!$order) {
                $msg = [
                    'status' => 'error',
                    'message' => 'You can only comment on a  order that has been delivered'
                ];

                return response()->json($msg, 400);
            }

            // check if comment already exists
            $check = Comment::where('order_id', $request->order_id)->where('user_id', auth()->user()->id)->first();

            if ($check != null) {
                $msg = [
                    'status' => 'error',
                    'message' => 'You have already commented on this order'
                ];

                return response()->json($msg, 400);
            }
            $comment = new Comment();
            $comment->user_id = auth()->user()->id;
            $comment->comment = $request->body;
            $comment->order_id = $request->order_id;
            $comment->rating = $request->rating;
            $comment->save();

            $msg = [
                'success' => true,
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

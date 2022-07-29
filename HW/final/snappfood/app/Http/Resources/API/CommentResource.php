<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**CommentResource
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $food = [];
        for ($i = 0; $i < $this->menuItems->count(); $i++) {
            $food = [
                'title' =>  $this->menuItems[$i]->item_name,
            ];
        }
        //comment
        $comment = [];
        $score = [];
        for ($i = 0; $i < $this->comments->count(); $i++) {

            $comment = $this->comments[$i]->comment;
            $score = $this->comments[$i]->rating;
        }

        return  [
            'comments' => [
                'author' => [
                    'name' => $this->user->fullName,
                ],
                'foods' => $food,
                'created_at' =>  $this->created_at,
                'score' => $score,
                'comment' => $comment,
            ]
        ];
    }
}

<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // use for cartController method index()

        return [
            'cart' => [
                'id' => $this->id,
                'restaurant' => [
                    'title' => $this->menuItem->restaurant->restaurant_name,
                    'image' => $this->menuItem->restaurant->getFirstMediaUrl() ?? 'NOT FOUND',
                ],
                'menu_item' => [
                    'title' => $this->menuItem->item_name,
                    'quantity' => $this->quantity,
                    'price' => $this->total_price,
                ],
            ],
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray($request){
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "description" => $this->description,
            //'products_count' => $this->when(isset($this->products_count), (int) $this->products_count),
            //'products' => \App\Http\Resources\ProductResource::collection($this->whenLoaded('products')),
            'created_at' => $this->created_at,
        ];
    }

}

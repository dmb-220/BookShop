<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

class ReviewsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'reviews' => $this->reviews,
            'rating' => $this->viewRating($this->rating),
            'created_at' => $this->created_at->format('Y-m-d'),
            'user' => new UserResource($this->user)
        ];
    }
}

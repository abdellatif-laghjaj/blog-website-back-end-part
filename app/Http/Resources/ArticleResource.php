<?php

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
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
            'title' => $this->title,
            'slug' => $this->when($this->slug, $this->slug),
            'category_id' => $this->when($this->category_id, $this->category_id),

            $this->mergeWhen($this->description, function () {
                return [
                    'description' => $this->description,
                    'small_description' => Str::limit(strip_tags($this->description), 80),
                ];
            }),

            'image_url' => $this->imageUrl(),

            $this->mergeWhen($this->created_at, function () {
                return [
                    'created_at_for_human' => $this->created_at->diffForHumans(),
                    'created_date' => $this->created_at->format('M d, Y'),
                ];
            }),
            'category' => new CategoryResource($this->whenLoaded('category')),
        ];
    }
}

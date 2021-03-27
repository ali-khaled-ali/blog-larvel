<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [

            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
             'user' => new UserResource($this->user)
             // [

            //     'user_name'=> $this->user ? $this->user-> name :"no user"
            // ]
        ];  
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CarsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //return parent::toArray($request);
        $this->url_picture !=null ?  $url_picture = env('APP_URL').'/'.$this->url_picture : $url_picture=null;
        return
        [
            'id'=>$this->id,
            'name'=>$this->name,
            'url_picture'=>$this->url_picture

        ];
    }
}

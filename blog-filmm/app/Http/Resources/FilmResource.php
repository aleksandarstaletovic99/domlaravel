<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FilmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public static $wrap = 'film';
    public function toArray($request)
    {
        //return parent::toArray($request);
        return[
            'id'=>$this->resource->id,
            'naziv'=>$this->resource->naziv,
            'budzet'=>$this->resource->budzet,
            'opis'=>$this->resource->opis,
            'godina'=>$this->resource->godina,
            'user'=>new UserResource($this->resource->user),
            'tipfilma'=>new TipFilmaResource($this->resource->tipfilma)
        ];
    }
}

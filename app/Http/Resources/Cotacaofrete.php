<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Cotacaofrete extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'uf' => $this->uf,
            'percentual_cotacao' => $this->percentual_cotacao,
            'valor_extra' => $this->valor_extra,
            'transportadora_id' => $this->transportadora_id
        ];
    }
}

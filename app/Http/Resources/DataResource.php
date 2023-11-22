<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            'ph_air' => $this->ph_air,
            "ph_tanah" => $this->ph_tanah,
            "suhu" => $this->suhu,
            "luas_tanah" => $this->luas_tanah,
            "nama" => $this->desa->title,
            "clus_hasil" => $this->clus_hasil,
        ];
    }
}

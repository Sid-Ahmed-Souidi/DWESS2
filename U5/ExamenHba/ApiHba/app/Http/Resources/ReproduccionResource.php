<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReproduccionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        'tipo' => $this->contenido->tipo,
        'titulo' => $this->contenido->titulo.($this->contenido->tituloC!=null?'-'.$this->contenido->tituloC:''),
        'fechaIR' => $this->fechaIR
        // 'tipo' => $this->contenido->tipo,
        // 'titulo' => $this->contenido->titulo.($this->contenido->tituloC!=null?'-'.$this->contenido->tituloC:''),
        // 'fechaIR' => $this->fechaIR
        ];
        

    }
}

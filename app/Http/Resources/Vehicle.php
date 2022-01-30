<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Vehicle extends JsonResource
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
             
            'data'=>[
                'status'=>'Ok',
                'type'=>'Vehiculo Registrado',
                'vehiculo'=>$this->id,
                'attributes'=>[
                    'nombre'=>$this->nombre,
                    'cedula'=>$this->cedula,
                    'placa'=>$this->placa,
                    'marca'=>$this->marca,
                    'tipo_vehiculo'=>$this->tipo_vehiculo,

         
                ]
            
                        
                    ],
               
               
               ];
    }
}

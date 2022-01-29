<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register_vehicle()
    {
        
        $this->withoutExceptionHandling();
        
        $response = $this->postJson('/api/register',[

            'nombre'=>'oscar fiscal',
            'cedula'=>'32341212',
            'placa'=>'MJX41E',
            'marca'=>'toyota',
            'tipo_vehiculo'=>'Motocicleta',
          
            

        ])->assertStatus(201);

        $this->assertCount(1,Vehicle::all());

        $vehicle = Vehicle::first();


        $this->assertEquals('oscar fiscal',$vehicle->nombre);
        $this->assertEquals('32341212',$vehicle->cedula);
        $this->assertEquals('MJX41E',$vehicle->placa);
        $this->assertEquals('toyota',$vehicle->marca);
        $this->assertEquals('Motocicleta',$vehicle->tipo_vehiculo);
       

        

        $response ->assertJson([
            'data'=>[
                'status'=>'Ok',
                'type'=>'Vehiculo Registrado',
                'vehiculo'=>$vehicle->id,
                'attributes'=>[
                    'nombre'=>$vehicle->nombre,
                    'cedula'=>$vehicle->cedula,
                    'placa'=>$vehicle->placa,
                    'marca'=>$vehicle->marca,
                    'tipo_vehiculo'=>$vehicle->tipo_vehiculo,

         
                ]
            
                        
                    ],
    
]);
}
}

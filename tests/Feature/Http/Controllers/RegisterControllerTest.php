<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;
use App\Models\Vehicle;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RegisterControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_vehicle_type_index()
    {
        $this->withoutExceptionHandling();

     Vehicle::factory()->create();
        
     
     $response=$this->get('/api/vehicle');

     $response->assertOk();
     $vehicle=Vehicle::all(); 
     $response->assertJson([
            'data'=> [
                [
                    'data'=>[
                       'status'=>'Ok',
                        'type'=>'Vehiculo Registrado',
                        'vehiculo'=>$vehicle->first()->id,
                        'attributes'=>[
                            'nombre'=>$vehicle->first()->nombre,
                            'cedula'=>$vehicle->first()->cedula,
                            'placa'=>$vehicle->first()->placa,
                            'marca'=>$vehicle->first()->marca,
                            'tipo_vehiculo'=>$vehicle->first()->tipo_vehiculo,
                            

                        ]
                    ]
                                ]
                            ],
            
        ]);
    }
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

public function test_required_fields_vehicle()
{

    $this->withoutMiddleware();
    $this->json('POST','/api/register', ['Accept' => 'application/json'])
    ->assertStatus(422)
    ->assertJson([
        "message" => "The given data was invalid.",
       "errors" => [
            "nombre"=>["The nombre field is required."],
           "cedula"=>["The cedula field is required."], 
            "placa"=>["The placa field is required."],
            "marca"=>["The marca field is required."],
            "tipo_vehiculo"=>["The tipo vehiculo field is required."],
           
        ]
    ]);
        
            
        }
}

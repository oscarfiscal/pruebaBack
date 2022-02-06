<?php

namespace App\Http\Controllers\api;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\VehicleCollection;
use App\Http\Requests\Vehicle as VehicleRequest;
use App\Http\Resources\Vehicle as VehicleResources;



class VehicleController extends Controller
{


     protected $vehicle;

    public function __construct (Vehicle $vehicle)
    {
        $this->vehicle = $vehicle;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicle = Vehicle::all();
            return new VehicleCollection($vehicle); 
    
    }
    //consulta 
    public function query()
    {
       
        $sql=DB::select('Select  marca,count(*),CONCAT(UPPER(SUBSTRING(marca,1,1)),LOWER(SUBSTRING(marca,2))) AS Marcas from vehicles group by marca HAVING COUNT(*)') ;

        return  ($sql);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VehicleRequest $request)
    {
            // crear un nuevo vehiculo

        $vehicle = $this->vehicle->create($request->all());

        return response()->json(new VehicleResources($vehicle),201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        //
    }
}

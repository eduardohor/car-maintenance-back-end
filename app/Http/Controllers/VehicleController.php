<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateVehicleRequest;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    private $vehicle;

    public function __construct(Vehicle $vehicle)
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
        return $this->vehicle->where('user_id', auth()->user()->id)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateVehicleRequest $request)
    {
        $data = $request->all();

       return $this->vehicle->create($data); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!$vehicle = $this->vehicle->find($id)){
            return response()->json(['msg' => 'Veículo não encontrado'], 404);
        }

        return $vehicle;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateVehicleRequest $request, $id)
    {
        if(!$vehicle = $this->vehicle->find($id)){
            return response()->json(['msg' => 'Veículo não encontrado'], 404);
        }

        $data = $request->all();
        
        $vehicle->update($data);

        return $vehicle;
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$vehicle = $this->vehicle->find($id)){
            return response()->json(['msg' => 'Veículo não encontrado'], 404);
        }

        $vehicle->delete();

        return response()->json(['msg' => 'Veículo excluido com sucesso!']);
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMaintenanceRequest;
use App\Models\Maintenance;
use Illuminate\Http\Request;

class MaintenanceController extends Controller
{
    private $maintenance;

    public function __construct(Maintenance $maintenance)
    {
        $this->maintenance = $maintenance;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->maintenance->where('user_id', auth()->user()->id)->with('vehicle')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMaintenanceRequest $request)
    {
        $data = $request->all();

       return $this->maintenance->create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if(!$maintenance = $this->maintenance->with('vehicle')->find($id)){
            return response()->json(['msg' => 'Manutenção não encontrada'], 404);
       }

       return $maintenance;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$maintenance = $this->maintenance->with('vehicle')->find($id)){
            return response()->json(['msg' => 'Manutenção não encontrada'], 404);
       }

       $data = $request->all();
       $maintenance->update($data);

       return $maintenance;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$maintenance = $this->maintenance->with('vehicle')->find($id)){
            return response()->json(['msg' => 'Manutenção não encontrada'], 404);
       }

       $maintenance->delete();

       return response()->json(['msg' => 'Manutenção deletada com sucesso!']);
    }
}

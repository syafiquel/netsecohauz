<?php

namespace App\Http\Controllers\Carton\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use App\Models\CartonOut;

class CartonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livewire.carton.production.carton');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('carton.edit', ['id' => $id]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function cartonScanStart(Request $request)
    {
        $param = $request->route('uuid');
        $carton = CartonOut::where('uuid', $param)->first();
        // $carton_production = CartonProduction::create([
        //         'carton_id' => $carton->id
        // ]);
        $carton->remark = 'in progress';
        $carton->production_in_at = Carbon::now();
        $carton->save();
        return response()->json($carton);

    }

    public function cartonScanEnd(Request $request)
    {
        $param = $request->route('uuid');
        $carton = CartonOut::where('uuid', $param)->first();
        // $carton_production = CartonProduction::where('carton_id', $carton->id)->first();
        $carton->production_out_at = Carbon::now();
        $carton->remark = 'completed';
        $carton->save();
        return response()->json($carton);

    }

    public function cartonProductionSummary()
    {
        return view('livewire.production.carton');
    }
}

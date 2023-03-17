<?php

namespace App\Http\Controllers\Palette\Production;

use Illuminate\Http\Request;
use App\Models\PaletteOut;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PaletteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('livewire.palette.production.palette');
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
        return view('palette.edit', ['id' => $id]);
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

    public function paletteScanStart(Request $request)
    {
        $param = $request->route('uuid');
        $palette = PaletteOut::where('uuid', $param)->first();
        $palette->production_in_at = Carbon::now();
        $palette->save();
        $palette->batch->status = 'in production';
        $palette->batch->production_start_at = Carbon::now();
        $palette->batch->save();
        // BatchOperation::create([
        //         'batch_id' => $batch->id
        // ]);
        return response()->json($palette);

    }

    public function paletteScanEnd(Request $request)
    {
        $param = $request->route('uuid');
        $palette = PaletteOut::where('uuid', $param)->first();
        $palette->production_out_at = Carbon::now();
        $palette->save();
        $palette->batch->status_out = 'warehouse (post-production)';
        $palette->batch->save();
        // $batch_operation = BatchOperation::where('batch_id', $batch->id)->first();
        // $batch_operation->updated_at = Carbon::now();
        // $batch_operation->save();
        return response()->json($palette);

    }

}

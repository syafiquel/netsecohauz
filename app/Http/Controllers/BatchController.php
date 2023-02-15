<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Batch;
use App\Models\BatchOperation;
use Illuminate\Support\Carbon;

class BatchController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Bypass for temp public access
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('batch.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livewire.batch.batch');
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
        return view('batch.edit', ['id' => $id]);
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

    public function getPreProdAll(Request $request)
    {
        $param = $request->route('option');
        $batches = Batch::select(['name', 'no', 'status', 'image'])->where('status', 'warehouse (pre-production)')->get();
        return response()->json($batches);
    }

    public function batchScanStart(Request $request)
    {
        $param = $request->route('uuid');
        $batch = Batch::where('uuid', $param)->first();
        BatchOperation::create([
                'batch_id' => $batch->id
        ]);
        return response()->json($batch);

    }

    public function batchScanEnd(Request $request)
    {
        $param = $request->route('uuid');
        $batch = Batch::where('uuid', $param)->first();
        $batch_operation = BatchOperation::where('batch_id', $batch->id)->first();
        $batch_operation->updated_at = Carbon::now();
        $batch_operation->save();
        return response()->json($batch);

    }
}

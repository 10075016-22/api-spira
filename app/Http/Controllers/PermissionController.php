<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use App\Models\headerTables;
use App\Models\tables;

use App\Models\actionTable;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->query();

        if( !isset($params['nIdTabla']) ) return response()->json(['message' => 'Información incompleta, se necesita parametro nIdTabla'], 400);

        $tabla = tables::whereId($params['nIdTabla'])->first();
        $headers = headerTables::whereTableId($params['nIdTabla'])->orderBy('order')->get();
        $permission = Permission::get();

        $actions = actionTable::with(['component'])->whereTableId($params['nIdTabla'])->orderBy('order')->get();

        return response()->json([
            'data'  => $permission,
            'tabla' => $tabla,
            'headers' => $headers,
            'actions' => $actions
        ]);
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
        //
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
}

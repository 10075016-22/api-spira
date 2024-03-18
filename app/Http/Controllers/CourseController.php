<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\headerTables;
use App\Models\tables;
use App\Models\actionTable;
use Illuminate\Http\Request;

class CourseController extends Controller
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
        $courses = course::whereStatus(1)->get();
        $actions = actionTable::with(['component'])->whereTableId($params['nIdTabla'])->orderBy('order')->get();
        return response()->json([
            'data'  => $courses,
            'tabla' => $tabla,
            'headers' => $headers,
            'actions' => $actions
        ]);
    }

    public function get() {
        $courses = course::get();
        return response()->json($courses);

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
        try {
            $course = course::create($request->all());
            return response()->json(['message' => 'Curso agregado de forma correcta', 'course' => $course]);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Ha ocurrido un error']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
        //
    }
}

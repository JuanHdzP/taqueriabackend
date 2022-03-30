<?php

namespace App\Http\Controllers\Api;
use App\VentaDetalle;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ApiController;

class ApiventadetalleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $ventadetalles = VentaDetalle::all();
            return $this->showAll($ventadetalles);
  
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
        $ventadetalles = VentaDetalle::create($request->all());
        return $this->showOne($ventadetalles,201);
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
        $ventadetalle = VentaDetalle::findOrfail($id);
        return $this->showOne($ventadetalle);
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
        $ventadetalle = VentaDetalle::findOrfail($id);
        $ventadetalle->update($request->all());
        return $this->showOne($ventadetalle);
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
        $ventadetalle = VentaDetalle::findOrfail($id);
        $ventadetalle->delete();
        return $this->deletedData();
    }
}
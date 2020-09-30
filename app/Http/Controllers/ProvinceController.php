<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelProvinces;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $objProvince;

    public function __construct(){

        $this->objProvince = new ModelProvinces();
    }
    public function index()
    {
        //
        dd($this->objProvince->find(1)->relCity);
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
    public function getcities(Request $request){
        
        if($request->id !='' && $request->id >0){
            $p = $this->objProvince->find($request->id)->relCity;
        
            echo json_encode(['data'=>$p]);
           
        }else{
           $data['data'] = "";
           echo json_encode($data);
        }
    }
}

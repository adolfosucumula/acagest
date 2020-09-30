<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelCountries;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $objCountry;

    public function __construct(){

        $this->objCountry = new ModelCountries();
    }
    public function index()
    {
        //
        
        dd($this->objCountry->find(1)->relProvince);
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
    public function getprovinces(Request $request){
        
        if($request->id !='' && $request->id >0){
            $p = $this->objCountry->find($request->id)->relProvince;
        
            echo json_encode(['data'=>$p]);
           
        }else{
           $data['data'] = "";
           echo json_encode($data);
        }
        
    }
}

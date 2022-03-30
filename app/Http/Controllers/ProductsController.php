<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Products::select('name','price','description')->get();

        // dd($datas);
        return response()->json($data,200);
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
        // $this->validate($request, [
        //     'name'=>'required|min:8',
        //     'price'=>'required|integer',
        //     'description'=>'required|min:8',
        // ]);


        $store = Products::create($request->all());
        if($store){
            return response()->json([
                'Name'=>$request->name,
                'Price'=>$request->price,
                'Description'=>$request->description,
        ],200);
        } 
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
        $data = Products::find($id);
        return response()->json([
                'Name'=>$data->name,
                'Price'=>$data->price,
                'Description'=>$data->description,
        ],200);
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
        $update = Products::updateOrCreate(['id' => $id], $request->all());

        $data = Products::select('name','price','description')->get();

        return response()->json($data,200);
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
        $destroy = Products::find($id);
        $destroy->delete();

        $data = Products::select('name','price','description')->get();

        return response()->json($data,200);
    }
}

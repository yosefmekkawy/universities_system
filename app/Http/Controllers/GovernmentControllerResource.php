<?php

namespace App\Http\Controllers;

use App\Models\governments;
use Illuminate\Http\Request;

class GovernmentControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $data=governments::query()->orderBy('id','DESC')->get();
        $data=governments::query();
        if(request()->filled('name')){
            $data->where('name','like','%'.request()->name.'%');
        }
        if(request()->filled('start_date')){
            $data->where('created_at','like','%'.request()->start_date.'%');
        }
        if(request()->filled('end_date')){
            $data->where('created_at','<=',request()->end_date);
        }
        return $data->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item=governments::query()->find($id);
        if($item)
            return $item;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

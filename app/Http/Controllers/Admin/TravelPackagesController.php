<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\travelPackage;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\TravelPackagesRequest;
use Illuminate\Support\Str;

class TravelPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = travelPackage::all();

        return view('pages.admin.travel-package.index', [
            
                'items'=>$items
        
        ]);

        $data_1 = travelPackage::all();

        return view('pages.home', [
            
            'data_1'=>$data_1
    
        ]);
      
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.travel-package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TravelPackagesRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        travelPackage::create($data);
        return redirect()->route('travel-package.index');

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
        $item = travelPackage::FindOrFail($id);

        return view('pages.admin.travel-package.edit',[
            'item' => $item
        ]);
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
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = travelPackage::FindOrFail($id);
        $item -> update($data);

        return redirect()->route('travel-package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item=travelPackage::FindOrFail($id);
        $item->delete();

        return redirect()->route('travel-package.index');
    }
}

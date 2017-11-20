<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Location;
use Log;

class LocationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all locations
        $locations = Location::orderBy('created_at', 'desc')->paginate(10);       
        return view('locations.index')->with('locations', $locations);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'lat_lng' => 'required'    
        ]);      
        //create loactions
        $location = new Location();
        $location->title = $request->input('title');
        $location->category = $request->input('category');
        $location->description = $request->input('description');
        $location->thumbnail = $request->input('thumbnail');
        $location->lat_lng = $request->input('lat_lng');
        $location->user_id = auth()->user()->id;
        $location->save();        
        return redirect('/locations')->with('success', 'Location Created');
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
        $location = Location::find($id);
        return view('locations.show')->with('location', $location);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //check if the user is editing his post and not others'
        $location = Location::find($id);
        if(auth()->user()->id != $location->user_id){            
            return redirect('/dashboard')->with('error', 'Unauthorized access');
        }         
        return view('locations.edit')->with('location', $location);
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
             //validate
             $this->validate($request, [
                'title' => 'required',
                'category' => 'required',
                'description' => 'required',
                'thumbnail' => 'required',
                'lat_lng' => 'required'    
            ]);      
            //create loactions
            $location = Location::find($id);
            $location->title = $request->input('title');
            $location->category = $request->input('category');
            $location->description = $request->input('description');
            $location->thumbnail = $request->input('thumbnail');
            $location->lat_lng = $request->input('lat_lng');
            $location->save();            
            return redirect('/dashboard')->with('success', 'Location Updated');
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
        $location = Location::find($id);
        $location->delete();
        return redirect('/dashboard')->with('success', 'Deleted Successfully');
    }
}

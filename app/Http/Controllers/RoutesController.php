<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Location;
use App\User;


class RoutesController extends Controller
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
        //all routes
        $routes = Route::orderBy('created_at', 'desc')->paginate(10);       
        return view('routes.index')->with('routes', $routes);       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        return view('routes.create')->with('locations', Location::all());
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
            'locations' => 'required'    
        ]);     

        //create route
        $route = new Route();
        $route->title = $request->input('title');
        $route->category = $request->input('category');
        $route->description = $request->input('description');
        $route->thumbnail = $request->input('thumbnail');
        $route->user_id	= auth()->user()->id;       
        $route->save();     
        
        //also add to location_route
        $route->locations()->sync($request->input('locations'), false);

        return redirect('/dashboard')->with('success', 'Route Created');
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
        $route = Route::find($id);
        return view('routes.show')->with('route', $route);
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
        $data = array(
            'route' => Route::find($id),
            'locations' => Location::all()
        );        
        return view('routes.edit')->with('data', $data);
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
        //validate
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'thumbnail' => 'required',
            'locations' => 'required'    
        ]);     

        //create route
        $route = Route::find($id);
        $route->title = $request->input('title');
        $route->category = $request->input('category');
        $route->description = $request->input('description');
        $route->thumbnail = $request->input('thumbnail');       
        $route->save();     
        
        //also add to location_route
        $route->locations()->sync($request->input('locations'), true);

        return redirect('/dashboard')->with('success', 'Route Updated');
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
        $route = Route::find($id);
        $route->delete();
        return redirect('/dashboard')->with('success', 'Deleted Successfully');
    }
}

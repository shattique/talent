<?php

namespace App\Http\Controllers;

use App\Institution;
use Illuminate\Http\Request;
use Session;
use Validator;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $institutions= Institution::all();

        // load the view and pass the data
        return view('institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('institutions.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create model data

        //save data to database
        //Institution::create(request(['name','location','ins_type']));
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'ins_type' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Institution::create(request(['name','location','ins_type']))) {
            Session::flash('message', 'Institution created successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error creating Institution.');
            Session::flash('alert-class', 'alert-danger');
        }

        //redirect to index page
        return redirect('/admin/institutions');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function show(Institution $institution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $institution = Institution::find($id);

        return view('institutions.edit', compact('institution','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Institution $institution)
    {
        //
        //$institution = Institution::find($id);
        $institution->name = $request->get('name');
        $institution->location = $request->get('location');
        $institution->ins_type = $request->get('ins_type');

        if($institution->save()) {
            Session::flash('message', 'Institution updated successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error updating Institution.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/admin/institutions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Institution  $institution
     * @return \Illuminate\Http\Response
     */
    public function destroy(Institution $institution)
    {
        //
        if( $institution->delete()) {
            Session::flash('message', 'Institution deleted successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error deleting Institution.');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('/admin/institutions');
    }
}

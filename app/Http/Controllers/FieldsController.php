<?php

namespace App\Http\Controllers;

use App\Field;
use Illuminate\Http\Request;
use Session;
use Validator;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fields= Field::all();

        // load the view and pass the data
        return view('fields.index', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('fields.create');

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
        //Field::create(request(['name','location','ins_type']));
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'ins_type' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if(Field::create(request(['name','location','ins_type']))) {
            Session::flash('message', 'Field created successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error creating Field.');
            Session::flash('alert-class', 'alert-danger');
        }

        //redirect to index page
        return redirect('/admin/fields');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $field = Field::find($id);

        return view('fields.edit', compact('field','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        //
        //$field = Field::find($id);
        $field->name = $request->get('name');
        $field->location = $request->get('location');
        $field->ins_type = $request->get('ins_type');

        if($field->save()) {
            Session::flash('message', 'Field updated successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error updating Field.');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect('/admin/fields');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Field $field)
    {
        //
        if( $field->delete()) {
            Session::flash('message', 'Field deleted successfully.');
            Session::flash('alert-class', 'alert-success');
        }
        else{
            Session::flash('message', 'Error deleting Field.');
            Session::flash('alert-class', 'alert-danger');
        }
        return redirect('/admin/fields');
    }
}

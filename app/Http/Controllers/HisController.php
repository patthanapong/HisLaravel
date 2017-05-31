<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\His;

class HisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $his = His::all();
      $data = array(
        'his' => $his
      );
        return view('his.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('his.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'surname' => 'required|max:100',
            'address' => 'required|max:100',
            'department' => 'required|max:100'
        ]);
        $his = new His;
        $his->name = $request->name;
        $his->surname = $request->surname;
        $his->address = $request->address;
        $his->department = $request->department;

        $his->save();
        return redirect('his');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $his = His::find($id);
        $data = array(
          'his' => $his
        );
        return view('his/show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id !== ''){
          $his = His::find($id);
          $data = array(
            'his' => $his
          );
          return view('his/form',$data);
        }
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
      $this->validate($request, [
          'name' => 'required|max:100',
          'surname' => 'required|max:100',
          'address' => 'required|max:100',
          'department' => 'required|max:100'
      ]);
          $his = His::find($id);
          $his->name = $request->name;
          $his->surname = $request->surname;
          $his->address = $request->address;
          $his->department = $request->department;
          $his->save();

          Session::flash('message','Success  edit update');
          return redirect('his');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $his = His::find($id);
      $his->delete();
      Session::flash('message','Success Delete ');
      return redirect('his');
    }
}

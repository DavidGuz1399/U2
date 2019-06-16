<?php

namespace U2\Http\Controllers;
use U2\Role;
use U2\User;
use U2\Hobby;
use Illuminate\Http\Request;
use Auth;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->user()!=null) {
            $request->user()->authorizeRoles(["administrador","usuario"]);
        }else{
            abort(401,'This action is unauthorized');
        }
        $hobbies= Hobby::all();
        return view('hobbies.index',compact('hobbies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if ($request->user()!=null) {
            $request->user()->authorizeRoles("usuario");
        }else{
            abort(401,'This action is unauthorized');
        }
        return view('hobbies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hobby = new Hobby();
        $hobby->name=$request->input('name');
        $hobby->user=Auth::user()->name;
        $hobby->slug=$request->input('name').time();
        $hobby->save();
        return redirect()->route('hobby.index');
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
    public function edit(Hobby $hobby)
    {
        return view('hobbies.edit',compact('hobby'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hobby $hobby)
    {
        $hobby->fill($request->all());
        $hobby->save();
        return redirect()->route('hobby.index');
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
}

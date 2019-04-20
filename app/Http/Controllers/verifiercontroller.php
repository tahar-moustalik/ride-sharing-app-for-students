<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\verifier;
use App\Profils;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
class verifiercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("index");
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
$this->validate($request, [
          'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);
if(Input::hasFile('photo')){
  $id_user = intval(Auth::id());
  $queries = Profils::where('id_user',$id_user)->first();


$verifier= new verifier();
$verifier->id_user = $id_user;
$verifier->id_admin = 1;
$verifier->cin = Input::get('cin');

$file=Input::file('photo');
$name = $queries->nom.'-'.$queries->prenom.'.'.$file->getClientOriginalExtension();
$destinationPath = public_path('/uploadcin');
$file->move($destinationPath, $name);
$verifier->img_cin=$name;


$verifier->save();
}
return view('ver_cin');
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
}

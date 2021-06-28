<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $developers = DB::table('developers')
                        ->join('users','users.id', 'developers.user_id')
                        ->select('developers.*','users.profile_photo_path')               
                        ->get();
    
        // dd($developers);
        return view("developer.index", ['developers'=>$developers]);
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
 
        //obtiene el archivo que se ha subido
        $file=$request->file('curriculum');
        //nombra el archivo con la fecha la hora y la extension
        $name = "pdf_".time().".".$file->guessExtension();
        //asigna la ruta para guardarlo
        $route = public_path("curriculums/".$name);
        //guarda el archivo en la ruta especificada
        copy($file, $route);
             

        $dataDev = new Developer();
        $data = $request->user();
        $dataDev->user_id= $data['id'];
        $dataDev->fullName = $request->get('fullName');
        $dataDev->experience = $request->get('experience');
        $dataDev->about_me = $request->get('about_me');
        $dataDev->country = $request->get('country');
        $dataDev->githubProfile = $request->get('github');
        $dataDev->curriculum = "curriculums/".$name;

        $dataDev->save();
        $developer = Developer::where('user_id', $data['id'])->first();


        return redirect()->route('developerdata',['developer'=>$dataDev]);

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
        
        $developer = Developer::find($id);
        //verifies the fields that has information to update
        
        if($request->file('curriculum')!==null){
            $file=$request->file('curriculum');
            //nombra el archivo con la fecha la hora y la extension
            $name = "pdf_".time().".".$file->guessExtension();
            //asigna la ruta para guardarlo
            $route = public_path("curriculums/".$name);
            //guarda el archivo en la ruta especificada
            copy($file, $route);
            $developer->curriculum = "curriculums/".$name;
        }
        if($request->get('fullName')!== null){
            $developer->fullName = $request->get('fullName');
        }
        if($request->get('experience')!== null){
            $developer->experience = $request->get('experience');
        }
        if($request->get('about_me')!== null){
            $developer->about_me = $request->get('about_me');
        }
        if($request->get('country') !== null){
            $developer->country = $request->get('country');
        }
        if($request->get('github')!== null){
            $developer->githubProfile = $request->get('github');
        }
 
        $developer->save();

        return redirect()->route('developerdata');
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

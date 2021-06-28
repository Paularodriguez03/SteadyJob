<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Tecnology;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //obtiene el id del usuario actual
         $userId = Auth::id();
        //obtiene la lista de tecnologias
        $tecnologies = DB::table('tecnologies')
            ->select('tecnologies.tecno', 'tecnologies.id')
            ->get(); 
         //verifica si el usuario ya tiene sus datos llenos
         $id_developer = DB::table('users')
            ->join('developers', 'users.id', '=', 'developers.user_id')
            ->where('developers.user_id','=',$userId)
            ->select('developers.id')
            ->get();

        if(!empty($id_developer[0]->id)){
            //obtiene las tecnologias del usuario actual
             $userTecno = DB::table('tecnologies')
                 ->join('developer_tecnology', 'tecnologies.id','=','developer_tecnology.tecnology_id')
                 ->where('developer_tecnology.developer_id', '=', $userId)
                 ->select('tecnologies.tecno','developer_tecnology.tecnology_id')
                 ->get();
                 return view('developer.tech', [
                     'userTecno' => $userTecno,
                     'tecnologies' => $tecnologies,
                    ]);
                 }
         else{
             $userTecno="mensaje de error";
                 return view('developer.tech', [
                    'userTecno' => $userTecno,
                    'tecnologies' => $tecnologies,
                 ]);
             };
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
        //obtiene id usuario
        $userId = Auth::user();
        $tec = $request->get('tech');
        $tecno = Tecnology::find($tec);
        // $tecno->developer()->attach($userId);

        // //get
        $TecnoId = DB::table('tecnologies')
            ->where('tecno','=',$tecno->tecno)
            ->select('id')
            ->get()
            ;


        // // //inserts the data in table
        $msg = NULL;

        // $ExistTecnology = DB::table('developer_tecnology')
        // ->where('tecnology_id','=',$TecnoId[0]->id ,'and')->where('developer_id','=',$userId->id)
        // ->select("id")
        // ->get();

        // echo $ExistTecnology;

        // if(sizeof($ExistTecnology)==1){
        //     $msg = "Ya agregaste esta tecnologia";
        //    return redirect()->action([TecnologyController::class, 'index']);
        // }
        // else{
        //     DB::table('developer_tecnology')->insert([
        //                  'tecnology_id' => $TecnoId[0]->id,
        //                  'developer_id' => $userId->id,
        //              ]);

        //     return redirect()->action([TecnologyController::class, 'index']);

        // }

        try{
            DB::table('developer_tecnology')->insert([
                'tecnology_id' => $TecnoId[0]->id,
                'developer_id' => $userId->id,
            ]);
        }

        catch(\Exception $e){
            throw $e;
            $msg ="ya agregaste esa tecnologia";
        
        }
        finally{
            return redirect()->action([TecnologyController::class, 'index']);
        }


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
        DB::table('developer_tecnology')
            ->where('tecnology_id', '=', $id)
            ->where('developer_id','=',Auth::id() )
            ->delete();

        return redirect()->action([TecnologyController::class, 'index']);
    }
}

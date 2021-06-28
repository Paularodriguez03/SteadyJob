<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Skill;

class SkillController extends Controller
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
        //verifica si el usuario ya tiene sus datos llenos
        $id_developer = DB::table('users')
        ->join('developers', 'users.id', '=', 'developers.user_id')
        ->where('developers.user_id','=',$userId)
        ->select('developers.id')
        ->get();
        if(!empty($id_developer[0]->id)){
                    //obtiene las habilidades del usuario actual
            $userSkills = DB::table('skills')
                ->join('developer_skill', 'skills.id','=','developer_skill.skill_id')
                ->where('developer_skill.developer_id', '=', $userId)
                ->select('skills.skillName', 'developer_skill.skill_id')
                ->get();
                return view('developer.skills', [
                    'userSkills' => $userSkills]);
                }
        else{
            $userSkills="mensaje de error";
                return view('developer.skills', [
                'userSkills' => $userSkills]);
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
        //obtiene el string con las habilidades seleccionadas y lo convierte en una lista
        if($request->get('userSkills')!= null){
        $userSkills = explode(',',$request->get('userSkills'));
        //guarda cada uno de los skills en la base de datos
        $userId = Auth::id();
        foreach($userSkills as $skill){    
            $skill = Skill::find($skill);
            $skill-> developers()->attach($userId);
        }}
        return redirect()->action([SkillController::class, 'index']);
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $skills = Skill::whereNotIn('id', function ($query) {
            $query->select('skill_id')
                ->from('developer_skill')
                ->where('developer_id','=',Auth::id());
        })->get();
        return view('developer.editSkill', ['skills' => $skills]);
       
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
        DB::table('developer_skill')
            ->where('skill_id', '=', $id)
            ->where('developer_id','=',Auth::id() )
            ->delete();

        return redirect()->action([SkillController::class, 'index']);
    }
}

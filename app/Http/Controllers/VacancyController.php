<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;
use App\Models\Vacancy;
use App\Models\Tecnology;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=$request->user();


        $id_recrutier = DB::table('users')
        ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
        ->where('recruiters.user_id','=',$data['id'])
        ->select('recruiters.id')
        ->get();
        if(!empty($id_recrutier[0]->id)){
            $vacantes = DB::table('vacancies')
            ->join('recruiters', 'vacancies.recrutier_id', '=', 'recruiters.id')
            ->where('recrutier_id','=',$id_recrutier[0]->id)
            ->select('vacancies.*')
            ->get();

            return view('Vacancy.index', ['vacantes' => $vacantes]);
        }
        else{
            $vacantes="mensaje de error";
            return view('Vacancy.index', ['vacantes' => $vacantes]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tecnologies = DB::table('tecnologies')
        ->select('tecnologies.tecno', 'tecnologies.id')
        ->get();
        return view('Vacancy.create', ['tecnologies'=>$tecnologies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->user();

        $id_recrutier = DB::table('users')
        ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
        ->where('recruiters.user_id','=',$data['id'])
        ->select('recruiters.id')
        ->get();


        $new_vacancy = new Vacancy();
        $new_vacancy->recrutier_id= $id_recrutier[0]->id;
        $new_vacancy->Title= $request->get('title');
        $new_vacancy->ExperienceRequire= $request->get('experience');
        $new_vacancy->Salary= $request->get('salary');
        $new_vacancy->Location= $request->get('location');
        $new_vacancy->currency= $request->get('currency');
        $new_vacancy->DescriptionVacancy= $request->get('descriptionjob');
        $new_vacancy->state= $request->get('state');

        $new_vacancy->save();
        $userTecno = explode(',',$request->get('userTecno'));

        $vacancy_id =  Vacancy::select("id")->latest()->first();

        $this->Addtecnologies($userTecno, $vacancy_id);

        return redirect('/vacante');
    }


    public function Addtecnologies($userTecno, $vacancy_id){
               // tecnologies require
               foreach($userTecno as $tecno){
                   $tecno = Tecnology::find($tecno);
                   $tecno-> vacancy()->attach($vacancy_id);
               }
    }

    public function Deletetecnologies($userTecno, $vacancy_id){
        // tecnologies require
        foreach($userTecno as $tecno){
            $tecno = Tecnology::find($tecno->id);
            $tecno-> vacancy()->detach($vacancy_id);
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

        $tecnologies = DB::table('tecnologies')
        ->select('tecnologies.tecno', 'tecnologies.id')
        ->get();

        $vacante= Vacancy::find($id);

            $userTecno = DB::table('tecnologies')
             ->join('tecnology_vacancy', 'tecnologies.id','=','tecnology_vacancy.tecnology_id')
             ->where('tecnology_vacancy.vacancy_id', '=', $id)
                ->select('tecnologies.tecno', 'tecnologies.id')
                ->get();


        return view('Vacancy.edit',['vacante'=>$vacante, 'userTecno'=>$userTecno , 'tecnologies'=>$tecnologies]);

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
        $update_vacancy = Vacancy::find($id);
        $update_vacancy->Title= $request->get('title');
        $update_vacancy->ExperienceRequire= $request->get('experience');
        $update_vacancy->Salary= $request->get('salary');
        $update_vacancy->Location= $request->get('location');
        $update_vacancy->currency= $request->get('currency');
        $update_vacancy->DescriptionVacancy= $request->get('descriptionjob');
        $update_vacancy->state= $request->get('state');
        $update_vacancy->save();


        $userTecno = DB::table('tecnologies')
        ->join('tecnology_vacancy', 'tecnologies.id','=','tecnology_vacancy.tecnology_id')
        ->where('tecnology_vacancy.vacancy_id', '=', $id)
           ->select('tecnologies.id')
           ->get();

        $this->Deletetecnologies($userTecno, $id);
        $userTecnoUp = explode(',',$request->get('userTecno_up'));
        $this->Addtecnologies($userTecnoUp, $id);

        return redirect('/vacante');
    }


    public function UserTecnologies(){

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        var_dump($id) ;
        $vacancy = Vacancy::find($id);
        $vacancy->delete();

        return redirect('/vacante');
    }


}

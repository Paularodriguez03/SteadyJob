<?php

namespace App\Http\Controllers;
use App\Models\Developer;
use App\Models\Vacancy;
use App\Models\Tecnology;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


class JobDevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {     
        $jobsDevs =DB::table('users')
        ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
        ->join('vacancies', 'recruiters.id', '=', 'vacancies.recrutier_id')
        ->where('state','=',1)
        ->orderBy('vacancies.created_at', 'DESC')
        ->select('users.*', 'recruiters.*','vacancies.*')
        ->get();
        return view("jobDev.index", ['jobsDevs'=>$jobsDevs]);
    }




    public function jobdetail($title, $id)
    {  

        $vacancy =DB::table('users')
        ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
        ->join('vacancies', 'recruiters.id', '=', 'vacancies.recrutier_id')
        ->where('vacancies.id','=',$id)
        ->select('users.*', 'recruiters.*','vacancies.*')
        ->get();

        $userTecno = DB::table('tecnologies')
        ->join('tecnology_vacancy', 'tecnologies.id','=','tecnology_vacancy.tecnology_id')
        ->where('tecnology_vacancy.vacancy_id', '=', $id)
           ->select('tecnologies.tecno')
           ->get();

        
        return view("jobDev.details", ['userTecno'=>$userTecno, 'vacancy'=>$vacancy]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

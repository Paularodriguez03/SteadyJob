<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacancy;
use App\Models\Developer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;



class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $id_developer = DB::table('users')
        ->join('developers', 'users.id', '=', 'developers.user_id')
        ->where('developers.user_id','=',$userId)
        ->select('developers.id')
        ->get();
        if(!empty($id_developer[0]->id)){
            //get actual user applications
            $userApplication = DB::table('vacancies')
                ->join('developer_vacancy', 'vacancies.id','=','developer_vacancy.vacancy_id')
                ->where('developer_vacancy.developer_id', '=', $userId)
                ->join('recruiters', 'vacancies.recrutier_id', 'recruiters.id')
                ->join('users','recruiters.user_id','=','users.id')
                ->where('state','=',1)
                ->get();
        }
        else{
            $userApplication="mensaje de error";
            };

        
        return view('developer.applications', ['userApplication' => $userApplication]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //saves the application
        //obtiene el id del usuario actual
        $userId = Auth::id();
        $vacancyId =  $request->get('vacancy_id');
        $vacancy = Vacancy::find($vacancyId);
        $developer = Developer::where('user_id',$userId)->first();

        if($developer == null){
            return redirect()->route('developerdata',['developer'=>$developer]);
        }
        //verifies if the user has applied to the vancacy 
        $applicationOnDb = DB::table('developer_vacancy')
        ->where('developer_vacancy.vacancy_id', $vacancyId)
        ->where('developer_vacancy.developer_id',$userId)
        ->first();

        if($applicationOnDb == null){
            $vacancy->developers()->attach($userId);
        }
        return redirect()->action([ApplicationController::class, 'index']);

    }

    /**
     * Remove the specified resource from storage.
     *
     ** @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //obtiene el id del usuario actual
        $userId = Auth::id();
        $application = DB::table('developer_vacancy')
                        ->where('developer_vacancy.developer_id', $userId)
                        ->where('developer_vacancy.vacancy_id', $id)
                        ->delete();
        return redirect()->action([ApplicationController::class, 'index']);
    }
}
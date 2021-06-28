<?php

namespace App\Http\Controllers;
use App\Models\Developer;
use App\Models\Vacancy;
use App\Models\Tecnology;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DeveloperController;



class PageController extends Controller
{
    public  function home(){
        return view("welcome");
    }

    public function nosotros(){
        return view('nosotros');
    }

    public function vacantes(){
        return view('vacantes');
    }

    public function habilidades(){
        return view('habilidades');
    }

    public function empresas(){
        return view('empresas');
    }

    public function paraEmpresas(){
        return view('paraEmpresas');
    }
    
    public function logros(){
        return view('logros');
    }

    public function companydata(){
        return view('companydate');
    }

    public function developerdata(){
        $id = Auth::id();
        $developer = $developer = Developer::where('user_id', $id)->first();
        // dd($developer);
        return view('developer.developerData', [
            'developer' => $developer]);
    }

    public function editDeveloper(){
        $id = Auth::id();
        $developer = $developer = Developer::where('user_id', $id)->first();
        // dd($developer);
        return view('developer.editDeveloper', [
            'developer' => $developer]);
    }

    public function vacancy(Vacancy $vacancy){

        $userTecno = DB::table('tecnologies')
        ->join('tecnology_vacancy', 'tecnologies.id','=','tecnology_vacancy.tecnology_id')
        ->where('tecnology_vacancy.vacancy_id', '=', $vacancy->id)
           ->select('tecnologies.tecno')
           ->get();
        return view("vacancy", ['vacancy'=>$vacancy , 'userTecno'=>$userTecno]);
    }

    public function getCandidates($id){

        $developers = DB::table('developers')
        ->join('developer_vacancy', 'developers.user_id','=','developer_vacancy.developer_id')
        ->where('developer_vacancy.vacancy_id', '=', $id)
        ->get();
        return view("Vacancy.candidatos", ['candidates'=>$developers]);
    }


}

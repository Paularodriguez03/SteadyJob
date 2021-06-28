<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $education = array(
            "Administración y Negocios",
            "Arquitectura",
            "Artes Visuales",
            "Ciencia",
            "Ciencias Ambientales",
            "Ciencias de la Salud",
            "Ciencias Económicas",
            "Ciencias Políticas",
            "Ciencias Sociales",
            "Comunicación Social",
            "Derecho",
            "Diseño Gráfico",
            "Diseño Industrial",
            "Diseño UI/UX",
            "Ingeniería Civil",
            "Ingeniería Eléctrica",
            "Ingeniería Electrónica",
            "Ingeniería Industrial",
            "Ingeniería Mecánica",
            "Ingeniería Mecatrónica",
            "Ingeniería Química",
            "Ingeniería Sistemas",
            "Marketing y Públicidad",
            "Otra",
            "Profesional en ventas",
            "Psícología"
        );
        $level =array(
            "Sin estudios",
            "Bachiller",
            "Técnico ó Tecnologo",
            "Carrera tecnológica",
            "Profesional",
            "Especialización",
            "Maestría",
            "Doctorado"
        ) ;
         //obtiene el id del usuario actual
         $userId = Auth::id();
         //verifica si el usuario ya tiene sus datos llenos
         $id_developer = DB::table('users')
         ->join('developers', 'users.id', '=', 'developers.user_id')
         ->where('developers.user_id','=',$userId)
         ->select('developers.id')
         ->get();
         if(!empty($id_developer[0]->id)){
            //obtiene la educacion del usuario actual
             $userEducation = DB::table('education')
                 ->join('developer_education', 'education.id','=','developer_education.education_id')
                 ->where('developer_education.developer_id', '=', $userId)
                 ->select('education.nameEducation', 'education.level','developer_education.education_id')
                 ->get();
                 return view('developer.education', [
                     'userEducation' => $userEducation,
                     'education' => $education,
                    'level' => $level]);
                 }
         else{
             $userEducation="mensaje de error";
                 return view('developer.education', [
                    'userEducation' => $userEducation,
                    'education' => $education,
                    'level' => $level,
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
        $userId = Auth::id();
        $career = $request->get('career');
        $level = $request->get('level');
        //get
        $educationId = DB::table('education')
            ->where('education.nameEducation','=',$career)
            ->where('education.level',"=",$level)
            ->select('education.id')
            ->get()
            ;
        //inserts the data in table
        $msg = NULL;
        try{
            DB::table('developer_education')->insert([
                'education_id' => $educationId[0]->id,
                'developer_id' => $userId,
            ]);
        }
        catch(Exception $e){
            throw $e;
            $msg = "no puedes agregar dos veces la misma carrera";
        }
        finally{
            return redirect()->action([EducationController::class, 'index']); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $education = array(
            "Administración y Negocios",
            "Arquitectura",
            "Artes Visuales",
            "Ciencia",
            "Ciencias Ambientales",
            "Ciencias de la Salud",
            "Ciencias Económicas",
            "Ciencias Políticas",
            "Ciencias Sociales",
            "Comunicación Social",
            "Derecho",
            "Diseño Gráfico",
            "Diseño Industrial",
            "Diseño UI/UX",
            "Ingeniería Civil",
            "Ingeniería Eléctrica",
            "Ingeniería Electrónica",
            "Ingeniería Industrial",
            "Ingeniería Mecánica",
            "Ingeniería Mecatrónica",
            "Ingeniería Química",
            "Ingeniería Sistemas",
            "Marketing y Públicidad",
            "Otra",
            "Profesional en ventas",
            "Psícología"
        );
        $level =array(
            "Sin estudios",
            "Bachiller",
            "Técnico ó Tecnologo",
            "Carrera tecnológica",
            "Profesional",
            "Especialización",
            "Maestría",
            "Doctorado"
        ) ;

        return view('developer.education',[
            'education' => $education,
            'level' => $level,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {  
        //obtiene los campos de la tabla education
        $education = DB::table('education')->get();

        return view('developer.education',[
            'education' => $education
        ]);
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
        DB::table('developer_education')
            ->where('education_id', '=', $id)
            ->where('developer_id','=',Auth::id() )
            ->delete();

        return redirect()->action([EducationController::class, 'index']);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FilterController extends Controller
{

            public function filterby(Request $request){
                $searchby = $request->get("searchby");
                $jobsDevs =DB::table('users')
                ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
                ->join('vacancies', 'recruiters.id', '=', 'vacancies.recrutier_id')
                ->where('state','=',1)
                ->where('Title','like','%'.$searchby.'%')
                ->orwhere('NameCompany','like','%'.$searchby.'%') 
                ->orderBy('vacancies.created_at', 'DESC')
                ->select('users.*', 'recruiters.*','vacancies.*')
                ->get();
                return view("jobDev.index", ['jobsDevs'=>$jobsDevs]);
            }

    }

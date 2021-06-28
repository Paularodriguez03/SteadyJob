<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recruiter;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class RecruiterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data=$request->user();
        $users = DB::table('users')
            ->join('recruiters', 'users.id', '=', 'recruiters.user_id')
            ->select('recruiters.*')
            ->where('recruiters.user_id','=' ,$data['id'])
            ->get();

            
            return view("Recruiter.companydate", ['users'=> $users]);
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

        $data=$request->user();
        $datacompany = new Recruiter();
        $datacompany->user_id =$data['id'];
        $datacompany->NameCompany = $request->get('namecompany');
        $datacompany->DescriptionCompany = $request->get('descripcion');
        $datacompany->WebsiteCompany = $request->get('website');
        $datacompany->idCompany = $request->get('nitcompany');

        $datacompany->save();

        return redirect('companydata');
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
        $update_users = Recruiter::find($id);
        $update_users->NameCompany= $request->get('namecompany');
        $update_users->DescriptionCompany= $request->get('descripcion');
        $update_users->WebsiteCompany= $request->get('website');
        $update_users->idCompany= $request->get('nitcompany');

        $update_users->save();
        return redirect('/companydata');
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

    public function board()
    {
        return view ('board');
    }
}

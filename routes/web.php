<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\JobDevController;
use App\Http\Controllers\TecnologyController;
use App\Http\Controllers\FilterController;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\CandidateController;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/vacantes/{vacancy:Title}', [PageController::class, 'vacancy'])->name('vacancy');

Route::get('/jobsdetails/{jobdetail:Title}/{id:id}', [JobDevController::class, 'jobdetail'])->name('jobdetail');

Route::resource('vacante', VacancyController::class);

Route::get('/', [PageController::class, 'home'])->name('home');

Route::resource('/ofertas', JobDevController::class);

Route::get('/ofert/filterBy', [FilterController::class,'filterby'])->name('filterby');

Route::get('/nosotros', [PageController::class, 'nosotros'])->name('nosotros');

Route::get('/vacantes', [PageController::class, 'vacantes'])->name('vacantes');

Route::get('/habilidades', [PageController::class, 'habilidades'])->name('habilidades');

Route::get('/empresas', [PageController::class, 'empresas'])->name('empresas');

Route::get('/paraEmpresas', [PageController::class, 'paraEmpresas'])->name('paraEmpresas');

Route::get('/logros', [PageController::class, 'logros'])->name('logros');

Route::resource('companydata', RecruiterController::class);

Route::get('/developerdata', [PageController::class, 'developerdata'])->name('developerdata');

Route::resource('skills', SkillController::class);

Route::resource('recruiter', RecruiterController::class);

Route::resource('developer', DeveloperController::class);

Route::resource('education', EducationController::class);

Route::resource('tecnologies', TecnologyController::class);

Route::resource('applications', ApplicationController::class);

//Route::resource('candidates', CandidateController::class);

Route::get('/board', [RecruiterController::class, 'board'])->name('board');

Route::get('/editDeveloper', [PageController::class, 'editDeveloper'])->name('editdeveloper');

Route::get('/candidates/{id:id}', [PageController::class, 'getCandidates'])->name('candidates');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



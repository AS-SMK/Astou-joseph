<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/ipp', function () {
    //return view('welcome');

    //creation Eloquent
   /*

    //List all
    /*$categories = \App\Models\Categorie::all();
    foreach ($categories as $c){
        echo $c->id . " ". $c->libelle;
    }*/

    //find by id
    /*$categorie = \App\Models\Categorie::find(1);
    echo $categorie->id . " ". $categorie->libelle;*/

    //suppression
    /*$categorie = \App\Models\Categorie::find(1);
    $categorie->delete();*/

    //Mettre à jour
   // $categorie = \App\Models\Categorie::find(2);
    //$categorie->libelle = "Aliment";
    //$categorie->save();

});



Route::get('/medecin',[\App\Http\Controllers\MedecinController::class,'index'])->name('medecin');;
Route::get('/addMedecin',[\App\Http\Controllers\MedecinController::class,'create'])->name('addMedecin');
//Route::post('/saveMedecin',[\App\Http\Controllers\MedecinController::class,'store'])->name('saveMedecin');
//Route::delete('/deleteMedecin/{id}',[\App\Http\Controllers\MedecinController::class,'destroy'])->name('deleteMedecin');;
//Route::get('/editMedecin/{id}',[\App\Http\Controllers\MedecinController::class,'edit'])->name('editMedecin');
//Route::put('/updateMedecin/{id}',[\App\Http\Controllers\MedecinController::class,'update'])->name('updateMedecin');
Route::post('/saveMedecin', [MedecinController::class, 'store'])->name('medecins.store');
Route::put('/updateMedecin/{id}', [MedecinController::class, 'update'])->name('medecins.update');

Route::delete('/deleteMedecin/{id}', [MedecinController::class, 'destroy'])->name('medecins.destroy');
Route::get('/editMedecin/{id}', [MedecinController::class, 'edit'])->name('medecins.edit');


Route::get('/patient',[\App\Http\Controllers\PatientController::class,'index'])->name('patient');;
Route::get('/addPatient',[\App\Http\Controllers\PatientController::class,'create'])->name('addPatient');
Route::post('/savePatient',[\App\Http\Controllers\PatientController::class,'store'])->name('savePatient');
Route::delete('/deletePatient/{id}',[\App\Http\Controllers\PatientController::class,'destroy'])->name('deletePatient');;
Route::get('/editPatient/{id}',[\App\Http\Controllers\PatientController::class,'edit'])->name('editPatient');
Route::put('/updatePatient/{id}',[\App\Http\Controllers\PatientController::class,'update'])->name('updatePatient');


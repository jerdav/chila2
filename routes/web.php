<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    $agent = new \Jenssegers\Agent\Agent;
    $result = $agent->isMobile();

    if($result)
        return view('welcome-mobile');
    else
        return view('auth.login');
});

Auth::routes();

Route::group(['prefix'=>'admin', 'middleware' =>['admin', 'auth'], 'namespace'=>'admin'], function(){

    Route::get('tableau-de-bord', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('fiche-travail', [App\Http\Controllers\Admin\AdminController::class, 'ficheTravail'])->name('admin.travail');
    Route::post('fiche-travail/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateTravail'])->name('updateTravail');

    Route::get('fiche-atelier', [App\Http\Controllers\Admin\AdminController::class, 'ficheAtelier'])->name('admin.atelier');
    Route::post('fiche-atelier/{id}', [App\Http\Controllers\Admin\AdminController::class, 'updateAtelier'])->name('updateAtelier');

    Route::get('defauts-tracteur', [App\Http\Controllers\Admin\AdminController::class, 'defaut_tract'])->name('admin.defaut-tract');
    Route::post('defauts-tracteur/{id}', [App\Http\Controllers\Admin\AdminController::class, 'saveDefautTract'])->name('admin.save-defaut-tract');

    Route::get('defauts-remorque', [App\Http\Controllers\Admin\AdminController::class, 'defaut_remor'])->name('admin.defaut-remor');
    Route::post('defauts-remorque/{id}', [App\Http\Controllers\Admin\AdminController::class, 'saveDefautRemor'])->name('admin.save-defaut-remor');

    Route::get('tableau-administrateur', [App\Http\Controllers\Admin\AdminController::class, 'tab_admin'])->name('admin.tab-admin');

    Route::get('tableau-tracteur', [App\Http\Controllers\Admin\AdminController::class, 'tab_tract'])->name('admin.tab-tract');
    Route::get('tableau-remorque', [App\Http\Controllers\Admin\AdminController::class, 'tab_remor'])->name('admin.tab-remor');

    Route::get('creation-admin', [App\Http\Controllers\Admin\CreaAdminController::class, 'create'])->name('crea-admin');

    Route::get('tableau-chauffeur', [App\Http\Controllers\Admin\AdminController::class, 'tab_chauf'])->name('admin.tab-chauf');
    Route::get('creation-chauf', [App\Http\Controllers\Admin\CreaChauffeurController::class, 'create'])->name('crea-chauf');
    Route::post('creation-chauf', [App\Http\Controllers\Admin\CreaChauffeurController::class, 'store'])->name('store-chauf');
    Route::get('editer-chauf/{id}', [App\Http\Controllers\Admin\CreaChauffeurController::class, 'edit'])->name('edit-chauf');
    Route::post('editer-chauf/{id}', [App\Http\Controllers\Admin\CreaChaufController::class, 'update'])->name('update-chauf');
    Route::post('supprimer-chauf/{id}', [App\Http\Controllers\Admin\CreaChauffeurController::class, 'destroy'])->name('delete-chauf');


    Route::get('creation-tracteur', [App\Http\Controllers\Admin\CreaTractController::class, 'create'])->name('crea-tract');
    Route::get('editer-tracteur/{id}', [App\Http\Controllers\Admin\CreaTractController::class, 'edit'])->name('edit-tract');
    Route::post('editer-tracteur/{id}', [App\Http\Controllers\Admin\CreaTractController::class, 'update'])->name('update-tract');
    Route::post('supprimer-tracteur/{id}', [App\Http\Controllers\Admin\CreaTractController::class, 'destroy'])->name('delete-tract');

    Route::get('creation-remorque', [App\Http\Controllers\Admin\CreaRemorController::class, 'create'])->name('crea-remor');
    Route::get('editer-remorque/{id}', [App\Http\Controllers\Admin\CreaRemorController::class, 'edit'])->name('edit-remor');
    Route::post('editer-remorque/{id}', [App\Http\Controllers\Admin\CreaRemorController::class, 'update'])->name('update-remor');
    Route::post('supprimer-remorque/{id}', [App\Http\Controllers\Admin\CreaRemorController::class, 'destroy'])->name('delete-remor');
});



Route::group([ 'middleware' =>['chauffeur', 'auth'], 'namespace'=>'chauffeur'], function(){

    Route::get('accueil', [App\Http\Controllers\Mobile\AccueilController::class, 'index'])->name('mobile.accueil');
    Route::get('base-mobile',function(){
        Toastr::success('message', 'title', ["positionClass" => "toast-top-center"]);
    });

    Route::get('atelier', [App\Http\Controllers\Mobile\AtelierController::class, 'index'])->name('mobile.atelier');
    Route::post('atelier', [App\Http\Controllers\Mobile\AtelierController::class, 'store'])->name('save.atelier');

    Route::get('validation',[App\Http\Controllers\Mobile\AtelierController::class, 'showvalidation'])->name('mobile.validation');
    Route::post('validation',[App\Http\Controllers\Mobile\AtelierController::class, 'storevalidation'])->name('mobile.storevalidation');

    Route::get('travail2', [App\Http\Controllers\Mobile\TravailController::class, 'index'])->name('mobile.travail');
    Route::post('travail2', [App\Http\Controllers\Mobile\TravailController::class, 'store'])->name('save.travail');

    Route::get('vehicule', [App\Http\Controllers\Mobile\VehiculeController::class, 'index'])->name('mobile.vehicule');

    Route::post('autocompletetractdefaut', [App\Http\Controllers\Mobile\VehiculeController::class, 'autocompleteTractDefaut'])->name('autocompletetractdefaut');
    Route::post('vehicule/tracteur', [App\Http\Controllers\Mobile\VehiculeController::class, 'storeTract'])->name('tracteur.defaut');


    Route::post('autocompleteremordefaut', [App\Http\Controllers\Mobile\VehiculeController::class, 'autocompleteRemorDefaut'])->name('autocompleteremordefaut');
    Route::post('vehicule/remorque', [App\Http\Controllers\Mobile\VehiculeController::class, 'storeRemor'])->name('remorque.defaut');

    Route::post('autocompletetracttravail', [App\Http\Controllers\Mobile\TravailController::class, 'autocompleteTractTravail'])->name('autocompletetracttravail');
    Route::post('autocompleteremortravail', [App\Http\Controllers\Mobile\TravailController::class, 'autocompleteRemorTravail'])->name('autocompleteremortravail');


    /*    Route::post('dashboard/tracteur', [App\Http\Controllers\Chauffeur\TracteurDefautController::class, 'store'])->name('defaut.tracteur');
        Route::post('dashboard/remorque', [App\Http\Controllers\Chauffeur\RemorqueDefautController::class, 'store'])->name('remorque.defaut');

        Route::post('dashboard/travail', [FicheTravailController::class, 'storeFc'])->name('save.travail'); */


    //Route::get('dashboard1', [App\Http\Controllers\Chauffeur\ChauffeurController::class, 'page1'])->name('chauffeur.dashboard1');
    //Route::get('dashboard2', [App\Http\Controllers\Chauffeur\ChauffeurController::class, 'page2'])->name('chauffeur.dashboard2');

});

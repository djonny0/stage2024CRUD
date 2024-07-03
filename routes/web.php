<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\AuthController;
use Illuminate\Routing\Route as RoutingRoute;

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

Route::get('/',  [CategorieController::class, 'accueil'])->name('accueil');

//CATEGORIE
//route permettant d'accéder au formulaire de catégorie
Route::get('form_categ', [CategorieController::class, 'form_categ'])->name('formcategorie')->middleware('auth');
//route permettant de traiter le formulaire de catégorie
Route::post('form_categ_traitement', [CategorieController::class, 'form_categ_traitement'])->name('form_categ_traitement')->middleware('auth');
//route permettant d'afficher le formulaire de modification de categorie
Route::get('modifier/categorie/{id}', [CategorieController::class, 'modifier_categorie'])->name('modifier_categorie')->middleware('auth');
//route permettant de traiter le formulaire de mise à jour de categorie
Route::post('update/categorie/{id}', [CategorieController::class, 'update_categorie'])->name('update_categorie')->middleware('auth');
//route permettant de supprimer la catégorie
Route::get('delete/categorie/{id}',  [CategorieController::class, 'delete_categorie'])->name('delete_categorie')->middleware('auth');



//PRODUIT
//route permettant d'accéder au formulaire de produit
Route::get('form_prod', [ProduitController::class, 'accueil'])->name('form_prod')->middleware('auth');
//route permettant de traiter le formulaire de produit
Route::post('form_prod_traitement', [ProduitController::class, 'form_prod_traitement'])->name('form_prod_traitement')->middleware('auth');
//route permettant d'afficher le formulaire de modification de produit
Route::get('modifier/produit/{id}', [ProduitController::class, 'modifier_produit'])->name('modifier_produit')->middleware('auth');
//route permettant de traiter le formulaire de mise à jour de produit
Route::post('update/produit/{id}', [ProduitController::class, 'update_produit'])->name('update_produit')->middleware('auth');
//route permettant de supprimer la catégorie
Route::get('delete/produit/{id}',  [ProduitController::class, 'delete_produit'])->name('delete_produit')->middleware('auth');
//route permettant de voir le produit
Route::get('view/product/{id}',  [ProduitController::class, 'view_product'])->name('view_product')->middleware(['admin']);


//REGISTER
//route permettant d'afficher le formulaire d'inscription
Route::get('register', [AuthController::class, 'showregister'])->name('showregister');
//route permettant d'envoyer le formulaire d'inscription
Route::post('registeruser', [AuthController::class, 'registeruser'])->name('registeruser');
//route permettant d'afficher le formulaire de connexion
Route::get('showlogin', [AuthController::class, 'showlogin'])->name('showlogin');
//route permettant d'envoyer le formulaire de connexion
Route::post('loginuser', [AuthController::class, 'loginuser'])->name('loginuser');
//route permettant la déconnexion
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

//Une manière de regrouper les routes protégées
// Route::group(['middleware' => ['auth']], function () {
    // Vos routes protégées ici
// });

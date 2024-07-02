<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;

class CategorieController extends Controller
{
    //fonction permettant de récuprer les données de la table catégorie et de les injecter sur la page de accueil
    function accueil()
    {
        $produits = Produit::with('categorie')->get();
        $categories = Categorie::with('produits')->get();
        return view('accueil', ['categorie' => $categories, 'produits' =>$produits]);
    }


    //fonction permettant de traiter le formulaire de categorie
    function form_categ_traitement(Request $request){

        $credentials = $request->validate([
        'nom' => 'required|string|min:4',
        ]);

        Categorie::Create([
        'nom_catid' => $request->nom
        ]);

        return redirect()->route('accueil')->with('succès', 'La catégorie a été ajoutée avec succès');

    }

    //function permettant d'afficher le formulaire de modification de categorie
    function modifier_categorie($id)
    {
        $categories = Categorie::find($id);
        return view('modifier_categorie', compact('categories'));
    }

    //function permettant de traiter le formulaire de modification de categorie
    function update_categorie(Request $request,$id)
    {
        $credentials = $request->validate
        ([
            'nom' => 'required|string|min:4',
        ]);

        $category = Categorie::findOrFail($id);

        //dd($category);

        $category->nom_catid = $request->nom;

        $category->save();

        return redirect()->route('accueil')->with('succès', 'La catégorie a été modifiée avec succès');



    }

    //fonction permettant de supprimer une categorie
    public function delete_categorie($id)
    {
        Categorie::findOrFail($id)->delete();
        return redirect()->route('accueil')->with('delete', 'La catégorie a été suprimée avec succès');
    }





}

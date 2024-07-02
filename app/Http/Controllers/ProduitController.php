<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Produit;

class ProduitController extends Controller
{
    function accueil()
    {
        $categorie = Categorie::all();
        return view('formproduit', compact('categorie'));
    }

    //fonction permettant de traiter le formulaire de produit
    function form_prod_traitement(Request $request){

        $credentials = $request->validate([
        'nom' => 'required|string|min:4',
        'prix' => 'required|string|min:4',
        'categorie' => 'required',

    ]);

        Produit::Create([
        'nom_produits' => $request->nom,
        'prix' => $request->prix,
        'categorie_id' => $request->categorie
        ]);

        return redirect()->route('accueil')->with('succès', 'Le produit a été ajoutée avec succès');
}
        //function qui permet d'afficher le formulaire de modification de produit
        function modifier_produit($id)
        {

            //dd($id);

            $produit = Produit::where('id',$id)->with('categorie')->first();

            $categories = Categorie::all();

            return view('modifier_produit',compact(['produit', 'categories']));
        }

        //fonction permettant de mettre un prduit
    public function update_produit(Request $request, $id)
    {
        // Valider les données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prix' => 'required|string',
            // Ajoutez d'autres règles de validation selon vos besoins
        ]);

        // Récupérer le produit à mettre à jour
        $produit = Produit::findOrFail($id);

        // Mettre à jour les attributs du produit
        $produit->nom_produits = $request->input('nom');
        $produit->prix = $request->input('prix');
        $produit->categorie_id = $request->input('categorie');

        // Sauvegarder les modifications
        $produit->save();

        // Redirection avec un message de succès
        return redirect()->route('accueil')->with('success', 'Produit mis à jour avec succès.');
    }

    //fonction permettant de supprimer le produit
    public function delete_produit($id)
    {
        Produit::findOrFail($id)->delete();
        return redirect()->route('accueil')->with('suppression', 'La suppression du prouit a été un succès');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    // Affiche le formulaire d'upload
    public function show () { return view("welcome"); }

    // Valide puis enregistre le fichier envoyé
    public function store (Request $request)
    {
        // La validation
        $this->validate($request, ["picture" => "bail|required|image|max:1024"]);
        // On enregistre l'image dans le répertoire "images"
        $chemin = $request->picture->store("images");
        // On retourne la réponse en JSON avec le chemin de l'image
        return response()->json(["chemin" => $chemin]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\usuaris_jocs;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function showJocs($categoryId)
{
    // Obtener la categoría con sus juegos y el promedio de puntuaciones (rating)
    $category = Category::with(['jocs' => function($query) {
        // Obtener el promedio de las puntuaciones (rating) de la tabla intermedia 'usuaris_jocs'
        $query->selectRaw('jocs.*, AVG(usuaris_jocs.rating) as avg_rating')
              ->leftJoin('usuaris_jocs', 'usuaris_jocs.joc_id', '=', 'jocs.id')  // Hacer un join con la tabla intermedia 'usuaris_jocs'
              ->groupBy('jocs.id');  // Agrupar por 'jocs.id' para obtener el promedio por juego
    }])->findOrFail($categoryId);

    return view('categories.jocs', compact('category'));
}

    

}

<?php

namespace App\Http\Controllers;

use App\Models\Joc;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class JocController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validar que exista la categoría
        ]);

        Joc::create($validatedData);

        return redirect()->route('admin.jocs')->with('success', 'Juego creado exitosamente.');
    }

    public function create()
    {
        $categories = Category::all(); // Obtener todas las categorías
        return view('jocs.create', compact('categories'));
    }

    public function adminIndex()
    {
        // Obtén la lista de juegos desde tu modelo.
        $jocs = Joc::with('category')->get();

        // Retornar la vista con los datos
        return view('admin.jocs', compact('jocs'));
    }

    public function edit($id)
    {
        $joc = Joc::findOrFail($id); // Encuentra el juego por su ID
        $categories = Category::all(); // Obtén todas las categorías disponibles
    
        return view('jocs.edit', compact('joc', 'categories')); // Envía ambos datos a la vista
    }
    
    

    public function update(Request $request, $id)
{
    // Validar los datos enviados desde el formulario
    $request->validate([
        'nom' => 'required|string|max:255',
        'category' => 'nullable|exists:categories,id', // Verifica que la categoría exista en la tabla
    ]);

    // Buscar el juego en la base de datos
    $joc = Joc::findOrFail($id);

    // Actualizar los campos del juego
    $joc->nom = $request->nom; // Actualizar el nombre
    $joc->category_id = $request->category; // Actualizar la categoría
    $joc->save(); // Guardar los cambios en la base de datos

    // Redirigir a la lista de juegos con un mensaje de éxito
    return redirect()->route('admin.jocs')->with('success', 'Juego actualizado correctamente.');
}

public function index()
{
    // Obtener todos los juegos
    $jocs = Joc::all();
    
    // Obtener los juegos que ha puntuado el usuario, junto con la puntuación
    $userJocs = Auth::user()->jocs()->withPivot('rating')->get(); 

    return view('jocs.index', compact('jocs', 'userJocs'));
}

// Controlador JocController
public function rate(Request $request, Joc $joc)
{
    // Validar la puntuación
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
    ]);

    // Guardar o actualizar la puntuación del usuario para el juego
    $user = Auth::user();
    $user->jocs()->syncWithoutDetaching([
        $joc->id => ['rating' => $request->rating]
    ]);

    return redirect()->route('jocs.index')->with('success', 'Puntuación guardada exitosamente.');
}



}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuariController extends Controller
{
    public function store(Request $request)
{
    Usuari::create($request->all());
    return redirect()->route('admin.jocs')->with('success', 'Usuario creado con éxito');
}
}

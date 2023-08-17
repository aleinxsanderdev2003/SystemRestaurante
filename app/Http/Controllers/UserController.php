<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class UserController extends Controller
{
    public function index()
{
    $user = User::findOrFail(1); // Reemplaza el número 1 por el ID del usuario que deseas mostrar

    return view('administracion.usuario', compact('user'));
}

public function edit($id)
{
    $user = User::findOrFail($id);
    $editingMode = true;

    return view('administracion.usuario', compact('user', 'editingMode'));
}

public function update(Request $request, $id)
{
    $user = User::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email,' . $user->id
    ]);

    $user->name = $request->input('name');
    $user->email = $request->input('email');

    $user->save();

    return redirect()->route('administracion.usuario', $user->id)->with('success', 'Usuario actualizado exitosamente');
}


}

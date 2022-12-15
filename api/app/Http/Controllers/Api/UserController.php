<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Inertia\Inertia;


class UserController extends Controller
{
   
    public function index()
    {
        $usuarios = User::latest('id')
        ->paginate();
                        

        /* return $usuarios; */

        return Inertia::render('Usuario/Index', compact('usuarios'));
    }

    public function create()
    {
        return Inertia::render('Usuario/Create');
    }

    public function store(Request $request)
    {

       $data = $request->validate([
            'name' => ['required', 'string'],
            'nombre_completo' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string']
        ]);

        $usuario = User::Create($data);

        return redirect()->route('usuarios.index');

    }


    public function edit(User $usuario){

        return Inertia::render('Usuario/Edit', compact('usuario'));
    }

   
    public function update(Request $request, User $usuario)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'nombre_completo' => ['required', 'string'],
            'email' => ['required', 'email'],
            'password' => ['required', 'string']
        ]);

        $usuario->update($data);

        return redirect()->route('usuarios.edit', $usuario);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index');
    }
}

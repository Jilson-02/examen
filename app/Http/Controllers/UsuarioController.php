<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }


    // Buscar usuario por nombre de usuario
    // public function buscarUsuario(Request $request)
    // {
    //     $usuarios = Usuario::where('username', 'like', '%' . $request->username . '%')->get();

    //     return response()->json($usuarios);
    // }

    /**
     * Show the form for creating a new resource.
     */
    // Registrar un nuevo usuario
    public function create(Request $request){
        // Crear una nueva instancia del modelo Usuario
        $usuario = new Usuario();
    
        // Asignar los valores del request a las propiedades del modelo
        $usuario->usuario = $request->usuario;
        $usuario->correo = $request->correo;
        $usuario->password = $request->password; // Encriptar la contraseña    
        // Guardar el nuevo usuario en la base de datos
        $usuario->save();
    
        // Retornar una respuesta JSON
        return response()->json([
            'message' => 'Usuario creado correctamente',
    ], 201);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(usuario $usuario)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function registrarEmpleado(Request $request)
    {
        // Validar los datos del request
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'cedula' => 'required|string|max:20|unique:empleados',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'puesto' => 'required|string|max:255',
            'latitud' => 'required|numeric',
            'longitud' => 'required|numeric',
        ]);

        // Crear una instancia del modelo empleado
        $empleado = new Empleado();

        // Asignar los datos del request a la instancia del modelo
        $empleado->nombre = $request->nombre;
        $empleado->apellido = $request->apellido;
        $empleado->cedula = $request->cedula;

        // Manejar la carga de la foto
        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $file = time() . $image->getClientOriginalName();
            Storage::disk('empleado')->put($file, file_get_contents($image));
            $empleado->foto = $file;
        }

        $empleado->puesto = $request->puesto;
        $empleado->latitud = $request->latitud;
        $empleado->longitud = $request->longitud;

        // Guardar la instancia del modelo en la base de datos
        $empleado->save();

        // Devolver la respuesta
        return response()->json($empleado, 201);
    }




    public function buscar(Request $request)
    {
        $query = Empleado::query();

        // Filtrar por nombre si el parámetro existe
        if ($request->has('nombre')) {
            $query->where('nombre', 'like', '%' . $request->nombre . '%');
        }

        // Filtrar por cédula si el parámetro existe
        if ($request->has('cedula')) {
            $query->where('cedula', $request->cedula);
        }

        // Obtener los resultados de la búsqueda
        $empleados = $query->get();

        // Devolver los empleados encontrados en formato JSON
        return response()->json($empleados);
    }

    public function mostrarUbicacion($id)
    {
        // Buscar al empleado por su ID
        $empleado = Empleado::findOrFail($id);

        // Devolver latitud y longitud en formato JSON
        return response()->json([
            'latitud' => $empleado->latitud,
            'longitud' => $empleado->longitud
        ]);
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(empleado $empleado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, empleado $empleado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(empleado $empleado)
    {
        //
    }
}

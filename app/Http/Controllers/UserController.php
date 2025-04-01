<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        // Buscar el usuario o devolver 404 si no existe
        $user = User::findOrFail($id);
        
        // Devolver todos los datos del usuario en formato JSON
        return response()->json($user);
    }

		public function store(Request $request)
		{
			$duplicado = User::where('usuario', $request->usuario)->first();
			if ($duplicado) {
				$data = ['error' => 'El usuario ya existe'];
				return response()->json($data, 400);
			}

			$confirmado = $request->validate([
				'paterno' => 'required|string|max:250',
				'materno' => 'required|string|max:250',
				'name' => 'required|string|max:250',
				'usuario' => 'required|string|max:250',
				'email' => 'nullable|string|max:250',
				'password' => 'required|string|max:250',
				'celular' => 'nullable|string|max:250',
				'direccion' => 'nullable|string|max:250',
				'nivel' => 'required|numeric|min:1|max:2',
			]);
			
			// Hashear la contraseña antes de crear
			$confirmado['password'] = bcrypt($confirmado['password']);

			$task  = User::create($confirmado);
			return response()->json($task, 201);
		}

    public function update(Request $request, string $id)
		{
			$task = User::find($id);
			$confirmado = $request->validate([
				'celular' => 'nullable|string|max:250',
				'direccion' => 'nullable|string|max:250',
				'email' => 'nullable|string|max:250',
				'password' => 'nullable|string|max:250',
			]);

			if (empty($confirmado['password'])) unset($confirmado['password']);
			else $confirmado['password'] = bcrypt($confirmado['password']);
			
			$task->update($confirmado);

			return response()->json($task);
		}


}

<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	// Método para mostrar el formulario de login
	public function showLoginForm()
	{
			return view('auth.login');
	}

	// Método para manejar la solicitud de login
	public function login(Request $request)
	{
		// Validar los datos del formulario
		$credentials = $request->validate([
				'usuario' => 'required',
				'password' => 'required',
		]);        

		// Intentar autenticar al usuario
		if (Auth::attempt($credentials)) {
			// Obtener el ID del usuario autenticado
			$usuario = Auth::user();
			//$userId = Auth::id();
			return response()->json(['mensaje' => 'ok', 'idUsuario' => $usuario->id, 'usuario' => $usuario->usuario, 'paterno' => $usuario->paterno, 'materno'=>$usuario->materno, 'nombre' => $usuario->name, 'nivel'=> $usuario->nivel]);
			
			// Si la autenticación es exitosa, redirigir al dashboard
			//return redirect()->intended('dashboard');
		}else
			return response()->json([
				'idUsuario' => -1,
				'nombre' => 'no usuario'
			]);
		

		// Si la autenticación falla, redirigir de vuelta al formulario de login con un mensaje de error
		return back()->withErrors([
			'mensaje' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
			'idUsuario' => -1,
			'nombre' => 'no usuario'
		]);
	}
}
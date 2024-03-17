<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

use Symfony\Component\HttpFoundation\Response;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\headerTables;
use App\Models\tables;

class UserController extends Controller
{


    public function authenticate(Request $request) {
        $credentials = $request->only('email', 'password');
        try {
            if (! $token = JWTAuth::attempt($credentials)) return response()->json(['error' => 'credenciales incorrectas', 'status' => 'error'], 200);
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se ha podido generar el token'], 500);
        }
        $oUsuario = Auth::user();
        try {
            if($oUsuario->status !== 1) return response()->json(['error' => 'Usuario inactivo', 'status' => 'error'], 400);
            if(!is_null($oUsuario->deleted_at)) return response()->json(['error' => 'Usuario no autorizado', 'status' => 'error'], 400);

            // Obtener roles del usuario
            $roles = $oUsuario->getRoleNames(); // Esto devolverá una colección de nombres de roles

            // Obtener permisos del usuario
            $permissions = $oUsuario->getAllPermissions(); // Esto devolverá una colección de permisos

        } catch (JWTException $th) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }
        $oUsuario->access_token = $token;
        return response()->json($oUsuario);
    }

    public function getAuthenticatedUser() {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $params = $request->query();

        if( !isset($params['nIdTabla']) ) return response()->json(['message' => 'Información incompleta, se necesita parametro nIdTabla'], 400);

        $tabla = tables::whereId($params['nIdTabla'])->first();
        $headers = headerTables::whereTableId($params['nIdTabla'])->orderBy('order')->get();
        $usuarios = User::get();
        foreach ($usuarios as $usuario) {
            $roles = $usuario->roles; // Esto devuelve una colección de roles del usuario
            foreach ($roles as $rol) {
                $usuario->perfil = $rol->name;
            }
        }
        return response()->json([
            'data'  => $usuarios,
            'tabla' => $tabla,
            'headers' => $headers
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function logout(Request $request) {
        try {
            JWTAuth::parseToken()->invalidate(); // Invalida el token actualmente en uso

            return response()->json(['message' => 'Session cerrada correctamente'], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Ha ocurrido un error'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

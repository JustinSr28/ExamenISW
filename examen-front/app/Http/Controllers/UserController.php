<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
     public function index()
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()
                ->route('login')
                ->with('error', 'La sesión ha expirado. Inicia sesión nuevamente.');
        }

        $filter = request()->query('filter');

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
                'timeout'  => 10,
            ]);

            if ($filter === 'inactive') {
                $response = $client->get('/api/users/inactive', [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);
            } else {
                $response = $client->get('/api/users', [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);
            }

            $body = json_decode($response->getBody()->getContents(), true);

           
            $users = $body['data']['data'] ?? [];



            return view('layouts.users.index', compact('users', 'filter'));
        } catch (RequestException $e) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'No fue posible cargar el listado de usuarios.');
        }
    }
    /*     public function create()
    {
        $teachers = [
            ['id' => 1, 'name' => 'Profesor Demo 1'],
            ['id' => 2, 'name' => 'Profesor Demo 2'],
        ];

        return view('layouts.courses.register', compact('teachers'));
    }

    public function store(Request $request)
    {
        dd($request->all());
    } */

    public function create()
    {

        $token = session('access_token');

        if (! $token) {
            return redirect()
                ->route('login')
                ->with('error', 'La sesión ha expirado. Inicia sesión nuevamente.');
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
                'timeout'  => 10,
            ]);

            $response = $client->get('/api/roles', [
                'headers' => [
                'Accept'        => 'application/json',
                'Authorization' => 'Bearer ' . $token,
            ],
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            $roles = $body['data'] ?? [];


            return view('layouts.users.register', compact('roles'));

        } catch (\GuzzleHttp\Exception\RequestException $e) {
            dd([
                'message' => 'Falló la petición al backend',
                'error'   => $e->getMessage(),
                'response' => $e->hasResponse()
                    ? json_decode($e->getResponse()->getBody()->getContents(), true)
                    : null,
            ]);
        }
    }


    public function store(StoreUserRequest $request)
    {
        //dd($request->all());
        $token = session('access_token');

        if (! $token) {
            return redirect()
                ->route('login')
                ->with('error', 'La sesión ha expirado. Inicia sesión nuevamente.');
        }

        $validated = $request->validated();

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
                'timeout'  => 10,
            ]);

            $client->post('/api/users', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
                'json' => $validated,
            ]);

            return redirect()
                ->route('users.create')
                ->with('success', 'Usuario registrado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);

                $apiMessage = $body['message'] ?? 'Ocurrió un error al registrar el usuario.';
                $apiErrors  = $body['errors'] ?? [];

                return back()
                    ->withErrors($apiErrors ?: ['api' => $apiMessage])
                    ->withInput();
            }

            return back()
                ->withErrors(['api' => 'No fue posible conectar con el backend.'])
                ->withInput();
        }
    }

    public function edit($id)
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()->route('login');
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
            ]);

            $response = $client->get("/api/users/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]);

            $userBody = json_decode($response->getBody()->getContents(), true);

            $user = $userBody['data'] ?? [];

            if (! $user) {
                return redirect()->route('users.index')
                    ->with('error', 'Usuario no encontrado.');
            }

            $rolesResponse = $client->get("/api/roles", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
             ]); 

            $rolesBody = json_decode($rolesResponse->getBody()->getContents(), true);

            $roles = $rolesBody['data'] ?? [];

            return view('layouts.users.edit', compact('user','roles'));
            

        } catch (RequestException $e) {
            return redirect()->route('users.index')
                ->with('error', 'Error cargando usuario.');
        }
    }


    public function update(UpdateUserRequest $request, $id)
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()->route('login');
        }

        $data = $request->validated();

        if (empty($data['password'])) {
            unset($data['password']);
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
            ]);

            $client->put("/api/users/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => $data,
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'Usuario actualizado correctamente.');
        } catch (RequestException $e) {
            return back()
                ->with('error', 'Error al actualizar.')
                ->withInput();
        }
    }


    public function destroy($id)
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()
                ->route('login')
                ->with('error', 'La sesión ha expirado. Inicia sesión nuevamente.');
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
                'timeout'  => 10,
            ]);

            $client->delete("/api/users/{$id}", [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            return redirect()
                ->route('users.index')
                ->with('success', 'Usuario inactivado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);

                $apiMessage = $body['message'] ?? 'No se pudo inactivar el Usuario.';

                return redirect()
                    ->route('users.index')
                    ->with('error', $apiMessage);
            }

            return redirect()
                ->route('users.index')
                ->with('error', 'No fue posible conectar con el backend.');
        }
    }

    public function restore($id)
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()
                ->route('login')
                ->with('error', 'La sesión ha expirado. Inicia sesión nuevamente.');
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
                'timeout'  => 10,
            ]);

            $client->patch("/api/users/{$id}/restore", [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            return redirect()
                ->route('users.index', ['filter' => 'inactive'])
                ->with('success', 'Usuario restaurado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);
                $apiMessage = $body['message'] ?? 'No se pudo restaurar el Usuario.';

                return redirect()
                    ->route('users.index', ['filter' => 'inactive'])
                    ->with('error', $apiMessage);
            }

            return redirect()
                ->route('users.index', ['filter' => 'inactive'])
                ->with('error', 'No fue posible conectar con el backend.');
        }
    }
}

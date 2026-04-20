<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Http\Requests\StoreCourseRequest;


class CourseController extends Controller
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
                $response = $client->get('/api/courses/inactive', [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);
            } else {
                $response = $client->get('/api/courses', [
                    'headers' => [
                        'Accept'        => 'application/json',
                        'Authorization' => 'Bearer ' . $token,
                    ],
                ]);
            }

            $body = json_decode($response->getBody()->getContents(), true);

            $courses = $body['data']['data'] ?? [];

            return view('layouts.courses.index', compact('courses', 'filter'));
        } catch (RequestException $e) {
            return redirect()
                ->route('dashboard')
                ->with('error', 'No fue posible cargar el listado de cursos.');
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

            $response = $client->get('/api/teachers', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            $body = json_decode($response->getBody()->getContents(), true);

            $teachers = $body['data'] ?? [];

            return view('layouts.courses.register', compact('teachers'));
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


    public function store(StoreCourseRequest $request)
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

            $client->post('/api/courses', [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
                'json' => $validated,
            ]);

            return redirect()
                ->route('courses.create')
                ->with('success', 'Curso registrado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);

                $apiMessage = $body['message'] ?? 'Ocurrió un error al registrar el curso.';
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

            // Curso
            $courseResponse = $client->get("/api/courses/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]);

            $course = json_decode($courseResponse->getBody(), true)['data'];

            // Profesores
            $teachersResponse = $client->get('/api/teachers', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
            ]);

            $teachers = json_decode($teachersResponse->getBody(), true)['data'];

            return view('layouts.courses.edit', compact('course', 'teachers'));
        } catch (RequestException $e) {
            return redirect()->route('courses.index')->with('error', 'Error cargando curso.');
        }
    }

    public function update(StoreCourseRequest $request, $id)
    {
        $token = session('access_token');

        if (! $token) {
            return redirect()->route('login');
        }

        try {
            $client = new Client([
                'base_uri' => config('services.academy_api.url'),
            ]);

            $client->put("/api/courses/{$id}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json',
                ],
                'json' => $request->validated(),
            ]);

            return redirect()
                ->route('courses.index')
                ->with('success', 'Curso actualizado correctamente.');
        } catch (RequestException $e) {
            return back()->with('error', 'Error al actualizar.');
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

            $client->delete("/api/courses/{$id}", [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            return redirect()
                ->route('courses.index')
                ->with('success', 'Curso inactivado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);

                $apiMessage = $body['message'] ?? 'No se pudo inactivar el curso.';

                return redirect()
                    ->route('courses.index')
                    ->with('error', $apiMessage);
            }

            return redirect()
                ->route('courses.index')
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

            $client->patch("/api/courses/{$id}/restore", [
                'headers' => [
                    'Accept'        => 'application/json',
                    'Authorization' => 'Bearer ' . $token,
                ],
            ]);

            return redirect()
                ->route('courses.index', ['filter' => 'inactive'])
                ->with('success', 'Curso restaurado correctamente.');
        } catch (RequestException $e) {
            $response = $e->getResponse();

            if ($response) {
                $body = json_decode($response->getBody()->getContents(), true);
                $apiMessage = $body['message'] ?? 'No se pudo restaurar el curso.';

                return redirect()
                    ->route('courses.index', ['filter' => 'inactive'])
                    ->with('error', $apiMessage);
            }

            return redirect()
                ->route('courses.index', ['filter' => 'inactive'])
                ->with('error', 'No fue posible conectar con el backend.');
        }
    }
}

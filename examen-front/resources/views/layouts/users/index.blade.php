<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Academy | Usuarios</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    @include('layouts.navbar')
    @include('layouts.sidebar')

    <main class="app-main">

        {{-- HEADER --}}
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">Usuarios</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Listado de usuarios</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- CONTENT --}}
        <div class="app-content">
            <div class="container-fluid">

                <div class="row g-4">
                    <div class="col-md-12">

                        <div class="card card-primary card-outline mb-4">

                            {{-- HEADER CARD --}}
                            <div class="card-header">
                                <div class="row w-100 align-items-center">

                                    <div class="col-md-4 mb-2 mb-md-0">
                                        <h5 class="mb-0">
                                            {{ request('filter') == 'inactive' ? 'Usuarios inactivos' : 'Usuarios activos' }}
                                        </h5>
                                    </div>

                                    <div class="col-md-4 mb-2 mb-md-0">
                                        <form method="GET" action="{{ route('users.index') }}">
                                            <select name="filter" class="form-select form-select-sm" onchange="this.form.submit()">
                                                <option value="" {{ empty(request('filter')) ? 'selected' : '' }}>
                                                    Activos
                                                </option>
                                                <option value="inactive" {{ request('filter') == 'inactive' ? 'selected' : '' }}>
                                                    Inactivos
                                                </option>
                                            </select>
                                        </form>
                                    </div>

                                    <div class="col-md-4 text-end">
                                        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
                                            <i class="bi bi-plus-circle me-1"></i>
                                            Nuevo usuario
                                        </a>
                                    </div>

                                </div>
                            </div>

                            {{-- ALERTAS --}}
                            @if(session('success'))
                                <div class="alert alert-success rounded-0 mb-0">
                                    {{ session('success') }}
                                </div>
                            @endif

                            @if(session('error'))
                                <div class="alert alert-danger rounded-0 mb-0">
                                    {{ session('error') }}
                                </div>
                            @endif

                            {{-- TABLE --}}
                            <div class="card-body table-responsive p-0">
                                <table class="table table-bordered table-hover align-middle mb-0">

                                    <thead>
                                        <tr>
                                            <th style="width: 80px;">ID</th>
                                            <th>Nombre</th>
                                            <th>Email</th>
                                            <th>Teléfono</th>
                                            <th>Rol</th>
                                            <th style="width: 140px;" class="text-center">Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    @forelse($users as $user)
                                        <tr>
                                            <td>{{ $user['id'] }}</td>
                                            <td>{{ $user['name'] }}</td>
                                            <td>{{ $user['email'] }}</td>
                                            <td>{{ $user['telephone'] ?? 'N/A' }}</td>
                                            <td>{{ $user['role']['role_name'] ?? 'Sin rol' }}</td>

                                            <td class="text-center">
                                                <div class="d-flex justify-content-center gap-2">

                                                    @if(request('filter') == 'inactive')

                                                        <form action="{{ route('users.restore', $user['id']) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('¿Desea restaurar este usuario?');">
                                                            @csrf
                                                            @method('PATCH')

                                                            <button type="submit"
                                                                    class="btn btn-sm btn-outline-success"
                                                                    title="Restaurar">
                                                                <i class="bi bi-arrow-counterclockwise"></i>
                                                            </button>
                                                        </form>

                                                    @else

                                                        <a href="{{ route('users.edit', $user['id']) }}"
                                                           class="btn btn-sm btn-outline-primary"
                                                           title="Editar">
                                                            <i class="bi bi-pencil-square"></i>
                                                        </a>

                                                        <form action="{{ route('users.destroy', $user['id']) }}"
                                                              method="POST"
                                                              onsubmit="return confirm('¿Desea inactivar este usuario?');">
                                                            @csrf
                                                            @method('DELETE')

                                                            <button type="submit"
                                                                    class="btn btn-sm btn-outline-danger"
                                                                    title="Inactivar">
                                                                <i class="bi bi-trash"></i>
                                                            </button>
                                                        </form>

                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center text-muted py-4">
                                                No hay usuarios registrados.
                                            </td>
                                        </tr>
                                    @endforelse
                                    </tbody>

                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>

    </main>

    @include('layouts.footer')

</div>

<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('js/adminlte.js') }}"></script>

</body>
</html>

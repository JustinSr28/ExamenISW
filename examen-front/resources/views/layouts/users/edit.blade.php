<!doctype html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Academy | Editar Usuario</title>

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
                        <h3 class="mb-0">Editar Usuario</h3>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-end">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li class="breadcrumb-item active">Editar</li>
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
                                <div class="card-title">Usuario</div>
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

                            @if ($errors->any())
                                <div class="alert alert-danger rounded-0 mb-0">
                                    <strong>Se encontraron errores en el formulario:</strong>
                                    <ul class="mb-0 mt-2">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- FORM --}}
                            <form action="{{ route('users.update', $user['id']) }}" method="POST" class="needs-validation" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="card-body">

                                    <div class="row g-3">

                                        {{-- NOMBRE --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Nombre</label>
                                            <input type="text"
                                                   name="name"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name', $user['name']) }}"
                                                   required>

                                            <div class="invalid-feedback">Ingrese el nombre.</div>
                                            @error('name')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- EMAIL --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Email</label>
                                            <input type="email"
                                                   name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', $user['email']) }}"
                                                   required>

                                            <div class="invalid-feedback">Ingrese un email válido.</div>
                                            @error('email')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- TELEFONO --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Teléfono</label>
                                            <input type="text"
                                                   name="telephone"
                                                   class="form-control @error('telephone') is-invalid @enderror"
                                                   value="{{ old('telephone', $user['telephone']) }}">

                                            @error('telephone')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        {{-- ROL --}}
                                        <div class="col-md-6">
                                            <label class="form-label">Rol</label>

                                            <select name="role_id"
                                                    class="form-select @error('role_id') is-invalid @enderror"
                                                    required>
                                                <option value="">Seleccione un rol</option>

                                                @foreach ($roles as $role)
                                                    <option value="{{ $role['id'] }}"
                                                        {{ old('role_id', $user['role_id']) == $role['id'] ? 'selected' : '' }}>
                                                        {{ $role['role_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div class="invalid-feedback">Seleccione un rol.</div>
                                            @error('role_id')
                                                <div class="text-danger small mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                {{-- FOOTER --}}
                                <div class="card-footer d-flex justify-content-between">

                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                        <i class="bi bi-arrow-left me-1"></i>
                                        Volver
                                    </a>

                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-check-circle me-1"></i>
                                        Actualizar usuario
                                    </button>

                                </div>

                            </form>

                            {{-- VALIDACION BOOTSTRAP --}}
                            <script>
                                (() => {
                                    'use strict';

                                    const forms = document.querySelectorAll('.needs-validation');

                                    Array.from(forms).forEach((form) => {
                                        form.addEventListener('submit', (event) => {
                                            if (!form.checkValidity()) {
                                                event.preventDefault();
                                                event.stopPropagation();
                                            }

                                            form.classList.add('was-validated');
                                        }, false);
                                    });
                                })();
                            </script>

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
s
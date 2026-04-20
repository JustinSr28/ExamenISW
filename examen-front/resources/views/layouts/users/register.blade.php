
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Academy | Registrar Usuario</title>

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
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Registrar Usuario</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                                <li class="breadcrumb-item active">Registrar Usuario</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="app-content">
                <div class="container-fluid">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card card-info card-outline mb-4">
                                <div class="card-header">
                                    <div class="card-title">Datos del Usuario</div>
                                </div>

                                <form action="{{ route('users.store') }}" method="POST">
                                    @csrf

                                    <div class="card-body">
                                        <div class="row g-3">

                                            <div class="col-md-6">
                                                <label for="name" class="form-label">Nombre</label>
                                                <input
                                                    type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name"
                                                    name="name"
                                                    value="{{ old('name') }}"
                                                    required>
                                                @error('name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label">Correo Electrónico</label>
                                                <input
                                                    type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    id="email"
                                                    name="email"
                                                    value="{{ old('email') }}"
                                                    required>
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="telephone" class="form-label">Teléfono</label>
                                                <input
                                                    type="text"
                                                    class="form-control @error('telephone') is-invalid @enderror"
                                                    id="telephone"
                                                    name="telephone"
                                                    value="{{ old('telephone') }}">
                                                @error('telephone')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="role_id" class="form-label">Rol</label>
                                                <select
                                                    class="form-select @error('role_id') is-invalid @enderror"
                                                    id="role_id"
                                                    name="role_id"
                                                    required>
                                                    <option value="">Seleccione un rol</option>

                                                    @if(!empty($roles))
                                                        @foreach($roles as $role)
                                                            <option value="{{ $role['id'] }}" {{ old('role_id') == $role['id'] ? 'selected' : '' }}>
                                                                {{ $role['role_name'] }}
                                                            </option>
                                                        @endforeach
                                                    @endif


                                                </select>
                                                @error('role_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="password" class="form-label">Contraseña</label>
                                                <input
                                                    type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    id="password"
                                                    name="password"
                                                    required>
                                                @error('password')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                                <input
                                                    type="password"
                                                    class="form-control"
                                                    id="password_confirmation"
                                                    name="password_confirmation"
                                                    required>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-end gap-2">
                                        <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                            Cancelar
                                        </a>
                                        <button class="btn btn-info" type="submit">
                                            Registrar
                                        </button>
                                    </div>
                                </form>
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
```

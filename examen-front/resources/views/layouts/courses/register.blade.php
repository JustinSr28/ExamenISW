<!doctype html>
<html lang="es">
<!--begin::Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Academy | Registrar Curso</title>

    <!--begin::Accessibility Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
    <meta name="color-scheme" content="light dark" />
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)" />
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)" />
    <!--end::Accessibility Meta Tags-->

    <!--begin::Primary Meta Tags-->
    <meta name="title" content="Academy | Registrar Curso" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="Formulario para registrar cursos en el sistema Academy." />
    <meta name="keywords" content="academy, cursos, registrar curso, adminlte, laravel, blade" />
    <!--end::Primary Meta Tags-->

    <!--begin::Accessibility Features-->
    <meta name="supported-color-schemes" content="light dark" />
    <link rel="preload" href="{{ asset('css/adminlte.css') }}" as="style" />
    <!--end::Accessibility Features-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" media="print"
        onload="this.media = 'all'" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css"
        crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}" />
    <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->

<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!--begin::Header-->
        @include('layouts.navbar')
        <!--end::Header-->

        <!--begin::Sidebar-->
        @include('layouts.sidebar')
        <!--end::Sidebar-->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3 class="mb-0">Registrar</h3>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Crear Curso</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content Header-->

            <!--begin::App Content-->
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row g-4">
                        <div class="col-md-12">
                            <div class="card card-info card-outline mb-4">
                                <div class="card-header">
                                    <div class="card-title">Curso</div>
                                </div>

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

                                <form action="{{ route('courses.store') }}" method="POST" class="needs-validation"
                                    novalidate>
                                    @csrf

                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="teacher_id" class="form-label">Profesor</label>
                                                
                                                <select name="teacher_id" id="teacher_id"
                                                    class="form-select @error('teacher_id') is-invalid @enderror"
                                                    required>
                                                    <option value="">Seleccione un profesor</option>
                                                    @foreach ($teachers as $teacher)
                                                        <option value="{{ $teacher['id'] }}"
                                                            {{ old('teacher_id') == $teacher['id'] ? 'selected' : '' }}>
                                                            {{ $teacher['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="invalid-feedback">Seleccione un profesor.</div>
                                                @error('teacher_id')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="code" class="form-label">Código</label>
                                                <input type="text" name="code" id="code"
                                                    class="form-control @error('code') is-invalid @enderror"
                                                    value="{{ old('code') }}" required />
                                                <div class="invalid-feedback">Ingrese el código del curso.</div>
                                                @error('code')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="course_name" class="form-label">Nombre del curso</label>
                                                <input type="text" name="course_name" id="course_name"
                                                    class="form-control @error('course_name') is-invalid @enderror"
                                                    value="{{ old('course_name') }}" required />
                                                <div class="invalid-feedback">Ingrese el nombre del curso.</div>
                                                @error('course_name')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="status" class="form-label">Estado</label>
                                                <select name="status" id="status"
                                                    class="form-select @error('status') is-invalid @enderror" required>
                                                    <option value="">Seleccione un estado</option>
                                                    <option value="1"
                                                        {{ old('status') == '1' ? 'selected' : '' }}>Por iniciar
                                                    </option>
                                                    <option value="2"
                                                        {{ old('status') == '2' ? 'selected' : '' }}>Iniciado</option>
                                                    <option value="3"
                                                        {{ old('status') == '3' ? 'selected' : '' }}>Finalizado
                                                    </option>
                                                </select>
                                                <div class="invalid-feedback">Seleccione el estado del curso.</div>
                                                @error('status')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-6">
                                                <label for="capacity" class="form-label">Capacidad</label>
                                                <input type="number" name="capacity" id="capacity"
                                                    class="form-control @error('capacity') is-invalid @enderror"
                                                    value="{{ old('capacity') }}" min="1" required />
                                                <div class="invalid-feedback">Ingrese la capacidad del curso.</div>
                                                @error('capacity')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <label for="start_date" class="form-label">Fecha de inicio</label>
                                                <input type="date" name="start_date" id="start_date"
                                                    class="form-control @error('start_date') is-invalid @enderror"
                                                    value="{{ old('start_date') }}" required />
                                                <div class="invalid-feedback">Seleccione la fecha de inicio.</div>
                                                @error('start_date')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-3">
                                                <label for="start_time" class="form-label">Hora de inicio</label>
                                                <input type="time" name="start_time" id="start_time"
                                                    class="form-control @error('start_time') is-invalid @enderror"
                                                    value="{{ old('start_time') }}" required />
                                                <div class="invalid-feedback">Seleccione la hora de inicio.</div>
                                                @error('start_time')
                                                    <div class="text-danger small mt-1">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-footer d-flex justify-content-end">
                                        <button class="btn btn-info" type="submit">
                                            Registrar curso
                                        </button>
                                    </div>
                                </form>

                                <script>
                                    (() => {
                                        'use strict';

                                        const forms = document.querySelectorAll('.needs-validation');

                                        Array.from(forms).forEach((form) => {
                                            form.addEventListener(
                                                'submit',
                                                (event) => {
                                                    if (!form.checkValidity()) {
                                                        event.preventDefault();
                                                        event.stopPropagation();
                                                    }

                                                    form.classList.add('was-validated');
                                                },
                                                false,
                                            );
                                        });
                                    })();
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->

        <!--begin::Footer-->
        @include('layouts.footer')
        <!--end::Footer-->
    </div>
    <!--end::App Wrapper-->

    <!--begin::Script-->
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
        crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>

    <script src="{{ asset('js/adminlte.js') }}"></script>

    <script>
        const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
        const Default = {
            scrollbarTheme: 'os-theme-light',
            scrollbarAutoHide: 'leave',
            scrollbarClickScroll: true,
        };

        document.addEventListener('DOMContentLoaded', function() {
            const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
            const isMobile = window.innerWidth <= 992;

            if (
                sidebarWrapper &&
                OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
                !isMobile
            ) {
                OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
                    scrollbars: {
                        theme: Default.scrollbarTheme,
                        autoHide: Default.scrollbarAutoHide,
                        clickScroll: Default.scrollbarClickScroll,
                    },
                });
            }
        });
    </script>
    <!--end::Script-->
</body>
<!--end::Body-->

</html>

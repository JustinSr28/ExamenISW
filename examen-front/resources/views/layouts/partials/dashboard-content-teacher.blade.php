@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="row g-4 mb-1">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box text-bg-primary mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>4</h3>
                    <p>Cursos asignados</p>
                </div>
                <i class="small-box-icon bi bi-journal-bookmark-fill"></i>
                <a href="" class="small-box-footer">
                    Ver cursos <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box text-bg-success mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>86</h3>
                    <p>Estudiantes matriculados</p>
                </div>
                <i class="small-box-icon bi bi-people-fill"></i>
                <a href="" class="small-box-footer">
                    Ver estudiantes <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box text-bg-warning mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>3</h3>
                    <p>Grupos activos</p>
                </div>
                <i class="small-box-icon bi bi-easel-fill"></i>
                <a href="" class="small-box-footer text-white">
                    Ver grupos <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 align-items-stretch mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-primary h-100">
                <div class="card-header">
                    <h3 class="card-title">Cursos asignados</h3>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>PHP Intermedio</strong>
                            <div class="text-muted small">Grupo A - Nocturno</div>
                        </div>
                        <span class="badge text-bg-primary">25 estudiantes</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Laravel Básico</strong>
                            <div class="text-muted small">Grupo B - Sabatino</div>
                        </div>
                        <span class="badge text-bg-success">18 estudiantes</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Base de Datos</strong>
                            <div class="text-muted small">Grupo A - Virtual</div>
                        </div>
                        <span class="badge text-bg-warning">21 estudiantes</span>
                    </div>

                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <strong>DevOps Inicial</strong>
                            <div class="text-muted small">Grupo C - Mixto</div>
                        </div>
                        <span class="badge text-bg-danger">22 estudiantes</span>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-primary">
                        Administrar cursos
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-secondary h-100">
                <div class="card-header">
                    <h3 class="card-title">Resumen docente</h3>
                </div>

                <div class="card-body">
                    <div class="progress-group mb-4">
                        Asistencia promedio
                        <span class="float-end"><b>88%</b></span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-primary" style="width: 88%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Cursos al día
                        <span class="float-end"><b>3</b>/4</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-success" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Evaluaciones revisadas
                        <span class="float-end"><b>42</b>/50</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-warning" style="width: 84%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-0">
                        Pendientes por revisar
                        <span class="float-end"><b>8</b></span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-danger" style="width: 16%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title">Estudiantes recientes</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Estudiante</th>
                                <th>Curso</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>María López</td>
                                <td>Laravel Básico</td>
                                <td><span class="badge text-bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Juan Pérez</td>
                                <td>PHP Intermedio</td>
                                <td><span class="badge text-bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Ana Solano</td>
                                <td>Base de Datos</td>
                                <td><span class="badge text-bg-warning">Pendiente</span></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Carlos Rojas</td>
                                <td>DevOps Inicial</td>
                                <td><span class="badge text-bg-danger">Inactivo</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-success">
                        Ver estudiantes
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-info h-100">
                <div class="card-header">
                    <h3 class="card-title">Próximas actividades</h3>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Clase de Laravel Básico</strong>
                            <div class="text-muted small">Lunes - 6:00 p.m.</div>
                        </div>
                        <span class="badge text-bg-primary">Hoy</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Revisión de proyecto PHP</strong>
                            <div class="text-muted small">Martes - 7:30 p.m.</div>
                        </div>
                        <span class="badge text-bg-warning">Mañana</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Entrega de notas</strong>
                            <div class="text-muted small">Miércoles - 8:00 a.m.</div>
                        </div>
                        <span class="badge text-bg-danger">Importante</span>
                    </div>

                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <strong>Clase de Base de Datos</strong>
                            <div class="text-muted small">Jueves - Virtual</div>
                        </div>
                        <span class="badge text-bg-success">Programada</span>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-info text-white">
                        Ver agenda
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="row g-4 mb-1">
        <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box text-bg-primary mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>120</h3>
                    <p>Usuarios registrados</p>
                </div>
                <i class="small-box-icon bi bi-people-fill"></i>
                <a href="" class="small-box-footer">
                    Ver usuarios <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box text-bg-success mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>18</h3>
                    <p>Cursos activos</p>
                </div>
                <i class="small-box-icon bi bi-journal-bookmark-fill"></i>
                <a href="" class="small-box-footer">
                    Ver cursos <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box text-bg-warning mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>86</h3>
                    <p>Matrículas registradas</p>
                </div>
                <i class="small-box-icon bi bi-clipboard-check-fill"></i>
                <a href="" class="small-box-footer text-white">
                    Ver matrículas <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-12">
            <div class="small-box text-bg-danger mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>34</h3>
                    <p>Cupos disponibles</p>
                </div>
                <i class="small-box-icon bi bi-bar-chart-steps"></i>
                <a href="" class="small-box-footer">
                    Revisar cupos <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 align-items-stretch mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-primary h-100">
                <div class="card-header">
                    <h3 class="card-title">Accesos rápidos</h3>
                </div>

                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <a href="" class="btn btn-primary w-100 py-2">
                                <i class="bi bi-person-plus-fill me-2"></i>
                                Registrar usuario
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="" class="btn btn-success w-100 py-2">
                                <i class="bi bi-journal-plus me-2"></i>
                                Registrar curso
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="" class="btn btn-warning w-100 text-white py-2">
                                <i class="bi bi-clipboard-plus me-2"></i>
                                Registrar matrícula
                            </a>
                        </div>

                        <div class="col-md-6">
                            <a href="" class="btn btn-info w-100 text-white py-2">
                                <i class="bi bi-list-ul me-2"></i>
                                Ver listados
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-secondary h-100">
                <div class="card-header">
                    <h3 class="card-title">Resumen general</h3>
                </div>

                <div class="card-body">
                    <div class="progress-group mb-4">
                        Usuarios activos
                        <span class="float-end"><b>95</b>/120</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-primary" style="width: 79%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Cursos con cupo disponible
                        <span class="float-end"><b>12</b>/18</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-success" style="width: 67%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Matrículas completadas
                        <span class="float-end"><b>86</b>/100</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-warning" style="width: 86%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-0">
                        Cursos casi llenos
                        <span class="float-end"><b>4</b>/18</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-danger" style="width: 22%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-primary h-100">
                <div class="card-header">
                    <h3 class="card-title">Últimas matrículas</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Estudiante</th>
                                <th>Curso</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Juan Pérez</td>
                                <td>PHP Intermedio</td>
                                <td><span class="badge text-bg-success">Activa</span></td>
                                <td>01/04/2026</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Ana Solano</td>
                                <td>Base de Datos</td>
                                <td><span class="badge text-bg-warning">Pendiente</span></td>
                                <td>31/03/2026</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Carlos Rojas</td>
                                <td>DevOps Inicial</td>
                                <td><span class="badge text-bg-danger">Cancelada</span></td>
                                <td>30/03/2026</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-primary">
                        Ver matrículas
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title">Cursos con menor cupo</h3>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Laravel Avanzado</span>
                        <span class="badge text-bg-danger">2 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>React Básico</span>
                        <span class="badge text-bg-warning">4 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>SQL Server</span>
                        <span class="badge text-bg-warning">5 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Linux Inicial</span>
                        <span class="badge text-bg-success">9 cupos</span>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-success">
                        Ver cursos
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

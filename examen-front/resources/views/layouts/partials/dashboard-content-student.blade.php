@extends('layouts.dashboard')

@section('dashboard_content')
    <div class="row g-4 mb-1">
        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box text-bg-primary mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>5</h3>
                    <p>Cursos disponibles</p>
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
                    <h3>3</h3>
                    <p>Cursos matriculados</p>
                </div>
                <i class="small-box-icon bi bi-mortarboard-fill"></i>
                <a href="" class="small-box-footer">
                    Mis cursos <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <div class="small-box text-bg-warning mb-0 dashboard-kpi-box">
                <div class="inner">
                    <h3>2</h3>
                    <p>Matrículas pendientes</p>
                </div>
                <i class="small-box-icon bi bi-clipboard-check-fill"></i>
                <a href="" class="small-box-footer text-white">
                    Revisar estado <i class="bi bi-arrow-right-circle"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 align-items-stretch mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-primary h-100">
                <div class="card-header">
                    <h3 class="card-title">Cursos disponibles para matricular</h3>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Laravel Básico</strong>
                            <div class="text-muted small">Modalidad virtual</div>
                        </div>
                        <span class="badge text-bg-success">12 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>React Inicial</strong>
                            <div class="text-muted small">Modalidad presencial</div>
                        </div>
                        <span class="badge text-bg-warning">5 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Base de Datos</strong>
                            <div class="text-muted small">Modalidad virtual</div>
                        </div>
                        <span class="badge text-bg-primary">8 cupos</span>
                    </div>

                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <strong>DevOps Inicial</strong>
                            <div class="text-muted small">Modalidad mixta</div>
                        </div>
                        <span class="badge text-bg-danger">3 cupos</span>
                    </div>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-primary">
                        Matricular curso
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-outline card-success h-100">
                <div class="card-header">
                    <h3 class="card-title">Mis cursos matriculados</h3>
                </div>

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Curso</th>
                                <th>Profesor</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>PHP Intermedio</td>
                                <td>Maikol Jiménez</td>
                                <td><span class="badge text-bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Base de Datos</td>
                                <td>Ana López</td>
                                <td><span class="badge text-bg-success">Activo</span></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Laravel Básico</td>
                                <td>Carlos Rojas</td>
                                <td><span class="badge text-bg-warning">Pendiente</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="card-footer d-flex justify-content-end">
                    <a href="" class="btn btn-sm btn-success">
                        Ver mis cursos
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-lg-6">
            <div class="card card-outline card-secondary h-100">
                <div class="card-header">
                    <h3 class="card-title">Resumen del estudiante</h3>
                </div>

                <div class="card-body">
                    <div class="progress-group mb-4">
                        Avance general
                        <span class="float-end"><b>65%</b></span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-primary" style="width: 65%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Cursos aprobados
                        <span class="float-end"><b>2</b>/3</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-success" style="width: 67%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-4">
                        Actividades entregadas
                        <span class="float-end"><b>9</b>/12</span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-warning" style="width: 75%"></div>
                        </div>
                    </div>

                    <div class="progress-group mb-0">
                        Pendientes por entregar
                        <span class="float-end"><b>3</b></span>
                        <div class="progress progress-sm">
                            <div class="progress-bar text-bg-danger" style="width: 25%"></div>
                        </div>
                    </div>
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
                            <strong>Entrega proyecto PHP</strong>
                            <div class="text-muted small">Lunes - 11:59 p.m.</div>
                        </div>
                        <span class="badge text-bg-danger">Urgente</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Quiz de Base de Datos</strong>
                            <div class="text-muted small">Martes - 7:00 p.m.</div>
                        </div>
                        <span class="badge text-bg-warning">Próximo</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <div>
                            <strong>Clase virtual Laravel</strong>
                            <div class="text-muted small">Miércoles - 6:00 p.m.</div>
                        </div>
                        <span class="badge text-bg-primary">Programada</span>
                    </div>

                    <div class="d-flex justify-content-between py-2">
                        <div>
                            <strong>Revisión de avance</strong>
                            <div class="text-muted small">Jueves - 5:00 p.m.</div>
                        </div>
                        <span class="badge text-bg-success">Confirmada</span>
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

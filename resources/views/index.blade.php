@extends('template.main')
@section('mainContent')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-5">
                <div class="card mb-3" id="card-info">
                    <div class="card-header"><span class="font-weight-bold">Información Requerida</span></div>
                    <div class="card-body">
                        <form class="form" method="POST" action="">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="selectUniversity" class="font-weight-bold">Universidad:</label>
                                        @if(isset($acronym))
                                            @include('template.partials.selectUniversity',['acronym' => $acronym])
                                        @else
                                            @include('template.partials.selectUniversity')
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="customCheck1" class="font-weight-bold">Facultad:</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Incluir
                                                Facultad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="InputSubject" class="font-weight-bold">Tema:</label>
                                        <input type="text" class="form-control" id="InputSubject" placeholder="Tema">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputName" class="font-weight-bold">Nombre:</label>
                                        <input type="text" class="form-control" id="InputName" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputMatricula" class="font-weight-bold">Matrícula:</label>
                                        <input type="text" class="form-control" id="InputMatricula"
                                               placeholder="Matrícula">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputTeacher" class="font-weight-bold">Nombre Facilitador:</label>
                                        <input type="text" class="form-control" id="InputTeacher"
                                               placeholder="Facilitador">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="datepicker" class="font-weight-bold">Fecha:</label>
                                        <input type="text" readonly class="form-control" id="datepicker"
                                               placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer">
                        <ul class="links-display-inline">
                            <li>
                                <button type="button" class="btn btn-success btn-sm mt-2">
                                    Descargar
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-info btn-sm mt-2" id="printBtn">
                                    Imprimir
                                    <i class="fa fa-print" aria-hidden="true"></i>
                                </button>
                            </li>
                            <li>
                                <button type="button" class="btn btn-danger btn-sm mt-2">
                                    Limpiar
                                    <i class="fa fa-backward" aria-hidden="true"></i>
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                @if(isset($imagen) && isset($name) && isset($acronym))
                    @include('template.partials.result', ['name'=>$name, 'imagen'=>$imagen, 'acronym'=>$acronym])
                @else
                    @include('template.partials.result')
                @endif
            </div>
        </div>
    </div>
@endsection

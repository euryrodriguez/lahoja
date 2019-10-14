@extends('template.main')
@section('mainContent')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-primary mb-3" id="card-info">
                    <div class="card-header"><span class="font-weight-bold">Información Requerida</span></div>
                    <div class="card-body">
                        <form class="form" method="POST" action="">
                            <div class="form-group">
                                <label for="universitySelect" class="font-weight-bold">Universidad:</label>
                                <select id="universitySelect" class="form-control chosen-select">
                                    <option value="" disabled selected>--Seleccione universidad</option>
                                    @if(sizeof($universities)>0)
                                        @foreach($universities as $university)
                                            <option value="{{ $university->id }}-{{ $university->acronym }}">
                                                {{ $university->name }}
                                                ({{ $university->acronym }})
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="InputMatricula" class="font-weight-bold">Matrícula:</label>
                                <input type="text" class="form-control" id="InputMatricula" placeholder="Matrícula">
                            </div>
                            <div class="form-group">
                                <label for="datepicker" class="font-weight-bold">Fecha:</label>
                                <input type="text" readonly class="form-control" id="datepicker" placeholder="DD/MM/YYYY">
                            </div>
                            <div class="form-group">
                                <label for="InputName" class="font-weight-bold">Nombre:</label>
                                <input type="text" class="form-control" id="InputName" placeholder="Nombre">
                            </div>
                            <div class="form-group">
                                <label for="InputSubject" class="font-weight-bold">Tema:</label>
                                <input type="text" class="form-control" id="InputSubject" placeholder="Tema">
                            </div>
                            <div class="form-group">
                                <label for="InputTeacher" class="font-weight-bold">Nombre Facilitador:</label>
                                <input type="text" class="form-control" id="InputTeacher" placeholder="Facilitador">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @include('template.partials.result')
            </div>
            <div class="col-md-2">
                <div class="card border-primary mb-3">
                    <div class="card-header"><span class="font-weight-bold">Opciones</span></div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-sm mt-2">
                            Descargar
                            <i class="fa fa-download" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-danger btn-sm mt-2">
                            Imprimir
                            <i class="fa fa-print" aria-hidden="true"></i>
                        </button>
                        <br>
                        <button type="button" class="btn btn-info btn-sm mt-2">
                            Limpiar
                            <i class="fa fa-backward" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

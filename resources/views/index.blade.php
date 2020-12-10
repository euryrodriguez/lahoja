@extends('template.main')
@section('mainContent')
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3" id="card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 m-0">
                                <span class="font-weight-bold">Información Requerida</span>
                            </div>
                            <div class="col-md-6 text-right omega">
                                <ul class="links-display-inline">
                                    <!--<li>
                                        <button type="button" class="btn btn-info btn-sm btn-print"
                                                data-toggle="tooltip" data-placement="left" title="Haz click para descargar el documento."
                                                data-action="docx">
                                            Descargar <i class="fa fa-download" aria-hidden="true"></i>
                                        </button>
                                    </li>-->
                                    <li>
                                        <button type="button" class="btn btn-danger btn-sm btn-print"
                                                data-action="print">
                                            Imprimir
                                            <i class="fa fa-print" aria-hidden="true"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" method="POST" action="" id="mainForm">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group p-1">
                                        <label for="selectUniversity" class="font-weight-bold">Universidad:</label>
                                        <label class="label-mandatory">*</label>
                                        @if(isset($acronym))
                                            @include('template.partials.selectUniversity',['acronym' => $acronym])
                                        @else
                                            @include('template.partials.selectUniversity')
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group p-1">
                                        <label for="facultadCheck" class="font-weight-bol">Facultad:</label>
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="facultadCheck" class="custom-control-input"
                                                   id="facultadCheck">
                                            <label class="custom-control-label" for="facultadCheck">Incluir
                                                Facultad</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 d-none" id="facultadPadre">
                                    <div class="form-group">
                                        <label for="InputFacultad" class="font-weight-bold">Facultad:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm"
                                               data-toggle="tooltip" data-placement="top" title="Facultad"
                                               name="InputFacultad"
                                               id="InputFacultad"
                                               placeholder="Facultad">
                                    </div>
                                </div>
                                <div id="divNombreUniversidad" class="col-md-6 d-none">
                                    <div class="form-group">
                                        <label for="InputUniversityName" class="font-weight-bold">Nombre de la
                                            universidad:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm"
                                               data-toggle="tooltip" data-placement="top"
                                               title="Nombre de la universidad"
                                               name="InputUniversityName"
                                               id="InputUniversityName" placeholder="Asignatura">
                                    </div>
                                </div>
                                <div id="divLogoUniversidadFile" class="col-md-6 d-none">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="logoFile">Logo</label>
                                            <label class="label-mandatory">*</label>
                                            <input type="file" class="form-control-file" id="logoFile" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputSubject" class="font-weight-bold">Asignatura:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Asignatura"
                                               name="InputSubject"
                                               id="InputSubject" placeholder="Asignatura">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputToPic" class="font-weight-bold">Tema:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Tema"
                                               name="InputToPic"
                                               id="InputToPic" placeholder="Tema">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputName" class="font-weight-bold">Nombre:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Nombre"
                                               id="InputName"
                                               name="InputName"
                                               placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputMatricula" class="font-weight-bold">Matrícula:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Puede añadir mas matrículas separandolas por comas."
                                               id="InputMatricula"
                                               name="InputMatricula"
                                               placeholder="Matrícula">
                                        <input type="hidden" name="inputHiddenMatriculas" id="inputHiddenMatriculas">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputSeccion" class="font-weight-bold">Sección:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Sección"
                                               id="InputSeccion"
                                               name="InputSeccion"
                                               placeholder="Sección">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputColor" class="font-weight-bold">Color de letras:</label>
                                        <input type="color" class="form-control form-control-sm" value="#000000"
                                               data-toggle="tooltip" data-placement="top" title="Color de letras"
                                               required
                                               id="InputColor"
                                               name="InputColor" placeholder="Sección">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="InputTeacher" class="font-weight-bold">Nombre Facilitador:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" class="form-control" required id="InputTeacher"
                                               data-toggle="tooltip" data-placement="top" title="Nombre Facilitador"
                                               name="InputTeacher"
                                               placeholder="Facilitador">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="datepicker" class="font-weight-bold">Fecha:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="text" readonly class="form-control"
                                               data-toggle="tooltip" data-placement="top" title="Fecha de entrega"
                                               required id="datepicker"
                                               name="deadline"
                                               placeholder="DD/MM/YYYY">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputWidth" class="font-weight-bold">Anchura Logo:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="number" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Anchura Logo"
                                               id="inputWidth"
                                               name="inputWidth"
                                               placeholder="Anchura Logo"
                                               value="{{ (isset($width))? $width: '100' }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="inputHeight" class="font-weight-bold">Altura Logo:</label>
                                        <label class="label-mandatory">*</label>
                                        <input type="number" class="form-control form-control-sm" required
                                               data-toggle="tooltip" data-placement="top" title="Altura Logo"
                                               id="inputHeight"
                                               name="inputHeight"
                                               placeholder="Altura Logo"
                                               value="{{ (isset($height))? $height: '100' }}">
                                    </div>
                                </div>
                            </div>
                            @if(isset($imagen) && isset($name) && isset($acronym))
                                @php $img = asset('universidades').'/'.strtoupper($acronym).'/'.$imagen; @endphp
                                <input type="hidden" value="{{ $img }}" name="rutaImagenHidden" id="rutaImagenHidden">
                                <input type="hidden" value="{{ $name }}" name="nombreUniversidadHidden"
                                       id="nombreUniversidadHidden">
                            @else
                                <input type="hidden" value="" name="rutaImagenHidden" id="rutaImagenHidden">
                                <input type="hidden" value="" name="nombreUniversidadHidden"
                                       id="nombreUniversidadHidden">
                            @endif
                        </form>
                    </div>
                    <div class="card-footer">

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                @if(isset($imagen) && isset($name) && isset($acronym))
                    @include('template.partials.result', ['name'=>$name, 'imagen'=>$imagen, 'acronym'=>$acronym])
                @else
                    @include('template.partials.result')
                @endif
            </div>
        </div>
    </div>
@endsection

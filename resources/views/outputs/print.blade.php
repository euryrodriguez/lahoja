<div id="hoja-content" class="hoja-shadow">
    <form action="" id="hoja-content-form" class="">
        <div id="isoTipoUniversidad" class="text-center">
            <span style="display: block;text-align: center; ">
                    <img src="{{ $params['rutaImagenHidden'] }}" alt="logo universidad"
                         width="170" height="160" name="1 Imagen" align="bottom" border="0"/>
               </span>
        </div>
        <h1 style="text-align: center" class="universityNameSpan">{{ $params['nombreUniversidadHidden'] }}</h1>
        @php $hidden = (strlen(trim($params['InputFacultad'])) > 0)? '':'d-none'  @endphp
        <p class="{{ $hidden }}"></p>
        <p align="center {{ $hidden }}">
            <span style="font-size: large;">
                <strong class="facultyNameSpan">{{ $params['InputFacultad'] }}</strong>
            </span>
        </p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Asignatura</strong></span></p>
        <p align="center"><span style="font-size: large;" class="subjectSpan">{{ $params['InputSubject'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Téma</strong></span></p>
        <p align="center"><span style="font-size: large;" class="topicSpan">{{ $params['InputToPic'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Nombre</strong></span></p>
        <p align="center"><span style="font-size: large;" class="studentName">{{ $params['InputName'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Matrícula</strong></span></p>
        <p align="center"><span style="font-size: large;" class="enrollmentSpan"> {{ $params['InputMatricula'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Facilitador</strong></span></p>
        <p align="center"><span style="font-size: large;" class="teacherSpan">{{ $params['InputTeacher'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Secci&oacute;n</strong></span></p>
        <p align="center"><span style="font-size: large;">{{ $params['InputSeccion'] }}</span></p>
        <p align="center">&nbsp;</p>
        <p class="subtitle" align="center"><span style="font-size: large;"><strong>Fecha de entrega</strong></span></p>
        <p align="center"><span style="font-size: large;" class="DeadlineSpan">{{ $params['deadline'] }}</span></p>
    </form>
</div>
<style>
    #isoTipoUniversidad {
        display: block;
        width: 235px;
        height: 185px;
        margin: auto;
    }

    .universityNameSpan {
        text-align: center;
        font-size: 25px;
        margin-top: -15px;
    }

    h1 {
        text-align: center;
    }
    .subtitle{
        margin-top: -12.5px;
    }
</style>

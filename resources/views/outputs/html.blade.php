<div id="hoja-content" class="hoja-shadow">
    <form action="" id="hoja-content-form" class="">
        <div id="isoTipoUniversidad" class="text-center mt-3">
            @if(isset($imagen) && isset($name) && isset($acronym))
                <span style="display:block;text-align: center;">
                    <img src="{{ asset('universidades') }}/{{ strtoupper($acronym) }}/{{ $imagen }}"
                         alt="logo universidad"
                         width="170" height="170" align="bottom" border="0"/>
                </span>
            @else
                <span style="display: block;text-align: center; ">
                    <img src="{{ asset('universidades/UASD/Escudo_UASD_1.jpg') }}" alt="logo universidad"
                         width="170" height="170" name="1 Imagen" align="bottom" border="0"/>
               </span>
            @endif
        </div>
        @php $name = (isset($name)) ? $name: "Nombre Universidad";@endphp
        <h1 style="text-align: center" class="universityNameSpan">Universidad Autónoma de Santo Domingo</h1>
        <p></p>
        <p align="center">
            <span style="font-size: large;">
                <strong class="facultyNameSpan">Facultad de Ciencias Qu&iacute;micas</strong>
            </span>
        </p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Téma</strong></span></p>
        <p align="center"><span style="font-size: large;" class="subjectSpan">Téma a tratar</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Nombre</strong></span></p>
        <p align="center"><span style="font-size: large;" class="studentName">Nombre Estudiante</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Matrícula</strong></span></p>
        <p align="center"><span style="font-size: large;" class="enrollmentSpan"> 0000000-0</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Facilitador</strong></span></p>
        <p align="center"><span style="font-size: large;" class="teacherSpan">Nombre del docente</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Secci&oacute;n</strong></span></p>
        <p align="center"><span style="font-size: large;">601</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><span style="font-size: large;"><strong>Fecha de entrega</strong></span></p>
        <p align="center"><span style="font-size: large;" class="DeadlineSpan">23-10-2019</span></p>
        <p align="center">&nbsp;</p>
        <p align="center"><a name="_GoBack"></a>
            <span style="font-size: large;">
        <strong>
            Santo Domingo, República Dominicana
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            7 de Marzo de 2020
        </strong>
        </span>
        </p>
    </form>
</div>
<style>
    #isoTipoUniversidad {
        display: block;
        width: 235px;
        height: 200px;
        margin: auto;
    }

    .universityNameSpan {
        text-align: center;
        font-size: 25px;
        margin-top: -5px;
    }

    h1 {
        text-align: center;
    }
</style>

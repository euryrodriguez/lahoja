<div id="hoja-content" class="hoja-shadow container">
    <form action="" id="hoja-content-form" class="">
        <div id="isoTipoUniversidad" class="text-center mt-3">
            @if(isset($imagen) && isset($name) && isset($acronym))
                <span style="display:block;text-align: center;">
                    <img src="{{ asset('universidades') }}/{{ strtoupper($acronym) }}/{{ $imagen }}"
                         alt="logo universidad"
                         width="100" height="100" align="bottom" border="0"/>
                </span>
            @else
                <span style="display: block;text-align: center; ">
                    <img src="{{ asset('universidades/UASD/Escudo_UASD_1.jpg') }}" alt="logo universidad"
                         width="100" height="100" name="1 Imagen" align="bottom" border="0"/>
               </span>
            @endif
        </div>
        @php $name = (isset($name)) ? $name: "Nombre Universidad";@endphp
        <p></p>
        <h3 style="text-align: center;font-size: 18px;" class="universityNameSpan">
            <strong>Seleccione universidad</strong>
        </h3>
        <p></p>
        <p align="center">
            <span class="text-center facultyNameSpan d-none">
                <strong>Facultad de Ciencias Qu&iacute;micas</strong>
            </span>
        </p>
        <p></p>
        <p align="center"><span style="font-size: medium;"><strong>Téma</strong></span></p>
        <p align="center"><span style="font-size: small;" class="subjectSpan">Téma a tratar</span></p>

        <p align="center"><span style="font-size: medium;"><strong>Nombre</strong></span></p>
        <p align="center"><span style="font-size: small;" class="studentName">Nombre Estudiante</span></p>

        <p align="center"><span style="font-size: medium;"><strong>Matrícula</strong></span></p>
        <p align="center"><span style="font-size: small;" class="enrollmentSpan"> 0000000-0</span></p>

        <p align="center"><span style="font-size: medium;"><strong>Facilitador</strong></span></p>
        <p align="center"><span style="font-size: small;" class="teacherSpan">Nombre del docente</span></p>

        <p align="center"><span style="font-size: medium;"><strong>Secci&oacute;n</strong></span></p>
        <p align="center"><span style="font-size: small;">601</span></p>

        <p align="center"><span style="font-size: medium;"><strong>Fecha de entrega</strong></span></p>
        <p align="center"><span style="font-size: small;" class="DeadlineSpan">23-10-2019</span></p>

        <p align="center"><a name="_GoBack"></a>
    </form>
</div>
<style>
    #isoTipoUniversidad {
        display: block;
        width: 235px;
        height: auto;
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

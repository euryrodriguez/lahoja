<div id="hoja-content" class="hoja-shadow">
    <form action="" id="hoja-content-form" class="">
        <div id="isoTipoUniversidad" class="text-center mt-3">
            <span style="display: block;text-align: center; ">
                    <img src="{{ $params['rutaImagenHidden'] }}" alt="logo universidad"
                         width="170" height="170" name="1 Imagen" align="bottom" border="0"/>
               </span>
        </div>
        <h1 style="text-align: center" class="universityNameSpan">{{ $params['nombreUniversidadHidden'] }}</h1>
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

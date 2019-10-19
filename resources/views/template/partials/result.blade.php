<div id="hoja-content" class="hoja-shadow">
    <br>
    <form action="" id="hoja-content-form" class="">
        <div id="isoTipoUniversidad" style="width:100px;margin:auto;" class="text-center">
            <br>
            @if(isset($imagen) && isset($name) && isset($acronym))
            <img src="{{ asset('universidades') }}/{{ strtoupper($acronym) }}/{{ $imagen }}" class="text-center" width="100" height="95" alt="logo universidad">
            @else
                <img src="{{ asset('universidades/UASD/Escudo_UASD_1.jpg') }}" class="text-center" width="100" height="95" alt="logo universidad">
            @endif
        </div>
        @php $name = (isset($name)) ? $name: "Nombre Universidad";@endphp
        <p></p>
        <p class="western" style="margin-bottom: 0cm; line-height: 0.64cm; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="universityNameSpan">{{ $name }}</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 0.64cm; orphans: 2; widows: 2;" align="center">&nbsp;</p>
        <p class="western" style="margin-bottom: 0cm; line-height: 0.64cm; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong>T&eacute;ma:</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; line-height: 0.64cm; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #333333;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="subjectSpan">Téma a tratar</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 100%; orphans: 2; widows: 2;" align="center">&nbsp;</p>
        <p class="western" style="margin-bottom: 0.2cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong>Nombre:</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><a name="__DdeLink__82_2790796895"></a> <span style="font-variant: normal;"><span style="color: #333333;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="studentName">Nombre Estudiante</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; font-variant: normal; letter-spacing: normal; font-style: normal; line-height: 100%; orphans: 2; widows: 2;" align="center">&nbsp;</p>
        <p class="western" style="margin-bottom: 0.2cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong>Facilitador:</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #333333;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="teacherSpan">Nombre Profesor</strong></span></span></span></span></span></span></p>
        <br>
        <p class="western" style="margin-bottom: 0.2cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong>Matr&iacute;cula:</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0.5cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #333333;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="enrollmentSpan">00000-00</strong></span></span></span></span></span></span></p>

        <p class="western" style="margin-bottom: 0.2cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #31849b;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong>Fecha de entrega:</strong></span></span></span></span></span></span></p>
        <p class="western" style="margin-bottom: 0cm; line-height: 100%; orphans: 2; widows: 2;" align="center"><span style="font-variant: normal;"><span style="color: #333333;"><span style="font-family: Times New Roman, serif;"><span style="font-size: large;"><span style="letter-spacing: normal;"><span style="font-style: normal;"><strong class="DeadlineSpan">00-00-0000</strong></span></span></span></span></span></span></p>
        <br>
        <br>
    </form>
</div>

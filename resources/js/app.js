import {Util} from "./util"
import {toastr} from "./bootstrap";

class App extends Util {
    constructor() {
        super();
        this.defaultFont = 'gfsdidot';
        this.baseUrl = this.getBaseUrl();
        this.token = this.getToken();
    }

    changeFont(fuente) {
        const labelColorArr = $('.labelColor');
        $(labelColorArr).each((index, element) => {
            let $selector = $(element);
            app.setFont($selector, fuente);
        });
    }

    setFont($selector, clase) {
        $selector.parent('p, h3').attr('class', clase);
    }
}

const app = new App();

$(document).ready(() => {

    app.initPlugins();

    const $hojaContent = $('#hoja-content'),
        selectUniversityId = '#selectUniversity',
        $selectUniversityObj = $(selectUniversityId),
        $studentName = $('.studentName'),
        $InputName = $('#InputName'),
        $enrollmentSpan = $('.enrollmentSpan'),
        $InputMatricula = $('#InputMatricula'),
        $universityNameSpan = $('.universityNameSpan'),
        $toPicSpan = $('.toPicSpan'),
        $inputToPic = $('#InputToPic'),
        $teacherSpan = $('.teacherSpan'),
        $InputTeacher = $('#InputTeacher'),
        $deadlineSpan = $('.DeadlineSpan'),
        $InputFacultad = $('#InputFacultad'),
        $facultyNameSpan = $('.facultyNameSpan'),
        $printBtn = $('.btn-print'),
        $datepicker = $('#datepicker'),
        $facultadCheck = $('#facultadCheck'),
        $facultadPadre = $('#facultadPadre'),
        $InputColor = $('#InputColor'),
        $InputSeccion = $('#InputSeccion'),
        $seccionSpan = $('.seccionSpan'),
        $InputSubject = $('#InputSubject'),
        $subjectSpan = $('.subjectSpan'),
        $labelColor = $('.labelColor'),
        $divNombreUniversidad = $('#divNombreUniversidad'),
        $divLogoUniversidadFile = $('#divLogoUniversidadFile'),
        $InputUniversityName = $('#InputUniversityName'),
        $logoFile = $('#logoFile'),
        $isoTipoUniversidad = $('#isoTipoUniversidad'),
        $logoIMG = $isoTipoUniversidad.find('span').find('img'),
        urlDefaultLogoIcon = app.getBaseUrl() + 'img/default-logo-icon.png',
        $nombreUniversidadHidden = $('#nombreUniversidadHidden'),
        $rutaImagenHidden = $('#rutaImagenHidden'),
        $inputWidthLogoUniversidad = $('#inputWidth'),
        $inputHeightLogoUniversidad = $('#inputHeight'),
        $inputSizeFont = $('#inputSizeFont'),
        $inputHiddenMatriculas = $('#inputHiddenMatriculas'),
        $selectFuente = $('#selectFuente');

    $selectUniversityObj.chosen().change((evt, params) => {
        const selected = (params.selected != undefined) ? params.selected : "";
        const optionSelected = $(selectUniversityId + ' option:selected').text().trim();
        const siglasUniversidad = optionSelected.split(' (')[1].replace(')', '');
        if (optionSelected.toString().toLocaleLowerCase().includes('otra')) {
            app.removeClass($divNombreUniversidad, 'd-none');
            app.removeClass($divLogoUniversidadFile, 'd-none');
            $logoIMG.attr('src', urlDefaultLogoIcon);
            $InputUniversityName.attr('required', 'required');
            $universityNameSpan.html('Nombre Universidad');
        } else {
            window.location = app.getBaseUrl() + "universidad/" + siglasUniversidad.toLocaleLowerCase();
        }
    });

    //Setear fuente por defecto disparando evento change
    app.changeFont(app.defaultFont);
    $selectFuente.val(app.defaultFont);
    $selectFuente.trigger("chosen:updated");
    $selectFuente.chosen().change((evt, params) => {
        const selected = (params.selected != undefined) ? params.selected : "";
        const optionSelected = $('#' + $selectFuente.attr('id') + ' option:selected').text().trim();
        app.changeFont(selected);
    });

    /*************************************** Campo Nombre ********************************************/
    const studentNameDefaultText = $studentName.text(); //Texto por defecto
    app.escribirEnHoja($InputName, $studentName, studentNameDefaultText);
    /************************************** Campo Matrícula ******************************************/
    const enrollmentSpanDefaultText = $enrollmentSpan.text();
    $InputMatricula.on('keyup', function (e) {
        let matriculasHTMLConSaltosDeLinea = '';
        const currentValue = $(this).val();
        const arrayMatriculasSeparadasPorComas = currentValue.split(',');
        const sizeArreglo = arrayMatriculasSeparadasPorComas.length;
        if (sizeArreglo > 1) {
            for (let i of arrayMatriculasSeparadasPorComas) {
                matriculasHTMLConSaltosDeLinea += i + '<br />';
            }
        } else {
            matriculasHTMLConSaltosDeLinea = currentValue;
        }
        if (currentValue.trim().length > 0) {
            $enrollmentSpan.html(matriculasHTMLConSaltosDeLinea);
            $inputHiddenMatriculas.val(matriculasHTMLConSaltosDeLinea);
        } else {
            $enrollmentSpan.html(enrollmentSpanDefaultText);
            $inputHiddenMatriculas.val(enrollmentSpanDefaultText);
        }
    });
    /************************************** Campo Tema **********************************************************/
    const ToPicSpanDefaultText = $toPicSpan.text();
    app.escribirEnHoja($inputToPic, $toPicSpan, ToPicSpanDefaultText);
    /************************************** Campo Profesor **********************************************************/
    const teacherSpanDefaultText = $teacherSpan.text();
    app.escribirEnHoja($InputTeacher, $teacherSpan, teacherSpanDefaultText);
    /************************************** Campo Facultad *********************************************************/
    const facultySpanDefaultText = $facultyNameSpan.text();
    app.escribirEnHoja($InputFacultad, $facultyNameSpan, facultySpanDefaultText);
    /************************************** Campo Sección *********************************************************/
    const seccionSpanDefaultText = $seccionSpan.text();
    app.escribirEnHoja($InputSeccion, $seccionSpan, seccionSpanDefaultText);
    /************************************** Campo Asignatura *********************************************************/
    const subjectSpanDefaultText = $subjectSpan.text();
    app.escribirEnHoja($InputSubject, $subjectSpan, subjectSpanDefaultText);
    /***************************************************************************************************/

    $datepicker.datepicker({
        uiLibrary: 'bootstrap4',
        change: function (e) {
            const selector = $(this),
                date = selector.val();
            $deadlineSpan.html(app.dateToSpanish(date));
        }
    });

    $facultadCheck.on('change', (e) => {
        const $selector = $(e.target);
        app.toggleClass($facultyNameSpan, "d-none");
        app.toggleClass($facultadPadre, "d-none");
        if ($selector.is(':checked')) {
            $InputFacultad.attr('required', 'required');
        } else {
            $InputFacultad.removeAttr("required");
            app.removeClass($InputFacultad, "is-invalid")
        }
    });

    $InputColor.on('input', (e) => {
        const $selector = $(e.target);
        const color = $selector.val();
        $labelColor.each((index, element) => {
            $(element).css({'color': color});
        });
    });

    $printBtn.on('click', async (e) => {
        const selector = $(e.target);
        const form = $('#mainForm');
        const data = form.serialize();
        const output = selector.data('action');
        const url = app.getBaseUrl() + "getDocument/" + output;
        const html = await app.getDocument(url, data);
        const selectParent = $(selectUniversityId).parent('div');
        const selected = $(selectUniversityId).chosen().find("option:selected").text();    //Universidad seleccionada

        if (selected.indexOf('--') !== -1) {
            toastr.error("Seleccione la universidad", "Universidad Obligatoria");
            selectParent.addClass('border border-danger');
        } else {
            app.removeClass(selectParent, "border border-danger");
            if (app.validateForm(form)) {
                if (output == "print") {
                    app.printElement(html);
                }
            }
        }
    });

    $InputUniversityName.on('keyup', function (e) {
        const $selector = $(this);
        let currentValue = $selector.val();
        $nombreUniversidadHidden.val(currentValue);
        app.escribirEnHoja($selector, $universityNameSpan, "Nombre Universidad");
    });

    $logoFile.on('change', async function (e) {
        const $selector = $(this);
        let imgBase64 = await app.getBase64($selector[0].files[0]);
        $logoIMG.attr('src', imgBase64);
        $rutaImagenHidden.val(imgBase64);
    });

    $inputWidthLogoUniversidad.on('change', function (e) {
        const $selector = $(this);
        const width = $selector.val();
        $logoIMG.attr('width', width);
    });

    $inputHeightLogoUniversidad.on('change', function (e) {
        const $selector = $(this);
        const height = $selector.val();
        $logoIMG.attr('height', height);
    });

    $inputSizeFont.trigger('change');
    $inputSizeFont.on('change', function (e) {
        const $selector = $(this);
        const size = $selector.val();
        const labelColorArr = $('.labelColor');
        $(labelColorArr).each((index, element) => {
            let $selector = $(element);
            $selector.css({'font-size': `${size}px`});
        });
    });


});

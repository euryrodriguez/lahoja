import {Util} from "./util"
import {toastr} from "./bootstrap";

class App extends Util {
    constructor() {
        super();
        this.baseUrl = this.getBaseUrl();
        this.token = this.getToken();
    }
}

const app = new App();

$(document).ready(async () => {

    app.initPlugins();

    const $nombreUniversidadHidden = $('#nombreUniversidadHidden');
    const $hojaContent = $('#hoja-content');
    const universidadesArr = await app.getUniversidades();
    const selectUniversityId = '#selectUniversity';
    const $selectUniversityObj = $(selectUniversityId);
    const $studentName = $('.studentName');
    const $InputName = $('#InputName');
    const $enrollmentSpan = $('.enrollmentSpan');
    const $InputMatricula = $('#InputMatricula');
    const $ToPicSpan = $('.toPicSpan');
    const $inputToPic = $('#InputToPic');
    const $teacherSpan = $('.teacherSpan');
    const $InputTeacher = $('#InputTeacher');
    const $deadlineSpan = $('.DeadlineSpan');
    const $InputFacultad = $('#InputFacultad');
    const $facultyNameSpan = $('.facultyNameSpan');
    const $InputDeadline = $('#InputDeadline');
    const $printBtn = $('.btn-print');
    const $datepicker = $('#datepicker');
    const $facultadCheck = $('#facultadCheck');
    const $facultadPadre = $('#facultadPadre');
    const $rutaImagenHidden = $('#rutaImagenHidden');
    const $InputColor = $('#InputColor');
    const $InputSeccion = $('#InputSeccion');
    const $seccionSpan = $('.seccionSpan');
    const $InputSubject = $('#InputSubject');
    const $subjectSpan = $('.subjectSpan');

    $selectUniversityObj.chosen().change((evt, params) => {
        const selected = (params.selected != undefined) ? params.selected : "";
        const values = selected.split('-');
        const index = values[0];
        const folder = values[1];
        const indice = parseInt(index) - 1;
        const optionSelectedText = $(selectUniversityId + ' option:selected').text().trim();
        const filename = (universidadesArr[indice] != "undefined") ? universidadesArr[indice].filename : '';
        const path = app.getBaseUrl() + "universidades/" + folder + "/" + filename;
        const nombreUniversidad = optionSelectedText.split(' (')[0];
        const siglasUniversidad = optionSelectedText.split(' (')[1].replace(')', '');

        $hojaContent.find('.universityNameSpan').html(`<strong>${nombreUniversidad}</strong>`);
        $hojaContent.find('div#isoTipoUniversidad').find('img').attr('src', path);

        $rutaImagenHidden.val(path);
        $nombreUniversidadHidden.val(nombreUniversidad);
    });

    /*************************************** Campo Nombre ********************************************/
    const studentNameDefaultText = $studentName.text();
    app.escribirEnHoja($InputName, $studentName, studentNameDefaultText);
    /************************************** Campo Matricula ******************************************/
    const enrollmentSpanDefaultText = $enrollmentSpan.text();
    app.escribirEnHoja($InputMatricula, $enrollmentSpan, enrollmentSpanDefaultText);
    /************************************** Campo Tema **********************************************************/
    const ToPicSpanDefaultText = $ToPicSpan.text();
    app.escribirEnHoja($inputToPic, $ToPicSpan, ToPicSpanDefaultText);
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

    $InputColor.on('change', (e) => {
        let $selector = $(e.target);
        console.log($selector.val());
    });

    $printBtn.on('click', async (e) => {
        const selector = $(e.target);
        const output = selector.data('action');
        const form = $('#mainForm');
        const url = app.getBaseUrl() + "getDocument/" + output;
        const data = form.serialize();
        const selected = $(selectUniversityId).chosen().find("option:selected").text();    //Universidad seleccionada
        const selectParent = $(selectUniversityId).parent('div');
        const html = await app.getDocument(url, data);

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
});

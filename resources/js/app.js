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

$(document).ready(() => {

    app.initPlugins();

    const $hojaContent = $('#hoja-content');
    const selectUniversityId = '#selectUniversity';
    const $selectUniversityObj = $(selectUniversityId);
    const $studentName = $('.studentName');
    const $InputName = $('#InputName');
    const $enrollmentSpan = $('.enrollmentSpan');
    const $InputMatricula = $('#InputMatricula');
    const $toPicSpan = $('.toPicSpan');
    const $inputToPic = $('#InputToPic');
    const $teacherSpan = $('.teacherSpan');
    const $InputTeacher = $('#InputTeacher');
    const $deadlineSpan = $('.DeadlineSpan');
    const $InputFacultad = $('#InputFacultad');
    const $facultyNameSpan = $('.facultyNameSpan');
    const $printBtn = $('.btn-print');
    const $datepicker = $('#datepicker');
    const $facultadCheck = $('#facultadCheck');
    const $facultadPadre = $('#facultadPadre');
    const $InputColor = $('#InputColor');
    const $InputSeccion = $('#InputSeccion');
    const $seccionSpan = $('.seccionSpan');
    const $InputSubject = $('#InputSubject');
    const $subjectSpan = $('.subjectSpan');
    const $labelColor = $('.labelColor');

    $selectUniversityObj.chosen().change((evt, params) => {
        const selected = (params.selected != undefined) ? params.selected : "";
        const optionSelected = $(selectUniversityId + ' option:selected').text().trim();
        const siglasUniversidad = optionSelected.split(' (')[1].replace(')', '');
        window.location = app.getBaseUrl() + "universidad/" + siglasUniversidad.toLocaleLowerCase();
    });

    /*************************************** Campo Nombre ********************************************/
    const studentNameDefaultText = $studentName.text(); //Texto por defecto
    app.escribirEnHoja($InputName, $studentName, studentNameDefaultText);
    /************************************** Campo Matricula ******************************************/
    const enrollmentSpanDefaultText = $enrollmentSpan.text();
    app.escribirEnHoja($InputMatricula, $enrollmentSpan, enrollmentSpanDefaultText);
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
});

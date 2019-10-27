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

    const studentNameLabel = $studentName.text();

    $InputName.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $studentName.html(selector.val());
        } else {
            $studentName.html(studentNameLabel);
        }
    });

    const enrollmentSpanLabel = $enrollmentSpan.text();

    $InputMatricula.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $enrollmentSpan.html(selector.val());
        } else {
            $enrollmentSpan.html(enrollmentSpanLabel);
        }
    });

    const ToPicSpanLabel = $ToPicSpan.text();

    $inputToPic.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $ToPicSpan.html(valor);
        } else {
            $ToPicSpan.html(ToPicSpanLabel);
        }
    });

    const teacherSpanLabel = $teacherSpan.text();

    $InputTeacher.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $teacherSpan.html(valor);
        } else {
            $teacherSpan.html(teacherSpanLabel);
        }
    });

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

    const facultySpanLabel = $facultyNameSpan.text();

    $InputFacultad.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $facultyNameSpan.html(valor);
        } else {
            $facultyNameSpan.html(facultySpanLabel);
        }
    });

    const seccionSpanLabel = $seccionSpan.text();

    $InputSeccion.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $seccionSpan.html(valor);
        } else {
            $seccionSpan.html(seccionSpanLabel);
        }
    });

    const subjectSpanLabel = $subjectSpan.text();

    $InputSubject.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            $subjectSpan.html(valor);
        } else {
            $subjectSpan.html(subjectSpanLabel);
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

import {Util} from "./util"

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

    const hojaContent = $('#hoja-content');
    const universidadesArr = await app.getUniversidades();
    const selectUniversityId = '#selectUniversity';
    const selectUniversityObj = $(selectUniversityId);
    const studentName = $('.studentName');
    const InputName = $('#InputName');
    const enrollmentSpan = $('.enrollmentSpan');
    const InputMatricula = $('#InputMatricula');
    const subjectSpan = $('.subjectSpan');
    const InputSubject = $('#InputSubject');
    const teacherSpan = $('.teacherSpan');
    const InputTeacher = $('#InputTeacher');
    const deadlineSpan = $('.DeadlineSpan');
    const InputDeadline = $('#InputDeadline');
    const printBtn = $('#printBtn');
    const $datepicker = $('#datepicker');

    selectUniversityObj.chosen().change((evt, params) => {

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

        hojaContent.find('.universityNameSpan').html(`<strong>${nombreUniversidad}</strong>`);
        hojaContent.find('div#isoTipoUniversidad').find('img').attr('src',path);
    });

    const studentNameLabel = studentName.text();

    InputName.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            studentName.html(selector.val());
        } else {
            studentName.html(studentNameLabel);
        }
    });

    const enrollmentSpanLabel = enrollmentSpan.text();

    InputMatricula.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            enrollmentSpan.html(selector.val());
        } else {
            enrollmentSpan.html(enrollmentSpanLabel);
        }
    });

    const subjectSpanLabel = subjectSpan.text();

    InputSubject.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            subjectSpan.html(valor);
        } else {
            subjectSpan.html(subjectSpanLabel);
        }
    });

    const teacherSpanLabel = teacherSpan.text();

    InputTeacher.on('keyup', (e) => {
        const selector = $(e.target);
        const valor = selector.val();
        if (valor.trim().length > 0) {
            teacherSpan.html(valor);
        } else {
            teacherSpan.html(teacherSpanLabel);
        }
    });

    $datepicker.datepicker({
        uiLibrary: 'bootstrap4',
        change: function (e) {
            const selector = $(this),
                date = selector.val();
            deadlineSpan.html(app.dateToSpanish(date));
        }
    });

    printBtn.on('click', (e) => {
        app.printElement('hoja-content');
    });

});

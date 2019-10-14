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
    const selectUniversityId = '#universitySelect';
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
    const printBtn = $('#print-btn');
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

        hojaContent.find('.universityNameSpan').html(nombreUniversidad);
        hojaContent.find('div#isoTipoUniversidad').html('<img src="' + path + '" class="text-align-center" width="100" height="95" alt="logo universidad">');

    });

    InputName.on('keyup', (e) => {
        const selector = $(e.target);
        studentName.html(selector.val());
    });

    InputMatricula.on('keyup', (e) => {
        const selector = $(e.target);
        enrollmentSpan.html(selector.val());
    });

    InputSubject.on('keyup', (e) => {
        const selector = $(e.target);
        subjectSpan.html(selector.val());
    });

    InputTeacher.on('keyup', (e) => {
        const selector = $(e.target);
        teacherSpan.html(selector.val());
    });

    $datepicker.datepicker({
        uiLibrary: 'bootstrap4',
        change: function (e) {
            const selector = $(this),
                  date = selector.val();
            deadlineSpan.html(app.dateToSpanish(date));
        }
    });
});

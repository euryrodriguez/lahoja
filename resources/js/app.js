import {Util} from "./util"

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

    const hojaContent = $('#hoja-content');
    const universidadesArr = app.getUniversidades();
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

    selectUniversityObj.chosen().change((evt, params) => {

        const selected = (params.selected != undefined) ? params.selected : "";
        const values = selected.split('-');
        const index = values[0];
        const folder = values[1];
        const iParsed = parseInt(index) - 1;
        const filename = (universidadesArr[0][iParsed] != "undefined") ? universidadesArr[0][iParsed].filename : '';
        const optionSelectedText = $(selectUniversityId+' option:selected').text().trim();
        const path = app.getBaseUrl() + "universidades/" + folder + "/"+filename;
        const nombreUniversidad =  optionSelectedText.split(' (')[0];
        const optionSelectedSiglaText = optionSelectedText.split(' (')[1].replace(')', '');

        hojaContent.find('.universityNameSpan').html(nombreUniversidad);

        hojaContent.find('div#isoTipoUniversidad').html('<img src="'+path+'" class="text-align-center" width="100" height="95" alt="logo universidad">');

    });

    InputName.on('keyup', (e) => {
        let selector = $(e.target);
        studentName.html(selector.val());
    });

    InputMatricula.on('keyup', (e) => {
        let selector = $(e.target);
        enrollmentSpan.html(selector.val());
    });

    InputSubject.on('keyup', (e) => {
        let selector = $(e.target);
        subjectSpan.html(selector.val());
    });

    InputTeacher.on('keyup', (e) => {
        let selector = $(e.target);
        teacherSpan.html(selector.val());
    });

    InputDeadline.on('change', (e) => {
        let selector = $(e.target),
            valueSelected = selector.prop('value'),
            todayDate = new Date(valueSelected),
            deadLineDate = todayDate.setDate(todayDate.getDate() + 1),
            deadLineDateSTR = new Date(deadLineDate).toLocaleDateString("es-ES").replace(/\//g, "-");
        deadlineSpan.html(deadLineDateSTR);
    });
});
import {
    jquery,
    bs,
    toastr
} from "./bootstrap";

export class Util {

    constructor() {

        window.jQuery = jquery;
        window.$ = jquery;
        $.fn.init();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': this.getToken()
            }
        });

    }

    getBaseUrl() {
        let url = "";
        const loc = window.location;
        const pathparts = location.pathname.split('/');
        if (location.host == 'localhost') {
            url = loc.protocol + "//" + loc.hostname + (loc.port ? ":" + loc.port : "") + '/' + pathparts[1] + '/' + pathparts[2].trim('/') + '/';
        } else {
            url = loc.protocol + "//" + loc.hostname + (loc.port ? ":" + loc.port : "") + "/";
        }
        return url;
    }


    getToken() {
        return $('meta[name="csrf-token"]').attr('content');
    }

    getView(url, target) {
        let app = this,
            response = $.get(url).done(function (data) {
                let result = JSON.parse(JSON.stringify(data));
                if (result.result === 1) {
                    $(target + ' .modal-content').html(result.view);
                    $(target).modal();
                } else {
                    swal("Operación Fallida", ` ${data.message} algo salió mal, por favor intentelo mas tarde.`, 'error');
                }
            });
    }

    getDocument(url, data) {
        let app = this;
        return new Promise(((resolve, reject) => {
            $.post(url, data).done(function (data) {
                let result = JSON.parse(JSON.stringify(data));
                if (result.result === 1) {
                    resolve(result.view);
                } else {
                    swal("Operación Fallida", ` ${data.message} algo salió mal, por favor intentelo mas tarde.`, 'error');
                    resolve("");
                }
            });
        }));
    }

    initPlugins() {
        let selectChosen = '.chosen-select';
        if ($(selectChosen).length > 0) {
            $(selectChosen).chosen(
                {
                    no_results_text: "Oops, no hay resultados!",
                    width: '100%'
                });
        }
    }

    getUniversidades() {
        const url = this.getBaseUrl() + '/universidades/all';
        return new Promise((resolve, reject) => {
            $.get(url).done(function (data) {
                let result = JSON.parse(data);
                if (result.result === 1) {
                    resolve(result.imagenes);
                } else {
                    swal("Operacion Fallida", 'Error', 'Error');
                    reject(null);
                }
            });
        });
    }

    dateToSpanish(engDate) {
        let dateArr = engDate.split('/');
        return dateArr[1] + '/' + dateArr[0] + '/' + dateArr[2];
    }

    printElement(html) {
        const newWin = window.open('', 'Print-Window');

        newWin.document.open();

        newWin.document.write('<html><body onload="window.print()">' + html + '</body></html>');

        newWin.document.close();

        setTimeout(function () {
            newWin.close();
        }, 10);
    }

    toggleClass(object, className) {
        if (object.hasClass(className)) {
            object.removeClass(className);
        } else {
            object.addClass(className);
        }
    }

    removeClass(object, className) {
        if (object.hasClass(className)) {
            object.removeClass(className);
        }
    }

    validateForm(form) {
        let error = 0,
            app = this;
        //iterate through inputs that have the form-control class
        form.find('.form-control').each(function (index, element) {
            let current = $(element),
                min = (current.is("[min]")) ? current.attr('min') : '', //minimum of characters allowed
                max = (current.is("[max]")) ? current.attr('max') : '', //maximum of characters allowed
                parent = current.parent('div').closest('div.form-group'),//parent
                label = parent.find('label').text();

            label = (label.trim().length === 0) ? current.closest('div.row').children("div:first").find('label').text() : label;
            label = (label.trim().length === 0) ? current.parents('div').closest('label').text() : label;
            parent = (parent.length == 0) ? current.parent() : parent;

            //check if the input is required
            if (current.is("[required]")) {
                if (current.is('input')) {
                    if (!$.trim(current.val()) || current.val() == 0 || current.val() == null) {
                        app.showErrors(element, parent, `${label} no puede ser nulo.`, 'Faltan Campos');
                        error++;
                        return false;
                    } else {
                        app.hideErrors(current);
                    }
                } else if (current.is(':checkbox')) {
                    if (!current.is(':checked')) {
                        app.showErrors(element, parent, `Debe chequear la opción ${label}`, 'Faltan Campos');
                        error++;
                        return false;
                    }
                } else {
                    //validate select and textarea
                    if ($.trim(current.val()).length == 0 || current.val() == -1 || current.val() == null) {
                        app.showErrors(element, parent, `${label} no puede ser nulo.`, 'Faltan Campos');
                        error++;
                        return false;
                    } else {
                        app.hideErrors(current);
                    }
                }

                if (current.hasClass('numeric')) {
                    let strNumber = current.val();
                    if (!app.strIsNumber(strNumber)) {
                        app.showErrors(element, parent, `${label} solo admite números.`, 'Formato incorrecto');
                        error++;
                        return false;
                    }
                } else {
                    app.hideErrors(current);
                }
            }

            if (current.hasClass('numeric')) {
                if (current.val().length > 0) {
                    let strNumber = current.val();
                    if (!app.strIsNumber(strNumber)) {
                        app.showErrors(element, parent, `${label} solo admite números.`, 'Formato incorrecto');
                        error++;
                        return false;
                    }
                }
            }

            if (current.hasClass('url')) {
                if (current.val().length > 0) {
                    let url = current.val();
                    if (!app.validateUrl(url)) {
                        app.showErrors(element, parent, `${label} no es un enlace válido.`, 'Formato incorrecto');
                        error++;
                        return false;
                    }
                }
            }

            if (min !== '') {
                if (app.strIsNumber(min)) {
                    if ($.trim(current.val()).length < min) {
                        app.showErrors(element, parent, `${label} no cumple con la cantidad de carácteres requerida.`, `Mínimo no alcanzado (${min})`);
                        error++;
                        return false;
                    } else {
                        app.hideErrors(current);
                    }
                }
            }

            if (max !== '') {
                if (app.strIsNumber(max)) {
                    if ($.trim(current.val()).length > max) {
                        app.showErrors(element, parent, `${label} supera el máximo de carácteres permitidos.`, `Máximo superado (${max})`);
                        error++;
                        return false;
                    } else {
                        app.hideErrors(current);
                    }
                }
            }
        }).promise().done(function () {
            form.find('input[type="checkbox"]').each(function (index, checkbox) {
                let current = $(checkbox),
                    parent = current.parent('div').closest('div.form-group'),//parent
                    label = parent.find('label').text();

                if (current.is('[required]')) {
                    if (!current.is(':checked')) {
                        app.showErrors(checkbox, parent, `Debe chequear la opción ${label}`, 'Faltan Campos');
                        error++;
                        return false;
                    }
                }
            })
        });
        return (error <= 0);
    }

    showErrors(selector, parent, message, title) {

        if (!$(selector).hasClass('is-invalid'))
            $(selector).addClass('is-invalid');

        $(selector).focus();

        if (typeof toastr == 'object') {
            toastr.error(message, title);
        } else if (typeof swal == 'function') {
            swal(title, message, 'error');
        } else {
            alert(message);
        }
    };

    hideErrors(parent) {
        if (parent.hasClass('is-invalid')) {
            parent.removeClass('is-invalid');
        }
    };

    strIsNumber(str) {
        let pattern = /^-{0,1}\d*\.{0,1}\d+$/;
        return (pattern.test(str));  // returns a boolean
    };

}

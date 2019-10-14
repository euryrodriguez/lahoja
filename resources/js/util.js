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

        let universities = [];

        $.get(url).done(function (data) {
            let result = JSON.parse(data);
            if (result.result === 1) {
                universities[0] = result.imagenes;
            } else {
                swal("Operacion Fallida", 'Error', 'Error');
            }
        });

        return universities;
    }

}
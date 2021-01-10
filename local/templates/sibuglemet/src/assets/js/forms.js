window.$ = window.jQuery = require('jquery');
import Inputmask from "inputmask";
require("waitme/waitMe");

var WaitMeSettings = {
    effect: 'pulse',
    text: 'Обработка',
    bg: 'rgba(255,255,255,0.8)',
    color: '#006bca',
    maxSize: '',
    waitTime: -1,
    textPos: 'vertical',
    fontSize: '',
    source: '',
    onClose: function () {
    }
};

var FormSubmitHandler = function () {
    $('.feedback_form').on('submit', function (event) {
        event.preventDefault();

        var $form = $(this);
        var errContainer = $form.find('.feedback_form__errors');

        var errCount = FormValidateOnSubmitHandler($form);
        if (errCount > 0) {
            errContainer.empty().append('Заполнены не все обязательные поля').slideDown(200);
            return false;
        }
        errContainer.slideUp(200);
        if ($form.is('[id="FOS_CALLBACK_EVENT"]')) {
            $form.parents('.form-modal ').waitMe(WaitMeSettings);
        } else {
            $form.waitMe(WaitMeSettings);
        }

        var formData = new FormData(this);

        $.ajax({
            url: "/_ajax/form_ajax.php",
            type: "POST",
            data: formData,
            dataType: "json",
            // async: false,
            cache: false,
            contentType: false,
            processData: false
        }).done(function (data) {
            if (data.status === 'exception') {
                AjaxException($form, data.message);
            }
            if (data.status === 'OK') {
                AjaxOk($form, data.message);
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            alert('Ошибка AJAX! — ' + errorThrown);
        }).always(function () {
            if ($form.is('[id="FOS_CALLBACK_EVENT"]')) {
                $form.parents('.form-modal ').waitMe('hide');
            } else {
                $form.waitMe('hide');
            }
        });
    });
};

var AjaxException = function (form, message) {
    var errContainer = form.find('.feedback_form__errors');
    errContainer.append(message);
};

var AjaxOk = function (form, message) {
    var parent = form.parent();
    form.slideUp(400, function () {
        $("<div/>", {
            "class": "feedback_form__success",
            text: message
        }).appendTo(parent).hide().slideDown(400, function () {
            // AOS.refresh();
        });
    });
};

var FormValidateOnChangeHandler = function () {
    $('.feedback_form .feedback_form__input').on('change', function (event) {
        FieldValidate(this);
    });
};

var FormValidateOnSubmitHandler = function (form) {
    var errors = 0;

    form.find('.feedback_form__input.require').each(function () {
        errors += FieldValidate(this);
    });

    return errors;
};

var FieldValidate = function (field) {
    if (field.type === 'text' || field.type === 'email' || field.type === 'textarea'|| field.type === 'tel') {
        if (field.value) {
            $(field).removeClass('error');
            $(field).addClass('passed');
            return 0;
        } else {
            $(field).removeClass('passed');
            $(field).addClass('error');
            return 1;
        }
    }
    if (field.type === 'file') {
    }

    return 0;
};

var FileInputInfo = function () {
    var fileField = $('.feedback_form__file');

    fileField.each(function (index, el) {
        var hash = '.' + $(el).data('hash');
        $(el).find('.feedback_form__file-input').uploadedFileInfo({
            elements: {
                browse: hash + '-button',
                filename: hash + '-filename',
                filesize: hash + '-filesize',
                remove: hash + '-remove',
                error: hash + '-error',
            }
        });
    });
};


var InputMaskInit = function () {
    document.querySelectorAll('input[type="tel"], input[name="ANSWER_PHONE"]').forEach(el => {
        Inputmask({"mask": "+7 (999) 999-9999", "showMaskOnHover": false, "clearIncomplete": true}).mask(el);
    });
    // $('input[name=ANSWER_PHONE]').inputmask({
    //      mask: "+7-999-999-9999",
    //     showMaskOnHover: false,
    //     clearIncomplete: true
    // });
    // $('input[name=ANSWER_EMAIL]').inputmask({
    //     alias: "email",
    //     showMaskOnHover: false,
    //     clearIncomplete: true
    // });
};

jQuery(document).ready(function () {
    FormSubmitHandler();
    FormValidateOnChangeHandler();
    // FileInputInfo();
    InputMaskInit();
});
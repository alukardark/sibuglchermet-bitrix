jQuery(document).ready(function () {



    $('.order-products form').on('submit', function (event) {
        // event.preventDefault();

        var $form = $(this);
        var errContainer = $form.find('.feedback_form__errors');

        var errCount = FormValidateOnSubmitHandler($form);
        if (errCount > 0) {
            errContainer.empty().append('Заполнены не все обязательные поля').slideDown(200);
            return false;
        }
        errContainer.slideUp(200);
        $('.order-products form').waitMe({
            effect : 'pulse',
            text : 'Обработка',
            bg : 'rgba(255,255,255,0.7)',
            color : '#0eab4b',
            maxSize : '',
            waitTime : -1,
            textPos : 'vertical',
            fontSize : '',
            source : '',
            onClose : function() {}
        });
    });



    $('.order-products input').on('change', function (event) {
        FieldValidate(this);
    });


    var FormValidateOnSubmitHandler = function (form) {
        var errors = 0;

        form.find('input.require').each(function () {
            errors += FieldValidate(this);
        });

        return errors;
    };

    var FieldValidate = function (field) {
        if (field.type === 'text' || field.type === 'email' || field.type === 'textarea') {
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
        return 0;
    };

    $('input[name=PHONE]').inputmask({
        mask: "+7-999-999-9999",
        showMaskOnHover: false,
        clearIncomplete: true
    });


});



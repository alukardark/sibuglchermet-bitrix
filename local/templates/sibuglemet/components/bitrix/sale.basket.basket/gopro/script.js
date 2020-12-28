var RSGoPro_BasketTimeoutID = 0;
$(document).ready(function(){
	function preloadForm(){
	    $('#basket_form').waitMe({
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
	}
	function preloadFormHide(){
	    $('#basket_form').waitMe("hide");
	}

	$(document).on('submit','#basket_form',function(){
       setTimeout(function(){
           preloadFormHide();
	   },1200);
	});
	$(document).on('click','.basket-delete a',function(){
        clearTimeout(RSGoPro_BasketTimeoutID);
        preloadForm();
		clearTimeout(RSGoPro_BasketTimeoutID);
		RSGoPro_BasketTimeoutID = setTimeout(function(){
           preloadFormHide();
		},1200);
	});

	$(document).on('click', '.basket-main .basket-quantity-plus, .basket-main .basket-quantity-minus',function(){
		var $link = $(this);

		clearTimeout(RSGoPro_BasketTimeoutID);
		RSGoPro_BasketTimeoutID = setTimeout(function(){
            preloadForm();
            $link.closest('form').find('.hiddensubmit').trigger('click');
		},1200);
	});

	$(document).on('blur','.basket-main .basket-quantity-input',function(){
		var $input = $(this);

		clearTimeout(RSGoPro_BasketTimeoutID);
		RSGoPro_BasketTimeoutID = setTimeout(function(){
            preloadForm();
			$input.closest('form').find('.hiddensubmit').trigger('click');
		},1200);
	});

});

$(window).on('load',function(){
    $('.icon-basket, .basket-quantity-plus, .basket-quantity-minus').on('click', function(){
        $thisBtn = $(this);
        addBasket();
    });

    $('.basket-quantity-input').on('blur', function(){
        $thisBtn = $(this);
        addBasket();
    });
});

var addBasket = function() {
    var id = parseInt($thisBtn.parents('.catalog-table-row').attr('data-id'));
    var qty = parseInt($thisBtn.parents('.catalog-table-row').find('.basket-quantity-input').val());
    preloadBody();

    if($thisBtn.hasClass('icon-basket')){
        var action = 'plus';
    }else if($thisBtn.hasClass('basket-quantity-plus')){
        var action = 'plus';
        qty++;
    }else if($thisBtn.hasClass('basket-quantity-minus')){
        var action = 'minus';
        qty--;
    }else if($thisBtn.hasClass('basket-quantity-input')){
        var action = 'plus';
    }
    $.ajax({
        url: "/_ajax/addBasket.php",
        type: "POST",
        data: {
            "ID_PRODUCT": id,
            "QUANTITY": qty,
            "ACTION": action,
             "ALL_QTY": $('header .basket span').text(),
        },
        success: function(data) {
            var $data = $.trim(data);
            $('header .basket span').text($data);
            preloadBodyHide();
        }
    });

};

<?php
if (!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED !== true)
	die();

global $USER;
?>

<?php if ($arResult['LAST_ERROR'] != ''): ?>
	<?php ShowError($arResult["LAST_ERROR"]); ?>
<?php endif; ?>

<?php if ($arResult['GOOD_SEND'] == 'Y'): ?>
	<?php // ShowMessage(array('MESSAGE' => $arResult['GOOD_ORDER_TEXT'], 'TYPE' => 'OK')); ?>
	<!--   --><?php //ShowMessage(array('MESSAGE' => $arParams["ALFA_MESSAGE_AGREE"], 'TYPE' => 'OK')); ?>
    <div class="basket-main wrapper">
        <div class="basket-succes">
            <div>
                <div><img src="/upload/_base/basket-succes.png" alt="" style=""></div>
                <div class="wrap-text">
                    <h3>Ваш заказ успешно оформлен!</h3>
                    <p>В ближайшее время мы свяжемся с вами для уточнения деталей заказа</p></div>
            </div>
            <div>
                <a href="/" class="ok">Ок</a>
            </div>
        </div>
    </div>
    <script>
        $(function(){
            $('.order-products form').waitMe("hide");
        });
    </script>
<?php elseif($GLOBALS['NUM_PRODUCTS']==0): ?>
    <?LocalRedirect('/');?>
<?php else: ?>



    <div class="order-products wrapper">
        <form action="<?=$arResult['ACTION_URL']?>" method="POST">







		<?=bitrix_sessid_post()?>
		<input type="hidden" name="<?=$arParams['REQUEST_PARAM_NAME']?>" value="Y" />
		<input type="hidden" name="PARAMS_HASH" value="<?=$arResult['PARAMS_HASH']?>">

		<?php foreach ($arResult['SYSTEM_FIELDS'] as $arField): ?>
			<input type="hidden" name="<?=$arField['CODE']?>" value="">
		<?php endforeach; ?>
            <div class="order-products-wrap-form">
                <input name="NAME" class="order-products-name require" type="text" placeholder="Имя*">
                <input name="EMAIL" class="order-products-email" type="email" placeholder="E-mail">
                <input name="PHONE" class="order-products-tel require" type="text" placeholder="Телефон*">
                <textarea name="COMMENT" class="order-products-cooment" name="" placeholder="Комментарий к заказу"></textarea>
            </div>
<!--		--><?php //foreach ($arResult['SHOW_FIELDS'] as $arField): ?>
<!---->
<!--				<input--><?//if($arField['CODE'] == "PHONE"):?><!-- class="maskPhone"--><?//endif;?>
<!--                        type="text" name="--><?//=$arField['CODE']?><!--"-->
<!--                        value="--><?//=$arField['HTML_VALUE']?><!--"-->
<!--                        placeholder="--><?//=$arField['NAME']?><!----><?//if($arField['REQUIRED_FIELDS'] == 'Y'):?><!--*--><?//endif;?><!--" />-->
<!---->
<!--		--><?php //endforeach; ?>



        <div class="order-products-wrap-submit">
            <h3>Итого:&nbsp;<?=$GLOBALS['NUM_PRODUCTS']?>&nbsp;товара</h3>
            <div class="feedback_form__errors"></div>
            <input type="submit" type="submit"  name="submit" class="btn-green" value="Оформить заказ">
            <p class="form-personal">
                Нажимая на кнопку вы соглашаетесь
                на обработку <a target="_blank" href="/personal-information/">персональных данных</a>
            </p>
        </div>



	    </form>
    </div>


<?php endif; ?>
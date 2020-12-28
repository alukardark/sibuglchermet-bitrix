<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use \Bitrix\Main\Localization\Loc;

$APPLICATION->AddHeadScript($templateFolder.'/script.js');

include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/functions.php");

//echo"<pre>";print_r($arResult['ITEMS']);echo"</pre>";

//foreach ($arResult['ITEMS']['AnDelCanBuy'] as $item){
//    print_r($item['NAME']);
//    echo "<br>";
//}

$haveProducts = true;
if (
    $arResult['HAVE_PRODUCT_TYPE']['ITEMS'] == true ||
    $arResult['HAVE_PRODUCT_TYPE']['DELAYED'] == true ||
    $arResult['HAVE_PRODUCT_TYPE']['NOT_AVAILABLE'] == true ||
    $arResult['HAVE_PRODUCT_TYPE']['SUBSCRIBED'] == true
) {
    $haveProducts = true;
}

?>

<div class="basket-main wrapper">

    <?php if (!$haveProducts): ?>
        <div class="basket__empty-cart">
            <p><svg class="svg-icon basket__empty-icon"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-cart-1"></use></svg></p>
            <p><?=Loc::getMessage('EMPTY_CART');?></p>
            <?php if ($arParams['CATALOG_LINK'] != ''): ?>
                <p><a class="btn1" href="<?=$arParams['CATALOG_LINK']?>"><?=Loc::getMessage('EMPTY_CART_LINK2CATALOG');?></a></p>
            <?php endif; ?>
        </div>
    <?php elseif (strlen($arResult['ERROR_MESSAGE']) <= 0): ?>

        <?php if (is_array($arResult['WARNING_MESSAGE']) && !empty($arResult['WARNING_MESSAGE'])): ?>
            <?php foreach ($arResult['WARNING_MESSAGE'] as $v): ?>
                <? echo ShowError($v); ?>
            <?php endforeach; ?>
        <?php endif; ?>

        <form method="post" action="<?=POST_FORM_ACTION_URI?>" name="basket_form" id="basket_form">
            <?php
            include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/basket_items.php");
            ?>

            <input style="display: none;" class="nonep hiddensubmit" type="submit" name="BasketRefresh" value="<?=GetMessage('SALE_ACCEPT')?>" />
            <input type="hidden" name="BasketOrder" value="BasketOrder" />

            <div class="link-all-catalog-wrap">
                <a href="/catalog/" class="link-all-catalog link-all-catalog-hide">
                    <i class="ion-chevron-left"></i>
                    <span>Перейти в каталог товаров</span>
                </a>
            </div>
            <input class="basket-submit" type="submit" name="BasketOrder" value="Далее" onclick="location.href='<?=$arParams['PATH_TO_ORDER']?>';return false;" />
        </form>

        <a href="/catalog/" class="link-all-catalog"><i class="ion-chevron-left"></i>
            <span>Перейти в каталог товаров</span>
        </a>
    <?php elseif($arResult['ERROR_MESSAGE']=='Ваша корзина пуста'): ?>
        <div class="basket-false">
            <img src="/upload/_base/basket-false.png" alt="">
            <h3>Ваша корзина пуста</h3>
        </div>
        <a href="/catalog/" class="link-all-catalog basket-false-link"><i class="ion-chevron-left"></i>
            <span>Перейти в каталог товаров</span>
        </a>
    <?php else: ?>
        <?ShowError($arResult['ERROR_MESSAGE']);?>
    <?php endif; ?>

</div>


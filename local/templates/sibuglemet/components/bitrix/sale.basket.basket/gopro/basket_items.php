<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

use Bitrix\Sale\DiscountCouponsManager;
use \Bitrix\Main\Localization\Loc;

$normalCount = IntVal( count($arResult['ITEMS']['AnDelCanBuy']) );

?><?=ShowError($arResult['ERROR_MESSAGE']);?><?

if ($arResult['HAVE_PRODUCT_TYPE']['ITEMS']) {

    ShowTable($arParams,$arResult);

}

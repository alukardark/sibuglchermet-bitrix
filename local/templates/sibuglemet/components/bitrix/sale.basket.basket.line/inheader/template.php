<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

use \Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);
?>

<?
    $GLOBALS['NUM_PRODUCTS'] = $arResult['NUM_PRODUCTS'];
?>
<a href="<?=$arParams['PATH_TO_BASKET']?>" class="basket">
    <i class="basket-ico"></i>
    <span>
        <?php $frame = $this->createFrame('basketinfo', false)->begin(); ?>
        <?php if ($arResult['NUM_PRODUCTS'] > 0): ?>
        <?=$arResult["NUM_PRODUCTS"]?>
        <?php else: ?>
        <?= 0 ?>
        <?php endif; ?>
        <?php $frame->beginStub(); ?>
        <?= 0 ?>
        <?php $frame->end(); ?>
    </span>
</a>
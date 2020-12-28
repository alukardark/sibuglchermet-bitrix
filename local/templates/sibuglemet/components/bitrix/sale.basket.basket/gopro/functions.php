<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!function_exists("ShowTable")) {
    function ShowTable($arParams, $arResult, $mode = '') {
        global $APPLICATION;

        $arUrls = Array(
            'delete' => $APPLICATION->GetCurPage().'?'.$arParams['ACTION_VARIABLE'].'=delete&id=#ID#',
            'delay' => $APPLICATION->GetCurPage().'?'.$arParams['ACTION_VARIABLE'].'=delay&id=#ID#',
            'add' => $APPLICATION->GetCurPage().'?'.$arParams['ACTION_VARIABLE'].'=add&id=#ID#',
        );


        ?>
        <div class="basket-list-wrap">



            <div class="basket-row basket-row-title">
                <div class="basket-header basket-col">Наименование</div>
                <div class="basket-header basket-col">Количество</div>
                <div class="basket-header basket-col">Удалить</div>
            </div>


            <?foreach($arResult['GRID']['ROWS'] as $arItem):?>
                <?if($arItem['CAN_BUY']=='Y') {?>
                    <div class="basket-row">
                        <div class="basket-col basket-col-hidden">Наименование</div>

                        <span class="basket-col basket-good-name">
                            <?=$arItem['NAME'];?>
                        </span>

                        <div class="basket-col basket-col-hidden">Количество</div>
                        <div class="basket-quantity basket-col">
                            <span class="basket-quantity-minus"></span>
                            <input type="text" class="basket-quantity-input" maxlength="3" step="1" name="QUANTITY_<?=$arItem['ID']?>" value="<?=$arItem['QUANTITY']?>" data-ratio="<? if (!empty($arItem['MEASURE_RATIO']) && isset($arItem['MEASURE_RATIO'])) { echo $arItem['MEASURE_RATIO']; } else { echo "1"; } ?>" data-avaliable="<?=$arItem['AVAILABLE_QUANTITY']?>">
                            <span class="basket-quantity-plus"></span>
                        </div>

                        <div class="basket-col basket-col-hidden">Удалить</div>
                        <div class="basket-col basket-delete">
                            <a href="<?=str_replace("#ID#", $arItem["ID"], $arUrls["delete"])?>" title="<?=GetMessage('SALE_DELETE')?>"></a>
                        </div>
                    </div>
                <?}endforeach;?>
        </div>

        <?

    }
}


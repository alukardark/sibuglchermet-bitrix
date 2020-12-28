<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
if ($APPLICATION->GetCurPage(false) === '/') {
    $thisMainPage = true;
}
?>

<div class="map wrapper <?if( !$thisMainPage ):?> contacts <?endif?>" data-aos="fade" data-aos-duration="900">
    <div class="map-wrap" id="map"></div>
    <div class="map-info ">
        <?if( $thisMainPage ):?> <h2>Контакты</h2> <?endif?>
        <div id="accordion">
            <?foreach($arResult["ITEMS"] as $arItem):?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                $properties = $arItem['DISPLAY_PROPERTIES'];
                list($lat, $lng) = array_map('trim', explode(',', $arItem['PROPERTIES']['COORDINATES']['VALUE']));
                ?>
                <div class="panel" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a
                            data-lat="<?=$lat?>"
                            data-lng="<?=$lng?>"
                            data-target="#<?=$arItem['CODE']?>"
                            href="#<?=$arItem['CODE']?>" class="city-control-wrap collapsed" data-toggle="collapse" data-parent="#mCSB_1_container">
                        <div class="city-control"><?=$arItem['NAME']?> <i class="ion-chevron-down"></i></div>
                    </a>
                    <div id="<?=$arItem['CODE']?>" data-toggle="" class="panel-content collapse">

                        <a href="tel:+7 (923) 600-71-71" class="city-phone"><?=$arItem['PROPERTIES']['PHONE']['VALUE']?></a>

                        <div class="city-worktime"><?=$arItem['PROPERTIES']['WORKTIME']['VALUE']?></div>
                        <a href="mailto:elissa06@inbox.ru" class="city-email"><?=$arItem['PROPERTIES']['EMAIL']['VALUE']?></a>

                        <?=$arItem['PREVIEW_TEXT']?>

                    </div>
                </div>
            <?endforeach;?>

        </div>
    </div>
</div>





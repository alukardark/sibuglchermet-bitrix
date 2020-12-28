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
$GLOBALS['this_service'] = $arResult['NAME'];
?>
<div class="services-item">
    <div class="inner-wrapper">
        <div class="inner-content">


            <img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt="">
            <div class="services-text">
                <?=$arResult['DETAIL_TEXT']?>
            </div>
            <a href="<?=$arResult['LIST_PAGE_URL']?>" class="link-all-services"><i class="ion-chevron-left"></i><span>Перейти ко всем услугам</span></a>
        </div>

    </div>
</div>
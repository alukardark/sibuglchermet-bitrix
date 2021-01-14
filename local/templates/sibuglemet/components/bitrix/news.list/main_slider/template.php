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
?>




<div class="main-slider">


    <div class="<? if(count($arResult["ITEMS"]) > 1){echo 'swiper-container';} ?> h-100">
        <div class="swiper-wrapper">

                <?foreach($arResult["ITEMS"] as $arItem):?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    $properties = $arItem['DISPLAY_PROPERTIES'];
                    ?>

                    <div class="swiper-slide main-slider__slide" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="container h-100">
                            <div class="row h-100">
                                <div class="col-md-12">
                                    <div class="main-slider__slide-cont">
                                        <?=$arItem['PREVIEW_TEXT']?>

                                        <?if($properties['LINK_BTN']['VALUE'] && $properties['LINK_BTN']['VALUE']):?>
                                            <a href="<?=$properties['LINK_BTN']['VALUE']?>" class="button main-slider__button">Подробнее</a>
                                        <?endif;?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>


        </div>

        <div class="swiper-pagination"></div>
    </div>

</div>

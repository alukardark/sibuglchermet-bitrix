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
<div class="services-list wrapper">
    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $properties = $arItem['DISPLAY_PROPERTIES'];
        ?>
        <div class="services-wrap" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
            <div class="service-img" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);">
            </div>
            <div class="services-text-wrap">
                <div class="service-title">
                    <?=$arItem['NAME']?>
                </div>
                <div class="service-text">
                    <?=$arItem['PREVIEW_TEXT']?>
                </div>
            </div>

            <div class="service-hov-wrap">
                <div class="service-hov-effect <?=$arItem['CODE']?>">
                    <?if($arItem['CODE'] == 'sushka'):?>
                        <div class="catalog-main-list-img">
                            <div>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                            </div>

                            <div>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                            </div>

                            <div>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                                <span><span class="wave-one"></span><span class="wave-two"></span></span>
                            </div>
                        </div>
                    <?elseif($arItem['CODE'] == 'briketirovanie'):?>
                        <div class="catalog-main-list-img">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    <?else:?>
                        <div class="catalog-main-list-img">
                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>

                            <div>
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    <?endif;?>
                </div>


                <div class="service-title">
                    <?=$arItem['NAME']?>
                </div>
                <a class="btn-white service-btn" href="<?=$arItem['DETAIL_PAGE_URL']?>">Подробнее</a>
            </div>


        </div>
    <?endforeach;?>
    <a href="#" class="services-wrap" style="height: 0;margin: 0;padding: 0;min-height: 0;"></a>
    <a href="#" class="services-wrap" style="height: 0;margin: 0;padding: 0;min-height: 0;"></a>
    <a href="#" class="services-wrap" style="height: 0;margin: 0;padding: 0;min-height: 0;"></a>
</div>
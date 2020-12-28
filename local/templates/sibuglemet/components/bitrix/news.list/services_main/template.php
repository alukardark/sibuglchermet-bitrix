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

<div class="catalog-main-list">
    <div class="catalog-main-head" data-aos="fade-right" data-aos-duration="1200" data-aos-offset="0">

        <h2>Предлагаем услуги<?=$arResult['DESCRIPTION']?></h2>
        <a href="/uslugi/" class="btn-white">Все услуги</a>
    </div>

    <?foreach($arResult["ITEMS"] as $arItem):?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <a data-aos="fade" data-aos-duration="900" data-aos-offset="0" id="<?=$this->GetEditAreaId($arItem['ID']);?>" href="<?=$arItem['DETAIL_PAGE_URL']?>" class="catalog-main-item <?=$arItem['CODE']?>">
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
            <div class="catalog-main-list-title"><?=$arItem['NAME']?></div>
        </a>
    <?endforeach;?>

</div>
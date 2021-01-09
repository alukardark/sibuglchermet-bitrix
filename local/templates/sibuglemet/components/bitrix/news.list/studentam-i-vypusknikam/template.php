<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
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








<div class="studentam-i-vypusknikam__wrap">
    <div class="studentam-i-vypusknikam__cont" id="article">

        <? $i = 1; ?>
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

            ?>





            <div class="studentam-i-vypusknikam__block" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                <div class="studentam-i-vypusknikam__row">
                    <div class="">
                        <h4><strong><?=$i?></strong> <?= $arItem['PROPERTIES']['TITLE']['VALUE'] ?></h4>
                        <h2><?= $arItem['NAME'] ?></h2>
                        <div class="studentam-i-vypusknikam__img d-xl-none" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
                        <?= $arItem['PREVIEW_TEXT'] ?>
                    </div>
                    <div class="studentam-i-vypusknikam__img d-none d-xl-block" style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
                </div>
                <?= $arItem['DETAIL_TEXT'] ?>
            </div>

        <? $i++; ?>
        <? endforeach; ?>



    </div>




    <div class="studentam-i-vypusknikam__aside" id="aside-sticky">
        <h3>Программы</h3>
        <ul>
            <? foreach ($arResult["ITEMS"] as $arItem): ?>
                <li><a class="anchor" href="#<?= $this->GetEditAreaId($arItem['ID']); ?>"><?= $arItem['PROPERTIES']['TITLE']['VALUE'] ?></a></li>
            <? endforeach; ?>
        </ul>
    </div>
</div>







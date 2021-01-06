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


<ul class="history__list">


    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">

                <div class="history__img"
                     style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>);"></div>
                <div class="history__info">
                    <div class="history__tag"><?= $arItem['PROPERTIES']['TAGS']['VALUE'] ?></div>
                    <p><?= $arItem['NAME'] ?></p>
                    <div class="history__data">
                        <div class="history__link">Читать далее</div>
                        <div class="history__date"><?= $arItem['DISPLAY_ACTIVE_FROM'] ?></div>
                    </div>
                </div>


            </a>
        </li>
    <? endforeach; ?>

</ul>
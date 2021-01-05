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


<ul class="last-news__list">


    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>

        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<? echo $arItem["DETAIL_PAGE_URL"] ?>">
                <div class="last-news__data">
                    <div class="last-news__date"><?= $arItem['DISPLAY_ACTIVE_FROM'] ?></div>
                    <div class="last-news__tag"><?= $arItem['PROPERTIES']['TAGS']['VALUE'] ?></div>
                </div>
                <p><?= $arItem['NAME'] ?></p>
                <div class="last-news__link">Читать далее</div>
            </a>
        </li>
    <? endforeach; ?>

</ul>
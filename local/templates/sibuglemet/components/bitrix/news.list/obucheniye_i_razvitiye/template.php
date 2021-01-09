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


<ul class="obucheniye-i-razvitiye__list">

    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        ?>
        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <div class="obucheniye-i-razvitiye__img"
                 style="background-image: url(<?= CFile::GetPath($arItem['PROPERTIES']['IMG']['VALUE']) ?>);"></div>
            <div class="obucheniye-i-razvitiye__info">
                <h2><?= $arItem['NAME'] ?></h2>
                <?= $arItem['PREVIEW_TEXT'] ?>
            </div>
        </li>
    <? endforeach; ?>
</ul>



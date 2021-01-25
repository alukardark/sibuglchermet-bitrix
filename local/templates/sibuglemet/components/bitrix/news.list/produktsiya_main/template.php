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





<div class="products__wrap">
    <ul class="products__list">
        <? foreach ($arResult["ITEMS"] as $arItem): ?>
            <? if ($arItem['PROPERTIES']['MAIN_PAGE']['VALUE']=='Да'): ?>
                <?
                $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                ?>
                <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                    <div class="products__title"><? print_r($arItem['NAME']) ?></div>
                    <div class="products__row">
                        <? if ($arItem["PREVIEW_TEXT"]) { ?>
                            <div class="products__desc">
                                <?= $arItem["PREVIEW_TEXT"] ?>
                            </div>
                        <? } ?>

                        <?
                        $file_link = CFile::GetPath($arItem['PROPERTIES']['FILE']['VALUE']);
                        $file_name = strip_tags(CFile::GetByID($arItem['PROPERTIES']['FILE']['VALUE'])->arResult[0]['ORIGINAL_NAME']);

                        $file_expansion = new SplFileInfo($file_name);
                        $file_expansion = $file_expansion->getExtension();


                        $file_name = str_replace('.' . $file_expansion, '', $file_name);
                        ?>

                        <a target="_blank" href="<?= $file_link ?>"
                           class="products__file products__file--<?= $file_expansion ?>">
                            <?= $file_name ?>
                        </a>
                    </div>
                </li>
            <? endif; ?>

        <? endforeach; ?>
    </ul>
</div>

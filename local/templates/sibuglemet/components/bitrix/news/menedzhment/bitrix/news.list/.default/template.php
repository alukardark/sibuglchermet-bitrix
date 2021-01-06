<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>

<? if (empty($arResult["ITEMS"])) { ?>

    <h2>Ничего не найдено</h2>

<? } ?>


<ul class="management__list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $properties = $arItem['DISPLAY_PROPERTIES'];
        ?>


        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">

                <div class="management__photo"
                     style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC']; ?>);"></div>
                <div class="management__name"><?= $arItem['NAME']; ?></div>
                <div class="management__specialty"><?= $arItem['PROPERTIES']['SPETSIALNOST']['VALUE']; ?></div>


            </a>


        </li>

    <? endforeach; ?>
</ul>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>

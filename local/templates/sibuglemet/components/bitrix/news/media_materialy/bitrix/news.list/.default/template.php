<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>


<? if (empty($arResult["ITEMS"])) {?>

    <hr>
    <h2>Ничего не найдено</h2>
    <br>

<? } ?>

<ul class="history__list">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));


        if ($arItem['PROPERTIES']['VIDEO_LINK']['VALUE']) {
            $class = 'history__video';
            $link = $arItem['PROPERTIES']['VIDEO_LINK']['VALUE'];
        } else {
            $link = $arItem['PREVIEW_PICTURE']['SRC'];
        }
        ?>

        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $link ?>" class="history__fancy <?= $class ?>" data-fancybox="">
                <span class="history__fancy-img"
                      style="background-image: url(<?= $arItem['PREVIEW_PICTURE']['SRC'] ?>);"></span>
            </a>
        </li>

    <? endforeach; ?>
</ul>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>

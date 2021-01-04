<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
$this->setFrameMode(true);
?>



<ul class="last-news__list last-news__list--page">
    <? foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
        $properties = $arItem['DISPLAY_PROPERTIES'];
        ?>


        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">
                <div class="last-news__data">
                    <div class="last-news__date"><? print_r($arItem['DISPLAY_ACTIVE_FROM']); ?></div>
                    <div class="last-news__tag"><? print_r($arItem['PROPERTIES']['TAGS']['VALUE']); ?></div>
                </div>
                <p><?= $arItem['NAME'] ?></p>
                <div class="last-news__link">Читать далее</div>
            </a>
        </li>

    <? endforeach; ?>
</ul>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>

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
        $properties = $arItem['DISPLAY_PROPERTIES'];
        ?>


        <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
            <a href="<?= $arItem['DETAIL_PAGE_URL'] ?>">

                <div class="history__img"
                     style="background-image: url(<?=$arItem['PREVIEW_PICTURE']['SRC']; ?>);"></div>

                <div class="history__info">
                    <div class="history__tag"><?=$arItem['PROPERTIES']['TAGS']['VALUE']; ?></div>
                    <p><?= $arItem['NAME'] ?></p>
                    <div class="history__data">
                        <div class="history__link">Читать далее</div>
                        <div class="history__date"><?=$arItem['DISPLAY_ACTIVE_FROM']; ?></div>
                    </div>
                </div>
            </a>
        </li>

    <? endforeach; ?>
</ul>

<? if ($arParams["DISPLAY_BOTTOM_PAGER"]): ?>
    <?= $arResult["NAV_STRING"] ?>
<? endif; ?>

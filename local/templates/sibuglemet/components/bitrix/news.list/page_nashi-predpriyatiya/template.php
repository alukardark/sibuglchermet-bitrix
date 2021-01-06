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





<? foreach ($arResult["ITEMS"] as $arItem): ?>
    <?
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $img_link = CFile::GetPath($arItem['PROPERTIES']['IMAGE']['VALUE']);

    ?>

    <div class="predpriyatiya__row" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="predpriyatiya__col">
            <p><img src="<?= $arItem['DETAIL_PICTURE']['SRC'] ?>"></p>

            <?= $arItem['DETAIL_TEXT'] ?>
        </div>

        <div class="predpriyatiya__col">
            <h3>Контакты</h3>
            <ul class="predpriyatiya__contacts">
                <li class="predpriyatiya__address">
                    <? foreach ($arItem['PROPERTIES']['ADDRESS']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        echo $item;
                    } ?>
                </li>
                <li class="predpriyatiya__tel">
                    <? foreach ($arItem['PROPERTIES']['TEL']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        ?>

                        <a href="tel:<?= $item ?>"><?= $item ?></a>
                    <? } ?>
                </li>
                <li class="predpriyatiya__mail">
                    <? foreach ($arItem['PROPERTIES']['EMAIL']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        ?>

                        <a href="mailto:<?= $item ?>"><?= $item ?></a>
                    <? } ?>
                </li>
            </ul>
        </div>
    </div>
<? endforeach; ?>


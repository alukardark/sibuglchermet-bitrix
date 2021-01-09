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

    $map_coords[$arItem['ID']] = $arItem['PROPERTIES']['MAP']['VALUE'];
    ?>

    <div class="contacts__row" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
        <div class="contacts__info">
            <h2><?= $arItem['NAME'] ?></h2>
            <ul class="contacts__contacts">
                <li class="contacts__address">
                    <? foreach ($arItem['PROPERTIES']['ADDRESS']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        echo $item;
                    } ?>
                </li>
                <li class="contacts__tel">
                    <? foreach ($arItem['PROPERTIES']['TEL']['VALUE'] as $item) {
                        if (empty($item)) {
                            continue;
                        }
                        $item = $item['CONTENT'];
                        ?>

                        <a href="tel:<?= $item ?>"><?= $item ?></a>
                    <? } ?>
                </li>
                <li class="contacts__mail">
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
        <div id="map<?= $arItem['ID'] ?>" class="contacts__map"></div>
    </div>


<? endforeach; ?>
<?
    $GLOBALS['map_coords'] = $map_coords;
?>



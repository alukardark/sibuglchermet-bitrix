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

<? $items = []; ?>


<? foreach ($arResult["ITEMS"] as $arItem):
    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));

    $arFilter = Array(
        "ACTIVE" => "Y",
        "ID" => $arItem['PROPERTIES']['MENEDZHER_LIST']['VALUE'],
    );

endforeach;

$arSelect = Array("ID", "NAME", "DETAIL_PAGE_URL", "PREVIEW_TEXT", "PREVIEW_PICTURE", "DATE_ACTIVE_FROM", "PROPERTY_CONTACTS", "PROPERTY_SPETSIALNOST");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);

while ($ob = $res->GetNextElement()) :
    $arFields = $ob->GetFields();

    if (empty($arFields['PROPERTY_CONTACTS_VALUE']['CONTENT'])) {
        continue;
    }
    $items[$arFields['ID']]['NAME'] = $arFields['NAME'];
    $items[$arFields['ID']]['DETAIL_PAGE_URL'] = $arFields['DETAIL_PAGE_URL'];
    $items[$arFields['ID']]['PREVIEW_PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
    $items[$arFields['ID']]['PROPERTY_SPETSIALNOST_VALUE'] = $arFields['PROPERTY_SPETSIALNOST_VALUE'];
    $items[$arFields['ID']]['PROPERTY_CONTACTS_VALUE'][] = $arFields['PROPERTY_CONTACTS_VALUE']['CONTENT'];
    ?>

<? endwhile; ?>


<? if (!empty($items)) { ?>
    <h2><?= $arResult['NAME'] ?></h2>
    <h3>Менеджмент</h3>
<? } ?>

<ul class="management-mini__list " id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
    <? foreach ($items as $item): ?>
        <li>
            <div class="management-mini__photo" style="background-image: url(<?= $item['PREVIEW_PICTURE'] ?>);"></div>

            <div class="management-mini__info">
                <div class="">
                    <div class="management-mini__name"><?= $item['NAME']; ?></div>
                    <div class="management-mini__specialty">
                        <?= $item['PROPERTY_SPETSIALNOST_VALUE']; ?>
                    </div>
                </div>

                <div class="management-mini__contacts">
                    <?
                    $arrayLength = count($item['PROPERTY_CONTACTS_VALUE']);
                    $counter = 0;
                    foreach ($item['PROPERTY_CONTACTS_VALUE'] as $contact) {
                        $counter++;
                        if (strripos($contact, '@')) {
                            $href = 'mailto:';
                        } else {
                            $href = 'tel:';
                        }

                        if ($counter != $arrayLength) {
                            $comma = ', ';
                        } else {
                            $comma = '';
                        }
                        ?>
                        <span><a href="<?= $href . $contact ?>"><?= $contact ?></a><?= $comma ?></span>
                    <? } ?>
                </div>
            </div>
        </li>
    <? endforeach; ?>
</ul>
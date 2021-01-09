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

    ?>

    <div class="col-md-12" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">

        <?= $arItem['DETAIL_TEXT'] ?>

        <div class="biznes-sistema__objectives">
            <h2>Цели</h2>

            <ul>
                <li>
                    <img src="<?= CFile::GetPath($arItem['PROPERTIES']['TSEL_IMG_1']['VALUE']) ?>"> <?= $arItem['PROPERTIES']['TSEL_TXT_1']['VALUE'] ?>
                </li>
                <li>
                    <img src="<?= CFile::GetPath($arItem['PROPERTIES']['TSEL_IMG_2']['VALUE']) ?>"> <?= $arItem['PROPERTIES']['TSEL_TXT_2']['VALUE'] ?>
                </li>
                <li>
                    <img src="<?= CFile::GetPath($arItem['PROPERTIES']['TSEL_IMG_3']['VALUE']) ?>"> <?= $arItem['PROPERTIES']['TSEL_TXT_3']['VALUE'] ?>
                </li>
            </ul>
        </div>

        <div class="biznes-sistema__tasks">
            <h2>Задачи</h2>

            <?= $arItem['PROPERTIES']['ZADACHI']['~VALUE']['TEXT'] ?>
        </div>


        <div class="biznes-sistema__results">
            <h2>Результаты</h2>
            <ul>

                <?
                $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE");
                $arFilter = Array('ACTIVE' => 'Y', "IBLOCK_ID" => 15);
                //                CModule::IncludeModule("iblock");
                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);


                while ($ob = $res->GetNextElement()) :
                    $arFields = $ob->GetFields(); ?>
                    <li>
                        <div class="biznes-sistema__results-img" style="background-image: url(<?= CFile::GetPath($arFields['PREVIEW_PICTURE']) ?>);"></div>
                        <h4><?=$arFields['NAME']?></h4>
                        <p><?=$arFields['PREVIEW_TEXT']?></p>
                    </li>
                <? endwhile; ?>

            </ul>
        </div>


    </div>
<? endforeach; ?>




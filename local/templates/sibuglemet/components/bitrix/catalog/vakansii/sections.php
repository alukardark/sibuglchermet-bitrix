<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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




$rs_Section = CIBlockSection::GetList(array('left_margin' => 'asc'), array('IBLOCK_ID' => $arParams['IBLOCK_ID']));


while ($ar_Section = $rs_Section->Fetch()) {
    $ar_Result[] = array(
        'ID' => $ar_Section['ID'],
        'NAME' => $ar_Section['NAME'],
        'IBLOCK_SECTION_ID' => $ar_Section['IBLOCK_SECTION_ID'],
        'IBLOCK_SECTION_ID' => $ar_Section['IBLOCK_SECTION_ID'],
        'LEFT_MARGIN' => $ar_Section['LEFT_MARGIN'],
        'RIGHT_MARGIN' => $ar_Section['RIGHT_MARGIN'],
        'DEPTH_LEVEL' => $ar_Section['DEPTH_LEVEL'],
    );
} ?>


<? foreach ($ar_Result as $ar_Value) { ?>
    <?
    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXTx", "DETAIL_PAGE_URL", "PROPERTY_FILE", "PROPERTY_PLACE", "PROPERTY_CITY", "PROPERTY_EXPERIENCE", "PROPERTY_REQUIREMENTS");
    $arFilter = Array('ACTIVE' => 'Y', "IBLOCK_ID" => $arResult["ID"], "SECTION_ID" => $ar_Value['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);
    ?>
    <h2><? echo $ar_Value["NAME"] ?></h2>


    <ul class="vacancies__list">
        <? while ($ob = $res->GetNextElement()) {
            $arFields = $ob->GetFields();

            //--Редактирование в режиме правки
            $arButtons = CIBlock::GetPanelButtons(
                $arParams["IBLOCK_ID"],
                $arFields["ID"],
                0,
                array("SECTION_BUTTONS" => false, "SESSID" => false)
            );
            $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
            $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];


            $this->AddEditAction($arFields['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arFields['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            //--Редактирование в режиме правки


            ?>
            <li class="vacancies__item" id="<?= $this->GetEditAreaId($arFields['ID']); ?>">
                <a href="<?= $arFields['DETAIL_PAGE_URL'] ?>">
                    <span class="vacancies__title"><?= $arFields['NAME'] ?></span>

                    <span class="vacancies__text">
                        <ul>
                            <li>Опыт: <strong><?=$arFields['PROPERTY_EXPERIENCE_VALUE']?></strong></li>
                            <li>Основные требования: <strong><?=$arFields['PROPERTY_REQUIREMENTS_VALUE']?></strong></li>
                        </ul>
                    </span>

                    <span class="vacancies__info">
                        <span class="vacancies__place"><?=$arFields['PROPERTY_PLACE_VALUE']?></span>
                        <span class="vacancies__city"><?=$arFields['PROPERTY_CITY_VALUE']?></span>
                    </span>
                </a>
            </li>

        <? } ?>


    </ul>


<? } ?>





<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);


$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
$GLOBALS['CATALOG'] = $arResult['SECTIONS'];


?>


<?
CModule::IncludeModule("iblock");

$rs_Section = CIBlockSection::GetList(array('left_margin' => 'asc'), array('IBLOCK_ID' => $arResult["ID"]));


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
    $arSelect = Array("ID", "NAME", "PROPERTY_STAH");
    $arFilter = Array("IBLOCK_ID" => $arResult["ID"], "SECTION_ID" => $ar_Value['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
    ?>
    <? echo $ar_Value["NAME"] ?>

    <? while ($ob = $res->GetNextElement()) {

        $arFields = $ob->GetFields();

        echo "<hr>";
        echo "<div style='color: red'>".$arFields["NAME"]."</div>";
        echo "<hr>";
    } ?>
<? } ?>


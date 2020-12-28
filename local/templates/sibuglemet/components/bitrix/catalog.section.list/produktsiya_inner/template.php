<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

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

<? $i = 0; ?>
<? foreach ($ar_Result as $ar_Value) { ?>



    <?



    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_FILE");
    $arFilter = Array('ACTIVE' => 'Y', "IBLOCK_ID" => $arResult["ID"], "SECTION_ID" => $ar_Value['ID']);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 9999), $arSelect);
    ?>

    <div class="products">

        <div class="products__table">
            <h2><? echo $ar_Value["NAME"] ?></h2>
            <ul class="products__list <? if ($i < 1) {
                echo 'products__list--4';
            } else {
                echo 'products__list--3';
            } ?>">

                <? while ($ob = $res->GetNextElement()) {
                    $arFields = $ob->GetFields();
                    //--Редактирование в режиме правки
                        $arButtons = CIBlock::GetPanelButtons(
                            $arParams["IBLOCK_ID"],
                            $arFields["ID"],
                            0,
                            array("SECTION_BUTTONS"=>false, "SESSID"=>false)
                        );
                        $arItem["EDIT_LINK"] = $arButtons["edit"]["edit_element"]["ACTION_URL"];
                        $arItem["DELETE_LINK"] = $arButtons["edit"]["delete_element"]["ACTION_URL"];


                        $this->AddEditAction($arFields['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arFields['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                     //--Редактирование в режиме правки

                    ?>
                    <li id="<?= $this->GetEditAreaId($arFields['ID']); ?>">
                        <div class="products__title"><?= $arFields["NAME"] ?></div>
                        <div class="products__row">
                            <div class="products__desc">
                                <?= $arFields["PREVIEW_TEXT"] ?>
                            </div>

                            <?
                            $file_link = CFile::GetPath($arFields['PROPERTY_FILE_VALUE']);
                            $file_name = CFile::GetByID($arFields['PROPERTY_FILE_VALUE'])->arResult[0]['FILE_NAME'];

                            $file_expansion = new SplFileInfo($file_name);
                            $file_expansion = $file_expansion->getExtension();


                            $file_name = str_replace('.' . $file_expansion, '', $file_name);
                            ?>

                            <a target="_blank" href="<?= $file_link ?>"
                               class="products__file products__file--<?= $file_expansion ?>">
                                <?= $file_name ?>
                            </a>

                            <?
                            ?>
                        </div>
                    </li>
                    <?
                    $i++;
                } ?>

            </ul>
        </div>

    </div>


<? } ?>


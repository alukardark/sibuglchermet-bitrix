<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);


$strSectionEdit = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_EDIT");
$strSectionDelete = CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "SECTION_DELETE");
$arSectionDeleteParams = array("CONFIRM" => GetMessage('CT_BCSL_ELEMENT_DELETE_CONFIRM'));
?>
<div class="catalog-main-list">
    <div class="catalog-main-head" data-aos="fade-right" data-aos-duration="1200" data-aos-offset="0">
        <h2>
            <?if($arParams['IBLOCK_ID']==3):?>
            <?$APPLICATION->IncludeComponent(
                "bitrix:main.include",
                ".default",
                array(
                    "AREA_FILE_SHOW" => "file",
                    "AREA_FILE_SUFFIX" => "inc",
                    "EDIT_TEMPLATE" => "",
                    "PATH" => "/_include/first_catalog_title.php",
                    "COMPONENT_TEMPLATE" => ".default"
                ),
                false
            );
			$name_link = 'dobavki_dlya_betona';
			?>
            <?else:?>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    ".default",
                    array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/_include/last_catalog_title.php",
                        "COMPONENT_TEMPLATE" => ".default"
                    ),
                    false
                );
				$name_link = 'stroitelnyye-materialy';
				?>
            <?endif?>
        </h2>
        <a href="/catalog#<?=$name_link?>/" class="btn-white">В каталог</a>
    </div>
    <?


    $check = 1;
    foreach ($arResult['SECTIONS'] as &$arSection):
        if($arSection['UF_CAT_MAIN_VIS'] && $check<=4 ):

            $this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
            $this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);
            ?>
            <a data-aos="fade" data-aos-duration="900" data-aos-offset="0" href="<? echo $arSection["SECTION_PAGE_URL"]; ?>" class="catalog-main-item" id="<?=$this->GetEditAreaId($arSection['ID']);?>">
                <div class="catalog-main-list-img" style="background-image: url(<?=$arSection['PICTURE']['SRC']?>);"></div>
                <div class="catalog-main-list-title"><?=$arSection["NAME"];?></div>
            </a>
            <?
            $check++;
        endif;
    endforeach;?>
</div>
